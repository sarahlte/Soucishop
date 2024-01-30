<?php
include './controllers/basket_controller.php';
?>
<script serc="./script/basket.js"></script>
<div class="display-basket" id="form-name">
    <form method="post" class="comm-table">
        <table class="comm-table">
            <thead>
                <tr class="comm-head">
                    <td class="comm-tit" data-label="produit">
                        produit
                    </td>
                    <td class="comm-tit"data-label="prix">
                        prix unitaire
                    </td>
                    <td class="comm-tit"data-label="quantite">
                        quantité
                    </td>
                    <td class="comm-tit"data-label="prix_tot">
                        prix total
                    </td>
                    <td class="comm-tit"data-label="modif">
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
                    ?>
                </td>
                <td class="comm-ele">
                    <?= $nb ?>
                </td>
                <td class="comm-ele">
                    <?= $prix_total?>
                </td>
                <td class="comm-ele modif">
                    <button class="comm-modif" onclick="del(<?= $item['id']?>,<?= $type_js ?>)">-</button>
                    <button class="comm-modif" onclick="add(<?= $item['id']?>,<?= $type_js ?>)">+</button>
                </td>
            </tr>
            <?php }?>
            <?php                 
            if(isset($_SESSION['promo-code']) && isset($_SESSION['promo-valeur']) && isset($_SESSION['promo-type'])){                
            ?>
            <tr class="comm-line" id="livraison-div" >
                <td class="comm-ele">
                    
                </td>
                <td class="comm-ele">
                    Code promotionnel
                </td>
                <td class="comm-ele">
                    <?= $_SESSION['promo-code']?>
                </td>
                <td class="comm-ele" colspan="2">
                    - <?php 
                if($_SESSION['promo-type'] == 'pourcentage'){
                    echo $_SESSION['promo-valeur'].'%';
                } else if ($_SESSION['promo-type'] == 'reduction'){
                    echo $_SESSION['promo-valeur'].'€';
                }?>
                </td>
            </tr> <?php }?>
            <tr class="comm-line" id="livraison-div" <?php if(!empty($_COOKIE['hidden'])){echo ' '.$_COOKIE['hidden'];}?>>
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
                <input type="checkbox" id="livraison" name="livraison" onchange="track(); this.form.submit();" <?php if(!empty($_COOKIE['checked'])){ echo $_COOKIE['checked'];} ?>> Livraison à 5 €
                </td>
                <td class="comm-ele">
                    total
                </td>
                <td class="comm-ele">
                <?php 
                $commande_total = 0;
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
                } 
                if(isset($_SESSION['promo-code']) && isset($_SESSION['promo-valeur']) && isset($_SESSION['promo-type'])){
                    if($_SESSION['promo-type'] == 'pourcentage'){
                        $commande_total = $commande_total - ($commande_total/100*$_SESSION['promo-valeur']);
                    } else if ($_SESSION['promo-type'] == 'reduction'){
                        $commande_total -= $_SESSION['promo-valeur'];
                    }
                }
                if(isset($_COOKIE['livraison'])){
                    $livraison_js = $_COOKIE['livraison'];
                    if($livraison_js == 'true'){
                        $commande_total += 5;
                    } 
                }
                echo $commande_total;?>
                <input type="hidden" name="token" value="<?=$_SESSION['token']?>">
                <input type="hidden" name="commande_total" value="<?= $commande_total ?>"/>
                </td>
                <td class="comm-ele modif">
                <button class="comm-payer button" name="payer">payer</button>
                </td>
            </tr>
        </table>
        <div class="basket-contain">
            <span>
                <label for="discount">Code promotionnel</label>
                <input type="text" name="discount">
                <button name="b-discount">Valider</button>
            </span>
            <button class="comm-vide button" name="vide">vider le panier</button>
        </div>
        <div class="register-display" id="livraison-infos" <?php if(!empty($_COOKIE['hidden'])){echo ' '.$_COOKIE['hidden'];}?>>
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