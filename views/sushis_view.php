<?php 
require './controllers/products_controller.php';
?>

<div>
    <ul><div class="container hp-card-contain">
        <?php foreach ($products as $product) : ?>
            <div class="hp-card">
                <div class="hp-img"><img src="./assets/<?= $product['img1']?>" class="hp-button-img"></div>
                <div class="hp-txt-card">
                    <div class="card-title"><?= $product['nom'] ?></div>
                    <div class="card-txt"><?= $product['description'] ?></div>
                    <div class="card-price">
                        <div class="card-link-price"><?= $product['prix vente'] ?> €</div>
                        <a href="?page=sushis" class="card-link-price">ajouter au panier -></a>
                    </div>
                    <hr>
                    <div class="card-txt">
                    <?php foreach ($aliment as $aliments) { ?>
                            — <?= $mp['nb'];?> x <?= $aliments['nom']?></br>
                            <?php $price += (($product['prix vente']-0.2)*$mp['nb']); };?></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>