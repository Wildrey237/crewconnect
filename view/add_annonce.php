<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ajouter une annonce - CrewConnect</title>
  <link rel="stylesheet" href="../style/add_annonce.css">
  <!-- Vous pouvez inclure ici un lien vers une bibliothèque d'icônes comme FontAwesome -->
</head>
<body>
  <!-- La sidebar (navbar) est incluse et positionnée à gauche -->
  <?php include_once("navbar.php"); ?>

  <!-- Zone principale (à droite de la sidebar) -->
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
              <input type="text" id="texte" name="texte" placeholder="Entrez le titre de votre annonce" required>
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
                <input type="radio" id="Duo" name="type" value="Duo" checked>
                <label for="duo">Duo</label>
                <input type="radio" id="Groupe" name="type" value="Groupe">
                <label for="groupe">Groupe</label>
                <!-- D'autres options pourront être ajoutées ici -->
              </div>
            </div>

            <!-- Catégorie ou Tags (optionnel) -->
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
            <!-- Vous pouvez ajouter d'autres éléments de prévisualisation ici -->
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Script pour la mise à jour en temps réel de la prévisualisation -->
  <script>
    // Récupération des éléments du formulaire et de la preview
    const titreInput = document.getElementById('texte');
    const descriptionInput = document.getElementById('description');
    const typeInputs = document.getElementsByName('type');

    const previewTitle = document.querySelector('.preview-title');
    const previewDescription = document.querySelector('.preview-description');
    const previewType = document.querySelector('.preview-type');

    // Mise à jour en temps réel du titre
    titreInput.addEventListener('input', function() {
      previewTitle.textContent = titreInput.value || "Titre de l'annonce";
    });

    // Mise à jour en temps réel de la description
    descriptionInput.addEventListener('input', function() {
      previewDescription.textContent = descriptionInput.value || "Votre description s'affichera ici en temps réel.";
    });

    // Mise à jour du type d'annonce
    typeInputs.forEach(radio => {
      radio.addEventListener('change', function() {
        const selectedType = document.querySelector('input[name="type"]:checked').value;
        previewType.innerHTML = `<strong>Type :</strong> ${selectedType.charAt(0).toUpperCase() + selectedType.slice(1)}`;
      });
    });
  </script>
</body>
</html>
