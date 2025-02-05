<?php


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

function recuperer_id($mail)
{
    // Connexion à la base de données
    $db = new PDO("mysql:host=localhost;dbname=crewconnect", "root", "");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Préparation de la requête
    $requete = $db->prepare("SELECT user_id FROM user WHERE mail = :mail");
    // Exécution avec les paramètres fournis
    $requete->execute(array(
        ':mail' => $mail,
    ));
    // Retourner le résultat (ou false si aucun résultat)
    return $requete->fetch();
}

//fonction de connexion
function user_connexion($mail, $password)
{
    $db = new PDO("mysql:host=localhost;dbname=crewconnect;", "root", "");
    $requete = $db->prepare("SELECT user_id, nom, prenom, age FROM user WHERE mail = :mail AND mdp = :password");
    $requete->execute(array(
        ':mail' => $mail,
        ':password' => $password,
    ));
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

//chere les annonces par mot clé
function recuperer_annonce_mot_cle($mot_cle)
{
    $db = new PDO("mysql:host=localhost;dbname=crewconnect;", "root", "");
    $sql = "SELECT announce_id, announce.announce_id, announce.texte, announce.user_user_id, user.nom as nom
            FROM announce 
            JOIN user ON announce.user_user_id = user.user_id 
            WHERE announce.texte LIKE :mot_cle";
    $requete = $db->prepare($sql);
    $requete->execute(array(
        ':mot_cle' => '%' . $mot_cle . '%',
    ));
    return $requete->fetchAll();
}

function get_annonce_by_id($id)
{
    $db = new PDO("mysql:host=localhost;dbname=crewconnect;", "root", "");
    $requete = $db->prepare("SELECT texte, description, type, date FROM announce WHERE announce_id = :id");
    $requete->execute(array(
        ':id' => $id,
    ));
    return $requete->fetch();
}