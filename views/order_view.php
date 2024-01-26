<?php 
require './controllers/order_controller.php';
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
        <?php foreach($reqs as $req):?>
        <tr class="comm-line">
            <td class="comm-ele">
                <?= $req['id']?>
            </td>
            <td class="comm-ele">
                <?= $req['date']?>
            </td>
            <td class="comm-ele">
                <?= $req['prix_total']?>
            </td>
            <td class="comm-ele">
                <?= $req['livraison']?>
            </td>
            <td class="comm-ele">
                <?= $req['recu']?>
            </td>
            <td class="comm-ele">
                <?= $req['adresse']?>
                <?= $req['code_postal']?>
                <?= $req['ville']?>
                <?= $req['complement_d_adresse']?>
            </td>
            <td class="comm-ele">
                <?= $req['produits']?>
            </td>
        </tr>
        <?php endforeach;?>
    </table>
</div>