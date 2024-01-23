<?php 
require 'bdd.php';

if (isset($_SESSION['role']) && $_SESSION['role']=='admin'){
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['id']) && isset($_POST['token']) && $_POST['token'] === $_SESSION['token']){
        $type = $_POST['type'];
        $req = $bdd->prepare("SELECT * FROM $type WHERE id = :id");
        $req->execute([
            'id'=>$_POST['id']
        ]);
        $item = $req->fetch();
    }

    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['name']) && isset($_POST['token']) && $_POST['token'] === $_SESSION['token']){
        $extension_upload = isset($_FILES['img']) ? strtolower(  substr(  strrchr($_FILES['img']['name'], '.')  ,1)  ): false;
        $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
        if($_POST['type'] == 'produit' && isset($_POST['name']) && isset($_POST['buy_price']) && isset($_POST['sell_price'])){
            $type = $_POST['type'];
            $img = isset($_POST['img']) && in_array($extension_upload,$extensions_valides) ? $_FILES['img']['name'] : $item['img1'];
            $update = $bdd->prepare("UPDATE $type SET nom =:name, prix_achat = :buy_price, prix_vente = :sell_price, img1 = :img WHERE id = :id");
            $update->execute([
                'name'=>$_POST['name'],
                'buy_price'=>$_POST['buy_price'],
                'sell_price'=>$_POST['sell_price'],
                'img'=>$img,
                'id'=>$_POST['id']
            ]);
        } elseif($_POST['type'] == 'produit' && isset($_POST['name']) && isset($_POST['price'])){
            $type = $_POST['type'];
            $img1 = isset($_POST['img1']) && in_array($extension_upload,$extensions_valides) ? $_FILES['img']['name'] : $item['image1'];
            $img2 = isset($_POST['img2']) && in_array($extension_upload,$extensions_valides) ? $_FILES['img']['name'] : $item['image2'];
            $img3 = isset($_POST['img3']) && in_array($extension_upload,$extensions_valides) ? $_FILES['img']['name'] : $item['image3'];
            $update = $bdd->prepare("UPDATE $type SET nom = :name, prix = :price, image1 = :img1, image2 = :img2, image3 = :img3 WHERE id = :id");
            $update->execute([
                'name'=>$_POST['name'],
                'price'=>$_POST['price'],
                'img1'=>$img1,
                'img2'=>$img2,
                'img3'=>$img3,
                'id'=>$_POST['id']
            ]);
        }
    }
}


