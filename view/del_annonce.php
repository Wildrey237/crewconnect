<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CrewConnect</title>
    <link rel="stylesheet" href="../style/page_accueil.css">
</head>
<body>
<?php include_once("navbar.php"); ?>
<div class="main">
    <div class="logo">
        <img src="../images/CC Fond BLANC_modifié.jpg" alt="Logo CrewConnect">
    </div>
    <?php
    require '../model/recuperer_data.php';
    $announce = recuperer_annonce_user($_SESSION["user_id"]);
    ?>
    <div class="del-announcement">
<!--         ici pour appeler la fonction de suppression d'annonce-->
        <form action="del_annonce.php" method="GET">
            <select name="list-announce" id="list-announce">
                <?php
                foreach ($announce as $key => $value) {
                    echo '<option value="', $value['announce_id'], ',', htmlspecialchars($value['texte']), '">', htmlspecialchars($value['texte']), '</option>';
                }
                ?>
            </select>
            <button type="submit" class="post-announcement">Supprimer</button>
        </form>
    </div>
</div>
</body>
</html>