<?php

namespace Repositories;

use Exception;
use PDO;
use PDOException;
use Repositories\Repository;

class UsersRepository extends Repository
{
    function checkUsernamePassword($username, $password)
    {
        // retrieve the user with the given username
        $stmt = $this->connection->prepare("SELECT * FROM Users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\\Users');
        $user = $stmt->fetch();

        if (!$user) {
            throw new Exception("Incorrect username");
        } 
        
        $passwordResult = $this->verifyPassword($password, $user->password);
        
        if (!$passwordResult) {
            throw new Exception("Incorrect password");
        }

        // do not pass the password hash to the caller
        $user->password = "";
        return $user;
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
    public function getAllUsers()
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

    function createUser($user)
    {
        //inser the user into the table users and return the user
        $stmt = $this->connection->prepare("INSERT INTO Users (username, email, password) 
        VALUES (?,?,?)");
        $stmt->execute([$user->username, $user->email, $this->hashPassword($user->password)]);
    }
}
