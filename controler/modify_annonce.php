<?php
require '../model/inserer_data.php';
session_start();


if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $texte = trim($_GET['form-announce']);
    $announce_id = $_GET['id_announce'];
    modify_announce($announce_id, $texte);

}
require '../view/page_accueil.php';
