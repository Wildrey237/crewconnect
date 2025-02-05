<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ajouter une annonce - CrewConnect</title>
  <!-- Inclusion du style de la navbar -->
  <link rel="stylesheet" href="../style/navbar.css">
  <!-- Inclusion du style spécifique de la page -->
  <link rel="stylesheet" href="../style/add_annonce.css">
</head>
<body>
  <!-- Inclusion de la navbar via include -->
  <?php include_once("navbar.php"); ?>

  <!-- Zone principale à droite de la sidebar -->
  <div class="main-area">
    <!-- Logo en haut -->
    <div class="logo">
      <img src="../images/CC Fond BLANC_modifié.jpg" alt="Logo CrewConnect">
    </div>

    <!-- Conteneur pour le contenu scrollable -->
    <div class="content-wrapper">
      <div class="main-content">
        <!-- Formulaire d'ajout d'annonce (colonne gauche) -->
        <div class="form-container">
          <header class="form-header">
            <h1>Ajouter une annonce</h1>
            <p>Remplissez le formulaire ci-dessous pour publier votre annonce sur CrewConnect.</p>
          </header>

          <form id="annonceForm" action="../controler/display_annonce.php" method="POST" enctype="multipart/form-data">
            <!-- Titre de l'annonce -->
            <div class="form-group">
              <label for="titre">Titre de l'annonce</label>
              <input type="text" id="titre" name="texte" placeholder="Entrez le titre de votre annonce" required>
            </div>

            <!-- Description -->
            <div class="form-group">
              <label for="description">Description</label>
              <textarea id="description" name="description" placeholder="Décrivez votre annonce en détail" rows="5" required></textarea>
            </div>

            <!-- Type d'annonce -->
            <div class="form-group">
              <label>Type d'annonce</label>
              <div class="radio-group">
                <input type="radio" id="duo" name="type" value="Duo" checked>
                <label for="duo">Duo</label>
                <input type="radio" id="groupe" name="type" value="Groupe">
                <label for="groupe">Groupe</label>
              </div>
            </div>

            <!-- Catégorie / Tags (optionnel) -->
            <div class="form-group">
              <label for="tags">Catégorie / Tags</label>
              <input type="text" id="tags" name="tags" placeholder="Ex: Rock, Jazz, Indie">
            </div>

            <!-- Date / Heure (optionnel) -->
            <div class="form-group">
              <label for="date">Date de l'événement</label>
              <input type="date" id="date" name="date">
            </div>
            <div class="form-group">
              <label for="heure">Heure</label>
              <input type="time" id="heure" name="heure">
            </div>

            <!-- Lieu (optionnel) -->
            <div class="form-group">
              <label for="lieu">Lieu</label>
              <input type="text" id="lieu" name="lieu" placeholder="Où se déroulera l'événement ?">
            </div>

            <!-- Boutons de validation -->
            <div class="form-actions">
              <button type="submit" class="submit-button">Publier l'annonce</button>
              <a href="page_accueil.php" class="cancel-button">Annuler</a>
            </div>
          </form>
        </div>

        <!-- Zone d'aperçu de l'annonce (colonne droite) -->
        <div class="preview-container">
          <header>
            <h2>Aperçu de l'annonce</h2>
          </header>
          <div class="preview-ad">
            <h3 class="preview-title">Titre de l'annonce</h3>
            <p class="preview-description">Votre description s'affichera ici en temps réel.</p>
            <p class="preview-type"><strong>Type :</strong> Duo</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Script de prévisualisation (facultatif) -->
  <script>
    const titreInput = document.getElementById('titre');
    const descriptionInput = document.getElementById('description');
    const typeInputs = document.getElementsByName('type');

    const previewTitle = document.querySelector('.preview-title');
    const previewDescription = document.querySelector('.preview-description');
    const previewType = document.querySelector('.preview-type');

    titreInput.addEventListener('input', function() {
      previewTitle.textContent = titreInput.value || "Titre de l'annonce";
    });
    descriptionInput.addEventListener('input', function() {
      previewDescription.textContent = descriptionInput.value || "Votre description s'affichera ici en temps réel.";
    });
    typeInputs.forEach(radio => {
      radio.addEventListener('change', function() {
        const selectedType = document.querySelector('input[name="type"]:checked').value;
        previewType.innerHTML = `<strong>Type :</strong> ${selectedType}`;
      });
    });
  </script>
</body>
</html>
