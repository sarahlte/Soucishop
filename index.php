<?php
$availableRoutes = ['homepage', 'sushis', 'makis', 'user', 'admin', 'menu'];

$route = 'homepage';

if (isset($_GET['page']) && in_array($_GET['page'], $availableRoutes)){ 
    $route = $_GET['page'];
}

require './views/layout.php';


