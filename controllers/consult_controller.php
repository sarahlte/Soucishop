<?php

$reqs = $bdd->prepare("SELECT * FROM commande WHERE id = :id");
$reqs->execute([
    'id' => $_SESSION['id_commande'],
]);
$commandes = $reqs->fetchAll();