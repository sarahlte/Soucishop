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
                    prix total
                </td>
                <td class="comm-tit">
                    reçu le
                </td>
            </tr>
            <?php if(isset($commandes)){
            foreach($commandes as $commande):?>
            <tr class="comm-line">
                <td class="comm-ele">
                <?= $commande['produits']?>
                </td>
                <td class="comm-ele">
                <?= $commande['date']?>
                </td>
                <td class="comm-ele">
                <?= $commande['prix_total']?>
                </td>
                <td class="comm-ele">
                <?= $commande['recu']?>
                </td>
            </tr>
            <?php endforeach;}?>
        </table>
    </form>
</div>