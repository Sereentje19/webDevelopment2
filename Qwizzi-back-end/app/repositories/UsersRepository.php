<?php

namespace Repositories;

use PDO;
use PDOException;
use Repositories\Repository;
require_once __DIR__ . '/../models/Users.php';

class UsersRepository extends Repository
{
    public function getAll(){
        try {
            $stmt = $this->connection->prepare("SELECT * FROM Users as US");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\\Users');
            $users = $stmt->fetchAll();

            return $users;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function insert($user)
    {
        //inser the user into the table users and return the user
        $stmt = $this->connection->prepare("INSERT into Users (username, email, password) 
        VALUES (?,?,?)");
        $stmt->execute([$user->username, $user->email, $user->password]);

        $user->id = $this->connection->lastInsertId();
        //return the created user by first getting the user from the database by id
        return $user;
    }
}
