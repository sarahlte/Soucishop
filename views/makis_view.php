<?php 
require './controllers/products_controller.php';
?>
<script src="./script/delete.js"></script>

<div>
    <div class="container hp-card-contain">
        <?php foreach ($products as $product) : ?>
            <div class="hp-card">
                <div class="hp-img"><img src="./assets/<?= $product['img1']?>" class="hp-button-img" alt="produit"></div>
                <div class="hp-txt-card">
                    <div class="card-title"><?= $product['nom'] ?></div>
                    <div class="card-txt"><?= $product['description'] ?></div>
                    <div class="card-price">
                        <div href="?page=sushis" class="card-link-price"><?= $product['prix_vente'] ?> €</div>
                        <form method='post'>
                            <input type="hidden" name="token" value="<?=$_SESSION['token']?>">
                            <input type="hidden" name="type" value="produit"/>
                            <button onclick="add(event, <?= $product['id'] ?>)" type ="submit" name='add' value="<?= $product['id']?>" class="card-link-price-a button">ajouter au panier -></button>
                        </form>
                        <?php if ( isset($_SESSION['role']) && $_SESSION['role']=='admin'){?>
                            <form action="?page=modify" method="post">
                                <input type="hidden" name="token" value="<?=$_SESSION['token']?>"/>
                                <input type="hidden" name="type" value="produit"/>
                                <button class="card-link-price-a button" type="submit" name="id" value="<?= $product['id']?>">Modifier</button>
                            </form>
                            <form  method="post">
                                <input type="hidden" name="token" value="<?= $_SESSION['token']?>" />
                                <input type="hidden" name="type" value="produit"/>
                                <button onclick="toDelete()" class="card-link-price-a button" type="submit" name="delete" value="<?= $product['id']?>">X</button>
                            </form>
                        <?php }?>
                    </div>
                    <hr>
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
                            <?php $cal += (($ap['nb']*$aliment['calories'])/$aliment['poids']); }};?> 
                            <div class="calories"><?= $cal ?> calories </div> 
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="container">
        <?php if ( isset($_SESSION['role']) && $_SESSION['role']=='admin'){ 
            $_SESSION['type']='produit'?>
            <a href="?page=addProduit" class="button-up">Ajouter un produit -></a>
        <?php }?>
    </div>
   <!-- <script src="./script/basket.js"></script> -->
</div>