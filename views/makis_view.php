<?php 
require 'products_controller.php';
?>

<div>
    <ul>
        <?php foreach ($products as $product) : ?>
            <li><?= $product['nom'] ?>, <?= $product['prix vente'] ?>, <?= $product['description'] ?></li>
        <?php endforeach; ?>
    </ul>
</div>