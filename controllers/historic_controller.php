<?php

$utilisateurs = $bdd->prepare("SELECT * FROM commande_utilisateur WHERE utilisateur_id = :utilisateur_id");
$utilisateurs->execute([
    ':utilisateur_id'=>$_SESSION['id'],
]);

foreach($utilisateurs as $utilisateur){
    $reqs = $bdd->prepare("SELECT * FROM commande");
    $reqs->execute();
    $commandes = $reqs->fetchAll();
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['consult']) && $_SESSION['id_commande'] = $_POST['consult']){
        header("Location: ?page=consult");
    }else if(isset($_POST['pdf']) && $_SESSION['id_commande'] = $_POST['pdf']){
        header("Location: ?page=pdf");
    }
}