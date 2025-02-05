<?php
session_start();
require '../model/inserer_data.php';
require '../model/recuperer_data.php';

if (isset($_GET['id'])) {
    $announce_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];

    if (user_likes_announce($user_id, $announce_id)) {
        remove_like($user_id, $announce_id);
    } else {
        add_like($user_id, $announce_id);
    }
}

header('Location: ../view/page_voir_annonce.php?id=' . $announce_id);
exit();