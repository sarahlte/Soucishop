<?php 
require "./controllers/add-admin_controller.php";
?>

<div class="display-log">
    <?php if(isset($_SESSION['role']) && $_SESSION['role']=='admin'){?>
        <form action="" method="post" enctype="multipart/form-data" class="register-display">
            <input type="hidden" name='token' value='<?= $_SESSION['token']?>'>
            <input type="hidden" name="admin" id="admin" value='admin'>
            <div class="register-disp">
                <label for="nom" class="login-label">Nom</label>
                <input type="text" placeholder="Nom" name="nom" class="register-input">
            </div>
            <div class="register-disp">
                <label for="prenom" class="register-label">Prénom</label>
                <input type="text" placeholder="Prénom" name="prenom" class="register-input">
            </div>
            <div class="register-disp">
                <label for="email" class="register-label">E-mail</label>
                <input type="email" placeholder="E-mail" name="email" class="register-input">
            </div>
            <div class="register-disp">
                <label for="mdp" class="register-label">Mot de passe</label>
                <input type="password" placeholder="Mot de passe" name="password" class="register-input">
            </div>
            <div class="register-disp">
                <input type="submit" class="register-submit" value ="S'enregistrer">
            </div>
        </form>
    <?php } else { header("Location: ?page=homepage"); }?>
</div>