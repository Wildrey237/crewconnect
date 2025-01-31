<?php
require '../model/inserer_data.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST')
    delete_announce($_POST['announce_id']);


require '../view/del_annonce.php';