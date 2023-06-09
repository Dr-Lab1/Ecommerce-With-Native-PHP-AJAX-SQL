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

    public function product($id) {
        try {

            $products_array = $this->bdd->prepare("SELECT * FROM products WHERE id=:id");
            $products_array->execute(array(
                "id" => $id
            ));

            $product = $products_array->fetchAll(PDO::FETCH_ASSOC);
        
        } catch (Error $e) {
            die($e);
        }

        return $product;
    }

    public function createProduct($id, $name, $description, $prix_ht, $img_path, $category_id) {
        try {

            $products_array = $this->bdd->prepare("INSERT INTO products VALUES (:id, :name, :description, :prix_ht, :img_path, :category_id)");
            $products_array->execute(array(
                "id" => $id,
                "name" => $name,
                "description" => $description,
                "prix_ht" => $prix_ht,
                "img_path" => $img_path,
                "category_id" => $category_id
            ));

        } catch (Error $e) {
            die($e);
        }

    }

    public function updateProduct($id, $name, $description, $prix_ht, $category_id) {
        try {

            $products_array = $this->bdd->prepare("UPDATE products SET name=:name, description=:description, prix_ht=:prix_ht, category_id=:category_id WHERE id=:id");
            $result = $products_array->execute(array(
                "id" => $id,
                "name" => $name,
                "description" => $description,
                "prix_ht" => $prix_ht,
                "category_id" => $category_id
            ));

        } catch (Error $e) {
            die($e);
        }
    }

    public function lastProduct() {
        try {

            $product_array = $this->bdd->prepare("SELECT * FROM products ORDER BY id DESC LIMIT 1");
            $product_array->execute();

            $product = $product_array->fetch(PDO::FETCH_ASSOC);

        } catch (Error $e) {
            die($e);
        }

        return $product;
    }

    public function deleteProduct($id) {
        try {
            $product = $this->bdd->prepare("DELETE FROM products WHERE id=:id");
            $product->execute(array(
                "id" => $id
            ));
        } catch(Exception $e) {
            die($e);
        }
    }

    public function login($email, $password) {
        try {
            $user = $this->bdd->prepare("SELECT * FROM users WHERE email=:email AND password=:password");
            $user->execute(array(
                "email" => $email,
                "password" => $password
            ));

            $user = $user->fetch(PDO::FETCH_ASSOC);
        } catch(Exception $e) {
            die($e);
        }

        return $user;
    }

    public function categories() {
        try {
            $categories = $this->bdd->prepare("SELECT * FROM categories");
            $categories->execute();

            $categories = $categories->fetchAll(PDO::FETCH_ASSOC);
        } catch(Exception $e) {
            die($e);
        }

        return $categories;
    }

    public function byCategory($id) {
        try {
            $products = $this->bdd->prepare("SELECT * FROM products WHERE category_id=:id");
            $products->execute([
                "id" => $id
            ]);

            $products = $products->fetchAll(PDO::FETCH_ASSOC);
        } catch(Exception $e) {
            die($e);
        }

        return $products;
    }

    public function category($id) {
        try {
            $category = $this->bdd->prepare("SELECT * FROM categories WHERE id=:id");
            $category->execute([
                "id" => $id
            ]);

            $category = $category->fetch(PDO::FETCH_ASSOC);
        } catch(Exception $e) {
            die($e);
        }

        return $category;
    }

}

?>