<?php
require '../model/inserer_data.php';
require '../model/recuperer_data.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category = trim($_POST['category']);
    $domain = trim($_POST['domain']);

    insertcategory($category, $domain);

    $user_id = $_SESSION["user_id"];
    $user = recuperer_userdata($user_id);

}
require '../view/page_accueil.php';


?>