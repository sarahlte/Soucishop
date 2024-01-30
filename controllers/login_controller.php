<?php

require 'bdd.php';
require 'class.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['token']) && $_POST['token'] === $_SESSION['token']) {
    $email = htmlspecialchars($_POST['email']);
    $query = "SELECT * FROM utilisateur WHERE email = :email";
    $stmt = $bdd->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    
    $user = $stmt->fetch();

    if ($user && password_verify($_POST['password'], $user['password'])) {
        $_SESSION['connexion'] = 'connected';
        $_SESSION['id'] = $user['id'];
        $_SESSION['nom'] = $user['nom'];
        $_SESSION['prenom'] = $user['prenom'];
        $_SESSION['role'] = $user['role'];
        $panier = new Panier($user['id']);
        $_SESSION['panier']= serialize($panier);
        $_SESSION['nb'] = 0;
        $_SESSION['status'] = 'success';
        $_SESSION['message'] = 'Vous vous êtes bien connecté.e !';
        header("Location: ?page=homepage");

        
        exit();
    } else {
        $_SESSION['status'] = 'error';
        $_SESSION['message'] = 'E-mail ou mot de passe invalide !';
    }
}