<?php

namespace Controllers;

use Exception;
use Services\UsersService;
use Firebase\JWT\JWT;

class UsersController extends Controller
{

    private $service;

    function __construct()
    {
        $this->service = new UsersService();
    }

    public function login()
    {
        try {
            $data = $this->createObjectFromPostedJson("Models\\Users");
            $user = $this->service->checkUsernamePassword($data->username, $data->password);

            // generate jwt for the user
            $tokenResponse = $this->generateJwt($user);

            //respond with the created token and the user
            $this->respond($tokenResponse);
        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }
    }

    public function createUser()
    {
        try {
            $user = $this->createObjectFromPostedJson("Models\\Users");
            $this->service->createUser($user);

            $this->respond($user);
        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }
    }

    public function generateJwt($user)
    {
        $secret_key = 'SECRET_KEY';

        $issuer = "THE_ISSUER"; // this can be the domain/servername that issues the token
        $audience = "THE_AUDIENCE"; // this can be the domain/servername that checks the token

        $issuedAt = time(); // issued at
        $notbefore = $issuedAt; //not valid before 

        $expire = $issuedAt + 9000;
        $token_payload = array(
            "iss" => $issuer,
            "aud" => $audience,
            "iat" => $issuedAt,
            "nbf" => $notbefore,
            "exp" => $expire,
            "data" => array(
                "id" => $user->id,
                "username" => $user->username,
                "email" => $user->email
            )
        );

        // Encode the JWT token
        $jwt = JWT::encode($token_payload, $secret_key, 'HS256');

        return
            array(
                "message" => "Successful login.",
                "jwt" => $jwt,
                "username" => $user->username,
                "expireAt" => $expire
            );
    }
}
