<?php

/* Controller */
include_once("C:".DIRECTORY_SEPARATOR."laragon".DIRECTORY_SEPARATOR."www".DIRECTORY_SEPARATOR."sksk".DIRECTORY_SEPARATOR."controller".DIRECTORY_SEPARATOR."MainController.php");

/* View */
include_once(Config::Header);

$main = new MainController();
$products = $main->allProducts();

?>

<!-- start - Best product -->
<div class="ui two column blue message grid">
    <div class="column">
        <h1>Des meilleurs produits avec <br> les meilleures offres</h1>
        <p>Peu importe ce que vous désirez dans la technologie, les arts, etc. Vous aurez toujours la solution (il y en a toujours une...)</p>
    </div>

    <div class="column right floated">
        <a href="./view/products.php" class="ui primary button right floated">Découvrir</a href="./view/products.php">
    </div>
</div>
<!-- end - Best product -->

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

<!-- start - Discover -->
<div class="ui two column blue message grid">
    <div class="column">
        <h2>Les meilleurs produits et marques en magasin !</h2>
        <p>Produits tendance et surprise à ajouter au panier</p>
    </div>

    <div class="column right floated">
        <a href="./view/products.php" class="ui primary button right floated">Découvrir</a>
    </div>
</div>
<!-- end - Discover -->

<!-- start - Pourquoi nous ? -->
<div class="ui grey message">
    <h1>Pourquoi nous ?</h1>

    <div class="ui two column cards">
        <div class="card">
            <div class="content">
                <div class="header">
                    <i class="money bill alternate outline icon"></i>
                    Prix raisonnables
                </div>
                <div class="meta">Au prix du grand marché</div>
                <div class="description">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto veniam aut repudiandae, cumque impedit aliquam architecto vel repellat quas atque quis! Non quibusdam eveniet consequuntur cupiditate sapiente, earum molestias dolorum.
                </div>
            </div>
        </div>
        <div class="card">
            <div class="content">
                <div class="header">
                    <i class="star icon"></i>
                    Meilleure qualité
                </div>
                <div class="meta">La qualité fait la différence</div>
                <div class="description">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quaerat architecto atque culpa sint magnam dolores alias quisquam rem, esse et molestias, recusandae officia debitis eligendi, incidunt repudiandae natus obcaecati ullam!
                </div>
            </div>
        </div>
        <div class="card">
            <div class="content">
                <div class="header">
                    <i class="thumbs up icon"></i>
                    Clients satisfaits
                </div>
                <div class="meta">
                    Le site est noté avec une moyenne de 4/5
                    <i class="star icon"></i>
                </div>
                <div class="description">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam eveniet aspernatur deserunt explicabo animi, quasi veniam! Odit sunt a beatae officiis vero error aperiam, distinctio repudiandae velit atque corrupti iusto?
                </div>
            </div>
        </div>
        <div class="card">
            <div class="content">
                <div class="header">
                    <i class="plane icon"></i>
                    Livraison internationnale
                </div>
                <div class="meta">Recevez votre colis où que vous soyez</div>
                <div class="description">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto voluptatum animi repudiandae amet ab accusamus quibusdam et? Ut, deserunt ratione omnis, pariatur illo quia sapiente alias ullam, ad similique officia?
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end - Pourquoi nous ? -->

<!-- start - Blog -->
<div class="ui segment">
    <h1>Blog</h1>
    <div class="ui four column link cards" style="margin-bottom: 10px; margin-top: 15px">


        <div class="card">
            <div class="image">
                <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/posts/2.webp">
            </div>
            <div class="content">
                <div class="meta">
                    <a>23.06.2023</a>
                </div>
                <div class="header">Comment promouvoir les marques ?</div>
                <div class="description">
                    Lorsque vous entrez dans un nouveau domaine scientifique, vous atteignez presque
                </div>
            </div>
            <div class="extra content">
                <span class="right floated">
                    21 commentaires
                </span>
                <span>
                    <i class="eye icon"></i>
                    75 Vues
                </span>
            </div>
        </div>

        <div class="card">
            <div class="image">
                <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/posts/2.webp">
            </div>
            <div class="content">
                <div class="meta">
                    <a>23.06.2023</a>
                </div>
                <div class="header">Comment promouvoir les marques ?</div>
                <div class="description">
                    Lorsque vous entrez dans un nouveau domaine scientifique, vous atteignez presque
                </div>
            </div>
            <div class="extra content">
                <span class="right floated">
                    21 commentaires
                </span>
                <span>
                    <i class="eye icon"></i>
                    75 Vues
                </span>
            </div>
        </div>

        <div class="card">
            <div class="image">
                <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/posts/2.webp">
            </div>
            <div class="content">
                <div class="meta">
                    <a>23.06.2023</a>
                </div>
                <div class="header">Comment promouvoir les marques ?</div>
                <div class="description">
                    Lorsque vous entrez dans un nouveau domaine scientifique, vous atteignez presque
                </div>
            </div>
            <div class="extra content">
                <span class="right floated">
                    21 commentaires
                </span>
                <span>
                    <i class="eye icon"></i>
                    75 Vues
                </span>
            </div>
        </div>

        <div class="card">
            <div class="image">
                <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/posts/2.webp">
            </div>
            <div class="content">
                <div class="meta">
                    <a>23.06.2023</a>
                </div>
                <div class="header">Comment promouvoir les marques ?</div>
                <div class="description">
                    Lorsque vous entrez dans un nouveau domaine scientifique, vous atteignez presque
                </div>
            </div>
            <div class="extra content">
                <span class="right floated">
                    21 commentaires
                </span>
                <span>
                    <i class="eye icon"></i>
                    75 Vues
                </span>
            </div>
        </div>
    </div>
</div>
<!-- end Blog -->

<?php
include_once(Config::Footer);
?>