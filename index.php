<?php
session_start ();
require 'conf/conf.php';
require 'controllers/bdd.php';


if (!isset($_SESSION['token'])) {
    $_SESSION['token'] = md5(uniqid(mt_rand(), true));
}
$availableRoutes = ['homepage', 'sushis', 'makis', 'user', 'admin', 'menus', 'basket', 'register', 'login', 'logout', 'contact', 'profil', 'modify', 'add'];

$route = 'homepage';

if (isset($_GET['page']) && in_array($_GET['page'], $availableRoutes)){ 
    $route = $_GET['page'];
}

require './views/layout.php';


