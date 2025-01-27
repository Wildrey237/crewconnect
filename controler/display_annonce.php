<?php
session_start();
require '../model/inserer_data.php';
require '../model/recuperer_data.php';
$announce = all_announce();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $announce = trim($_POST['announce']);  
    $user_id = $_SESSION["user_id"];
    $user = recuperer_userdata($user_id);
    $category = recuperer_category($user_id);
    insertannonce($announce);
    $announce = all_announce();

}

require '../view/page_accueil.php';
?>