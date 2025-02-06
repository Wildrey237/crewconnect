<?php
include_once("../controler/verify_session.php");
include '../model/inserer_data.php';
include_once '../model/recuperer_data.php';
verify_session();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CrewConnect - Voir Annonce</title>
    <link rel="stylesheet" href="../style/navbar.css">
    <link rel="stylesheet" href="../style/page_voir_annonce.css">
</head>
<body>
<?php include_once("navbar.php"); ?>
<div class="main">
    <div class="logo">
        <img src="../images/CC Fond BLANC_modifié.jpg" alt="Logo CrewConnect">
    </div>

    <!-- Overlay cliquable redirigeant vers la page d'accueil -->
    <a href="page_accueil.php" class="overlay-background"></a>

    <!-- Pop-up Card -->
    <div class="popup-card">
        <!-- Bouton Favori-->
        <!--        <input type="checkbox" id="favorite-toggle" class="favorite-checkbox">-->
        <!--        <label for="favorite-toggle" class="favorite-button">&#9734;</label>-->
        <?php

        if (user_likes_announce($_SESSION['user_id'], $_GET['id'])) {
            echo '<a href="../controler/like_annonce.php?id=' . $_GET['id'] . '" class="btn btn-danger" style="text-decoration: none">Retirer des favoris 💔</a>';
        } else {
            echo '<a href="../controler/like_annonce.php?id=' . $_GET['id'] . '" class="btn btn-primary" style="text-decoration: none">Ajouter en favoris ❤️</a>';
        }

        ?>
        <?php
        $data = get_annonce_by_id($_GET['id']);
        ?>
        <h1 class="popup-title"><?php echo $data['texte'] ?></h1>

        <h3>Profil souhaité 💯</h3>
        <p class="popup-description">
            <?php echo $data['description'] ?>
        </p>

        <div class="popup-actions">
            <!-- Bouton Accepter et refuser -->
            <a href="../view/send_message.php?id_user=<?php echo $data['user_user_id']; ?>" class="action-button accept-button">&#10004;</a>
            <a href="../controler/display_annonce.php" class="action-button refuse-button">&#10006;</a>
        </div>
    </div>

    <!-- Biographie -->
    <div class="biography">
        <div class="biography-content">
            <h2><?php echo $_SESSION['firstname'], ' ', $_SESSION['name']; ?></h2>
            <p><?php echo $_SESSION['age'], ' ans'; ?></p>
            <p><?php echo $_SESSION['category']; ?></p>
        </div>
    </div>

    <!-- Messages -->
    <div class="messages">
        <div class="messages-content">
            <h2>Messages</h2>
            <?php
            $user_id = $_SESSION['user_id'];
            $conversations = get_conversations($user_id); // Function to get users with whom the current user has had a conversation

            if (empty($conversations)) {
                echo '<p>Aucune discussion trouvée.</p>';
            } else {
                foreach ($conversations as $conversation) {
                    echo '<div class="conversation">';
                    echo '<a href="../view/send_message.php?id_user=' . $conversation['id_receveur'] . '" style="text-decoration: none" >' . htmlspecialchars($conversation['nom']) . ' 📩</a>';
                    echo '</div>';
                }
            }
            ?>
        </div>
    </div>
</div>
</body>
</html>