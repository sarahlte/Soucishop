<?php
require 'bdd.php';
require 'class.php';


$panier = unserialize($_SESSION['panier']);


$items = $panier->getProduits();
$total = $panier->getTotalItem();


function quantity($produit){
    $panier = unserialize($_SESSION['panier']);
    if(isset($_POST['moins'])){
        $produit['nb'] -=1;
    } elseif(isset($_POST['plus'])){
        $panier->addProduits($produit);
    }
}


if(isset($_POST['id'])){
    $products = $bdd->prepare("SELECT * from produit WHERE $id = :id");
    $products->execute([
        'id'=>htmlspecialchars($_POST['id'])
    ]);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['token']) && $_POST['token'] === $_SESSION['token']) {

    if(isset($_POST['livraison'])){
        $livraison = 0;
    } else{
        $livraison = 1;
    }

    $p_commande = '';
    foreach($items as $item){
        $id = $item['id'];
        $type = $item['type'];
        $nb = $item['nb'];
        $req = $bdd->prepare("SELECT * FROM $type WHERE id = :id");
        $req->execute([
            'id'=>$id
        ]);
        $response = $req->fetch();
        $prix_total = $response['prix_vente']*$nb;
        $p_commande += $nb.' x '.$response['nom'].' - '.$prix_total.'€ </br>';
    }
    
    $commande = $bdd->prepare("INSERT INTO commande (prix_total, livraison, nom, prenom, adresse, code_postal, ville, compelement_d_adresse) VALUES (:prix_total, :livraison, :nom, :prenom, :adresse, :code_postal, :ville, :compelement_d_adresse)");

    $commande->execute([
        'prix_total'=>htmlspecialchars($_POST['commande_total']),
        'livraison'=>htmlspecialchars($livraison),
        'nom'=>htmlspecialchars($_POST['nom']),
        'prenom'=>htmlspecialchars($_POST['prenom']),
        'adresse'=>htmlspecialchars($_POST['adresse']),
        'code_postal'=>htmlspecialchars($_POST['code_postal']),
        'ville'=>htmlspecialchars($_POST['ville']),
        'cadresse'=>htmlspecialchars($_POST['cadresse']),
    ]);

    // if ($stmt->execute()) {
    //     $_SESSION['status'] = 'success';
    //     $_SESSION['message'] = 'Votre commande a bien été passée !';
    //     header("Location: ?page=connexion");
    //     exit();
    // }
}