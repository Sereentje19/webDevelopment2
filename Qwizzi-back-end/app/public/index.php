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
$router->get('/users', 'UsersController@login');
$router->post('/users', 'UsersController@create');

// routes for the Quizes endpoint
$router->get('/quizes', 'QuizController@getAll');
$router->post('/quizes', 'QuizController@create');

// $router->put('/products/(\d+)', 'ProductController@update');
// $router->delete('/products/(\d+)', 'ProductController@delete');

// Run it!
$router->run();