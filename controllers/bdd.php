<?php 

if (strpos($system_info, 'Windows') !== false) {
    $dsn = 'mysql:host=localhost;dbname=soucishop;charset=utf8';
    $username = 'root';
    $password = '';
} else {
    $dsn = 'mysql:host=localhost;dbname=soucishop;charset=utf8;port=8889';
    $username = 'root';
    $password = 'root';
}

try
{
    $bdd = new PDO($dsn, $username, $password);

    $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}