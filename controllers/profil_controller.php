<?php 

if (!isset($_SESSION['connexion'])) {
    $_SESSION['status'] = 'error';
    $_SESSION['message'] = 'Veuillez vous connecter pour consulter votre profil !';
    header("Location: ?page=login");
    exit();
}

$response=$bdd->prepare("SELECT * FROM utilisateur WHERE id=:id");
$response->execute([":id"=> $_SESSION['id']]);
$user=$response->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars(password_hash($_POST['password'], PASSWORD_DEFAULT));

    $updateQuery = "UPDATE utilisateur SET nom=:nom, prenom=:prenom, email=:email, password=:password  WHERE id=:id";
    $updateStatement = $bdd->prepare($updateQuery);
    $updateStatement->execute([
        'id' => $_SESSION['id'],
        'nom' => $nom,
        'prenom' => $prenom,
        'email' => $email,
        'password' => $password,
    ]);
}