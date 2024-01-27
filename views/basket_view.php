<?php
include './controllers/basket_controller.php';
?>
<script serc="./script/basket.js"></script>
<div class="display-basket">
    <form method="post" class="comm-table">
        <table class="comm-table">
            <thead>
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
            </thead>
            <?php foreach($items as $item){
            $id = $item['id'];
            $type = $item['type'];
            if($type == 'produit'){
                $type_js = 1;
            } elseif($type == 'menu'){
                $type_js = 0;
            }
            $nb = $item['nb'];
            $req = $bdd->prepare("SELECT * FROM $type WHERE id = :id");
            $req->execute([
                'id'=>$id
            ]);
            $response = $req->fetch();
            if(isset($response['prix_vente'])){
                $prix_total = $response['prix_vente']*$nb;
            } elseif(isset($response['prix'])){
                $prix_total = $response['prix']*$nb;
            }?>
            <tr class="comm-line">
                <td class="comm-ele">
                    <?= $response['nom']?>
                </td>
                <td class="comm-ele">
                    <?php if(isset($response['prix_vente'])){
                            echo $response['prix_vente'];
                        } elseif(isset($response['prix'])){
                            echo $response['prix'];
                        }
                    ?>0
                </td>
                <td class="comm-ele">
                    <?= $nb ?>
                </td>
                <td class="comm-ele">
                    <?= $prix_total?>0
                </td>
                <td class="comm-ele modif">
                    <button class="comm-modif" onclick="del(<?= $item['id']?>,<?= $type_js ?>)">-</button>
                    <button class="comm-modif" onclick="add(<?= $item['id']?>,<?= $type_js ?>)">+</button>
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
                <input type="checkbox" id="livraison" name="livraison" onchange="handleChange(this);"> Livraison à 5 €
                </td>
                <td class="comm-ele">
                    total
                </td>
                <td class="comm-ele">
                <?php 
                if(isset($_COOKIE['$livraison'])){
                    $livraison = $_COOKIE['$livraison'];
                    if($livraison == 1){
                        $commande_total = 5;
                    } elseif($livraison == 0){
                        $commande_total = 0;
                    }
                } else {
                    $commande_total = 0;
                }
                foreach($items as $item){ 
                    $id = $item['id'];
                    $type = $item['type'];
                    $nb = $item['nb'];
                    $req = $bdd->prepare("SELECT * FROM $type WHERE id = :id");
                    $req->execute([
                        'id'=>$id
                    ]);
                    $response = $req->fetch();
                    if(isset($response['prix_vente'])){
                        $commande_total += $response['prix_vente']*$nb;
                    } elseif(isset($response['prix'])){
                        $commande_total += $response['prix']*$nb;
                    }
                } echo $commande_total;?>
                <input type="hidden" name="token" value="<?=$_SESSION['token']?>">
                <input type="hidden" name="commande_total" value="<?= $commande_total ?>"/>
                </td>
                <td class="comm-ele modif">
                <button class="comm-payer button">payer</button>
                </td>
            </tr>
        </table>
        <div class="register-display" id="livraison-infos" hidden='true'>
            <div class="register-disp">
                <label for="nom" class="login-label">Nom</label>
                <input type="text" placeholder="Nom" name="nom" class="register-input">
            </div>
            <div class="register-disp">
                <label for="nom" class="login-label">Prénom</label>
                <input type="text" placeholder="Prénom" name="prenom" class="register-input">
            </div>
            <div class="register-disp">
                <label for="nom" class="login-label">Adresse</label>
                <input type="text" placeholder="Adresse" name="adresse" class="register-input">
            </div>
            <div class="register-disp">
                <label for="nom" class="login-label">Code postal</label>
                <input type="text" placeholder="Code postal" name="code_postal" class="register-input">
            </div>
            <div class="register-disp">
                <label for="nom" class="login-label">Ville</label>
                <input type="text" placeholder="Ville" name="ville" class="register-input">
            </div>
            <div class="register-disp">
                <label for="nom" class="login-label">Complément d'adresse</label>
                <input type="text" placeholder="Complément d'adresse" name="cadresse" class="register-input">
            </div>
        </div>
    </form>
</div>