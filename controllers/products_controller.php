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
    /* foreach ($menus as $menu){
        $menus_products = $bdd->prepare("SELECT * FROM menu_produit WHERE menu_id = :id");
        $menus_products->execute([
            ':id'=>$menu['id']
        ]);
        foreach ($menus_products as $mp){
            $products = $bdd->prepare("SELECT * FROM produit WHERE id = :id");
            $products->execute([
                ':id'=>$mp['produit_id']
            ]); 
        }
    } */
    
}




