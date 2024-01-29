<?php 
require './controllers/products_controller.php';
?>
<script src="./script/caroussel.js"></script>

<div>
    <div class="container hp-card-contain">
        <?php foreach ($menus as $menu) : ?>
            <div class="hp-card">
                <div class="button-display">
                    <button class="btn prev"><-</button>
                    <div class="carousel-container">
                        <div class="carousel">
                            <div class="item active">
                                <img src="./assets/<?= $menu['image1']?>" class="hp-button-img" alt="menu1">
                            </div>
                            <div class="item">
                                <img src="./assets/<?= $menu['image2']?>" class="hp-button-img" alt="menu2">
                            </div>
                            <div class="item">
                                <img src="./assets/<?= $menu['image3']?>" class="hp-button-img" alt="menu3">
                            </div>
                        </div>
                    </div>
                    <button class="btn next">-></button>
                </div>
                <div class="txt-card">
                    <div class="card-title"><?= $menu['nom'] ?></div>
                    <div class="card-txt">
                        <?php 
                            $price = 0;
                            $menus_products = $bdd->prepare("SELECT * FROM menu_produit WHERE menu_id = :id");
                            $menus_products->execute([
                            ':id'=>$menu['id']
                            ]);
                            foreach ($menus_products as $mp){
                            $products = $bdd->prepare("SELECT * FROM produit WHERE id = :id");
                            $products->execute([
                            ':id'=>$mp['produit_id']]); 
                                foreach ($products as $product) { ?>
                            — <?= $mp['nb'];?> x <?= $product['nom']?></br>
                            <?php $price += (($product['prix_vente']-0.2)*$mp['nb']); }};?>
                    </div>
                    <div class="card-price">
                        <div class="card-link-price"><?= $price ?> €</div>
                        <form method='post'>
                            <input type="hidden" name="token" value="<?=$_SESSION['token']?>">
                            <input type="hidden" name="type" value="menu"/>
                            <button type='submit' name='add' value="<?= $menu['id']?>" class="card-link-price-a">ajouter au panier -></button>
                        </form>
                        <?php if ( isset($_SESSION['role']) && $_SESSION['role']=='admin'){?>
                            <form action="?page=modify" method="post">
                                <input type="hidden" name="token" value="<?= $_SESSION['token']?>" />
                                <input type="hidden" name="type" value="menu"/>
                                <button type="submit" name="id" class="card-link-price-a" value="<?= $menu['id']?>">Modifier</button>
                            </form>
                            <form  method="post">
                                <input type="hidden" name="token" value="<?= $_SESSION['token']?>" />
                                <input type="hidden" name="type" value="menu"/>
                                <button type="submit" name="delete" class="card-link-price-a" value="<?= $menu['id']?>">X</button>
                            </form>
                        <?php }?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="container">
        <?php if ( isset($_SESSION['role']) && $_SESSION['role']=='admin'){ 
            $_SESSION['type']='menu'?>
            <a href="?page=addMenu" class="button-up">Ajouter un produit -></a>
        <?php }?>
    </div>
</div>