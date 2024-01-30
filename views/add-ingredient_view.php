<?php 
require './controllers/add_controller.php'; ?>
<div class="display-log">
    <?php if(isset($_SESSION['type']) && $_SESSION['type'] =='ingredient'){?>
        <form method="post" class="register-display">
            <input type="hidden" name='type' value='<?= $_SESSION['type']?>'>
            <input type="hidden" name='token' value='<?= $_SESSION['token']?>'>
            <div class="register-disp">
                <label for="nom">Les ingrédients existants</label>
                <select type="select" name='ingredients' class="register-input">
                    <?php foreach($aliments as $aliment):?>
                    <option valeur="sushi"><?= $aliment['nom']?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="register-disp">
                <label for="nom">Nom de l'ingrédient à ajouter</label>
                <input type="text" name='nom' class="register-input">
            </div>
            <div class="register-disp">
                <label for="calories">Calories pour 100g</label>
                <input type="text" name='calories' class="register-input">
            </div>
            <button type='submit' class="register-submit">Ajouter</button>
        </form>
    <?php } else { header("Location: ?page=homepage"); }?>
</div>