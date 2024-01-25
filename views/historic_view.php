<?php
?>

<div class="display-log">
    <?php if ( isset($_SESSION['role']) && $_SESSION['role']=='admin'){ ?>
    <form method="post" action="panier.php" class="comm-table">
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
            <tr class="comm-line">
                <td class="comm-ele">
                    référence
                </td>
                <td class="comm-ele">
                    00.00.00
                </td>
                <td class="comm-ele">
                    oui
                </td>
                <td class="comm-ele">
                <button class="comm-payer">marquer livrée</button>
                </td>
                <td class="comm-ele">
                    4
                </td>
                <td class="comm-ele">
                    14.3 
                </td>
                <td class="comm-ele">
                    <a href="#" class="comm-payer">consulter</a>
                </td>
                <td class="comm-ele">
                    <button class="comm-payer">pdf</button>
                </td>
            </tr>
        </table>
    </form>
    <?php } 
    else {?>
    <form method="post" action="panier.php" class="comm-table">
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
                    nombre de produits
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
            <tr class="comm-line">
                <td class="comm-ele">
                    référence
                </td>
                <td class="comm-ele">
                    00.00.00
                </td>
                <td class="comm-ele">
                    oui
                </td>
                <td class="comm-ele">
                    00.00.00
                </td>
                <td class="comm-ele">
                    4
                </td>
                <td class="comm-ele">
                    14.3 
                </td>
                <td class="comm-ele">
                    <a href="#" class="comm-payer">consulter</a>
                </td>
                <td class="comm-ele">
                    <button class="comm-payer">pdf</button>
                </td>
            </tr>
        </table>
    </form>
    <?php }?>
</div>