<?php 
require './controllers/add_controller.php'; ?>
<script src="./script/add.js"></script>
<div class="container hp-card-contain">
    <div class="hp-card">
        <div class="hp-img"><img src="./assets/ingredient.jpg" class="hp-button-img"></div>
        <div class="hp-txt-card">
            <div class="card-title">Les ingrédients</div>
            <a href="?page=add-ingredient" class="card-link" onclick="add('ingredient')">Ajouter un ingrédient -></a>
        </div>
    </div>
    <div class="hp-card">
        <div class="hp-img"><img src="./assets/sushi.jpg" class="hp-button-img"></div>
        <div class="hp-txt-card">
            <div class="card-title">Les produits</div>
            <a href="?page=add-produit" class="card-link" onclick="add('produit')">Ajouter un produit -></a>
        </div>
    </div>
    <div class="hp-card">
        <div class="hp-img"><img src="./assets/menu.png" class="hp-button-img"></div>
        <div class="hp-txt-card">
            <div class="card-title">Les menus</div>
            <a href="?page=add-menu" class="card-link" onclick="add('menu')">Ajouter un menu -></a>
        </div>
    </div>
</div>