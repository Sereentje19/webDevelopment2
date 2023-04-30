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
    public function editQuiz($id)
    {
        $quiz = $this->createObjectFromPostedJson("Models\\Quizes");
        $this->service->editQuiz($quiz, $id);
        $this->respond(true);
    }
    public function deleteQuiz($id)
    {
        $this->service->deleteQuiz($id);
        $this->respond(true);
    }
    public function getQuizesByUserId($userId)
    {
        $quizes = $this->service->getQuizesByUserId($userId);
        $this->respond($quizes);
    }
    public function createQuiz()
    {
        try {
            $quiz = $this->createObjectFromPostedJson("Models\\Quizes");

            $quiz->image = file_get_contents($_FILES['file']['tmp_name']);
            $quiz->text = $_POST['text'];
            $quiz->title = $_POST['title'];
            $this->service->createQuiz($quiz);
            $this->respond($quiz);
        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }
    }
}
