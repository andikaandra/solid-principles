<?php

namespace Phalcon\Init\Dashboard\Infrastructure\Repositories;

use Phalcon\Init\Dashboard\Domain\Contracts\Repositories\AuthorsRepositoryInterface;
use Phalcon\Init\Dashboard\Infrastructure\Dto\AuthorDto;
use PDO;
use Phalcon\Di;

class AuthorsRepository implements AuthorsRepositoryInterface
{
    protected $dbManager;

    public function __construct()
    {
        $this->dbManager = Di::getDefault()->get('db');
    }

    public function addNewAuthor($name, $email, $password)
    {
        $query = sprintf('INSERT INTO author (name, email, password) VALUES (:name, :email, :password);');

        $params = [
            'name' => $name,
            'email' => $email,
            'password' => $password
        ];
        
        return $this->dbManager->execute($query, $params);
    }

    public function getAuthor($email, $password)
    {
        $query = sprintf("SELECT * 
                        FROM author 
                        WHERE email=:email AND password=:password");

        $params = array('email' => $email, 'password' => $password);

        $user = $this->dbManager->query($query, $params)->fetch(PDO::FETCH_ASSOC);
        return new AuthorDto($user['author_id'], $user['name'], $user['email']);
    }
}