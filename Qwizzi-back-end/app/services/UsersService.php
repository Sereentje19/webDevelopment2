<?php
namespace Services;

use Repositories\UsersRepository;

class UsersService {

    private $repository;

    function __construct()
    {
        $this->repository = new UsersRepository();
    }
    public function createUser($user){
        return $this->repository->createUser($user);
    }

    public function checkUsernamePassword($username, $password){
        return $this->repository->checkUsernamePassword($username, $password);
    }
}

?>