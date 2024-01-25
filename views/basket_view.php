<?php
include './controllers/basket_controller.php';
?>

<div class="display-log">
    <form method="post" action="panier.php" class="comm-table">
        <table class="comm-table">
            <tr class="comm-head">
                <td class="comm-tit">
                    produit
                </td>
                <td class="comm-tit">
                    prix unitaire
                </td>
                <td class="comm-tit">
                    quantité
                </td>
                <td class="comm-tit">
                    prix total
                </td>
                <td class="comm-tit">
                    modifier
                </td>
            </tr>
            <tr class="comm-line">
                <td class="comm-ele">
                    nom du produit là
                </td>
                <td class="comm-ele">
                    nom du produit là
                </td>
                <td class="comm-ele">
                    nom du produit là
                </td>
                <td class="comm-ele">
                    nom du produit là
                </td>
                <td class="comm-ele modif">
                    <button class="comm-modif">-</button>
                    <button class="comm-modif">+</button>
                </td>
            </tr>
            <tr class="comm-line">
                <td class="comm-ele">
                    
                </td>
                <td class="comm-ele">
                    
                </td>
                <td class="comm-ele">
                    livraison
                </td>
                <td class="comm-ele" colspan="2">
                    0
                </td>
            </tr>
            <tr class="comm-line">
                <td class="comm-ele" colspan="2">
                <input type="checkbox" id="livraison"> Livraison à 6 €
                </td>
                <td class="comm-ele">
                    total
                </td>
                <td class="comm-ele">
                    0
                </td>
                <td class="comm-ele modif">
                <button class="comm-payer">payer</button>
                </td>
            </tr>
        </table>
    </form>
</div>