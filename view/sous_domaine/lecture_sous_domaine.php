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
        <h2>Dans quoi excellez vous dans la <?php  echo $domain?> ? </h2>
        <div class="checkbox-wrapper-16-container">
            <div class="checkbox-wrapper-16">
                <label class="checkbox-wrapper">
                    <input class="checkbox-input" type="radio" id ="category" name="category" value="Musique">
                    <span class="checkbox-tile">
                        <span class="checkbox-label">Écrivain/Écrivaine</span>
                    </span>
                </label>
            </div>
            <div class="checkbox-wrapper-16">
                <label class="checkbox-wrapper">
                    <input class="checkbox-input" type="radio" name="category" id ="category" value="Cinéma" nombre-colonnes="1">
                    <span class="checkbox-tile">
                        <span class="checkbox-label">Éditeur/Éditrice</span>
                    </span>
                </label>
            </div>
            <div class="checkbox-wrapper-16">
                <label class="checkbox-wrapper">
                    <input class="checkbox-input" type="radio" name="category" id ="category" value="Sport">
                    <span class="checkbox-tile">
                        <span class="checkbox-label">Bibliothécaire</span>
                    </span>
                </label>
            </div>
            <div class="checkbox-wrapper-16">
                <label class="checkbox-wrapper">
                    <input class="checkbox-input" type="radio" name="category" id ="category" value="Lecture">
                    <span class="checkbox-tile">
                        <span class="checkbox-label">Correcteur/Correctrice</span>
                    </span>
                </label>
            </div>
            <div class="checkbox-wrapper-16">
                <label class="checkbox-wrapper">
                    <input class="checkbox-input" type="radio" name="category" id ="category" value="Lecture">
                    <span class="checkbox-tile">
                        <span class="checkbox-label">Traducteur/Traductrice littéraire</span>
                    </span>
                </label>
            </div>
            <div class="checkbox-wrapper-16">
                <label class="checkbox-wrapper">
                    <input class="checkbox-input" type="radio" name="category" id ="category" value="Lecture">
                    <span class="checkbox-tile">
                        <span class="checkbox-label">Critique littéraire</span>
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