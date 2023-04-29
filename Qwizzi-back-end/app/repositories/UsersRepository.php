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
          $stmt = $this->connection->prepare("SELECT * FROM Users WHERE username = :username AND password = :password");
          $stmt->bindParam(':username', $username);
          $stmt->bindParam(':password', $password);
          $stmt->execute();

          $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\\Users');
          $user = $stmt->fetch();

          if(!$user){
              throw new Exception("Incorrect username");
          }

      
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
        $stmt->execute([$user->username, $user->email, $user->password]);

        // $user->id = $this->connection->lastInsertId();
        //return the created user by first getting the user from the database by id
        return $user;
    }
}
