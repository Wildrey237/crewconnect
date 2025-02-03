<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CrewConnect - Inscription</title>
    <link rel="stylesheet" href="../style/inscription.css">
</head>
<body>
<a id="close-popup" href="index.php"></a>
<div class="inscription-container">
    <div class="inscription-card">
        <a href="../view/index.php" class="close-button"></a>
        <h1 class="inscription-title">Inscription</h1>
        <?php if (isset($error_message)): ?>
            <p class="error-message"><?php echo $error_message; ?></p>
        <?php endif; ?>
        <form class="inscription-form" action="../controler/display_inscription.php" method="POST">
            <div class="form-group">
                <label for="Mail">Adresse mail</label>
                <input type="email" id="mail" name="mail" placeholder="Adresse mail" required>
            </div>
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" id="name" name="name" placeholder="Nom" required>
            </div>
            <div class="form-group">
                <label for="first_name">Prénom</label>
                <input type="text" id="firstname" name="firstname" placeholder="Prénom" required>
            </div>
            <div class="form-group">
                <label for="age">Âge</label>
                <input type="number" id="age" name="age" placeholder="Âge" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="Mot de passe" required>
            </div>
            <button class="btn-submit" type="submit" name="action" value="Se connecter">S'inscrire</button>
        </form>
    </div>
</div>
</body>
</html>