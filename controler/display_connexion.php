<?php
session_start();
require '../model/recuperer_data.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validation et nettoyage des entrées utilisateur
    $mail = trim($_POST['mail'] ?? '');
    $pass = trim($_POST['password'] ?? '');
    if(empty($mail) || empty($pass)){
        $error_message = "Veuillez remplir tous les champs";
    } else {
        // Récupération des données utilisateur
        $user = user_connexion($mail, $pass);
        if($user){
//            session_start();
            // Stockage des données utilisateur dans la session
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['nom'] = $user['nom'];
            $_SESSION['prenom'] = $user['prenom'];
            $_SESSION['age'] = $user['age'];
            // Redirection vers la page d'accueil
            require '../view/page_accueil.php';
        } else {
            $error_message = "Adresse mail ou mot de passe incorrect";
            require '../view/connexion.php';
        }
    }
}

