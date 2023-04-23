<?php

namespace Controllers;

use Exception;
use Services\QuizService;


class QuizController extends Controller{
    
    private $service;
    private $quizId = 1;

    function __construct()
    {
        $this->service = new QuizService();
    }
    public function getAllQuizes()
    {
        $quizes = $this->service->getAllQuizes();

        // foreach ($quizes as $q) {
        //     "data:image/png;charset=utf;base64," . base64_encode($q->image);
        // }

        $this->respond($quizes);
    }
    public function getAllQuestions()
    {
        $questions = $this->service->getAllQuestions();

        $this->respond($questions);
    }
    public function getOne($id){
        $quizes = $this->service->getOne($id);

        $this->respond($quizes);
    }

    public function createQuiz(){
        try {
            $quiz = $this->createObjectFromPostedJson("Models\\Quizes");
            $this->quizId = $this->service->insertQuiz($quiz);

        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }

        $this->respond($quiz);
    }

    public function createQuestions(){
        $question = $this->createObjectFromPostedJson("Models\\Questions");
        $this->service->insertQuestions($this->quizId, $question);

    }
    
}