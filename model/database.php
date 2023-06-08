<?php

use Database as GlobalDatabase;

class Database {

    private $bdd;

    public function __construct()
    {
        try {

            $this->bdd = new PDO("mysql:host=localhost;dbname=e-commerce", "root", "");    
        
        } catch (Error $e) {
            die($e);
        }
    }
}

?>