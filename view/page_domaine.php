<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CrewConnect - Domaine</title>
    <link rel="stylesheet" href="../style/page_domaine.css">
</head>
<body>
<form action="../controler/display_category.php" method="post">
    <h2>Choisissez vos options</h2>
    <div class="checkbox-wrapper-16-container">
        <div class="checkbox-wrapper-16">
            <label class="checkbox-wrapper">
                <input class="checkbox-input" type="radio" id="domain" name="domain" value="Musique">
                <span class="checkbox-tile">
                        <img class="checkbox-icon" src="https://img.icons8.com/ios-filled/50/000000/musical-notes.png"
                             alt="musique" width="50" height="50">
                        <span class="checkbox-label">Musique</span>
                    </span>
            </label>
        </div>
        <div class="checkbox-wrapper-16">
            <label class="checkbox-wrapper">
                <input class="checkbox-input" type="radio" name="domain" id="domain" value="Cinéma" nombre-colonnes="1">
                <span class="checkbox-tile">
                        <img class="checkbox-icon" src="https://img.icons8.com/?size=100&id=623&format=png&color=000000"
                             alt="musique" width="50" height="50">
                        <span class="checkbox-label">Cinéma</span>
                    </span>
            </label>
        </div>
        <div class="checkbox-wrapper-16">
            <label class="checkbox-wrapper">
                <input class="checkbox-input" type="radio" name="domain" id="domain" value="Sport">
                <span class="checkbox-tile">
                        <img src="https://img.icons8.com/?size=100&id=LDze7ETPiEDu&format=png&color=000000" alt="sport"
                             width="50" height="50">
                        <span class="checkbox-label">Sport</span>
                    </span>
            </label>
        </div>
        <div class="checkbox-wrapper-16">
            <label class="checkbox-wrapper">
                <input class="checkbox-input" type="radio" name="domain" id="domain" value="Lecture">
                <span class="checkbox-tile">
                        <img class="checkbox-icon" src="https://img.icons8.com/ios-filled/50/000000/book.png"
                             alt="ordniateur" width="50" height="50">
                        <span class="checkbox-label">Lecture</span>
                    </span>
            </label>
        </div>
        <div class="checkbox-wrapper-16">
            <label class="checkbox-wrapper">
                <input class="checkbox-input" type="radio" name="domain" id="domain" value="informatique">
                <span class="checkbox-tile">
                        <img src="https://img.icons8.com/?size=100&id=9911&format=png&color=000000" alt="informatique"
                             width="50" height="50">
                        <span class="checkbox-label">Informatique</span>
                    </span>
            </label>
        </div>
        <div class="checkbox-wrapper-16">
            <label class="checkbox-wrapper">
                <input class="checkbox-input" type="radio" name="domain" id="domain" value="Gaming">
                <span class="checkbox-tile">
                        <img src="https://img.icons8.com/ios-filled/50/000000/controller.png" alt="gaming" width="50"
                             height="50">
                        <span class="checkbox-label"> Gaming</span>
                    </span>
            </label>
        </div>
        <button type="submit" class="submit-btn">Valider</button>
</form>
</body>
</html>