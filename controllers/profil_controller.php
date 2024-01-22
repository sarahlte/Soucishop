<?php 

if (!isset($_SESSION['connexion'])) {
    $_SESSION['status'] = 'error';
    $_SESSION['message'] = 'Veuillez vous connecter pour consulter votre profil !';
    header("Location: ?page=login");
    exit();
}
