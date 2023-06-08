<?php 
class Database {

    private $database;

    public function __construct ($dns, $user, $pwd) {
        $this->database = new PDO($dns, $user, $pwd);
    }

    public function addUser ($nom, $postnom, $prenom, $sexe, $telephone, $email, $password) {
        $add = $this->database->prepare("INSERT INTO uers VALUES(:nom, :postnom, :prenom, :sexe, :telephone, :email, :password)");

        $add->execute(array([
            "nom" => $nom,
            "postnom" => $postnom, 
            "prenom" => $prenom, 
            "sexe" => $sexe, 
            "telephone" => $telephone, 
            "email" => $email, 
            "password" => $password
        ]));
    }
}