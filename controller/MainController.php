<?php

class MainController
{

    private $database;
    public function __construct()
    {
        try {
            $this->database = new Database();
        } catch (Exception $e) {
            die($e);
        }
    }
    
    public function allProducts()
    {
        //
        return $this->database->allProducts();
    }

    public function product($id)
    {
        //
        return $this->database->product($id);
    }
}
