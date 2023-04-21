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
    public function getAll()
    {
        $products = $this->service->getAll();
        $this->respond($products);
    }

    public function create(){
        try {
            $user = $this->createObjectFromPostedJson("Models\\Users");
            $user = $this->service->insert($user);

        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }

        $this->respond($user);
    }
    
}