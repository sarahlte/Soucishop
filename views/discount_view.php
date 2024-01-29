<?php 
require './controllers/discount_controller.php';
?>

<script src="./script/discount.js"></script>
<div class="display-basket">
    <table class="comm-table">
        <tr class="comm-head">
            <td class="comm-tit">
                Référence
            </td>
            <td class="comm-tit">
                Code
            </td>
            <td class="comm-tit">
                Type
            </td>
            <td class="comm-tit">
                Valeur
            </td>
            <td class="comm-tit">
                Effectif
            </td>
        </tr>
        <?php if(isset($values)){ 
        foreach($values as $value):?>
        <tr class="comm-line">
            <td class="comm-ele">
                <?= $value['id']?>
            </td>
            <td class="comm-ele">
                <?= $value['code']?>
            </td>
            <td class="comm-ele">
                <?= $value['type']?>
            </td>
            <td class="comm-ele">
                <?= $value['valeur']?>
            </td>
            <td class="comm-ele">
                <?php if(isset($value['effectif'])){ ?>
                    <form method="post">
                        <input type="hidden" name="id_code" value="<?= $value['id']?>">
                        <input type="hidden" name='token' value='<?= $_SESSION['token']?>'>
                        <input type="hidden" id="effectif<?= $value['id']?>" name="effectif" value="<?= $value['effectif']?>">
                        <button class="comm-payer button" id="button_eff<?= $value['id']?>" onclick="effectif(<?= $value['id']?>)">Effectif</button>
                    </form>   
                    <script>effectif(<?= $value['id']?>)</script>
                <?php } ?>
            </td>
        </tr>
        <?php endforeach;}?>
        <tr>
            <td></td>
            <td></td>
            <td class="comm-ele modif">
                <a class="comm-payer button" href="?page=add-discount">ajouter</a>
            </td>
        </tr>
    </table>
</div>
