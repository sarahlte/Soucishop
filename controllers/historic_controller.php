<?php

require 'vendor/autoload.php';
use Dompdf\Dompdf;

$utilisateurs = $bdd->prepare("SELECT commande_id FROM commande_utilisateur WHERE utilisateur_id = :utilisateur_id");
$utilisateurs->execute([
    ':utilisateur_id'=>$_SESSION['id'],
]);
$users = $utilisateurs->fetchAll();


if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['consult']) && $_SESSION['id_commande'] = $_POST['consult']){
        header("Location: ?page=consult");
    }else if(isset($_POST['getPdf'])){
        $_SESSION['id_commande'] = $_POST['getPdf'];
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['getPdf'])) {

    try {
        ob_start();
        include 'pdf-print.php';
        $content = ob_get_clean();
        ob_end_clean();

        $dompdf = new Dompdf();
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->loadHtml($content);
        $dompdf->render();
        $dompdf->stream('commande.pdf');
    } catch (Exception $e) {
        echo $e->getMessage();
    }


}