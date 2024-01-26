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
                Reçu
            </td>
            <td class="comm-tit">
                Produit.s
            </td>
        </tr>
        <?php foreach($reqs as $req):?>
        <tr class="comm-line">
            <td class="comm-ele">
                produit
            </td>
            <td class="comm-ele">
                prix unitaire
            </td>
            <td class="comm-ele">
                quantité
            </td>
            <td class="comm-ele">
                prix total
            </td>
            <td class="comm-ele">
                modifier
            </td>
        </tr>
    </table>
</div>