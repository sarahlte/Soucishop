<?php 
require 'products_controller.php';
?>

<div>
    <ul>
        <?php foreach ($menus as $menu) : ?>
            <li><?= $menu['nom'] ?>, <?= $product['prix vente'] ?>, <?= $product['description'] ?></li>
        <?php endforeach; ?>
    </ul>
</div>