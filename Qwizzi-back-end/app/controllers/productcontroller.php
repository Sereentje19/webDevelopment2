<?php

namespace Controllers;

use Exception;
use Services\ProductService;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class ProductController extends Controller
{
    private $service;

    // initialize services
    function __construct()
    {
        $this->service = new ProductService();
    }

    public function getAll()
    {
        if (!isset($_SERVER["HTTP_AUTHORIZATION"])) {
            $this->respondWithError(401, "No token provided");
            return;
        }

        try {
            $header = $_SERVER["HTTP_AUTHORIZATION"];
            $array = explode(" ", $header);
            $jwt = $array[1];

            $key = 'chat.openai.com';
            $decoded = JWT::decode($jwt, new Key($key, 'HS256'));
        } catch (Exception $e) {
            $this->respondWithError(401, $e->getMessage());
            return;
        }


        $offset = NULL;
        $limit = NULL;

        if (isset($_GET["offset"]) && is_numeric($_GET["offset"])) {
            $offset = $_GET["offset"];
        }
        if (isset($_GET["limit"]) && is_numeric($_GET["limit"])) {
            $limit = $_GET["limit"];
        }

        $products = $this->service->getAll($offset, $limit);

        $this->respond($products);
    }

    public function getOne($id)
    {
        $product = $this->service->getOne($id);

        // we might need some kind of error checking that returns a 404 if the product is not found in the DB
        if (!$product) {
            $this->respondWithError(404, "Product not found");
            return;
        }

        $this->respond($product);
    }

    public function create()
    {
        try {
            $product = $this->createObjectFromPostedJson("Models\\Product");
            $product = $this->service->insert($product);
        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }

        $this->respond($product);
    }

    public function update($id)
    {
        try {
            $product = $this->createObjectFromPostedJson("Models\\Product");
            $product = $this->service->update($product, $id);
        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }

        $this->respond($product);
    }

    public function delete($id)
    {
        try {
            $this->service->delete($id);
        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }

        $this->respond(true);
    }
}
