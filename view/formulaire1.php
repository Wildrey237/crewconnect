<?php
// Par exemple, récupérez ici les informations utilisateur via $_SESSION
$firstname = $_SESSION['firstname'] ?? "Utilisateur";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CrewConnect - Choix de Domaine</title>
  <!-- Inclusion de la navbar pour un style uniforme sur toutes les pages -->
  <link rel="stylesheet" href="../style/navbar.css">
  <!-- Inclusion du CSS de la page d'accueil pour afficher le fond réel -->
  <link rel="stylesheet" href="../style/page_accueil.css">
  <!-- CSS spécifique pour la popup du formulaire de domaine -->
  <link rel="stylesheet" href="../style/formulaire.css">
</head>
<body>
  <?php include_once("navbar.php"); ?>
  
  <!-- La page d'accueil est affichée en arrière-plan, réellement -->
  <div class="main">
    <div class="logo">
      <img src="../images/CC Fond BLANC_modifié.jpg" alt="Logo CrewConnect">
    </div>
    
    <!-- Contenu central de la page d'accueil (vous pouvez laisser vide ou ajouter du contenu) -->
    <div class="center-content">
      <!-- Par exemple, du contenu interactif de la page d'accueil -->
    </div>
    
    <!-- Zone Biography -->
    <div class="biography">
      <div class="biography-content">
        <h2><?php echo $_SESSION['firstname'], ' ', $_SESSION['name']; ?></h2>
        <p><?php echo $_SESSION['age'], ' ans'; ?></p>
      </div>
    </div>
    
    <!-- Zone Messages -->
    <div class="messages">
      <div class="messages-content">
        <h2>Messages</h2>
        <p>Section des messages (contenu ici).</p>
      </div>
    </div>
  </div>
  
  <!-- Overlay popup contenant le formulaire de domaine -->
  <div class="overlay">
    <div class="popup-form">
      <h2><?php echo $firstname; ?>, <b>ton compte a bien été crée ! Qu'est-ce qui t'amène sur CrewConnect ?</b></h2>
      <h4>Nous souhaitons <b>personnaliser votre expérience</b> afin que vous vous sentiez comme chez vous.</h4>
      <form action="../view/page_domaine.php" method="post">
        <div class="box">
          <div class="checkbox-wrapper1">
            <label class="checkbox-wrapper">
              <input class="checkbox-input" type="radio" name="option" id="option1" value="Demander de l'aide" required>
              <span class="checkbox-tile">
                <span class="checkbox-icon">🆘</span>
                <span class="checkbox-label">Demander de l'aide</span>
              </span>
            </label>
          </div>
          <div class="checkbox-wrapper2">
            <label class="checkbox-wrapper">
              <input class="checkbox-input" type="radio" name="option" id="option2" value="Proposer son aide">
              <span class="checkbox-tile">
                <span class="checkbox-icon">🤝</span>
                <span class="checkbox-label">Proposer son aide</span>
              </span>
            </label>
          </div>
        </div>
        <!-- Conteneur pour le bouton submit placé en bas -->
        <div class="button-container">
          <button type="submit" class="submit-btn">Valider</button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
