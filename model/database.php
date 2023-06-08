<?php

class Database {

    private $bdd;

    public function __construct()
    {
        try {

            $this->bdd = new PDO("mysql:host=localhost;dbname=bxbsmart", "root", "");    
        
        } catch (Error $e) {
            die($e);
        }
    }

    public function allProducts() {
        try {

            $products_array = $this->bdd->prepare("SELECT * FROM products");
            $products_array->execute();

            $products = $products_array->fetchAll(PDO::FETCH_ASSOC);
        
        } catch (Error $e) {
            die($e);
        }

        return $products;
    }
}

?>