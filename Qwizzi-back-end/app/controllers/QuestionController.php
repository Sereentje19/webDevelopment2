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
        $this->service->createQuestion($question);
        $this->respond($question);

    }
    public function editQuestion($id)
    {
        $question = $this->createObjectFromPostedJson("Models\\Questions");
        $this->service->editQuestion($question, $id);
        $this->respond(true);
    }
    public function deleteQuestionOnQuizId($id)
    {
        $this->service->deleteQuestionOnQuizId($id);
        $this->respond(true);
    }

    public function deleteQuestionOnId($id)
    {
        $this->service->deleteQuestionOnId($id);
        $this->respond(true);
    }
    
}