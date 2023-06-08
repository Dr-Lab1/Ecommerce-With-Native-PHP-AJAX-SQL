<?php

$chaine_de_conn = "mysql:host=localhost;dbname=habit";
$user = "root";
$pwd = "";

$nom = $_POST['nom'] ? $_POST['nom'] : null;
$postnom = $_POST['postnom'] ? $_POST['postnom'] : null;
$prenom = $_POST['prenom'] ? $_POST['prenom'] : null;
$sexe = $_POST['sexe'] ? $_POST['sexe'] : null;
$telephone = $_POST['telephone'] ? $_POST['telephone'] : null;
$email = $_POST['email'] ? $_POST['email'] : null;
$password = $_POST['password'] ? $_POST['password'] : null;
$c_password = $_POST['c_password'] ? $_POST['c_password'] : null;

if($password===$c_password) {
    return "mot de passe non confirmé";
}



$databse = new Database($chaine_de_conn, $user, $pwd);

$databse->addUser($nom, $postnom, $prenom, $sexe, $telephone, $email, $password);

?>