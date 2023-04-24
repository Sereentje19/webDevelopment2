<?php

namespace Repositories;

use PDO;
use PDOException;
use Repositories\Repository;

class QuestionRepository extends Repository
{

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

    public function createQuestion($id, $questions)
    {
        $stmtQuiz = $this->connection->prepare("SELECT max(id) FROM Quizes");
        $stmtQuiz->execute();
        $quizId = $stmtQuiz->fetchColumn();

        $questions->image = "";
        $stmt = $this->connection->prepare("INSERT INTO Questions
        (quizId, question, image, correctAnswer, answer2, answer3, answer4) 
        VALUES (?,?,?,?,?,?,?)");

        $stmt->execute([$quizId, $questions->question, $questions->image, $questions->correctAnswer, $questions->answer2, $questions->answer3, $questions->answer4]);
    }
}
