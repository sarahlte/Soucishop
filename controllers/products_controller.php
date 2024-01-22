<?php
require 'bdd.php';

if ($_GET['page'] == 'makis'){
    $products = $bdd->prepare("SELECT * FROM produit WHERE categorie = :categorie");
    $products->execute([
        'categorie' => 'roll'
    ]);
} else if ($_GET['page'] == 'sushis'){
    $products = $bdd->prepare("SELECT * FROM produit WHERE categorie = :categorie");
    $products->execute([
        'categorie' => 'sushi'
    ]);
} else {
    $menus = $bdd->prepare("SELECT * FROM menu");
    $menus->execute();
}

$aliments = $bdd->prepare("SELECT * FROM aliment-produit");
$aliments->execute();

$aliment = $bdd->prepare("SELECT * FROM aliment");
$aliment->execute();