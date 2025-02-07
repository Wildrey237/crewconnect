<?php

function insertdonnee($name, $firstname, $age, $pass, $mail)
{


    $pdo = new PDO("mysql:host=localhost;dbname=crewconnect;charset=utf8", 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Verifier s'il n'existe pas déjà un utilisateur avec le même mail
    $stmt = $pdo->prepare("SELECT mail FROM user WHERE mail = :mail");
    $stmt->bindParam(':mail', $mail);
    $stmt->execute();
    $mail_exist = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($mail_exist)
        return 1;
    else {

        // Préparer et exécuter l'insertion
        $stmt = $pdo->prepare("INSERT INTO user (nom, prenom, age, mdp, mail) VALUES (:name, :firstname, :age, :password, :mail)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':password', $pass);
        $stmt->bindParam(':mail', $mail);
        $stmt->execute();
        return 0;
    }
}


//function insertdomain_user($user_id)
//{
//
//    $pdo = new PDO("mysql:host=localhost;dbname=crewconnect;charset=utf8", 'root', '');
//    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//
//    // Préparer et exécuter l'insertion
//    $stmt = $pdo->prepare("INSERT INTO user (domain_id) VALUES (:domain_id) WHERE user_id = :user_id");
//    $stmt->bindParam(':domain_id', $domain_id);
//    $stmt->bindParam(':user_id', $user_id);
//    $stmt->execute();
//}

function insertannonce($announce, $description, $type, $date)
{

    $pdo = new PDO("mysql:host=localhost;dbname=crewconnect;charset=utf8", 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $user_id = $_SESSION["user_id"];
    // date d'aujourd'hui
//    $date = date('Y-m-d H:i:s');

    // Préparer et exécuter l'insertion
    $stmt = $pdo->prepare("INSERT INTO announce (texte, description, type, user_user_id, date) VALUES (:announce, :description, :type, :user_id, :date)");
    $stmt->bindParam(':announce', $announce);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':type', $type);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':date', $date);
    $stmt->execute();
}

function find_domain_id($domain)
{
    $pdo = new PDO("mysql:host=localhost;dbname=crewconnect;charset=utf8", 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare("SELECT domain_id FROM domain WHERE nom = :domain");
    $stmt->bindParam(':domain', $domain);
    $stmt->execute();
    $domain_id = $stmt->fetch(PDO::FETCH_ASSOC);
    return $domain_id['domain_id'];
}

function insertcategory($category, $domain)
{

    $pdo = new PDO("mysql:host=localhost;dbname=crewconnect;charset=utf8", 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $domain_id = find_domain_id($domain);
    // Préparer et exécuter l'insertion
    $stmt = $pdo->prepare("INSERT INTO category (nom, domain_domain_id) VALUES (:category, :domain_id)");
    $stmt->bindParam(':category', $category);
    $stmt->bindParam(':domain_id', $domain_id);
    $stmt->execute();
}

function find_annonce_by_user($user_id)
{
    $pdo = new PDO("mysql:host=localhost;dbname=crewconnect;charset=utf8", 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare("SELECT texte FROM announce WHERE user_user_id = :user_id");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    $annonce = $stmt->fetch(PDO::FETCH_ASSOC);
    return $annonce;
}

function all_announce()
{
    $pdo = new PDO("mysql:host=localhost;dbname=crewconnect;charset=utf8", 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // list annonce and user
    $stmt = $pdo->prepare("SELECT announce_id, texte, nom FROM announce JOIN user ON user.user_id = announce.user_user_id");
    $stmt->execute();
    $annonce = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $annonce;
}

function modify_announce($id, $texte)
{
    $pdo = new PDO("mysql:host=localhost;dbname=crewconnect;charset=utf8", 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare("UPDATE announce SET texte = :texte WHERE announce_id = :id");
    $stmt->bindParam(':texte', $texte);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

function delete_announce($id)
{
    $pdo = new PDO("mysql:host=localhost;dbname=crewconnect;charset=utf8", 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare("DELETE FROM announce WHERE announce_id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

function add_announce_to_favorites($user_id, $announce_id)
{
    $pdo = new PDO("mysql:host=localhost;dbname=crewconnect;charset=utf8", 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // check if user already likes the article !!
    $stmt = $pdo->prepare("SELECT * FROM favorite WHERE user_user_id = :user_id AND announce_announce_id = :announce_id");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':announce_id', $announce_id);
    $value = $stmt->execute();
    if ($value) {
        $stmt = $pdo->prepare("INSERT INTO favorite (user_user_id, announce_announce_id) VALUES (:user_id, :announce_id)");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':announce_id', $announce_id);
        $stmt->execute();
    } else {//dislike
        $stmt = $pdo->prepare("DELETE FROM favorite WHERE user_user_id = :user_id AND announce_announce_id = :announce_id");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':announce_id', $announce_id);
        $stmt->execute();
    }
}

function add_like($user_id, $announce_id)
{
    $pdo = new PDO("mysql:host=localhost;dbname=crewconnect;charset=utf8", 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare("INSERT INTO `like` (announce_user_user_id, announce_announce_id) VALUES (:user_id, :announce_id)");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':announce_id', $announce_id);
    $stmt->execute();
}

function remove_like($user_id, $announce_id)
{
    $pdo = new PDO("mysql:host=localhost;dbname=crewconnect;charset=utf8", 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare("DELETE FROM `like` WHERE announce_user_user_id = :user_id AND announce_announce_id = :announce_id");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':announce_id', $announce_id);
    $stmt->execute();
}

function user_likes_announce($user_id, $announce_id)
{
    $pdo = new PDO("mysql:host=localhost;dbname=crewconnect;charset=utf8", 'root', '');
    $stmt = $pdo->prepare("SELECT * FROM `like` WHERE announce_user_user_id = :user_id AND announce_announce_id = :announce_id");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':announce_id', $announce_id);
    $stmt->execute();
    return $stmt->fetch() !== false;
}

function insert_message($content, $user_id, $id_receveur)
{
    $pdo = new PDO("mysql:host=localhost;dbname=crewconnect;charset=utf8", 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare("INSERT INTO message (content, sent_date, user_user_id, id_receveur) VALUES (:content, NOW(), :user_id, :id_receveur)");
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':id_receveur', $id_receveur);
    $stmt->execute();
}