<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CrewConnect - Sport</title>
  <!-- Inclusion de la navbar pour avoir la même navigation sur toutes les pages -->
  <link rel="stylesheet" href="../style/navbar.css">
  <!-- Utilisation du CSS de la page d'accueil pour le fond interactif -->
  <link rel="stylesheet" href="../style/page_accueil.css">
  <!-- CSS spécifique pour le style popup de domaine -->
  <link rel="stylesheet" href="../style/sous_domaine.css">
</head>
<body>
  <?php include_once("../view/navbar.php"); ?>
  
  <!-- Fond interactif identique à la page d'accueil -->
  <div class="main">
    <div class="logo">
      <img src="../images/CC Fond BLANC_modifié.jpg" alt="Logo CrewConnect">
    </div>
    
    <!-- Contenu central (ici vide pour laisser toute l'attention sur la popup) -->
    <div class="center-content">
      <!-- Vous pouvez ajouter ici éventuellement des éléments d'arrière-plan -->
    </div>
    
    <div class="biography">
      <div class="biography-content">
        <h2><?php echo $_SESSION['firstname'], ' ', $_SESSION['name']; ?></h2>
        <p><?php echo $_SESSION['age'], ' ans'; ?></p>
        <p><?php echo $domain ?></p>
      </div>
    </div>
    
    <div class="messages">
      <div class="messages-content">
        <h2>Messages</h2>
        <p>Section des messages (contenu ici).</p>
      </div>
    </div>
  </div>
  
  <!-- Overlay popup affichant le formulaire de domaine -->
  <div class="overlay">
    <div class="popup-form">
    <h2>Dans quoi excellez vous dans le <?php  echo $domain?> ? </h2>
        <form action="../controler/display_accueil.php" method="post">
        <div class="checkbox-wrapper-16-container">
            <div class="checkbox-wrapper-16">
                <label class="checkbox-wrapper">
                    <input class="checkbox-input" type="radio" id ="category" name="category" value="Sport">
                    <span class="checkbox-tile">
                        <span class="checkbox-label">Athlète professionnel</span>
                    </span>
                </label>
            </div>
            <div class="checkbox-wrapper-16">
                <label class="checkbox-wrapper">
                    <input class="checkbox-input" type="radio" name="category" id ="category" value="Sport" nombre-colonnes="1">
                    <span class="checkbox-tile">
                        <span class="checkbox-label">Coach sportif</span>
                    </span>
                </label>
            </div>
            <div class="checkbox-wrapper-16">
                <label class="checkbox-wrapper">
                    <input class="checkbox-input" type="radio" name="category" id ="category" value="Sport">
                    <span class="checkbox-tile">
                        <span class="checkbox-label">Arbitre / Juge</span>
                    </span>
                </label>
            </div>
            <div class="checkbox-wrapper-16">
                <label class="checkbox-wrapper">
                    <input class="checkbox-input" type="radio" name="category" id ="category" value="Sport">
                    <span class="checkbox-tile">
                        <span class="checkbox-label">Préparateur physique</span>
                    </span>
                </label>
            </div>
            <div class="checkbox-wrapper-16">
                <label class="checkbox-wrapper">
                    <input class="checkbox-input" type="radio" name="category" id ="category" value="Sport">
                    <span class="checkbox-tile">
                        <span class="checkbox-label">Kinésithérapeute du sport</span>
                    </span>
                </label>
            </div>
            <div class="checkbox-wrapper-16">
                <label class="checkbox-wrapper">
                    <input class="checkbox-input" type="radio" name="category" id ="category" value="Sport">
                    <span class="checkbox-tile">
                        <span class="checkbox-label">Journaliste sportif</span>
                    </span>
                </label>
            </div>
            <!-- Option : Autres -->
          <div class="sous_domaine_box">
            <input placeholder="Autres ..." class="styled-input" type="text" name="autre">
          </div>
        </div>
        <!-- Input hidden pour envoyer le domaine -->
        <input type="hidden" name="domain" value="<?php echo $domain; ?>">
        <button type="submit" class="submit-btn">Valider</button>
      </form>
    </div>
  </div>
</body>
</html>