<?php 
require './controllers/add_controller.php'; ?>
<div class="container hp-card-contain">
    <div class="hp-card">
        <div class="hp-img"><img src="./assets/sushi.jpg" class="hp-button-img"></div>
        <div class="hp-txt-card">
            <div class="card-title">Les produits</div>
            <?php if ( isset($_SESSION['role']) && $_SESSION['role']=='admin'){ 
            $_SESSION['type']='produit';}?>
            <a href="?page=addProduit" class="card-link">Ajouter un produit -></a>
        </div>
    </div>
    <div class="hp-card">
        <div class="hp-img"><img src="./assets/menu.png" class="hp-button-img"></div>
        <div class="hp-txt-card">
            <div class="card-title">Les menus</div>
            <?php if ( isset($_SESSION['role']) && $_SESSION['role']=='admin'){ 
            $_SESSION['type']='menu';}?>
            <a href="?page=addmenu" class="card-link">Ajouter un menu -></a>
        </div>
    </div>
</div>