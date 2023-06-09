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

    public function createProduct($formulaire) {
        $last = $this->database->lastProduct();
        $id = $last['id'] + 1;
        
        $nom = $formulaire["nom"];
        $description = $formulaire["description"];
        // $img = $formulaire["img"];
        $img = "https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/4.webp";
        $couleur = $formulaire["couleur"];
        $prix = $formulaire["prix"];
        $devise = $formulaire["devise"];
        $categorie = $formulaire["categorie"];

        $this->database->createProduct($id, $nom, $description, $prix, $img, $categorie);

        header("Location: ../index.php");
    }
}
