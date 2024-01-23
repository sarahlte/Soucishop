<?php

$errors = [];
$errorMessage = '';

if (!empty($_POST)) {
   $name = htmlspecialchars($_POST['nom']);
   $firstname = htmlspecialchars($_POST['prenom']);
   $email = htmlspecialchars($_POST['email']);
   $message = htmlspecialchars($_POST['message']);

    if (empty($name)) {
       $errors[] = 'Veuillez renseigner votre nom.';
   }

    if (empty($firstname)) {
        $errors[] = 'Veuillez renseigner votre prénom.';
    }
   if (empty($email)) {
       $errors[] = 'Veuillez renseigner votre email.';
   } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $errors[] = 'Email invalide';
   }

   if (empty($message)) {
       $errors[] = 'Veuillez remplir le champ "message"';
   }

   /*  if (empty($errors)) {
       $toEmail = 'sarah.leconte@coda-student.school';
       $emailSubject = 'New email from your contact form';
       $headers = ['From' => $email, 'Reply-To' => $email, 'Content-type' => 'text/html; charset=utf-8'];
       $bodyParagraphs = ["Name: {$name}", "Prénom: {$firstname}", "Email: {$email}", "Message:", $message];
       $body = join(PHP_EOL, $bodyParagraphs);

        if (mail($toEmail, $emailSubject, $body, $headers)) {
            $_SESSION['status'] = 'success';
            $_SESSION['message'] = 'Votre message a été envoyé !';
            header("Location: ?page=connexion");
            exit();
        } else {
           $errorMessage = 'Oops, something went wrong. Please try again later';
        }
    } else {
       $allErrors = join('<br/>', $errors);
       $errorMessage = "<p style='color: red;'>{$allErrors}</p>";
    } */
}


