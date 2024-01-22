<?php 

if (!isset($_SESSION['connexion'])){
    header("Location: ?page=login");
}