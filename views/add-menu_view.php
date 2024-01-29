<?php 
require './controllers/add_controller.php'; ?>
<div class="display-log">
    <?php if(isset($_SESSION['type']) && $_SESSION['type']=='menu'){?>
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
                <?php foreach($products as $product):?>
                    <div class="prod-display">
                        <input name="<?= $product['id']?>" type="checkbox" value="<?= $product['id'];?>" class="checkbox">
                        <label for="<?= $product['id']?>"><?= $product['nom']?></label>
                        <input placeholder="quantité" name="<?= $product['id']?>b">
                    </div>
                <?php endforeach; ?>
                </ul>
            <button type='submit' class="register-submit">Ajouter</button>
        </form>
    <?php } else { header("Location: ?page=homepage"); }?>
</div>