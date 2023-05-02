<?php

namespace Repositories;

use PDO;
use PDOException;
use Repositories\Repository;

class QuizRepository extends Repository
{

    public function getAllQuizes()
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM Quizes");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\\Quizes');
            $quizes = $stmt->fetchAll();
            $this->getAllImagesBase64($quizes);

            return $quizes;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function getOneQuiz($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM Quizes WHERE id = ?");
            $stmt->execute([$id]);
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\\Quizes');
            $quizes = $stmt->fetchAll();
            $this->getAllImagesBase64($quizes);

            return $quizes;
        } catch (PDOException $e) {
            echo $e;
        }
    }
    public function deleteQuiz($id)
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM Quizes WHERE id = ?");
            $stmt->execute([$id]);
        } catch (PDOException $e) {
            echo $e;
        }
    }
    public function editQuiz($quiz, $id)
    {
        try {
            $stmt = $this->connection->prepare("UPDATE Quizes 
            SET title = ?, text = ? WHERE id = ?");
            $stmt->execute([$quiz->title, $quiz->text, $id]);
        } catch (PDOException $e) {
            echo $e;
        }
    }
    public function getQuizesByUserId($userId)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM Quizes WHERE userId = ?");
            $stmt->execute([$userId]);
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\\Quizes');
            $quizes = $stmt->fetchAll();
            $this->getAllImagesBase64($quizes);

            return $quizes;
        } catch (PDOException $e) {
            echo $e;
        }
    }
    
    function createQuiz($quiz)
    {
        $stmt = $this->connection->prepare("INSERT INTO Quizes (userId, image, title, text) 
        VALUES (?,?,?,?)");
        $stmt->execute([$quiz->userId, $quiz->image, $quiz->title, $quiz->text]);
        return $this->connection->lastInsertId();
    }
    private function getImageBase64($imageData)
    {
        return 'data:image/png;base64,' . base64_encode($imageData);
    }
    
    public function getAllImagesBase64($quizes){

        foreach ($quizes as $q) {
            $q->image = $this->getImageBase64($q->image);
        }
    }

}
