<?php 
require 'bdd.php';

if (isset($_SESSION['role']) && $_SESSION['role']=='admin'){
    $reqs = $bdd->prepare("SELECT * FROM commande");
    $reqs->execute();
    $views = $reqs->fetchAll();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $recu = 'oui';
    $update = $bdd->prepare("UPDATE commande SET recu=:recu WHERE id=:id");
    $update->execute([
        'id' => $_POST['id'],
        'recu'=> $recu,
    ]);
    if ($update->execute()) {
        $_SESSION['status'] = 'success';
        $_SESSION['message'] = 'Votre commande a été notée comme reçue.';
        header("Location: ?page=order");
        exit();
    }
}