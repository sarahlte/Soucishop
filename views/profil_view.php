<?php 
require './controllers/profil_controller.php';
?>

<div class="display-log">
    <div class="profil-log">
        <div class="register-txt">
            Bienvenue sur votre profil. Vous pouvez ici modifier les informations de votre compte.
        </div>
    </div>
            <form action="" method="post" enctype="multipart/form-data" class="register-display">
                <div class="register-disp">
                    <label for="Nom" class="register-label">Nom</label>
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
                    <label for="mdp" class="register-label">Ancien mot de passe</label>
                    <input type="password" placeholder="Ancien mot de passe" name="password" class="register-input">
                </div>
                <div class="register-disp">
                    <label for="mdp" class="register-label">Nouveau mot de passe</label>
                    <input type="password" placeholder="Nouveau mot de passe" name="password" class="register-input">
                </div>
                <div class="register-disp">
                    <input type="submit" class="register-submit" value ="Modifier mes informations">
                </div>
            </form>
</div>