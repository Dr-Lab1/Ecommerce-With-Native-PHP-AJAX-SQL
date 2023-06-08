<?php

class DataClass {

    const DB_host = 'localhost';
    const DB_Name = 'db_teka';
    const user = 'root';
    const password = '';

    private $conn = null;

    public function __construct() {
        $connectionString = sprintf("mysql:host=%s;dbname=%s;charset=utf8;port=3306", DataClass::DB_host, DataClass::DB_Name, PDO::ERRMODE_EXCEPTION);
        try {
            $this->conn = new PDO($connectionString, DataClass::user, DataClass::password);
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

    public function Save_user(array $data_form) {

        $sql = "INSERT INTO tb_user (Nom,Postnom,prenom,gender) VALUES (?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $data_form['nom']);
        $stmt->bindParam(2, $data_form['postnom']);
        $stmt->bindParam(3, $data_form['prenom']);
        $stmt->bindParam(4, $data_form['gender']);
        $stmt->execute();
        $message = $stmt->errorInfo();

        return $message;
    }

    public function afficher_utilisateur() {
        $sql = "SELECT * FROM tb_user ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    /* public function saveArticle(array $param) {
      $sql = "INSERT INTO tb_article (Designation,categorie,prix,couleur) values(?,?,?,?)";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(1, $param['Article']);
      $stmt->bindParam(2, $param['category']);
      $stmt->bindParam(3, $param['price']);
      $stmt->bindParam(4, $param['couleur']);
      $stmt->execute();
      // gestion erreur
      $erreur = $stmt->errorInfo();
      return $erreur;
      }
      public function listArticle() {
      $sql = "SELECT * from tb_article";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $result;
      } */

    public function __destruct() {
        $this->conn = null;
    }

}
