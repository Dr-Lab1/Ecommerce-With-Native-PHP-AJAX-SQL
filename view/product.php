<?php

include_once dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . "includes.php";

/* View */
include_once(Header);

$id_product = $_GET['id_product'];

$main = new MainController();
$products = $main->product($id_product);

?>

<!-- start products -->
<h1>
    Produit selectionné
</h1>

<h4>
    <?php
    echo count($products);
    ?>
    article trouvé
</h4>

<hr>

<div class="ui centered two column stackable grid">

    <?php foreach ($products as $item) { ?>

        <div class="row">
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
                            Ajouter au panier
                        </a>
                        <div class="ui button">
                            <i class="heart icon"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php } ?>

</div>
<!-- end products -->

<?php
include_once("./footer.php");
?>