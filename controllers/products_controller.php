<?php
require 'bdd.php';
require 'basket_controller.php';

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

if (isset($_SESSION['role']) && $_SESSION['role']=='admin'){
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['delete']) && isset($_POST['token']) && $_POST['token'] === $_SESSION['token']){
        $type = $_POST['type'];
        $req = $bdd->prepare("DELETE FROM $type WHERE id = :id");
        $req->execute([
            'id'=>htmlspecialchars($_POST['delete'])
        ]);
    }
}

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['add']) && isset($_POST['token']) && $_POST['token'] === $_SESSION['token'] && isset($_SESSION['panier'])){
    if($_POST['type']=='produit'){
        $panier = unserialize($_SESSION['panier']);
        $panier->addPanier(['id'=>$_POST['add'], 'type'=>$_POST['type']]);
        $_SESSION['panier'] = serialize($panier);
        
    } elseif ($_POST['type']=='menu'){
        $panier = unserialize($_SESSION['panier']);
        $panier->addPanier(['id'=>$_POST['add'], 'type'=>$_POST['type']]);
        $_SESSION['panier'] = serialize($panier);
    }
}




