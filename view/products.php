<?php

include_once dirname(__DIR__,1).DIRECTORY_SEPARATOR."includes.php";

/* View */
include_once(Header);

$main = new MainController();
$products = $main->allProducts();

?>

<!-- start products -->
<h1>
    Produits
</h1>

<div class="ui four column stackable grid">

    <?php foreach ($products as $item) { ?>

        <div class="column">
            <div class="ui card">
                <div class="image">
                    <img src="<?= $item["img_path"] ?>">
                </div>
                <div class="content">
                    <p>Prix : <span class="header" style="font-size: large; color: black; font-weight: bold;"><?= $item["prix_ht"] ?> $</span></p>
                    <div class="description">
                        <?= $item["name"] ?>
                    </div>
                    <div class="meta">
                        <span class="date">Color : Blue</span>
                    </div>
                </div>
                <div class="extra content">
                    <div class="">
                        <a href="#" class="ui primary button">
                            Voir le produit
                        </a>
                        <div class="ui button">
                            <i class="heart icon"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php } ?>

    <!-- <div class="column">
        <div class="ui card">
            <div class="image">
                <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/8.webp">
            </div>
            <div class="content">
                <p>Prix : <span class="header" style="font-size: large; color: black; font-weight: bold;">100 $</span></p>
                <div class="meta">
                    <span class="date">Color : Blue</span>
                </div>
                <div class="description">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem
                </div>
            </div>
            <div class="extra content">
                <div class="">
                    <button class="ui primary button">
                        Voir le produit
                    </button>
                    <div class="ui button">
                        <i class="heart icon"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    
</div>
<!-- end products -->

<?php
include_once("./footer.php");
?>