<?php

namespace Controllers;

use Exception;
use Services\QuestionService;


class QuestionController extends Controller{
    
    private $service;

    function __construct()
    {
        $this->service = new QuestionService();
    }
    public function getById($quizId)
    {
        $questions = $this->service->getById($quizId);

        $this->respond($questions);
    }
    public function createQuestion(){
        $question = $this->createObjectFromPostedJson("Models\\Questions");
        $this->service->createQuestion(1, $question);

    }
    public function editQuestion($id)
    {
        $question = $this->createObjectFromPostedJson("Models\\Questions");
        $this->service->editQuestion($question, $id);
        $this->respond(true);
    }
    public function deleteQuestion($id)
    {
        $this->service->deleteQuestion($id);
        $this->respond(true);
    }
    
}