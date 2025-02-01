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
    <div class="search__container">
        <div class="search">
            <form action="../controler/display_annonce.php" method="POST">
                <input type="text" class="search__input" placeholder="Rechercher par mot clé" name="nom">
                <button class="search__button" type="submit">
                    <svg class="search__icon" aria-hidden="true" viewBox="0 0 24 24">
                        <g>
                            <path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path>
                        </g>
                    </svg>
                </button>
            </form>
        </div>
    </div>
    <div class="announcement">
        <?php if (empty($announce)) {
            echo '';
        } else {
            foreach ($announce as $key => $value) {
                echo '<div class="announce-container">';
                echo '<h1 class="prenom_user_annonce">', $value['nom'], '</h1>';
                echo '<h3 class="description_user_annonce">', $value['texte'], '</h3>';
                echo '<a href="../view/page_voir_annonce.php" style="text-decoration:none"> <button class="btn_voir_annonce">voir l\'annonce</button> </a>';
                echo '</div>';
            }

        }
        ?>
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
