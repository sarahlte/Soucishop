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