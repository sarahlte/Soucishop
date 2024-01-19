<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soucishop</title>
    <link rel="stylesheet" href="./styles/style.css">
</head>
<body>
    <header>
      <div class="navbar-contain">
        <div class="hamburger-menu">
          <input id="menu__toggle" type="checkbox" />
          <label class="menu__btn" for="menu__toggle">
            <span></span>
          </label>

          <ul class="menu__box">
            <li><a class="menu__item" href="#">Accueil</a></li>
            <li><a class="menu__item" href="#">Mon panier</a></li>
            <li><a class="menu__item" href="#">Mon profil</a></li>
            <li><a class="menu__item" href="#">Ajouter un produit</a></li>
            <li><a class="menu__item" href="#">Commandes</a></li>
            <li><a class="menu__item" href="#">Chiffre d'affaire</a></li>
            <li><a class="menu__item" href="#">Nous contacter</a></li>
          </ul>
        </div>
        <div class="logopan">
          <a class="panier" href="#">inscription</a>
          <a class="panier" href="#">connexion</a>
          <div class="notif-panier">0</div>
          <a class="panier" href="#">panier</a>
          <img class="logo" src="./assets/logo">
        </div>
      </div>
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