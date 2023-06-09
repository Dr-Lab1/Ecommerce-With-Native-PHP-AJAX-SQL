<?php 
?>

<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Other/html.html to edit this template
-->
<html>

<head>
    <title>BXB - MART</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="../view/Semantic ui/Semantic-UI/semantic.css">

    <script type="text/javascript" src="../view/Semantic ui/Libs/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="../view/Semantic ui/Semantic-UI/semantic.js"></script>
</head>

<body>
    <div class="ui container" style="padding-bottom: 20px; padding-top: 5px;">

        <!-- start navbar -->
        <div class="ui attached  menu">
            <div class="ui container">
                <a href="<?= Index ?>" class="item">
                    <i class="home icon"></i> Home
                </a>
                <a href="<?= Products ?>" class="item">
                    <i class="grid layout icon"></i> Produits
                </a>
                <a class="item">
                    <i class="mail icon"></i> Messages
                </a>
                <div class="ui simple dropdown item">
                    Voir plus
                    <i class="dropdown icon"></i>
                    <div class="menu">
                        <?php if(isset($_SESSION['user'])) { ?>
                        <a class="item"><i class="user icon"></i> <?= $_SESSION['user']['username'] ?> </a>
                        <?php } 
                            else { 
                        ?>
                        <a href="<?= Login ?>" class="item"><i class="user icon"></i> Se Connecter </a>
                        <?php } ?>

                        <a href="<?= Dashboard ?>" class="item"><i class="globe icon"></i> Dashboard </a>
                        <a class="item"><i class="settings icon"></i> Déconnexion </a>
                    </div>
                </div>
                <div class="ui search right item">
                    <div class="ui left icon input">
                        <input class="prompt" type="text" placeholder="Rechercher un produit">
                        <!-- <i class="github icon"></i> -->
                        <i class="search icon"></i>
                    </div>
                </div>
            </div>
        </div>
        <!-- end navbard -->