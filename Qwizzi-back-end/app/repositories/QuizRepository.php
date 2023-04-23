<?php

namespace Repositories;

use PDO;
use PDOException;
use Repositories\Repository;

// require_once __DIR__ . '/../models/Quizes.php';

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

    public function getOne($id)
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

    function insert($quiz)
    {
        $quiz->image = "";
        $quiz->userId = 1;
        $stmt = $this->connection->prepare("INSERT INTO Quizes (userId, image,  title, text) 
        VALUES (?,?,?,?)");
        $stmt->execute([$quiz->userId, $quiz->image, $quiz->title, $quiz->text]);

        $quiz->id = $this->connection->lastInsertId();
        // $stmt = $this->connection->prepare("INSERT INTO Questions (quizId, question, correctAnswer, answer2, answer3, answer4) 
        // VALUES (?,?,?)");
        // $stmt->execute([$questions->quizId, $questions->question, $questions->correctAnswer, $questions->answer2, $questions->answer3, $questions->answer4]);
        return $quiz;
    }
    private function getImageBase64($imageData)
    {
        return 'data:image/png;base64,' . base64_encode($imageData);
    }
}
