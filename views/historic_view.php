<?php
require './controllers/historic_controller.php';
?>

<div class="display-log">
        <table class="comm-table">
            <tr class="comm-head">
                <td class="comm-tit">
                    référence
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
                <form method="post">
                    <td class="comm-ele">
                        <button class="comm-payer button" name="consult" onclick="this.form.submit()" value="<?= $commande['id']?>">consulter</button>
                    </td>
                    <td class="comm-ele">
                        <button class="comm-payer button" name="pdf" onclick="this.form.submit()" value="<?= $commande['id']?>">pdf</button>
                    </td>
                </form>
            </tr>
            <?php endforeach;}?>
        </table>
    </form>
</div>