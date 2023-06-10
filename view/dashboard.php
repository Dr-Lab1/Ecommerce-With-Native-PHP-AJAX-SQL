<?php

include_once "../includes.php";

/* View */
include_once(Header);

$main = new MainController();

if (isset($_POST['delete'])) {
    $main->deleteProduct($_POST['delete']);
}

$products = $main->allProducts();

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


            <div class="ui five column stackable grid">

                <?php foreach ($products as $item) { ?>

                    <form action="" method="POST" class="column">
                        <div class="ui card" style="height: 100%;">
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
                                    <input type="text" value="<?= $item['id'] ?>" hidden name="delete">
                                    <button type="submit" class="ui red button">
                                        <i class="trash icon"></i>
                                    </button>
                                    <a href="<?= Update ?>?id=<?= $item['id'] ?>" class="ui primary button">
                                        Modifier
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>

                <?php } ?>

            </div>

        </div>

    </body>

</div>

<?php

include_once(Footer);
?>