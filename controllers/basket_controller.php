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

// class Produit{
//     protected $nom;
//     protected $prix = 0;
//     protected $quantite = 0;

//     public function __construct($nom, $prix) {
//         $this->nom = $nom;
//         $this->prix = $prix;
//         $this->setQuantite($this->getQuantite()+1);
//     }

//     function setQuantite($ici){
//         self::$quantite = $ici;
//     }

//     public function getNom() {
//         return $this->nom;
//     }
//     public function getPrix() {
//         return $this->prix;
//     }
//     public function getQuantite() {
//         return $this->quantite;
//     }
// }