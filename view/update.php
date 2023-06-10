<?php

include_once "../includes.php";

/* View */
include_once(Header);

$main = new MainController();
$product = $main->product($_GET['id']);
if(empty($_POST)) {
?>
<div class="ui segment container">
    <body>
        <div class="ui container">

            <h2>MODIFIER UN PRODUIT</h2>

            <form action="" method="post" enctype="multipart/form-data">

                <p class="ui green message"> <span style="color: black;">*</span>Remplissez tous les champs !</p>

                <?php foreach($product as $item) {?>
                <div class="ui segment">
                    <div class="ui three column very relaxed grid">
                            <div class="ui column image">
                                <img src="<?= $item["img_path"] ?>">
                            </div>
                        <div class="column">
                            <div class="ui form">
                                <div class="field">
                                    <label for="">Nom du produit</label>
                                    <div class="ui input">
                                        <input type="text" placeholder="Nom du produit" required name="nom" value="<?= $item['name']?>">
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="">Description</label>
                                    <div class="ui input">
                                        <textarea name="description" id="" rows="1" required placeholder="Description"><?= $item['description']?></textarea>
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="">L'image du produit</label>
                                    <div class="ui input">
                                        <input type="file" name="image" id="" require >
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="">Couleur</label>
                                    <div class="ui left icon input">
                                        <select id="" required name="couleur">
                                            <option value="Blanc">Blanc</option>
                                            <option value="Bleu">Bleu</option>
                                            <option value="Rouge">Rouge</option>
                                            <option value="Jaune">Jaune</option>
                                            <option value="Vert">Vert</option>
                                        </select>

                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
                        <div class="column">
                            <div class="ui form">
                                <div class="field">
                                    <label for="">Prix du produit</label>
                                    <div class="ui input" required>
                                        <input type="number" placeholder="Prix du produit" name="prix" required value="<?= $item['prix_ht']?>">
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="">Dévise</label>
                                    <div class="ui input">
                                        <select id="" required name="devise">
                                            <option value="FC">Franc congolais</option>
                                            <option value="Dollars">Dollars</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="field">
                                    <label for="">Catégorie</label>
                                    <div class="ui input">
                                        <select id="" required name="categorie">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="field" style="margin-top: 25px;">
                                    <div class="ui red button"> Annuler </div>
                                    <button type="submit" class="ui blue submit button">S'enregistrer</button>
                                </div>
                                
                            </div>
                        </div>


                    </div>
                </div>
                <?php } ?>
            </form>

        </div>

    </body>

</div>

<?php
}
else {
    $main->updateProduct($_POST);
}
include_once(Footer);
?>