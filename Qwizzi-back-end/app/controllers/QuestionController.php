<?php

namespace Controllers;

use Exception;
use Services\QuestionService;


class QuestionController extends Controller{
    
    private $service;
    private $quizId = 1;

    function __construct()
    {
        $this->service = new QuestionService();
    }
    public function getAllQuestions()
    {
        $questions = $this->service->getAllQuestions();

        $this->respond($questions);
    }


    public function createQuestion(){
        $question = $this->createObjectFromPostedJson("Models\\Questions");
        $this->service->createQuestion($this->quizId, $question);

    }
    
}