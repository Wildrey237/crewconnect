<?php
session_start();
require '../model/inserer_data.php';
require '../model/recuperer_data.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['content']) && isset($_POST['id_receveur'])) {
        $content = trim($_POST['content']);
        $id_receveur = intval($_POST['id_receveur']);
        $user_id = $_SESSION['user_id'];
        insert_message($content, $user_id, $id_receveur);
    }
}

$user_id = $_SESSION['user_id'];
$messages = recuperer_messages($user_id);
