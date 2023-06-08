<?php

include_once("C:".DIRECTORY_SEPARATOR."laragon".DIRECTORY_SEPARATOR."www".DIRECTORY_SEPARATOR."sksk".DIRECTORY_SEPARATOR."config.php");
include_once(Config::Database);

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
}
