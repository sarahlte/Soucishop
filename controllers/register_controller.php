<?php

require 'bdd.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT );
    

    $stmt = $bdd->prepare("INSERT INTO utilisateur (nom, prenom, email, password) VALUES (?, ?, ?, ?)");
    $stmt->bindParam(1, $nom, PDO::PARAM_STR);
    $stmt->bindParam(2, $prenom, PDO::PARAM_STR);
    $stmt->bindParam(3, $email, PDO::PARAM_STR);
    $stmt->bindParam(4, $password, PDO::PARAM_STR);
    if ($stmt->execute()) {
        header("Location: ?page=connexion");
    }
}