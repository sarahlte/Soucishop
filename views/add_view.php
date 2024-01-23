<?php 
require './controllers/add_controller.php';
?>

<div>
    <?php if($_SESSION['type']=='produit'){?>

    <?php } elseif($_SESSION['type']=='menu'){?>
        <form method="post">
            <input type="hidden" name='token'>
            <label for="name">Nom du menu</label>
            <input type="text" name='name'>
            <label for="prix">Prix du menu</label>
            <input type="text" name='prix'>
            <label for="img1"></label>
            <input type="file" name='img1'>
            <label for="img2"></label>
            <input type="file" name='img2'>
            <label for="img3"></label>
            <input type="file" name='img3'>
            <?php foreach($products as $product):?>
                <label for="<?= $product['nom']?>"><?= $product['nom']?></label>
                <input name="<?= $product['nom']?>" type="checkbox" value="<?= $product['id'];?>">
            <?php endforeach; ?>
            <button type='submit'>Ajouter</button>
        </form>
    <?php }?>
</div>