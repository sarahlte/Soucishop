<?php 
require './controllers/products_controller.php';
?>

<div>
    <ul>
        <?php foreach ($menus as $menu) : ?>
            <li><?= $menu['nom'] ?> :
            <ul>
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
                <li><?= $product['nom']?>, <?= $mp['nb'];?></li>
                <?php $price += (($product['prix vente']-0.2)*$mp['nb']); }};?>
            </ul>
            <?= $price ?>
        </li>
        <?php endforeach; ?>
    </ul>
</div>