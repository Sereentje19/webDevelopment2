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
        $this->repository->createQuestion(1, $questions);
    }
  
}
