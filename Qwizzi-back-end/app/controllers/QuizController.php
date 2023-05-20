<?php

namespace Controllers;

use Exception;
use Services\QuizService;


class QuizController extends Controller
{

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
    public function getOneQuiz($id)
    {
        $quizes = $this->service->getOneQuiz($id);
        $this->respond($quizes);
    }

    public function deleteQuiz($id)
    {
        $this->service->deleteQuiz($id);
        $this->respond(true);
    }
    public function getQuizesByUserId()
    {
        $data = $this->checkForJwt();
        $quizes = $this->service->getQuizesByUserId($data->id);
        $this->respond($quizes);
    }
    public function createQuiz()
    {
        try {
            $quiz = $this->createObjectFromPostedJson("Models\\Quizes");
            $data = $this->checkForJwt();
            $quiz->userId = $data->id;
            $quiz = $this->getQuizInfo($quiz);
            $this->service->createQuiz($quiz);
            $this->respond($quiz);
        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }
    }
    public function editQuiz($id)
    {
        try {
            $quiz = $this->createObjectFromPostedJson("Models\\Quizes");
            $quiz = $this->getQuizInfo($quiz);
            $this->service->editQuiz($quiz, $id);
            $this->respond(true);
        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }
    }
    private function getQuizInfo($quiz)
    {
        try {
            if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
                $quiz->image = file_get_contents($_FILES['file']['tmp_name']);
            } 
            else{
                $quiz->image = "";
            }
            
            $quiz->text = htmlspecialchars($_POST['text']);
            $quiz->title = htmlspecialchars($_POST['title']);
            return $quiz;
        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }
    }
}
