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
                    <div><?php 
                            $cal = 0;
                            $aliments_products = $bdd->prepare("SELECT * FROM aliment_produit WHERE produit_id = :id");
                            $aliments_products->execute([
                            ':id'=>$product['id']
                            ]);
                            foreach ($aliments_products as $ap){
                                $aliments = $bdd->prepare("SELECT * FROM aliment WHERE id = :id");
                                $aliments->execute([
                                ':id'=>$ap['aliment_id']]); 
                                foreach ($aliments as $aliment) { ?>
                                <?= $aliment['nom'];?> — <?= $ap['nb']?> g <br>
                            <?php $cal += (($ap['nb']*$aliment['calories'])/$aliment['poids']); }};?> <?= $cal ?> calories 
                    </div>
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