<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href='pdf_controller.php'>index</a>
    <table>
        <thead>
            <tr>
                <td>produits</td>
                <td>commandé le</td>
                <td>prix total</td>
                <td>reçu le</td>
            </tr>
        </thead>
        <tbody>
        <?php if(isset($commandes)){
            foreach($commandes as $commande):?>
            <tr>
                <td><?= $commande['produits']?></td>
                <td><?= $commande['date']?></td>
                <td><?= $commande['prix_total']?></td>
                <td><?= $commande['recu']?></td>
            </tr>
            <?php endforeach;}?>
        </tbody>
    </table>
</body>
</html>