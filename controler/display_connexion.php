<?php
session_start();
require '../model/recuperer_data.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validation et nettoyage des entrées utilisateur
    $nom = trim($_POST['name'] ?? '');
    $pass = trim($_POST['password'] ?? '');

    if (!empty($nom) && !empty($pass)) {
        // Vérification des données utilisateur via la fonction `recuperer_data`
        $user_id = recuperer_id($nom, $pass);
        $user_id = $_SESSION["user_id"];
        $user = recuperer_userdata($user_id);
    }
}

// Affichage du formulaire de connexion
require '../view/page_accueil.php';
?>
