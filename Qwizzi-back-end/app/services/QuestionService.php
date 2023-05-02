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

    public function createQuestion($questions){
        $this->repository->createQuestion($questions);
    }
    public function editQuestion($question, $id){
        return $this->repository->editQuestion($question, $id);
    }
    public function deleteQuestion($id){
        return $this->repository->deleteQuestion($id);
    }
  
}
