<?php
include_once("../controler/verify_session.php");
verify_session();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CrewConnect - Voir Annonce</title>
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
      <input type="checkbox" id="favorite-toggle" class="favorite-checkbox">
      <label for="favorite-toggle" class="favorite-button">&#9734;</label>
      
      <h1 class="popup-title">Titre de l'annonce</h1>
      <p class="popup-description">
        Ceci est la description de l'annonce. Les détails seront fournis par la base de données.
      </p>
      
      <div class="popup-actions">
        <!-- Bouton Accepter et refuser -->
        <a href="accepter_annonce.php" class="action-button accept-button">&#10004;</a>
        <a href="refuser_annonce.php" class="action-button refuse-button">&#10006;</a>
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
        <p>Section des messages (contenu ici).</p>
      </div>
    </div>
  </div>
</body>
</html>
