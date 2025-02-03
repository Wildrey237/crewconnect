<?php
session_start();
require '../model/inserer_data.php';
require '../model/recuperer_data.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nom'])) {
        $announce = recuperer_annonce_mot_cle($_POST['nom']);
    } else {
        $announce = trim($_POST['texte']);
        $description = trim($_POST['description']);
        $type = trim($_POST['type']);
        $user_id = $_SESSION["user_id"];
        $date = $_POST['date'];
        $user = recuperer_userdata($user_id);
        insertannonce($announce, $description, $type, $date);
        $announce = all_announce();
    }

} else {
    $announce = all_announce();
}

require '../view/page_accueil.php';
