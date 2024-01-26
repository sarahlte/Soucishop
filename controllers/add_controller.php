<?php 
require 'bdd.php';

if (isset($_SESSION['role']) && $_SESSION['role']=='admin'){
    $products = $bdd->prepare("SELECT * FROM produit");
    $products->execute();

    $aliments = $bdd->prepare("SELECT * FROM aliment");
    $aliments->execute();
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['token']) && $_POST['token'] === $_SESSION['token'] && $_POST['type'] === 'produit'){
        if (isset($_POST['nom']) && isset($_POST['prix_achat']) && isset($_POST['prix_vente']) && isset($_POST['categorie']) && isset($_POST['img1'])){
            $ali = [];
            $quantity = [];
            foreach($aliments as $aliment){
                //var_dump($_POST[$aliment['id']]);
                if (isset($_POST[$aliment['id']])){
                    array_push($ali,$_POST[$aliment['id']]);
                    if (!empty($_POST[$aliment['id'].'b'])){
                        array_push($quantity, $_POST[$aliment['id'].'b']);
                    }
                }
            }
            if ($ali != [] && count($ali) == count($quantity)){
                $new = $bdd->prepare("INSERT INTO produit (categorie, nom, prix_achat, prix_vente, img1) VALUES (:categorie, :nom, :prix_achat, :prix_vente, :img1)");
                $new->execute([
                    'nom'=>$_POST['nom'],
                    'prix_achat'=>$_POST['prix_achat'],
                    'prix_vente'=>$_POST['prix_vente'],
                    'img1'=>$_POST['img1'],
                    'categorie'=>$_POST['categorie'],
                ]);

                $id= $bdd->lastInsertId();
                $nb= count($ali);
                for($i = 0; $i <$nb; $i++){
                    $aliment_id = $ali[$i];
                    $nb_produit = $quantity[$i];
                    $aliment_produit = $bdd->prepare("INSERT INTO aliment_produit (aliment_id, produit_id, nb) VALUES (:aliment_id, :produit_id, :nb)");
                    $aliment_produit->execute([
                        'produit_id'=>$id,
                        'aliment_id'=>$aliment_id,
                        'nb'=>$nb_produit
                    ]);
                }
                $_SESSION['status'] = 'success';
                $_SESSION['message'] = 'Produit ajouté !';
                header("Location: ?page=connexion");
            } else {
                echo 'veuillez selectionner des aliments';
            } 
            
        } else {
            echo 'champs manquants';
        }
    };

    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['token']) && $_POST['token'] === $_SESSION['token'] && $_POST['type'] === 'menu'){
        if (isset($_POST['nom']) && isset($_POST['prix']) && isset($_POST['img1']) && isset($_POST['img2']) && isset($_POST['img3'])){
            $pr = [];
            $quantity = [];
            foreach($products as $product){
                //var_dump($_POST[$aliment['id']]);
                if (isset($_POST[$product['id']])){
                    array_push($pr,$_POST[$product['id']]);
        
                    if (!empty($_POST[$product['id'].'b'])){
                        array_push($quantity, $_POST[$product['id'].'b']);
                    }
                }
            }
            if ($pr != [] && count($pr) == count($quantity)){
                $new = $bdd->prepare("INSERT INTO menu (nom, prix, image1, image2, image3) VALUES (:nom, :prix, :image1, :image2, :image3)");
                $new->execute([
                    'nom'=>$_POST['nom'],
                    'prix'=>$_POST['prix'],
                    'image1'=>$_POST['img1'],
                    'image2'=>$_POST['img2'],
                    'image3'=>$_POST['img3']
                ]);
                $id= $bdd->lastInsertId();
                $nb = count($pr);
                for($i = 0; $i <$nb; $i++){
                    $produit_id = $pr[$i];
                    $nb_produit = $quantity[$i];
                    $menu_produit = $bdd->prepare("INSERT INTO menu_produit (menu_id, produit_id, nb) VALUES (:menu_id, :produit_id, :nb)");
                    $menu_produit->execute([
                        'menu_id'=>$id,
                        'produit_id'=>$produit_id,
                        'nb'=>$nb_produit
                    ]);
                }
                $_SESSION['status'] = 'success';
                $_SESSION['message'] = 'Produit ajouté !';
                header("Location: ?page=connexion");
            } else {
                echo 'veuillez selectionner des aliments et/ou remplir les quantités';
            } 
        } else {
            echo 'champs manquants';
        }
    }
    
}

