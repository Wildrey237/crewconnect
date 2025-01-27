<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CrewConnect</title>
    <link rel="stylesheet" href="../style/page_accueil.css">
</head>
<body>
<div class="sidebar">
    <a href="./display_accueil.php" style="text-decoration:none">
        <button class="titre">CREWCONNECT</button>
    </a>
    <a href="./display_accueil.php" style="text-decoration:none">
        <button>🏠 Accueil</button>
        <a href="./page_explorer.php" style="text-decoration:none">
            <button>🔍 Explorer</button>
        </a>
        <a href="./page_notifications.php" style="text-decoration:none">
            <button>🔔 Notifications</button>
        </a>
        <a href="./page_messages.php" style="text-decoration:none">
            <button>✉️ Messages</button>
        </a>
        <a href="./page_profil.php" style="text-decoration:none">
            <button>👤 Profil</button>
        </a>
        <a href="./page_plus.php" style="text-decoration:none">
            <button>➕ Plus</button>
        </a>
        <div class="post-button">Poster</div>
</div>
<div class="main">
    <div class="logo">
        <img src="../images/CC Fond BLANC_modifié.jpg" alt="Logo CrewConnect">
    </div>
    <div class="create-announcement">
        <form action="./display_annonce.php" method="POST">
            <textarea class="text_annonce" name="announce" placeholder="Faire une annonce..." required></textarea>
            <div class="announcement-options">
                <button type="submit" class="post-announcement">Poster</button>
            </div>
        </form>
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
