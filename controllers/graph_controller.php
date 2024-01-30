<?php 
require 'bdd.php';

$current_date = date('Y-m-d');

$datas_v=[];
$datas_b=[];
$date = [];
$ca_semaine = 0;
$benef_semaine = 0;
$datas_bs = [];


for($i = 6; $i>=0; $i--){
    $stop_date = date('Y-m-d', strtotime("-".$i."day", strtotime($current_date)));
    $commande = $bdd->prepare("SELECT * FROM commande WHERE date = :stop_date");
    $commande->execute([
        'stop_date'=>$stop_date,
    ]);
    $response = $commande->fetchAll();
    $p_achat = 0;
    $p_vente = 0;
    foreach($response as $resp){
        $p_achat += $resp['prix_achat'];
        $p_vente += $resp['prix_total'];
        $ca_semaine += $resp['prix_total'];
        $benef_semaine += ($resp['prix_total'] - $resp['prix_achat']);
    }
    array_push($date, $stop_date);
    $benef = $p_vente - $p_achat;
    $array_v = ['x'=>$stop_date, 'y'=>$p_vente];
    array_push($datas_v, $array_v);
    $array_b = ['x'=>$stop_date, 'y'=>$benef];
    array_push($datas_b, $array_b);
    $best_sale = 0;
    $sale= $bdd->prepare("SELECT * FROM commande WHERE date = :stop_date ORDER BY prix_total desc LIMIT 1");
    $sale->execute([
        'stop_date'=>$stop_date,
    ]);
    $b_sale = $sale->fetch();
    if(!empty($b_sale['prix_total'])){
        $best_sale += $b_sale['prix_total'];
    }
    $array_bs = ['x'=>$stop_date, 'y'=>$best_sale];
    array_push($datas_bs, $array_bs);

}




