<?php

namespace Repositories;

use PDO;
use PDOException;
use Repositories\Repository;

class QuestionRepository extends Repository
{

    public function getQuestionsByQuizId($quizId)
    {
        try {
            $stmt = $this->connection->prepare("SELECT id, quizId, question, correctAnswer, answer2, answer3, answer4
            FROM Questions WHERE quizId = :quizId");
            $stmt->bindParam(':quizId', $quizId);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\\Questions');
            $questions = $stmt->fetchAll();

            return $questions;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function createQuestion($questions)
    {
        $stmtQuiz = $this->connection->prepare("SELECT max(id) FROM Quizes");
        $stmtQuiz->execute();
        $quizId = $stmtQuiz->fetchColumn();

        $stmt = $this->connection->prepare("INSERT INTO Questions
        (quizId, question, correctAnswer, answer2, answer3, answer4) 
        VALUES (?,?,?,?,?,?)");

        $stmt->execute([$quizId, $questions->question, $questions->image, $questions->correctAnswer, $questions->answer2, $questions->answer3, $questions->answer4]);
    }
    public function editQuestion($question, $id)
    {
        try {
            $stmt = $this->connection->prepare("UPDATE Questions 
            SET question = ?, correctAnswer = ?, answer2 = ?, answer3 = ?, answer4 = ? WHERE id = ?");
            $stmt->execute([$question->question, $question->correctAnswer, $question->answer2, $question->answer3, $question->answer4, $id]);
        } catch (PDOException $e) {
            echo $e;
        }
    }
    public function deleteQuestion($id)
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM Questions WHERE quizId = ?");
            $stmt->execute([$id]);
        } catch (PDOException $e) {
            echo $e;
        }
    }
}
