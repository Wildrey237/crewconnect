<?php
require '../model/inserer_data.php';


if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $texte = trim($_GET['texte']);
    $user_id = $_SESSION["user_id"];
    modify_announce($user_id, $texte);

}
require '../view/page_accueil.php';
