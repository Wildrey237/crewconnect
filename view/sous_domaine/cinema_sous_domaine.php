<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CrewConnect - Domaine</title>
    <link rel="stylesheet" href="../style/sous_domaine.css">
</head>
<body>
<form action="../controler/display_accueil.php" method="post">
        <h2>Dans quoi excellez vous dans le <?php  echo $domain?> ? </h2>
        <div class="checkbox-wrapper-16-container">
            <div class="checkbox-wrapper-16">
                <label class="checkbox-wrapper">
                    <input class="checkbox-input" type="radio" id ="category" name="category" value="Musique">
                    <span class="checkbox-tile">
                        <span class="checkbox-label">Acteur/Actrice</span>
                    </span>
                </label>
            </div>
            <div class="checkbox-wrapper-16">
                <label class="checkbox-wrapper">
                    <input class="checkbox-input" type="radio" name="category" id ="category" value="Réalisateur" nombre-colonnes="1">
                    <span class="checkbox-tile">
                        <span class="checkbox-label">Réalisateur/Réalisatrice</span>
                    </span>
                </label>
            </div>
            <div class="checkbox-wrapper-16">
                <label class="checkbox-wrapper">
                    <input class="checkbox-input" type="radio" name="category" id ="category" value="Scénariste">
                    <span class="checkbox-tile">
                        <span class="checkbox-label">Scénariste</span>
                    </span>
                </label>
            </div>
            <div class="checkbox-wrapper-16">
                <label class="checkbox-wrapper">
                    <input class="checkbox-input" type="radio" name="category" id ="category" value="Monteur">
                    <span class="checkbox-tile">
                        <span class="checkbox-label">Monteur/Monteuse vidéo</span>
                    </span>
                </label>
            </div>
            <div class="checkbox-wrapper-16">
                <label class="checkbox-wrapper">
                    <input class="checkbox-input" type="radio" name="category" id ="category" value="Directeur de la photographie">
                    <span class="checkbox-tile">
                        <span class="checkbox-label">Directeur/Directrice de la photographie</span>
                    </span>
                </label>
            </div>
            <div class="checkbox-wrapper-16">
                <label class="checkbox-wrapper">
                    <input class="checkbox-input" type="radio" name="category" id ="category" value=">Technicien effets spéciaux">
                    <span class="checkbox-tile">
                        <span class="checkbox-label">Technicien/Technicienne effets spéciaux</span>
                    </span>
                </label>
            </div>
            <div class="sous_domaine_box">
                <input placeholder="Autres ..." class="styled-input" type="text" />
            </div>
            //input hidden to send the domain
            <input type="hidden" name="domain" value="<?php echo $domain?>">
        <button type="submit" class="submit-btn">Valider</button>
    </form>
</body>
</html>