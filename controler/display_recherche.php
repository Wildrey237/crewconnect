<?php
session_start();
require '../model/recuperer_data.php';

// Utilisateur connecter?
if (!isset($_SESSION['user_id'])) {
    header('Location: display_connexion.php');
    exit();
}

// Récupérer les infos comme biographie du User (Optionel)
$user_id = $_SESSION['user_id'];
$user = recuperer_userdata($user_id);

// Si une recherche est soumise
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $query = trim($_POST['query']); // Mot-clé de recherche entré par l'utilisateur
    $annonces = rechercher_annonces($query); // Appel à la fonction dans le modèle
} else {
    $annonces = []; // Sinon, résultat vide
}

// Charger la vue correspondante
require '../view/page_recherche.php';
?>

// ajouter dans recuperer_data

function rechercher_annonces($query)
{
    // Connexion à la base de données
    $db = new PDO("mysql:host=localhost;dbname=crewconnect;charset=utf8", "root", "");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Préparation de la requête pour rechercher les annonces correspondant au mot-clé
    $requete = $db->prepare("SELECT * FROM announce WHERE texte LIKE :query");
    $requete->execute([
        ':query' => '%' . $query . '%' // Recherche partielle dans le champ texte
    ]);

    // Retourner les résultats sous forme de tableau
    return $requete->fetchAll(PDO::FETCH_ASSOC);
}
