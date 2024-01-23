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
}
