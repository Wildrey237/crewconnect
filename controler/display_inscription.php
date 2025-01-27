<?php
session_start();
require '../model/inserer_data.php';
require '../model/recuperer_data.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = trim($_POST['name']);
    $firstname = trim($_POST['firstname']);
    $age = trim($_POST['age']);
    $pass = trim($_POST['password']);

    insertdonnee($name, $firstname, $age, $pass);
    $user_id = recuperer_id($name, $pass)['user_id'];
    $_SESSION['user_id'] = $user_id;

}

require '../view/formulaire1.php';
?>