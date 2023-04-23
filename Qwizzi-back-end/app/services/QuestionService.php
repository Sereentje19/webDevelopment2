<?php
namespace Services;

use Repositories\QuestionRepository;

class QuestionService {

    private $repository;

    function __construct()
    {
        $this->repository = new QuestionRepository();
    }
    public function getAllQuestions(){
        return $this->repository->getAllQuestions();
    }

    public function createQuestion($quizId, $questions){
        return $this->repository->createQuestion($quizId, $questions);
    }
  
}
