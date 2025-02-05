<?php
include_once("../controler/verify_session.php");
verify_session();
include_once '../model/recuperer_data.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Annonces Likées</title>
    <link rel="stylesheet" href="../style/navbar.css">
    <link rel="stylesheet" href="../style/page_accueil.css">
</head>
<body>
<?php include_once("navbar.php"); ?>
<div class="main">
    <div class="logo">
        <img src="../images/CC Fond BLANC_modifié.jpg" alt="Logo CrewConnect">
    </div>
    <div class="announcement">
        <?php
        $user_id = $_SESSION['user_id'];
        $liked_announces = get_annonce_liked_by_user($user_id);

        if (empty($liked_announces)) {
            echo '<p>Aucune annonce likée trouvée.</p>';
        } else {
            foreach ($liked_announces as $announce) {
                echo '<div class="announce-container">';
                echo '<h1 class="prenom_user_annonce">', htmlspecialchars($announce['nom']), '</h1>';
                echo '<h3 class="description_user_annonce">', htmlspecialchars($announce['texte']), '</h3>';
                echo '<a href="page_voir_annonce.php?id=', $announce['announce_id'], '" style="text-decoration:none"> <button class="btn_voir_annonce">Consulter</button> </a>';
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
            <?php
            $conversations = get_conversations($user_id);

            if (empty($conversations)) {
                echo '<p>Aucune discussion trouvée.</p>';
            } else {
                foreach ($conversations as $conversation) {
                    echo '<div class="conversation">';
                    echo '<a href="send_message.php?id_user=' . $conversation['id_receveur'] . '">' . htmlspecialchars($conversation['nom']) . '</a>';
                    echo '</div>';
                }
            }
            ?>
        </div>
    </div>
</div>
</body>
</html>