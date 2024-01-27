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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.4/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.4/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="./script/basket.js"></script>
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
            <li><a class="menu__item" href="?page=profil">Mon profil</a></li>
            <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'):?>
            <li><a class="menu__item" href="?page=order">Ajouter un produit</a></li>
            <li><a class="menu__item" href="#">Commandes</a></li>
            <li><a class="menu__item" href="#">Chiffre d'affaire</a></li>
            <?php endif ?>
            <li><a class="menu__item" href="?page=contact">Nous contacter</a></li>
          </ul>
          <a class="panier" href="?page=homepage">Accueil</a>
        </div>
        <div class="logopan">
          <?php if(isset($_SESSION['connexion']) && $_SESSION['connexion'] == 'connected'):?>
          <a class="panier" href="?page=logout">deconnexion</a>
          <?php else : ?>
          <a class="panier" href="?page=register">inscription</a>
          <a class="panier" href="?page=login">connexion</a>
          <?php endif; ?>
          <a class="panier" href="?page=basket">panier</a>
          <div class="notif-panier" id="nb-panier" onclick="effectuerAppelAjax()"></div>
          <img class="logo" src="./assets/logomini.png">
        </div>
      </div>
    </header>
    <main>
      <?php require './views/' . $route . '_view.php'?>
    </main>
    <footer class="footer_parent">
      <div class="footer container">
        Copyright© 2024
      </div>
    </footer>
    <?php
    if(ENVIRONMENT === 'developpement'){
      var_dump($_SESSION);
    }
    ?>
    <?php 
    if(!empty ($_SESSION['status'])){ ?>
      <script>
         toastr.<?= $_SESSION['status'] ?>("<?= $_SESSION['message'] ?>")
      </script>
    <?php
  unset ($_SESSION['status']);
  unset ($_SESSION['message']);
   } ?>
</body>
</html>