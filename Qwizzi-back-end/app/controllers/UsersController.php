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
        try{
            $data = $this->createObjectFromPostedJson("Models\\Users");
            $user = $this->service->checkUsernamePassword($data->username, $data->password);
    
            $this->respond($user);
        }
        catch(Exception $e){
            $this->respondWithError(500, $e->getMessage());
        }
    }

    public function createUser(){
        try {
            $user = $this->createObjectFromPostedJson("Models\\Users");
            $this->service->createUser($user);

            $this->respond($user);
        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }
    }
    
}