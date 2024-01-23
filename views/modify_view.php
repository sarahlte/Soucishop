<?php 
require "./controllers/modify_controller.php";?>

<div>
    <?php if (isset($_SESSION['role']) && $_SESSION['role']=='admin' ){
        if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['id']) && isset($_POST['token']) && $_POST['token'] === $_SESSION['token']){
            if($_POST['type']=='produit'){?>
    <img src="./assets/<?= $item['img1']?>">
    <div><?= $item['nom']?></div>
    <div>prix d'achat: <?= $item['prix achat']?> €</div>
    <div>prix de vente: <?= $item['prix vente']?> €</div>
    <?php $aliments_produits = $bdd->prepare("SELECT * FROM aliment_produit WHERE produit_id = :id");
        $aliments_produits->execute([
            'id'=>$item['id']
        ]);
        $cal = 0;
        foreach($aliments_produits as $ap){
            $aliments = $bdd->prepare("SELECT * FROM aliment WHERE id = :id");
            $aliments->execute([
            ':id'=>$ap['aliment_id']]); 
            foreach ($aliments as $aliment) { ?>
    <?= $aliment['nom'];?> — <?= $ap['nb']?> g <br>
    <?php $cal += (($ap['nb']*$aliment['calories'])/$aliment['poids']); }};?> 
    <div class="calories"><?= $cal ?> calories </div>
    <?php }else{?>
        <img src="./assets/<?= $item['image1']?>">
    <div><?= $item['nom']?></div>
    <div>prix: <?= $item['prix']?> €</div>
    <?php $menus_produits = $bdd->prepare("SELECT * FROM menu_produit WHERE menu_id = :id");
        $menus_produits->execute([
            'id'=>$item['id']
        ]);
        $cal = 0;
        foreach($menus_produits as $mp){
            $produits = $bdd->prepare("SELECT * FROM produit WHERE id = :id");
            $produits->execute([
            ':id'=>$mp['produit_id']]);
        $price=0;
            foreach ($produits as $produit) { ?>
    — <?= $mp['nb'];?> x <?= $produit['nom']?></br>
        <?php $price += (($produit['prix vente']-0.2)*$mp['nb']); }};?>
    <?php }}else{?>
        <div>Error : Invalid token</div>
    <?php }}?>
</div>