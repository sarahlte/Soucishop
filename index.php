<?php
$availableRoutes = ['homepage', 'sushis', 'makis', 'users', 'historic'];

$route = 'homepage';

if (isset($_GET['page']) && in_array($_GET['page'], $availableRoutes)){ 
    $route = $_GET['page'];
}

require './views/layout.phtml';


