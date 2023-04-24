<?php

namespace Controllers;

use Exception;
use Services\QuizService;


class QuizController extends Controller{
    
    private $service;

    function __construct()
    {
        $this->service = new QuizService();
    }
    public function getAllQuizes()
    {
        $quizes = $this->service->getAllQuizes();

        $this->respond($quizes);
    }
    public function getOneQuiz($id){
        $quizes = $this->service->getOneQuiz($id);

        $this->respond($quizes);
    }
    public function createQuiz(){
        try {
            $quiz = $this->createObjectFromPostedJson("Models\\Quizes");
            $this->service->createQuiz($quiz);

        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }

        $this->respond($quiz);
    }

    
}