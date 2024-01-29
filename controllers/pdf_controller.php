<?php
require 'vendor/autoload.php';
use Dompdf\Dompdf;

$reqs = $bdd->prepare("SELECT * FROM commande WHERE id = :id");
$reqs->execute([
    'id' => $_SESSION['id_commande'],
]);
$commandes = $reqs->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['getPdf'])) {


    try {
        ob_start();
        include __DIR__ . '/pdf_view.php';
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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href='pdf_view.php'>commande</a>

    <a href='?getPdf' target="_blank">table PDf</a>

    https://github.com/dompdf/dompdf<br>
    https://www.php.net/manual/fr/function.ob-start.php
</body>
</html>