<?php 
require './controllers/add_controller.php';
var_dump($_SESSION['type'])
?>
<div class="display-log">
    <?php if(isset($_SESSION['type']) && $_SESSION['type'] =='produit'){?>
        <form method="post" class="register-display">
            <input type="hidden" name='type' value='<?= $_SESSION['type']?>'>
            <input type="hidden" name='token' value='<?= $_SESSION['token']?>'>
            <div class="register-disp">
                <label for="nom">Catégorie du produit</label>
                <input type="text" name='categorie' class="register-input">
            </div>
            <div class="register-disp">
                <label for="nom">Nom du produit</label>
                <input type="text" name='nom' class="register-input">
            </div>
            <div class="register-disp">
                <label for="prix">Prix à l'achat</label>
                <input type="text" name='prix_achat' class="register-input">
            </div>
            <div class="register-disp">
                <label for="nom">Prix à la vente</label>
                <input type="text" name='prix_vente' class="register-input">
            </div>
            <label for="img1"></label>
            <input type="file" name='img1'>
            <label for="img2"></label>
            <ul>
            <?php foreach($aliments as $aliment):?>
                <li><input name="<?= $aliment['id']?>" type="checkbox" value="<?= $aliment['id'];?>" class="checkbox">
                <label for="<?= $aliment['id']?>"><?= $aliment['nom']?></label></li>
            <?php endforeach; ?>
            </ul>
            <button type='submit' class="register-submit">Ajouter</button>
        </form>
    <?php } elseif(isset($_SESSION['type']) && $_SESSION['type']=='menu'){?>
        <form method="post" class="register-display">
            <input type="hidden" name='type' value='<?= $_SESSION['type']?>'>
            <input type="hidden" name='token' value='<?= $_SESSION['token']?>'>
            <div class="register-disp">
                <label for="nom">Nom du menu</label>
                <input type="text" name='nom' class="register-input">
            </div>
            <div class="register-disp">
                <label for="prix">Prix du menu</label>
                <input type="text" name='prix' class="register-input">
            </div>
            <div class="register-disp">
                <label for="img1"></label>
                <input type="file" name='img1'>
                <label for="img2"></label>
                <input type="file" name='img2'>
                <label for="img3"></label>
                <input type="file" name='img3'>
            </div>
            <ul>
                <?php foreach($products as $product):?>
                    <li><input name="<?= $product['id']?>" type="checkbox" value="<?= $product['id'];?>" class="checkbox">
                    <label for="<?= $product['id']?>"><?= $product['nom']?></label></li>
                <?php endforeach; ?>
                </ul>
            <button type='submit' class="register-submit">Ajouter</button>
        </form>
    <?php } else { header("Location: ?page=homepage"); }?>
</div>