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
    public function getOne($id){
        return $this->repository->getOne($id);
    }
    public function insert($quiz){
        return $this->repository->insert($quiz);
    }
  
}
