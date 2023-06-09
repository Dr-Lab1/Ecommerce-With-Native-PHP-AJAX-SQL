<?php

include_once "../includes.php";

/* View */
include_once(Header);

$main = new MainController();
$products = $main->allProducts();
if (empty($_POST)) {
?>
    <div class="ui segment container">

        <body>
            <div class="ui container">

                <div class="ui four column stackable grid">
                    <div class="column">
                        <h2>Voir les produits</h2>
                    </div>


                    <div class="column">
                        <a href="<?= Add ?>" class="ui primary button">
                            Ajouter un produit
                        </a>
                    </div>
                </div>


                <div class="ui six column stackable grid">

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
                                        <a href="/view/product.php?id_product=<?= $item['id'] ?>" class="ui red button">
                                            Supprimer
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } ?>

                </div>

            </div>

        </body>

    </div>

<?php
} else {
    $main->createProduct($_POST);
}
include_once(Footer);
?>