<?php

namespace Controllers;

use Exception;
use Services\UsersService;


class UsersController extends Controller{
    
    private $service;

    function __construct()
    {
        $this->service = new UsersService();
    }

    public function login()
    {
        $data = $this->createObjectFromPostedJson("Models\\Users");
        $user = $this->service->checkUsernamePassword($data->username, $data->password);

        if(count($user) == 0)
        {
            
        }

        if (!$user) {
            $this->respondWithError(401, "Incorrect password");
        }

    }

    public function createUser(){
        try {
            $user = $this->createObjectFromPostedJson("Models\\Users");
            $this->service->createUser($user);

        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }

        $this->respond($user);
    }
    
}