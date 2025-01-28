<?php
function recuperer_data($nom, $pass)
{
    // Connexion à la base de données
    $db = new PDO("mysql:host=localhost;dbname=crewconnect;", "root", "");
    // Préparation de la requête
    $requete = $db->prepare("SELECT nom, mdp FROM user WHERE nom = :name AND mdp = :password");
    // Exécution avec les paramètres fournis
    $requete->execute(array(
        ':name' => $nom,
        ':password' => $pass
    ));
    // Retourner le résultat (ou false si aucun résultat)
    return $requete->fetch();;
}

function recuperer_userdata($id)
{
    // Connexion à la base de données
    $db = new PDO("mysql:host=localhost;dbname=crewconnect;", "root", "");
    // Préparation de la requête
    $requete = $db->prepare("SELECT nom, prenom, biographie, age FROM user WHERE user_id = :id");
    // Exécution avec les paramètres fournis
    $requete->execute(array(
        ':id' => $id,
    ));
    // Retourner le résultat (ou false si aucun résultat)
    return $requete->fetch();
}

function recuperer_annonce($annonce)
{
    // Connexion à la base de données
    $db = new PDO("mysql:host=localhost;dbname=crewconnect;", "root", "");
    // Préparation de la requête
    $requete = $db->prepare("SELECT nom, `date`, `type` FROM announce");
    // Exécution avec les paramètres fournis
    $requete->execute(array(
        ':annonce' => $annonce
    ));
    // Retourner le résultat (ou false si aucun résultat)
    return $requete->fetchAll();;
}

function recuperer_id($nom, $pass)
{
    // Connexion à la base de données
    $db = new PDO("mysql:host=localhost;dbname=crewconnect", "root", "");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $requete = $db->prepare("SELECT user_id FROM user WHERE nom = :nom AND mdp = :mdp");

    $requete->execute([
        ':nom' => $nom,
        ':mdp' => $pass,
    ]);


    return $requete->fetch();

}

function recuperer_domain($id)
{
    // Connexion à la base de données
    $db = new PDO("mysql:host=localhost;dbname=crewconnect;", "root", "");
    // Préparation de la requête
    $requete = $db->prepare("SELECT nom FROM domain WHERE user_id = :id");
    // Exécution avec les paramètres fournis
    $requete->execute(array(
        ':id' => $id,
    ));
    // Retourner le résultat (ou false si aucun résultat)
    return $requete->fetch();
}

function recuperer_category($id)
{
    // Connexion à la base de données
    $db = new PDO("mysql:host=localhost;dbname=crewconnect;", "root", "");
    // Préparation de la requête
    $requete = $db->prepare("SELECT nom FROM category WHERE user_id = :id");
    // Exécution avec les paramètres fournis
    $requete->execute(array(
        ':id' => $id,
    ));
    // Retourner le résultat (ou false si aucun résultat)
    return $requete->fetch();
}

//recuperer les annonces par utilisateur
function recuperer_annonce_user($id)
{

    $db = new PDO("mysql:host=localhost;dbname=crewconnect;", "root", "");
    $requete = $db->prepare("SELECT announce_id, texte, date FROM announce WHERE user_user_id = :id");
    $requete->execute(array(
        ':id' => $id,
    ));
    return $requete->fetchAll();
}

?>