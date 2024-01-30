<?php 
require 'bdd.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['admin']) && isset($_POST['token']) && $_POST['token'] === $_SESSION['token']) {
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT );
    $role = 'admin';
    

    $stmt = $bdd->prepare("INSERT INTO utilisateur (nom, prenom, email, password, role) VALUES (?, ?, ?, ?, ?)");
    $stmt->bindParam(1, $nom, PDO::PARAM_STR);
    $stmt->bindParam(2, $prenom, PDO::PARAM_STR);
    $stmt->bindParam(3, $email, PDO::PARAM_STR);
    $stmt->bindParam(4, $password, PDO::PARAM_STR);
    $stmt->bindParam(5, $role, PDO::PARAM_STR);

    if ($stmt->execute()) {
        $_SESSION['status'] = 'success';
        $_SESSION['message'] = 'Nouvel administrateur ajouté !';
        header("Location: ?page=homepage");
        exit();
    } else {
        echo "ERROR - Echec de la création d'administrateur";
    }
}