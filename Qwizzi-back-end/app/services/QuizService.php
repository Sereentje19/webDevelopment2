<?php
namespace Services;

use Repositories\QuizRepository;

class QuizService {

    private $repository;

    function __construct()
    {
        $this->repository = new QuizRepository();
    }

    public function getAllQuizes(){
        return $this->repository->getAllQuizes();
    }
    public function getAllQuestions(){
        return $this->repository->getAllQuestions();
    }
    public function getOne($id){
        return $this->repository->getOne($id);
    }
    public function insertQuiz($quiz){
        return $this->repository->insertQuiz($quiz);
    }

    public function insertQuestions($quizId, $questions){
        return $this->repository->insertQuestions($quizId, $questions);
    }
  
}
