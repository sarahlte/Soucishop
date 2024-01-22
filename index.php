<?php
session_start ();

define('ENVIRONNEMENT', 'developpement');
$availableRoutes = ['homepage', 'sushis', 'makis', 'user', 'admin', 'menus', 'basket', 'register', 'login', 'logout', 'contact'];

$route = 'homepage';

if (isset($_GET['page']) && in_array($_GET['page'], $availableRoutes)){ 
    $route = $_GET['page'];
}

require './views/layout.php';


