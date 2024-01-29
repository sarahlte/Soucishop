<?php
require './controllers/consult_controller.php';
?>

<div class="display-log">
        <table class="comm-table">
            <tr class="comm-head">
                <td class="comm-tit">
                    produits
                </td>
                <td class="comm-tit">
                    commandé le
                </td>
                <td class="comm-tit">
                    livrable
                </td>
                <td class="comm-tit">
                    livré le
                </td>
                <td class="comm-tit">
                    prix
                </td>
                <td class="comm-tit">
                    consulter
                </td>
                <td class="comm-tit">
                    pdf
                </td>
            </tr>
            <?php if(isset($commandes)){
            foreach($commandes as $commande):?>
            <tr class="comm-line">
                <td class="comm-ele">
                <?= $commande['id']?>
                </td>
                <td class="comm-ele">
                <?= $commande['date']?>
                </td>
                <td class="comm-ele">
                <?= $commande['recu']?>
                </td>
                <td class="comm-ele">
                <?= $commande['livraison']?>
                </td>
                <td class="comm-ele">
                <?= $commande['prix_total']?>
                </td>
                <td class="comm-ele">
                    <a href="#" class="comm-payer">consulter</a>
                </td>
                <td class="comm-ele">
                    <button class="comm-payer">pdf</button>
                </td>
            </tr>
            <?php endforeach;}?>
        </table>
    </form>
</div>