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
    $requete = $db->prepare("SELECT texte, description, type, date, user_user_id FROM announce WHERE announce_id = :id");
    $requete->execute(array(
        ':id' => $id,
    ));
    return $requete->fetch();
}

function get_annonce_liked_by_user($user_id)
{
    $db = new PDO("mysql:host=localhost;dbname=crewconnect;", "root", "");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT a.announce_id, a.texte, a.description, a.type, a.date, u.nom
            FROM announce a
            JOIN `like` l ON a.announce_id = l.announce_announce_id
            JOIN user u ON a.user_user_id = u.user_id
            WHERE l.announce_user_user_id = :user_id";

    $requete = $db->prepare($sql);
    $requete->execute(array(':user_id' => $user_id));

    return $requete->fetchAll(PDO::FETCH_ASSOC);
}

function recuperer_messages($user_id)
{
    $pdo = new PDO("mysql:host=localhost;dbname=crewconnect;charset=utf8", 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare("SELECT content, sent_date, user_user_id, id_receveur FROM message WHERE user_user_id = :user_id OR id_receveur = :user_id ORDER BY sent_date DESC");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function get_conversations($user_id)
{
    $pdo = new PDO("mysql:host=localhost;dbname=crewconnect;charset=utf8", 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare("
        SELECT DISTINCT u.user_id AS id_receveur, u.nom
        FROM message m
        JOIN user u ON m.id_receveur = u.user_id
        WHERE m.user_user_id = :user_id
        UNION
        SELECT DISTINCT u.user_id AS id_receveur, u.nom
        FROM message m
        JOIN user u ON m.user_user_id = u.user_id
        WHERE m.id_receveur = :user_id
    ");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function get_user_name_by_id($user_id)
{
    $db = new PDO("mysql:host=localhost;dbname=crewconnect;", "root", "");
    $requete = $db->prepare("SELECT nom FROM user WHERE user_id = :user_id");
    $requete->execute(array(':user_id' => $user_id));
    return $requete->fetchColumn();
}