<?php
require 'bdd.php';
require 'class.php';

if(isset($_SESSION['panier'])){


    $panier = unserialize($_SESSION['panier']);
    
    if(!empty($_COOKIE['id_js']) && !empty($_COOKIE['funct_js']) && isset($_COOKIE['type_js'])){
        $id_js = $_COOKIE['id_js'];
        $funct_js = $_COOKIE['funct_js'];
        if($_COOKIE['type_js'] == 1){
            $type_js = 'produit';
        } elseif($_COOKIE['type_js'] == 0){
            $type_js = 'menu';
        }
        $produit_js = ['id'=>$id_js, 'type'=>$type_js, 'nb'=>1];
        if($funct_js == 'add'){
            $panier->addPanier($produit_js);
            $_SESSION['nb'] = $panier->getTotalItem();
            $_SESSION['panier'] = serialize($panier);
            setcookie('id_js');
            setcookie('funct_js');
            setcookie('type_js');
        } elseif($funct_js == 'del'){
            $panier->delProduits($produit_js);
            $_SESSION['nb'] = $panier->getTotalItem();
            $_SESSION['panier'] = serialize($panier);
            setcookie('id_js');
            setcookie('funct_js');
            setcookie('type_js');
        }

    }
    
    if(isset($_COOKIE['livraison'])){
        $livraison_js = $_COOKIE['livraison'];
        if($livraison_js == 'true'){
            $commande_total = 5;
        } elseif($livraison_js == 'false'){
            $commande_total = 0;
        }
    } else {
        $commande_total = 0;
    }

    $panier = unserialize($_SESSION['panier']);
    $items = $panier->getProduits();
    $total = $panier->getTotalItem();

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['token']) && $_POST['token'] === $_SESSION['token'] && !empty($items) && !empty($_POST['discount'])){
        unset($_SESSION['promo-type']);
        unset($_SESSION['promo-code']);
        unset($_SESSION['promo-valeur']);
        $req = $bdd->prepare("SELECT * from reduction");
        $req->execute();
        $promos = $req->fetchAll();
        foreach($promos as $promo){
            if($_POST['discount'] == $promo['code'] && $promo['effectif'] == 'oui'){
                $_SESSION['promo-type']= $promo['type'];
                $_SESSION['promo-valeur']=$promo['valeur'];
                $_SESSION['promo-code']=$promo['code'];
                $_SESSION['promo_id']=$promo['id'];
            }
        }
        if(!isset($_SESSION['promo-code'])){
            $_SESSION['status'] = 'error';
            $_SESSION['message'] = 'Code promotionnel invalide !';
        }
    }
    if(isset($_POST['id'])){
        $products = $bdd->prepare("SELECT * from produit WHERE $id = :id");
        $products->execute([
            'id'=>htmlspecialchars($_POST['id'])
        ]);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['token']) && $_POST['token'] === $_SESSION['token'] && !empty($items) && isset($_POST['payer'])){
        $date = date('Y-m-d');

        if(isset($_COOKIE['livraison'])){
            $livraison = $_COOKIE['livraison'];
        } else{
            $livraison = false;
        }

        $p_commande = '';
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
                $prix_total = $response['prix_vente']*$nb;
                if(isset($_COOKIE['$livraison'])){
                    $livraison = $_COOKIE['$livraison'];
                    if($livraison == true){
                        $prix_total += 5;
                    }
                }
            } elseif(isset($response['prix'])){
                $prix_total = $response['prix']*$nb;
                if(isset($_COOKIE['$livraison'])){
                    $livraison = $_COOKIE['$livraison'];
                    if($livraison == true){
                        $prix_total += 5;
                    }
                }
            }
            $p_commande = $p_commande.$nb.' x '.$response['nom'].' - '.$prix_total.'€ </br>';
        }
        if($livraison == 'true'){
            if (!empty($_POST['cadresse'])){
                $commande = $bdd->prepare("INSERT INTO commande (date, prix_total, livraison, nom, prenom, adresse, code_postal, ville, compelement_d_adresse, produits) VALUES ( :date, :prix_total, :livraison, :nom, :prenom, :adresse, :code_postal, :ville, :compelement_d_adresse, :produits)");
                $commande->execute([
                    'prix_total'=>htmlspecialchars($_POST['commande_total']),
                    'livraison'=>htmlspecialchars($livraison),
                    'nom'=>htmlspecialchars($_POST['nom']),
                    'prenom'=>htmlspecialchars($_POST['prenom']),
                    'adresse'=>htmlspecialchars($_POST['adresse']),
                    'code_postal'=>htmlspecialchars($_POST['code_postal']),
                    'ville'=>htmlspecialchars($_POST['ville']),
                    'cadresse'=>htmlspecialchars($_POST['cadresse']),
                    'produits'=>$p_commande,
                    'date'=>htmlspecialchars($date)
                ]);  
            } else {
                $commande = $bdd->prepare("INSERT INTO commande (date, prix_total, livraison, nom, prenom, adresse, code_postal, ville, produits) VALUES (:date, :prix_total, :livraison, :nom, :prenom, :adresse, :code_postal, :ville, :produits");
                $commande->execute([
                    'prix_total'=>htmlspecialchars($_POST['commande_total']),
                    'livraison'=>htmlspecialchars($livraison),
                    'nom'=>htmlspecialchars($_POST['nom']),
                    'prenom'=>htmlspecialchars($_POST['prenom']),
                    'adresse'=>htmlspecialchars($_POST['adresse']),
                    'code_postal'=>htmlspecialchars($_POST['code_postal']),
                    'ville'=>htmlspecialchars($_POST['ville']),
                    'produits'=>$p_commande,
                    'date'=>htmlspecialchars($date)
                ]); 
            }

        } elseif($livraison == 'false'){
            $response = $bdd->prepare("SELECT * FROM utilisateur WHERE id = :id");
            $response->execute([
                'id'=> $panier->getUserId()
            ]);
            $user = $response->fetch();
            $commande = $bdd->prepare("INSERT INTO commande (date, prix_total, livraison, nom, prenom, produits) VALUES (:date, :prix_total, :livraison, :nom, :prenom, :produits)");;

            $commande->execute([
                'prix_total'=>htmlspecialchars($_POST['commande_total']),
                'livraison'=>htmlspecialchars($livraison),
                'nom'=>htmlspecialchars($user['nom']),
                'prenom'=>htmlspecialchars($user['prenom']), 
                'produits'=>$p_commande,
                'date'=>htmlspecialchars($date)
            ]);    
        }

        if ($commande->execute()) {
            $id_commande= $bdd->lastInsertId();
            $id_user = $panier->getUserId();

            $link = $bdd->prepare("INSERT INTO commande_utilisateur (commande_id, utilisateur_id) VALUES (:id_commande, :id_user)");
            $link->execute([
                'id_commande'=>$id_commande,
                'id_user'=>$id_user
            ]);

            if(isset($_SESSION['promo-id'])){
                $code = $bdd->prepare("INSERT INTO commande_reduction (commande_id, reduction_id) VALUES (:c_id, :r_id)");
                $code->execute([
                    'c_id'=>$id_commande,
                    'r_id'=>$_SESSION['promo-id']
                ]);
            }

            $_SESSION['status'] = 'success';
            $_SESSION['message'] = 'Votre commande a bien été passée !';
            $panier = new Panier($user['id']);
            $_SESSION['nb'] = $panier->getTotalItem();
            $_SESSION['panier'] = serialize($panier);
            header("Location: ?page=homepage");
            exit();
        } else {
            $_SESSION['status'] = 'error';
            $_SESSION['message'] = 'Erreur !';
        }
    } 
} else {
    $_SESSION['status'] = 'error';
    $_SESSION['message'] = 'Veuillez vous connecter pour consulter le panier !';
    header("Location: ?page=homepage");
    exit();
}

if(isset($_POST['vide'])){
    $panier = new Panier($_SESSION['id']);
    $_SESSION['panier']= serialize($panier);
    $_SESSION['nb'] = 0;
}