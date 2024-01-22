<?php

require 'bdd.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $query = "SELECT * FROM utilisateur WHERE email = :email";
    $stmt = $bdd->prepare($query);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->execute();
    
    $user = $stmt->fetch();

    if ($user && password_verify($_POST['password'], $user['password'])) {
        $_SESSION['status'] = 'connected';
        $_SESSION['id'] = $user['id'];
        $_SESSION['nom'] = $user['nom'];
        $_SESSION['prenom'] = $user['prenom'];
        $_SESSION['role'] = $user['role'];
        header("Location: ?page=homepage");
        exit();
    } else {
        echo "Invalid email or password.";
    }
}