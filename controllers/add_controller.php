<?php 
require 'bdd.php';
require 'class.php';

if (isset($_SESSION['role']) && $_SESSION['role']=='admin'){
    $products = $bdd->prepare("SELECT * FROM produit");
    $products->execute();

    $aliments = $bdd->prepare("SELECT * FROM aliment");
    $aliments->execute();
}

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['token']) && $_POST['token'] === $_SESSION['token'] && $_POST['type'] === 'produit'){
    if (isset($_POST['nom']) && isset($_POST['prix_achat']) && isset($_POST['prix_vente']) && isset($_POST['categorie']) && isset($_POST['img1'])){
        $ali = 0;
        foreach($aliments as $aliment){
            if (isset($_POST[$aliment['id']])){
                $ali += 1;
            }
            
        }
        if ($ali != 0){
            $new = $bdd->prepare("INSERT INTO produit (categorie, nom, prix_achat, prix_vente, img1) VALUES (:categorie, :nom, :prix_achat, :prix_vente, :img1)");
            $new->execute([
                'nom'=>$_POST['nom'],
                'prix_achat'=>$_POST['prix_achat'],
                'prix_vente'=>$_POST['prix_vente'],
                'img1'=>$_POST['img1'],
                'categorie'=>$_POST['categorie'],
            ]);

            $id= $bdd->lastInsertId();
            foreach($aliments as $aliment){
                if(isset($_POST[$aliment['nom']]))
                $menu_produit = $bdd->prepare("INSERT INTO aliment_produit (aliment_produit, produit_id) VALUES (:aliment_id, :produit_id)");
                $menu_produit->execute([
                    'menu_id'=>$id,
                    'produit_id'=>$_POST[$product['nom']]
                ]);
            }
            $_SESSION['status'] = 'success';
            $_SESSION['message'] = 'Produit ajouté !';
        } else {
            echo 'veuillez selectionner des aliments';
        } 
        
    } else {
        echo 'champs manquants';
    }
};

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['token']) && $_POST['token'] === $_SESSION['token'] && $_POST['type'] === 'menu'){
    if (isset($_POST['nom']) && isset($_POST['prix']) && isset($_POST['img1']) && isset($_POST['img2']) && isset($_POST['img3'])){
        $produits = 0;
        foreach($products as $product){
            if (isset($_POST[$product['id']])){
                $produits += 1;
            }
            
        }
        if ($produits != 0){
            $new = $bdd->prepare("INSERT INTO menu (nom, prix, image1, image2, image3) VALUES (:nom, :prix, :image1, :image2, :image3)");
            $new->execute([
                'nom'=>$_POST['nom'],
                'prix'=>$_POST['prix'],
                'image1'=>$_POST['img1'],
                'image2'=>$_POST['img2'],
                'image3'=>$_POST['img3']
            ]);
            $id= $bdd->lastInsertId();
            foreach($products as $product){
                if(isset($_POST[$product['nom']]))
                $menu_produit = $bdd->prepare("INSERT INTO menu_produit ('menu_produit', 'produit_id') VALUES (:menu_id, :produit_id)");
                $menu_produit->execute([
                    'menu_id'=>$id,
                    'produit_id'=>$_POST[$product['nom']]
                ]);
            }
            $_SESSION['status'] = 'success';
            $_SESSION['message'] = 'Produit ajouté !';
        } else {
            echo 'veuillez selectionner des aliments';
        } 
        
    } else {
        echo 'champs manquants';
    }
};