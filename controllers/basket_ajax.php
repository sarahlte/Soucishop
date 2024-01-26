<?php 
require 'class.php';
session_start();
    

if (!empty($_SESSION['panier'])){
    $nb = $_SESSION['nb']; 
} else {
    $nb = 0;
}
echo json_encode($nb);