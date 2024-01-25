<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    

    $stmt = $bdd->prepare("INSERT INTO contact (nom, prenom, email, message) VALUES (?, ?, ?, ?)");
    $stmt->bindParam(1, $nom, PDO::PARAM_STR);
    $stmt->bindParam(2, $prenom, PDO::PARAM_STR);
    $stmt->bindParam(3, $email, PDO::PARAM_STR);
    $stmt->bindParam(4, $message, PDO::PARAM_STR);

    if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['email']) || empty($_POST['message'])) {
        $_SESSION['status'] = 'error';
        $_SESSION['message'] = 'Veuillez remplir tous les champs demandés';
        header("Location: ?page=contact");
        exit();
    }else if ($stmt->execute()) {
        $_SESSION['status'] = 'success';
        $_SESSION['message'] = 'Votre message nous a été communiqué, nous vous répondrons par mail.';
        header("Location: ?page=homepage");
        exit();
    }
};

// $errors = [];
// $errorMessage = '';

// if (!empty($_POST)) {
//    $name = htmlspecialchars($_POST['nom']);
//    $firstname = htmlspecialchars($_POST['prenom']);
//    $email = htmlspecialchars($_POST['email']);
//    $message = htmlspecialchars($_POST['message']);

//     if (empty($name)) {
//        $errors[] = 'Veuillez renseigner votre nom.';
//    }

//     if (empty($firstname)) {
//         $errors[] = 'Veuillez renseigner votre prénom.';
//     }
//    if (empty($email)) {
//        $errors[] = 'Veuillez renseigner votre email.';
//    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//        $errors[] = 'Email invalide';
//    }

//    if (empty($message)) {
//        $errors[] = 'Veuillez remplir le champ "message"';
//    }

// //     if (empty($errors)) {
// //        $toEmail = 'sarah.leconte@coda-student.school';
// //        $emailSubject = 'New email from your contact form';
// //        $headers = ['From' => 'lecontesarah21@gmail.com', 'Reply-To' => $email, 'Content-type' => 'text/html; charset=utf-8'];
// //        $bodyParagraphs = ["Name: {$name}", "Prénom: {$firstname}", "Email: {$email}", "Message:", $message];
// //        $body = join(PHP_EOL, $bodyParagraphs);

// //         if (mail($toEmail, $emailSubject, $body, $headers)) {
// //             $_SESSION['status'] = 'success';
// //             $_SESSION['message'] = 'Votre message a été envoyé !';
// //             header("Location: ?page=connexion");
// //             exit();
// //         } else {
// //            $errorMessage = 'Oops, something went wrong. Please try again later';
// //         }
// //     } else {
// //        $allErrors = join('<br/>', $errors);
// //        $errorMessage = "<p style='color: red;'>{$allErrors}</p>";
// //     } 
// }