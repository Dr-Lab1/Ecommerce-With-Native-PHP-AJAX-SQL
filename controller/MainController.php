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

        // var_dump($_FILES);
        $last = $this->database->lastProduct();
        $id = $last['id'] + 1;
        
        $nom = $formulaire["nom"];
        $description = $formulaire["description"];
        $path = self::setMedia($_FILES);
        // die($path);
        $couleur = $formulaire["couleur"];
        $prix = $formulaire["prix"];
        $devise = $formulaire["devise"];
        $categorie = $formulaire["categorie"];

        $this->database->createProduct($id, $nom, $description, $prix, $path, $categorie);

        header("Location: ./dashboard.php");
    }

    public function updateProduct($formulaire) {

        // var_dump($formulaire);
        // die;

        $last = $this->database->lastProduct();
        $id = $last['id'] + 1;
        
        $nom = $formulaire["nom"];
        $description = $formulaire["description"];
        $couleur = $formulaire["couleur"];
        $prix = $formulaire["prix"];
        $devise = $formulaire["devise"];
        $categorie = $formulaire["categorie"];

        $this->database->updateProduct($id, $nom, $description, $prix, $categorie);

        header("Location: ./dashboard.php");
    }

    private function setMedia($path)
    {
        if($path['image']['error'] == 0)
        {
            $pathInfo = pathinfo($_FILES['image']['name']);
            $extension = $pathInfo['extension'];

            $extensionAutorisees = array('jpeg', 'jpg', 'JPEG', 'JPG', 'png', 'PNG');

            if(in_array($extension, $extensionAutorisees))
            {
              if(file_exists('medias'))
              {
                move_uploaded_file($_FILES['image']['tmp_name'], 'medias'.DIRECTORY_SEPARATOR.basename($path['image']['name']));
                $photoPath = "medias".DS.$path['image']['name'];

                return $photoPath;
              }
              else
              {
                mkdir('medias');
                move_uploaded_file($_FILES['image']['tmp_name'], 'medias'.DIRECTORY_SEPARATOR.basename($path['image']['name']));
                $photoPath = "medias".DS.$path['image']['name'];

                return $photoPath;
              }  
            }
            else
            {
                echo '<script>alert("Les photos uniquement")</script>';
            }
        }
    }

    public function deleteProduct($id) {
        $this->database->deleteProduct($id);
    }


    public function login ($email, $password) {

        $_COOKIE['error'] = false;

        $password = sha1($password);
        if($user = $this->database->login($email, $password)) {
            // var_dump($user);
            $_COOKIE['user'] = [
                                "username" => $user['name'],
                                "email" => $user['email'],
                                "id" => $user['id']
                                ];

            $_COOKIE['error'] = false;

            header("Location: ./index.php");
        }
        else {
            $_COOKIE['error'] = true;
            $_COOKIE['email'] = $email;
        }
    }
}
