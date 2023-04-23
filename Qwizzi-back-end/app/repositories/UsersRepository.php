<?php

namespace Repositories;

use PDO;
use PDOException;
use Repositories\Repository;

class UsersRepository extends Repository
{
    function checkUsernamePassword($username, $password)
    {
        try {
            // retrieve the user with the given username
            $stmt = $this->connection->prepare("SELECT * FROM Users WHERE username = :username AND password = :password");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\\Users');
            $user = $stmt->fetch();

            // verify if the password matches the hash in the database
            // $result = $this->verifyPassword($password, $user->password);

            // if ($password != $user->password) {
                // $result = false;
            // }

            // if (!$result)
                // return false;

            // do not pass the password hash to the caller
            // $user->password = "";

            return $user;
        } catch (PDOException $e) {
            echo $e;
        }
    }
    // hash the password (currently uses bcrypt)
    function hashPassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    // verify the password hash
    function verifyPassword($input, $hash)
    {
        return password_verify($input, $hash);
    }
    public function getAll()
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM Users");
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
