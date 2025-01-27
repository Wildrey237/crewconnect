<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CrewConnect</title>
    <link rel="stylesheet" href="../style/page_recherche.css">
</head>
<body>
    <div class="sidebar">
        <a href="./page_accueil.php" style="text-decoration:none"><button class="titre">CREWCONNECT</button></a>
        <a href="./page_accueil.php" style="text-decoration:none"><button>🏠 Accueil</button>
        <a href="./page_recherche.php" style="text-decoration:none"><button>🔍 Explorer</button></a>
        <a href="./page_notifications.php" style="text-decoration:none"><button>🔔 Notifications</button></a>
        <a href="./page_messages.php" style="text-decoration:none"><button>✉️ Messages</button></a>
        <a href="./page_profil.php" style="text-decoration:none"><button>👤 Profil</button></a>
        <a href="./page_plus.php" style="text-decoration:none"><button>➕ Plus</button></a>
        <div class="post-button">Poster</div>
    </div>
    <div class="main">
        <div class="logo">
            <img src="../images/CC Fond BLANC_modifié.jpg" alt="Logo CrewConnect">
        </div>
        <input class="search-bar" type="text" placeholder=" 🔍 Rechercher...">
        <div class="announcement">
            <div class="annonce_container">
                <h1 class="prenom_user_annonce"> MOCTAR <!--<?php  echo $firstname ?>--></h1>
                <h3 class="description_user_annonce"> Recherche d'un guitariste pour une fête d'anniversaire </h3>
                <button class="voir_annonce">voir l'annonce</button>
            </div>
            <div class="annonce_container">
                <h1 class="prenom_user_annonce"> IDIR <!--<?php  echo $firstname ?>--></h1>
                <h3 class="description_user_annonce"> Recherche d'un beat maker pour produire un nouvel album "PLATA O PLOMO" </h3>
                <button class="voir_annonce">voir l'annonce</button>
            </div>
            <div class="annonce_container">
                <h1 class="prenom_user_annonce"> IC <!--<?php  echo $firstname ?>--></h1>
                <h3 class="description_user_annonce"> Recherche d'une chanteuse pour créer un groupe de musique nommé "The Mandem" </h3>
                <button class="voir_annonce">voir l'annonce</button>
            </div>
            <div class="annonce_container">
                <h1 class="prenom_user_annonce"> YOUSSEF <!--<?php  echo $firstname ?>--></h1>
                <h3 class="description_user_annonce"> Recherche d'un directeur artistique </h3>
                <button class="voir_annonce">voir l'annonce</button>
            </div>
            <div class="annonce_container">
                <h1 class="prenom_user_annonce">PIERRE <!--<?php  echo $firstname ?>--></h1>
                <h3 class="description_user_annonce"> Recherche d'un Arbitre</h3>
                <button class="voir_annonce">voir l'annonce</button>
            </div>
        </div>
    </div>
</body>
</html>
