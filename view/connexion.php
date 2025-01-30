<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CrewConnect - Connexion</title>
    <link rel="stylesheet" href="../style/connexion.css">
</head>
<body>
    <a id="close-popup" href="index.php"></a>
        <div class="connexion-container">
            <div class="connexion-card">
                <a href="index.php" class="close-button"></a>
                <h1 class="connexion-title">Connexion</h1>
                    <form class="connexion-form" action="../controler/display_connexion.php" method="POST">
                        <div class="form-group">
                            <label for="Username">Nom </label>
                            <input type="text" id="name" name="name" placeholder="Nom" required>
                        </div>
                        <div class="form-group">
                            <label for="Password">Mot de passe</label>
                            <input type="password" id="password" name="password" placeholder="Mot de passe" required>
                        </div>
                            <button class="btn-submit" type="submit" name="action" value="Se connecter">Se connecter</button>
                    </form>
            </div>
        </div>
</body>
</html>