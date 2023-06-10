<?php

class MainController
{

    /* Attribue privée de la bdd */
    private $database;

    /* Le constructeur qui instancie la classe de la bdd */
    public function __construct()
    {
        try {
            //Objet de la classe bdd
            $this->database = new Database();
        } catch (Exception $e) {
            die($e);
        }
    }

    /* Fx retourner tous les produits */
    public function allProducts()
    {
        //
        return $this->database->allProducts();
    }

    /* Fx retourner un seul produit selon son $id */
    public function product($id)
    {
        //
        return $this->database->product($id);
    }

    /* Fx pour insérer un produit */
    public function createProduct($formulaire)
    {

        // var_dump($formulaire); die;
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

        $this->database->createProduct($id, $nom, $description, $prix, $path, $categorie, $couleur, $devise);

        header("Location: ./dashboard.php");
    }

    /* Fx pour modifier un produit */
    public function updateProduct($formulaire)
    {
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

    /* Fx privée pour la gestion de l'image */
    private function setMedia($path)
    {
        if ($path['image']['error'] == 0) {
            $pathInfo = pathinfo($_FILES['image']['name']);
            $extension = $pathInfo['extension'];

            $extensionAutorisees = array('jpeg', 'jpg', 'JPEG', 'JPG', 'png', 'PNG');

            if (in_array($extension, $extensionAutorisees)) {
                if (file_exists('medias')) {
                    move_uploaded_file($_FILES['image']['tmp_name'], 'medias' . DIRECTORY_SEPARATOR . basename($path['image']['name']));
                    $photoPath = "medias" . DS . $path['image']['name'];

                    return $photoPath;
                } else {
                    mkdir('medias');
                    move_uploaded_file($_FILES['image']['tmp_name'], 'medias' . DIRECTORY_SEPARATOR . basename($path['image']['name']));
                    $photoPath = "medias" . DS . $path['image']['name'];

                    return $photoPath;
                }
            } else {
                echo '<script>alert("Les photos uniquement")</script>';
            }
        }
    }

    /* Fx pour supprimer un produit */
    public function deleteProduct($id)
    {
        $this->database->deleteProduct($id);
    }


    /* Fx pour se connecter au système */
    public function login($email, $password)
    {

        $_SESSION['error'] = false;

        $password = sha1($password);
        if ($user = $this->database->login($email, $password)) {
            // var_dump($user);
            $_SESSION['user'] = [
                "username" => $user['name'],
                "email" => $user['email'],
                "id" => $user['id']
            ];

            $_SESSION['error'] = false;

            header("Location: ./index.php");
        } else {
            $_SESSION['error'] = true;
            $_SESSION['email'] = $email;
        }
    }

    /* Fx pour se deconnecter */
    public function logout()
    {
        session_destroy();
        header("Location: ./index.php");
    }

    /* Fx pour retourner toutes les catégories */
    public function categories()
    {
        return $this->database->categories();
    }

    /* FX pour retourner les produits en fx de leur catégorie*/
    public function byCategory($id)
    {
        //
        return $this->database->byCategory($id);
    }

    /* Fx pour retourner une catégorie spécifique */
    public function category($id)
    {
        //
        return $this->database->category($id);
    }
}
