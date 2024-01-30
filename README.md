# Installation

Ce projet est facilement manipulable. Pour le faire fonctionner, il suffit :

    1. D'installer la base de données nommée "soucishop" dans PhpMyAdmin.

Les dépendances utilisés sont : 

    1. toastr
    2. dompdf

# Documentation

- "Soucishop" est un site permettant à des utilisateurs de commander des sushis, des makis ou des menus mix et de venir les chercher ou se les faire livrer directement.
- La page d'accueil permet de sélectionner le type de produit que l'on souhaite commander.
- Chaque type de produit possède au moins trois produits différents avec, pour les utilisateurs, la possibilité de les ajouter au panier ainsi que celle, pour les admins, de modifier les produits ou de les supprimer.
- Chaque produit a un nom, une description, un prix ainsi qu'une ou plusieurs images (les menus ont un caroussel d'images)
- Chaque produit est constitué d'aliments avec un certain poids et une représentation des calories présentes dans le produit.
- Il faut être connecté pour pouvoir ajouter un produit à son panier et le consulter ou acceder à son historique et son profil.
- Chaque fois qu'un élément est ajouté au panier, le nombre d'éléments présents dans celui-ci s'affiche dans une petite bulle dans la barre de navigation.
- Une fois dans le panier, il est possible de supprimer un produit, d'en augmenter ou en diminuer la quantité, d'ajouter une livraison pour cinq euros, de remplir les champs nécessaires à cette livraison si cette option est choisie, d'utiliser un bon de réduction, de vider entièrement le panier et de payer.
- Une fois la commande passée, elle est inscrite dans la page "mes commandes" qui est l'historique des commandes de l'utilisateur.
- Sur la page de l'historique des commandes, il est possible de consulter le détail de la commande et de l'enregistrer sous format PDF.
- Chaque utilisateur a la possibilité de modifier les informations de son profil.
- Dans la barre de navigation, un bouton "contact" est disponible pour envoyer un message aux administrateurs du site.
- L'administrateur peut :
    1. ajouter / supprimer un produit
    2. ajouter un aliment
    3. ajouter / supprimer un menu
    4. associer une catégorie à un nouveau produit 
    5. associer des aliment à un nouveau produit
    6. associer des produits à un nouveau menu
    7. consulter l'historique des commandes et les marquer comme livrées
    8. consulter son chiffre d'affaire et son bénéfice du jour / des 7 derniers jours sous forme de graphique
    9. consulter ses meilleures ventes des 7 derniers jours sous forme de graphique
    10. Ajouter des code promotionnels et choisir si on veut les rendre effectifs ou pas
- Le site est responsive