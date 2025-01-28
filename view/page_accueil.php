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
    <div class="announcement">
        <?php if (empty($announce)) {
            echo '';
        } else {
            foreach ($announce as $key => $value) {
                echo '<div class="announce-container">';
                echo '<h1 class="prenom_user_annonce">', $value['nom'], '</h1>';
                echo '<h3 class="description_user_annonce">', $value['texte'], '</h3>';
                echo '<button class="voir_annonce">voir l\'annonce</button>';
                echo '</div>';
            }

        }
        ?>
    </div>
    <div class="biography">
        <div class="biography-content">
            <h2><?php echo $user['prenom'], ' ', $user['nom'] ?></h2>
            <p><?php echo $user['age'], ' ans' ?></p>
            <p><?php echo $category ?></p>
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
