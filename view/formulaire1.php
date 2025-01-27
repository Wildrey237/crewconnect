<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CrewConnect - Domaine</title>
    <link rel="stylesheet" href="../style/formulaire1.css">
</head>
<body>
    <form action="../view/page_domaine.php" method="post">
        <h2><?php  echo $firstname ?>, <b>ton compte a bien été crée ! Qu'est-ce qui t'amène sur CrewConnect ?</b></h2>
        <h4>Nous souhaitons <b>personnaliser votre expérience</b> afin que vous vous sentiez comme chez vous.</h4>
        <div class="box">
        <div class="checkbox-wrapper1">
            <label class="checkbox-wrapper">
                <input class="checkbox-input" type="radio" name="option" id ="option1" value="Lecture">
                    <span class="checkbox-tile">
                        <span class="checkbox-icon">🆘</span>
                        <span class="checkbox-label">Demander de l'aide</span>
                    </span>
            </label>
        </div>
        <div class="checkbox-wrapper2">
            <label class="checkbox-wrapper">
                <input class="checkbox-input" type="radio" name="option" id ="option2" value="Lecture">
                    <span class="checkbox-tile">
                        <span class="checkbox-icon">🤝</span>
                        <span class="checkbox-label">Proposer son aide</span>
                    </span>
            </label>
        </div>
        </div>
        <button type="submit" class="submit-btn">Valider</button>
    </form>
</body>
</html>
