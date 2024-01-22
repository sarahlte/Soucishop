<?php 
require './controllers/login_controller.php';
?>

<body>
    <main>
        <container>
            <div class="display-log">
                <div class="login-log">
                    <div class="register-txt">
                        Vous n'avez pas de compte ?
                    </div>
                    <a href="?page=register" class="register-button">s'inscrire -></a>
                </div>
                <form action="" method="post" enctype="multipart/form-data"class="register-display">
                    <div class="register-disp">
                        <label for="email" class="register-label">E-mail</label>
                        <input type="email" placeholder="E-mail" name="email" class="register-input">
                    </div>
                    <div class="register-disp">
                        <label for="mdp" class="register-label">Mot de passe</label>
                        <input type="password" placeholder="Mot de passe" name="password" class="register-input">
                    </div>
                    <div class="register-disp">
                        <input type="submit" class="register-submit" value ="Se connecter">
                    </div>
                </form>
            </div>
        </container>
    </main>
</body>