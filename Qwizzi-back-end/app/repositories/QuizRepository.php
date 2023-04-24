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
            $stmt = $this->connection->prepare("SELECT id, userId, title, text FROM Quizes");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\\Quizes');
            $quizes = $stmt->fetchAll();

            // foreach ($quizes as $q) {
            //     $this->getImageBase64($q->image);
            // }

            return $quizes;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function getOneQuiz($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT id, userId, title, text FROM Quizes WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\\Quizes');
            $quizes = $stmt->fetchAll();

            return $quizes;
        } catch (PDOException $e) {
            echo $e;
        }
    }
    
    function createQuiz($quiz)
    {
        // $quiz->image = "";
        $quiz->userId = 1;
        $stmt = $this->connection->prepare("INSERT INTO Quizes (userId, image, title, text) 
        VALUES (?,?,?,?)");
        $stmt->execute([$quiz->userId, $quiz->image, $quiz->title, $quiz->text]);
        return $this->connection->lastInsertId();
    }
    private function getImageBase64($imageData)
    {
        return 'data:image/png;base64,' . base64_encode($imageData);
    }

}
