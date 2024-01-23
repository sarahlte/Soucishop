<?php 
require "./controllers/modify_controller.php";?>

<div>
    <?php if (isset($_SESSION['role']) && $_SESSION['role']=='admin' ){
        if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['id']) && isset($_POST['token']) && $_POST['token'] === $_SESSION['token']){
            if($_POST['type']=='produit'){?>
            <form method='post'>
                <input type="hidden" name="token" value="<?=$_SESSION['token']?>"/>
                <input type="hidden" name="type" value="<?= $_POST['type']?>">
                <input type="hidden" name='id' value="<?= $item['id']?>">
                <input name='img' type='file'>
                <input name='name' value="<?= $item['nom']?>">
                <div>prix d'achat: <input name="buy_price" value="<?= $item['prix_achat']?>"/> €</div>
                <div>prix de vente: <input name="sell_price" value="<?= $item['prix_vente']?>"/> €</div>
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
                <button type='submit'>Valider</button>
            </form>
        <?php }else{?>
            <form method="post">
                <input type="hidden" name="token" value="<?=$_SESSION['token']?>"/>
                <input type="hidden" name="type" value="<?= $_POST['type']?>">
                <input type="hidden" name='id' value="<?= $item['id']?>">
                <input name="img1" type='file'>
                <input name="img2" type='file'>
                <input name="img3" type='file'>
                <input name="name" value="<?= $item['nom']?>">
                <?php $menus_produits = $bdd->prepare("SELECT * FROM menu_produit WHERE menu_id = :id");
                    $menus_produits->execute([
                        'id'=>$item['id']
                    ]);
                    $price = 0;
                    foreach($menus_produits as $mp){
                        $produits = $bdd->prepare("SELECT * FROM produit WHERE id = :id");
                        $produits->execute([
                        ':id'=>$mp['produit_id']]);
                        foreach ($produits as $produit) { ?>
                — <?= $mp['nb'];?> x <?= $produit['nom']?></br>
                    <?php $price += (($produit['prix_vente']-0.2)*$mp['nb']); }};?>
                <input name="price" value="<?= $price ?>"/>
                <button type='submit'>Valider</button>
            </form>
    <?php }}else{?>
        <div>Error : Invalid token</div>
    <?php }}?>

</div>