<?php 
require 'bdd.php';

if (isset($_SESSION['role']) && $_SESSION['role']=='admin'){
    $reqs = $bdd->prepare("SELECT * FROM commande");
    


}