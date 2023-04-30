<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");

error_reporting(E_ALL);
ini_set("display_errors", 1);

require __DIR__ . '/../vendor/autoload.php';

// Create Router instance
$router = new \Bramus\Router\Router();

$router->setNamespace('Controllers');

// routes for the Users endpoint
$router->post('/users/login', 'UsersController@login');
$router->post('/users/signUp', 'UsersController@createUser');

// routes for the Quizes endpoint
$router->get('/quizes', 'QuizController@getAllQuizes');
$router->get('/quizes/(\d+)', 'QuizController@getOneQuiz');
$router->get('/myQuizes/(\d+)', 'QuizController@getQuizesByUserId');
$router->post('/quizes', 'QuizController@createQuiz');
$router->delete('/quizes/(\d+)', 'QuizController@deleteQuiz');
$router->put('/quizes/(\d+)', 'QuizController@editQuiz');

// routes for the Questions endpoint
$router->get('/questions/(\d+)', 'QuestionController@getById');
$router->post('/questions', 'QuestionController@createQuestion');
$router->put('/questions/(\d+)', 'QuestionController@editQuestion');


// Run it!
$router->run();