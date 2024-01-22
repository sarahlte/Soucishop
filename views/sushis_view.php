<?php 
require './controllers/products_controller.php';
?>

<div>
    <ul>
        <?php foreach ($products as $product) : ?>
            <li><?= $product['nom'] ?>, <?= $product['prix vente'] ?>, <?= $product['description'] ?> <img src="<?= $product['img1']?>" alt=""></li>
        <?php endforeach; ?>
    </ul>
</div>