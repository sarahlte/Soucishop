<?php 
require './controllers/order_controller.php';
var_dump($_SESSION);
var_dump($views);
?>

<div>
    <table class="comm-table">
        <tr class="comm-head">
            <td class="comm-tit">
                Référence
            </td>
            <td class="comm-tit">
                Date
            </td>
            <td class="comm-tit">
                Prix total
            </td>
            <td class="comm-tit">
                Livraison
            </td>
            <td class="comm-tit">
                Reçu
            </td>
            <td class="comm-tit">
                Adresse
            </td>
            <td class="comm-tit">
                Produit.s
            </td>
        </tr>
        <?php if(isset($views)){ 
        foreach($views as $view):?>
        <tr class="comm-line">
            <td class="comm-ele">
                <?= $view['id']?>
            </td>
            <td class="comm-ele">
                <?= $view['date']?>
            </td>
            <td class="comm-ele">
                <?= $view['prix_total']?>
            </td>
            <td class="comm-ele">
                <?= $view['livraison']?>
            </td>
            <td class="comm-ele">
                <?= $view['recu']?>
            </td>
            <td class="comm-ele">
                <?= $view['adresse']?>
                <?= $view['code_postal']?>
                <?= $view['ville']?>
                <?= $view['complement_d_adresse']?>
            </td>
            <td class="comm-ele">
                <?= $view['produits']?>
            </td>
        </tr>
        <?php endforeach;}?>
    </table>
</div>