<?php
require 'pdf-print_controller.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div style="background-color: #404040; margin: 20px; color: #f2f2f2;">
    <table style="width: 100%;">
        <thead>
            <tr style="width: 100%; background-color: #f53b22;">
                <td style="padding: 10px; text-transform: uppercase;">produits</td>
                <td style="padding: 10px; text-transform: uppercase;">commandé le</td>
                <td style="padding: 10px; text-transform: uppercase;">prix total</td>
                <td style="padding: 10px; text-transform: uppercase;">reçu le</td>
            </tr>
        </thead>
        <tbody>
        <?php if(isset($commandes)){
            foreach($commandes as $commande):?>
            <tr>
                <td><?= $commande['produits']?></td>
                <td><?= $commande['date']?></td>
                <td><?= $commande['prix_total']?> Є</td>
                <td><?= $commande['recu']?></td>
            </tr>
            <?php endforeach;}?>
        </tbody>
    </table>
</div>
</body>
</html>