<?php
session_start();
require '../model/inserer_data.php';
require '../model/recuperer_data.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = trim($_POST['name']);
    $firstname = trim($_POST['firstname']);
    $age = trim($_POST['age']);
    $pass = trim($_POST['password']);
    $mail = trim($_POST['mail']);

    if(insertdonnee($name, $firstname, $age, $pass, $mail)){
        $user_id = recuperer_id($mail)['user_id'];
        $_SESSION['user_id'] = $user_id;
        $_SESSION['name'] = $name;
        $_SESSION['firstname'] = $firstname;
        $_SESSION['age'] = $age;
        require '../view/formulaire1.php';
    } else {
        $error_message = "Erreur lors de l'inscription, le mail est déjà utilisé";
        require '../view/inscription.php';
    }
}


