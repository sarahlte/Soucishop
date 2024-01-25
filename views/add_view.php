<?php 
require './controllers/add_controller.php';
?>

<div>
    <?php if(isset($_SESSION['type']) && $_SESSION['type'] =='produit'){?>

    <?php } elseif(isset($_SESSION['type']) && $_SESSION['type']=='menu'){?>
        <form method="post">
            <input type="hidden" name='type' value='<?= $_SESSION['type']?>'>
            <input type="hidden" name='token' value='<?= $_SESSION['token']?>'>
            <label for="nom">Nom du menu</label>
            <input type="text" name='nom'>
            <label for="prix">Prix du menu</label>
            <input type="text" name='prix'>
            <label for="img1"></label>
            <input type="file" name='img1'>
            <label for="img2"></label>
            <input type="file" name='img2'>
            <label for="img3"></label>
            <input type="file" name='img3'>
            <?php foreach($products as $product):?>
                <label for="<?= $product['id']?>"><?= $product['nom']?></label>
                <input name="<?= $product['id']?>" type="checkbox" value="<?= $product['id'];?>">
            <?php endforeach; ?>
            <button type='submit'>Ajouter</button>
        </form>
    <?php } else { header("Location: ?page=homepage"); }
    var_dump($_POST); ?>
</div>