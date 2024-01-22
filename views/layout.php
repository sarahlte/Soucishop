<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soucishop</title>
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;400&family=Poppins:wght@100&display=swap" rel="stylesheet">
</head>
<body>
    <header><?php if(!empty($_SESSION)){
        if ($_SESSION['status']==='connected') {
        ?>
      <div class="navbar-contain">
        <div class="hamburger-menu">
          <input id="menu__toggle" type="checkbox" />
          <label class="menu__btn" for="menu__toggle">
            <span></span>
          </label>

          <ul class="menu__box">
            <li><a class="menu__item" href="?page=homepage">Accueil</a></li>
            <li><a class="menu__item" href="#">Mon profil</a></li>
            <li><a class="menu__item" href="#">Ajouter un produit</a></li>
            <li><a class="menu__item" href="#">Commandes</a></li>
            <li><a class="menu__item" href="#">Chiffre d'affaire</a></li>
            <li><a class="menu__item" href="#">Nous contacter</a></li>
          </ul>
        </div>
        <div class="logopan">
          <a class="panier" href="?page=register">inscription</a>
          <a class="panier" href="?page=login">connexion</a>
          <div class="notif-panier">0</div>
          <a class="panier" href="#">panier</a>
          <img class="logo" src="./assets/logomini.png">
        </div>
      </div>
      <?php }}
        else { ?>
      <div class="navbar-contain">
        <div class="hamburger-menu">
          <input id="menu__toggle" type="checkbox" />
          <label class="menu__btn" for="menu__toggle">
            <span></span>
          </label>

          <ul class="menu__box">
            <li><a class="menu__item" href="?page=homepage">Accueil</a></li>
            <li><a class="menu__item" href="#">Mon profil</a></li>
            <li><a class="menu__item" href="#">Ajouter un produit</a></li>
            <li><a class="menu__item" href="#">Commandes</a></li>
            <li><a class="menu__item" href="#">Chiffre d'affaire</a></li>
            <li><a class="menu__item" href="#">Nous contacter</a></li>
          </ul>
        </div>
        <div class="logopan">
          <a class="panier" href="?page=logout">déconnexion</a>
          <div class="notif-panier">0</div>
          <a class="panier" href="#">panier</a>
          <img class="logo" src="./assets/logomini.png">
        </div>
      </div>
      <?php }?>
    </header>
    <main>
      <?php require './views/' . $route . '_view.php'?>
    </main>
    <footer>
      <div class="footer container">
        Copyright© 2024
      </div>
    </footer>
</body>
</html>