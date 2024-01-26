<?php 
include './controllers/class.php';

if (isset($_SESSION['panier'])){
    $panier = unserialize($_SESSION['panier']); 
    //var_dump($panier);
    $panier->setNbItem();
    $nb_item = $panier->getNbItem();
    echo json_encode($nb_item);
} else {
    $nb_item=0;
    echo json_encode($nb_item);
}

