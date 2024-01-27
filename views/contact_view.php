<?php 
require './controllers/contact_controller.php'
?>

<body>
    <main>
        <container>
            <div class="display-log">
                <div class="profil-log">
                    <div class="register-txt">
                        Un message à nous faire passer ? Nous répondrons à votre message par mail.
                    </div>
                </div>
                <form action="" method="post" enctype="multipart/form-data" class="register-display">
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
                        <label for="message" class="register-label">Votre message</label>
                        <textarea type="text" placeholder="Votre message" name="message" class="register-input area"></textarea>
                    </div>
                    <div class="register-disp">
                        <input type="submit" class="register-submit" value ="Envoyer">
                    </div>
                </form>
            </div>
        </container>
    </main>
</body>