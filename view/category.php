<?php

include_once dirname(__DIR__,1).DIRECTORY_SEPARATOR."includes.php";

/* View */
include_once(Header);
// var_dump($_GET); die;
$main = new MainController();
if(isset($_GET['category_id'])) {
    $products = $main->byCategory($_GET['category_id']);
    $category = $main->category($_GET['category_id']);
}

?>

<!-- start products -->
<h1>
    <?= $category['name'] ?>
</h1>

<h4>
    <?php
        echo count($products);
    ?>
    articles trouvés
</h4>

<hr>

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
                        <a href="./product.php?id_product=<?= $item['id'] ?>" class="ui primary button">
                            Voir le produit
                        </a>
                        <?php if (isset($_SESSION['user'])) { ?>
                            <div class="ui button">
                                <i class="red heart icon"></i>
                            </div>
                        <?php  
                            }
                        ?>
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