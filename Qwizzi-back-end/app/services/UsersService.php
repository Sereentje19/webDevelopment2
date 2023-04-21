<?php
namespace Services;

use Repositories\UsersRepository;

class UsersService {

    private $repository;

    function __construct()
    {
        $this->repository = new UsersRepository();
    }

    public function getAll(){
        return $this->repository->getAll();
    }

    public function insert($user){
        return $this->repository->insert($user);
    }

    public function checkUsernamePassword($username, $password){
        return $this->repository->checkUsernamePassword($username, $password);
    }
}

?>