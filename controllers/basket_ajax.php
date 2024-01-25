<?php 
include './controllers/class.php';
if (isset($_SESSION['panier'])){
    $panier = unserialize($_SESSION['panier']); 
    echo json_encode(['nb'=>($panier->getNbItem())]);
} else {
    echo json_encode(['nb'=>'0']);;
}