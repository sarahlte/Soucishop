<?php 
require './controllers/discount_controller.php';
?>

<div class="display-log">
    <?php if((isset($_SESSION['role']) && $_SESSION['role'] == 'admin')){?>
        <form method="post" class="register-display">
            <input type="hidden" name='token' value='<?= $_SESSION['token']?>'>
            <div class="register-disp">
                <label for="nom">Code promo</label>
                <input type="text" name='code-promo' class="register-input">
            </div>
            <div class="register-disp">
                <label for="nom">Type de promo</label>
                <select type="select" name='type-promo' class="register-input">
                    <option valeur="pourcentage">Pourcentage</option>
                    <option valeur="redcution">Réduction</option>
                </select>
            </div>
            <div class="register-disp">
                <label for="prix">Valeur de la promotion</label>
                <input type="text" name='valeur-promo' class="register-input">
            </div>
            <div class="register-disp">
                <label for="nom">Effectif</label>
                <select type="select" name='eff-promo' class="register-input">
                    <option valeur="oui">Oui</option>
                    <option valeur="non">Non</option>
                </select>
            </div>
            <button type='submit' class="register-submit">Ajouter</button>
        </form>
    <?php } else { header("Location: ?page=homepage"); }?>
</div>