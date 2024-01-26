<?php
include './controllers/basket_controller.php';
?>
<script serc="./script/basket.js"></script>
<div class="display-log">
    <form method="post" class="comm-table">
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
            <?php foreach($items as $item){
            $id = $item['id'];
            $type = $item['type'];
            $nb = $item['nb'];
            $req = $bdd->prepare("SELECT * FROM $type WHERE id = :id");
            $req->execute([
                'id'=>$id
            ]);
            $response = $req->fetch();
            $prix_total = $response['prix_vente']*$nb;?>
            <tr class="comm-line">
                <td class="comm-ele">
                    <?= $response['nom']?>
                </td>
                <td class="comm-ele">
                    <?= $response['prix_vente']?>0
                </td>
                <td class="comm-ele">
                    <?= $nb ?>
                </td>
                <td class="comm-ele">
                    <?= $prix_total?>0
                </td>
                <td class="comm-ele modif">
                    <button class="comm-modif" name="moins">-<?php $item['nb'] -=1; ?></button>
                    <button class="comm-modif" name='plus'>+<?php $item['nb'] += 1; ?></button>
                </td>
            </tr>
            <?php }?>
            <tr class="comm-line" id="livraison-div" hidden='true'>
                <td class="comm-ele">
                    
                </td>
                <td class="comm-ele">
                    
                </td>
                <td class="comm-ele">
                    livraison
                </td>
                <td class="comm-ele" colspan="2">
                    5.00
                </td>
            </tr>
            <tr class="comm-line">
                <td class="comm-ele" colspan="2">
                <input type="checkbox" id="livraison" onchange="handleChange(this);"> Livraison à 5 €
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