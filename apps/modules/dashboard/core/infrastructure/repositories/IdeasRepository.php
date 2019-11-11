<?php

namespace Phalcon\Init\Dashboard\Infrastructure\Repositories;

use Phalcon\Init\Dashboard\Domain\Contracts\Repositories\IdeasRepositoryInterface;
use Phalcon\Init\Dashboard\Infrastructure\Dto\AllIdeasDto;
use Phalcon\Init\Dashboard\Infrastructure\Dto\AuthorDto;
use Phalcon\Init\Dashboard\Infrastructure\Dto\IdeaData;
use PDO;
use Phalcon\Di;

class IdeasRepository implements IdeasRepositoryInterface
{
    protected $dbManager;

    public function __construct()
    {
        $this->dbManager = Di::getDefault()->get('db');
    }

    public function addNewIdea($title, $description, $authorId)
    {
        $query = sprintf('INSERT INTO idea (title, description, author_id) VALUES (:title, :description, :author_id);');

        $params = [
            'title' => $title,
            'description' => $description,
            'author_id' => $authorId
        ];
        
        return $this->dbManager->execute($query, $params);
    }

    public function allIdea()
    {
        $query = sprintf("SELECT idea.*, author.name as author_name FROM idea INNER JOIN author ON idea.author_id = author.author_id");

        $ideas = $this->dbManager->query($query)->fetchAll(PDO::FETCH_ASSOC);

        return new AllIdeasDto($ideas);
    }

    public function findIdea($ideaId)
    {
        $query = sprintf("SELECT * 
                        FROM idea 
                        WHERE idea_id=:idea_id");

        $params = array('idea_id' => $ideaId);

        $idea = $this->dbManager->query($query, $params)->fetch(PDO::FETCH_ASSOC);
        return new IdeaData($idea['idea_id'], $idea['title'], $idea['description'], $idea['rating'], $idea['vote']);
    }

    public function rateIdea($ideaId, $rating, $vote)
    {
        $query = sprintf('UPDATE idea set rating = :rating, vote = :vote WHERE idea_id = :idea_id;');

        $params = [
            'rating' => $rating,
            'vote' => $vote,
            'idea_id' => $ideaId
        ];

        return $this->dbManager->execute($query, $params);
    }

    public function findAuthorByIdeaId($ideaId)
    {
        $query = sprintf("SELECT * FROM author INNER JOIN idea ON idea.author_id = author.author_id WHERE idea.idea_id = :idea_id");
        $param = ['idea_id' => $ideaId];

        $data = $this->dbManager->query($query, $param)->fetch(PDO::FETCH_ASSOC);

        return new AuthorDto($data['author_id'], $data['name'], $data['email']);
    }
}