<?php

$utilisateurs = $bdd->prepare("SELECT * FROM commande_utilisateur WHERE utilisateur_id = :id");
$utilisateurs->execute([
    ':id'=>$_SESSION['id'],
]);

foreach($utilisateurs as $utilisateur){
    $reqs = $bdd->prepare("SELECT * FROM commande");
    $reqs->execute();
    $commandes = $reqs->fetchAll();
}