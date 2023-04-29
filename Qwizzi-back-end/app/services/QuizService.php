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
    public function getOneQuiz($id){
        return $this->repository->getOneQuiz($id);
    }
    public function editQuiz($quiz, $id){
        $this->repository->editQuiz($quiz, $id);
    }
    public function deleteQuiz($id){
        $this->repository->deleteQuiz($id);
    }
    public function getQuizesByUserId($userId){
        return $this->repository->getQuizesByUserId($userId);
    }
    public function createQuiz($quiz){
        return $this->repository->createQuiz($quiz);
    }
  
}
