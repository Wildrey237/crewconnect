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
    <div class="create-announcement">
        <form action="../controler/display_annonce.php" method="POST">
            <textarea class="text_annonce" name="announce" placeholder="Faire une annonce..." required></textarea>
            <div class="announcement-options">
                <button type="submit" class="post-announcement">Poster</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>