<?php
session_start();
// Par exemple, récupérez ici les informations utilisateur via $_SESSION (firstname, age, category, etc.)
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CrewConnect - Choix de Domaine</title>
  <!-- Inclusion de la navbar pour un style uniforme -->
  <link rel="stylesheet" href="../style/navbar.css">
  <!-- Fond et mise en page de type page d'accueil -->
  <link rel="stylesheet" href="../style/page_accueil.css">
  <!-- Styles spécifiques pour la popup de domaine -->
  <link rel="stylesheet" href="../style/page_domaine.css">
</head>
<body>
  <?php include_once("navbar.php"); ?>
  
  <!-- Fond identique à la page d'accueil -->
  <div class="main">
    <div class="logo">
      <img src="../images/CC Fond BLANC_modifié.jpg" alt="Logo CrewConnect">
    </div>
    
    <!-- Contenu central (vous pouvez laisser vide ou afficher des éléments d'arrière-plan) -->
    <div class="center-content">
      <!-- Vous pouvez éventuellement afficher quelques éléments d'arrière-plan ici -->
    </div>
    
    <div class="biography">
      <div class="biography-content">
        <h2><?php echo $_SESSION['firstname'], ' ', $_SESSION['name']; ?></h2>
        <p><?php echo $_SESSION['age'], ' ans'; ?></p>
      </div>
    </div>
    
    <div class="messages">
      <div class="messages-content">
        <h2>Messages</h2>
        <p>Section des messages (contenu ici).</p>
      </div>
    </div>
  </div>
  
  <!-- Popup overlay affichant le formulaire de domaine -->
  <div class="overlay">
    <div class="popup-form">
      <h2>Choisissez vos options</h2>
      <form action="../controler/display_category.php" method="post">
        <div class="checkbox-wrapper-16-container">
          <div class="checkbox-wrapper-16">
            <label class="checkbox-wrapper">
              <input class="checkbox-input" type="radio" name="domain" value="Musique">
              <span class="checkbox-tile">
                <img class="checkbox-icon" src="https://media.istockphoto.com/id/1431567498/vector/vector-illustration-of-musical-notes-on-white-background.jpg?s=612x612&w=0&k=20&c=E4Qx8E7OJm-itMPylpaZhNIU8mkJQt5XctWlKLLa1I8=" alt="Musique" width="50" height="50">
                <span class="checkbox-label">Musique</span>
              </span>
            </label>
          </div>
          <div class="checkbox-wrapper-16">
            <label class="checkbox-wrapper">
              <input class="checkbox-input" type="radio" name="domain" value="Cinéma">
              <span class="checkbox-tile">
                <img class="checkbox-icon" src="https://media.istockphoto.com/id/1642381175/fr/vectoriel/cin%C3%A9ma.jpg?s=612x612&w=0&k=20&c=obVOGQkJifaPk9lSf1-YrrmNQAQnHbKSCQ1JvnpDO00=" alt="Cinéma" width="50" height="50">
                <span class="checkbox-label">Cinéma</span>
              </span>
            </label>
          </div>
          <div class="checkbox-wrapper-16">
            <label class="checkbox-wrapper">
              <input class="checkbox-input" type="radio" name="domain" value="Sport">
              <span class="checkbox-tile">
                <img src="https://i.pinimg.com/564x/69/04/c5/6904c50c31e4c17736cb021cf63eccaa.jpg" alt="Sport" width="50" height="50">
                <span class="checkbox-label">Sport</span>
              </span>
            </label>
          </div>
          <div class="checkbox-wrapper-16">
            <label class="checkbox-wrapper">
              <input class="checkbox-input" type="radio" name="domain" value="Littérature">
              <span class="checkbox-tile">
                <img class="checkbox-icon" src="https://cdn.discordapp.com/attachments/1166336137997074543/1336322406960201832/d76946d2974ec80ac896055e93c181fd.png?ex=67a362b9&is=67a21139&hm=39789e6222ef62c63ec847887b332f3aab72947f9161a897ea87cd73321e422c&" alt="Littérature" width="50" height="50">
                <span class="checkbox-label">Littérature</span>
              </span>
            </label>
          </div>
          <div class="checkbox-wrapper-16">
            <label class="checkbox-wrapper">
              <input class="checkbox-input" type="radio" name="domain" value="Informatique">
              <span class="checkbox-tile">
                <img src="https://cdn.discordapp.com/attachments/1166336137997074543/1336324535770677248/dx-vector-icon-illustration.png?ex=67a364b5&is=67a21335&hm=510b4189801bfee7dcc28be851141c095aac3487458443693d7021cee900c5da&" alt="informatique" alt="Informatique" width="50" height="50">
                <span class="checkbox-label">Informatique</span>
              </span>
            </label>
          </div>
          <div class="checkbox-wrapper-16">
            <label class="checkbox-wrapper">
              <input class="checkbox-input" type="radio" name="domain" value="Gaming">
              <span class="checkbox-tile">
                <img src="https://icons.veryicon.com/png/o/miscellaneous/ionicons/logo-game-controller-b-1.png" alt="Gaming" width="50" height="50">
                <span class="checkbox-label">Gaming</span>
              </span>
            </label>
          </div>
        </div>
        <button type="submit" class="submit-btn">Valider</button>
      </form>
    </div>
  </div>
</body>
</html>
