<?php 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($stmt->execute()) {
        $_SESSION['status'] = 'success';
        $_SESSION['message'] = 'Vos informations ont été modifiées !';
        header("Location: ?page=connexion");
        die();
    }
}