<?php 
require 'bdd.php';

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['token']) && $_POST['token'] === $_SESSION['token'] && isset($_POST['effectif'])){
    if($_POST['effectif'] == 'oui'){
        $change = $bdd->prepare("UPDATE reduction SET effectif = :effectif WHERE id = :id");
        $change->execute([
            'effectif'=>'non',
            'id'=>$_POST['id_code']
        ]);
    } else if ($_POST['effectif'] == 'non'){
        $change = $bdd->prepare("UPDATE reduction SET effectif = :effectif WHERE id = :id");
        $change->execute([
            'effectif'=>'oui',
            'id'=>$_POST['id_code']
        ]);
    }
}


$discount = $bdd->prepare("SELECT * FROM reduction");
$discount->execute();
$values = $discount->fetchAll();

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['token']) && $_POST['token'] === $_SESSION['token'] && isset($_POST['code-promo'])){
    if(!empty($_POST['code-promo']) && !empty($_POST['type-promo']) && !empty($_POST['valeur-promo']) && !empty($_POST['eff-promo'])){
        $add = $bdd->prepare("INSERT INTO reduction (code, type, valeur, effectif) VALUES (:code, :type, :valeur, :valeur, :effectif)");
        $add->execute([
            'code'=>$_POST['code-promo'],
            'type'=>$_POST['type-promo'],
            'valeur'=>$_POST['valeur-promo'],
            'effectif'=>$_POST['eff-promo']
        ]);
        $_SESSION['status'] = 'success';
        $_SESSION['message'] = 'Produit ajouté !';
        header("Location: ?page=homepage");
    } else {
        $_SESSION['status'] = 'error';
        $_SESSION['message'] = 'Champs manquants !';
    }
}