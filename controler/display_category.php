<?php
session_start();
require '../model/inserer_data.php';
require '../model/recuperer_data.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $domain = trim($_POST['domain']);

    $user_id = $_SESSION["user_id"];
    $user = recuperer_userdata($user_id);

}

if ($domain === 'Cinéma') {

require '../view/sous_domaine/cinema_sous_domaine.php';

} else if ($domain === 'Musique') {

    require '../view/sous_domaine/musique_sous_domaine.php';

    } else if ($domain === 'Sport') {

        require '../view/sous_domaine/sport_sous_domaine.php';

    } else if ($domain === 'Gaming') {

        require '../view/sous_domaine/gaming_sous_domaine.php';

    } else if ($domain === 'Littérature') {

        require '../view/sous_domaine/littérature_sous_domaine.php';

    } else {

        require '../view/sous_domaine/informatique_sous_domaine.php';
    }
?>