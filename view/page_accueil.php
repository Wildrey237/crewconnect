<?php
include_once("../controler/verify_session.php");
verify_session();
?>
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
    <!--    recherche par mot clès-->
    <div class="search">
        <form action="../controler/display_annonce.php" method="POST">
            <input type="text" name="nom" placeholder="Rechercher par mot clé">
            <button type="submit">Rechercher</button>
        </form>
    </div>
    <div class="announcement">
        <form name="handle_announce" action="../controler/handle_announce.php" method="POST">
            <?php if (empty($announce)) {
                echo '';
            } else {
                foreach ($announce as $key => $value) {
                    //input hidden pour récupérer les id des annonces
                    echo '<input type="hidden" name="id_annonce" value="', $value['id_annonce'], '">';
                    echo '<div class="announce-container">';
                    echo '<h1 class="prenom_user_annonce">', $value['nom'], '</h1>';
                    echo '<h3 class="description_user_annonce">', $value['texte'], '</h3>';
                    echo '<button class="btn_voir_annonce">voir l\'annonce</button>';
                    echo '</div>';
                }

            }
            ?>
        </form>
    </div>
    <div class="biography">
        <div class="biography-content">
            <h2><?php echo $_SESSION['firstname'], ' ', $_SESSION['name'] ?></h2>
            <p><?php echo $_SESSION['age'], ' ans' ?></p>
            <p><?php echo $_SESSION['category'] ?></p>
        </div>
    </div>
    <div class="messages">
        <div class="messages-content">
            <h2>Messages</h2>
            <p>Section des messages (contenu ici).</p>
        </div>
    </div>
</div>
</body>
</html>
