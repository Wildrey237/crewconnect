<?php
require '../model/inserer_data.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $announce = trim($_POST['announce']);
    $user_id = $_SESSION["user_id"];
    $announce = recuperer_annonce_user($_SESSION["user_id"]);
    $is_visible = 1;

}
require '../view/modify_annonce.php';
