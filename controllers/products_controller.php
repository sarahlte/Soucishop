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
} else {


    foreach ($menus as $menu){
        $menus_products = $bdd->prepare("SELECT * FROM menu_prduit WHERE id_menu = :id");
        $menus_products->execute([
            ':id'=>$menu['id']
        ]);
        $products = $bdd->prepare("SELECT * FROM produit WHERE id = :id");
        $products->execute([
            ':id'=>$menu['id']
        ]); 
    }
    
}




