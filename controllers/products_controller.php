<?php
require 'bdd.php';

if ($_GET['page'] == 'makis'){
    $products = $bdd->prepare("SELECT * FROM produit WHERE categorie = :categorie");
    $product->execute([
        'categorie' => 'roll'
    ]);
} else if ($_GET['page'] == 'sushis'){
    $products = $bdd->prepare("SELECT * FROM produit WHERE categorie = :categorie");
    $products->execute([
        'categorie' => 'sushi'
    ]);
}




