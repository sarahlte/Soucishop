<?php

$reqs = $bdd->prepare("SELECT * FROM commande");
    $reqs->execute();
    $commandes = $reqs->fetchAll();