<?php

namespace Repositories;

use PDO;
use PDOException;
use Repositories\Repository;

class QuizRepository extends Repository
{

    //Quizes
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
    
    function insertQuiz($quiz)
    {
        $quiz->image = "";
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



    //Questions
    public function getAllQuestions()
    {
        try {
            $stmt = $this->connection->prepare("SELECT id, quizId, question, correctAnswer, answer2, answer3, answer4 FROM Questions");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\\Questions');
            $questions = $stmt->fetchAll();

            return $questions;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function insertQuestions($id, $questions)
    {
        $questions->image = "";
        $stmt = $this->connection->prepare("INSERT INTO Questions
        (quizId, question, image, correctAnswer, answer2, answer3, answer4) 
        VALUES (?,?,?,?,?,?,?)");

        $stmt->execute([$id, $questions->question, $questions->image, $questions->correctAnswer, $questions->answer2, $questions->answer3, $questions->answer4]);
    }
}
