<?php
namespace Services;

use Repositories\QuestionRepository;

class QuestionService {

    private $repository;

    function __construct()
    {
        $this->repository = new QuestionRepository();
    }
    public function getById($quizId){
        return $this->repository->getQuestionsByQuizId($quizId);
    }

    public function createQuestion($quizId, $questions){
        $this->repository->createQuestion($quizId, $questions);
    }
  
}
