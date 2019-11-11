<?php

namespace Phalcon\Init\Dashboard\Infrastructure\Repositories;

use Phalcon\Init\Dashboard\Domain\Contracts\Repositories\IdeasRepositoryInterface;
use Phalcon\Init\Dashboard\Infrastructure\Dto\AllIdeasDto;
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
}