<?php 
require 'class.php';
session_start();
    
if (!empty($_SESSION['panier'])){
    $panier = $_SESSION['panier']; 
    echo json_encode($panier);
} else {
    $nb = 0;
    echo json_encode($nb);
}