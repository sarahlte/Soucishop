<?php 
require 'bdd.php';

if (isset($_SESSION['role']) && $_SESSION['role']=='admin'){
    $req = $bdd->prepare("")
}