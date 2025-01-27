<?php
require '../model/inserer_data.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $research = trim($_POST['explorer']);

    insertresearch($research);

}

require '../view/page_recherche.php';
?>