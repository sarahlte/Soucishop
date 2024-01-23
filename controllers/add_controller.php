<?php 
require 'bdd.php';

if (isset($_SESSION['role']) && $_SESSION['role']=='admin'){
    $products = $bdd->prepare("SELECT * FROM produit");
    $products->execute();
}