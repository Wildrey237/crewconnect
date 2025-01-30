<?php
require '../model/inserer_data.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $domain = trim($_POST['option']);
    // put domain in cookie
    setcookie('domain', $domain, time() + 365*24*3600, null, null, false, true);


}

require '../view/page_domaine.php';
?>