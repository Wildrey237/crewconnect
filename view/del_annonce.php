<?php
include_once("../controler/verify_session.php");
verify_session();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CrewConnect</title>
    <link rel="stylesheet" href="../style/page_accueil.css">
    <script>
        function confirmDeletion() {
            return confirm("Êtes-vous sûr de vouloir supprimer cette annonce ?");
        }
    </script>
</head>
<body>
<?php include_once("navbar.php"); ?>
<div class="main">
    <div class="logo">
        <img src="../images/CC Fond BLANC_modifié.jpg" alt="Logo CrewConnect">
    </div>

    <?php
    require '../model/recuperer_data.php';
    $announcements = recuperer_annonce_user($_SESSION["user_id"]);;
    ?>

    <div class="announcements">
        <?php foreach ($announcements as $announce): ?>
            <div class="announcement">
                <p>Annonce : <?= htmlspecialchars($announce['texte']) ?></p>
                <form action="../controler/del_annonce.php" method="POST" onsubmit="return confirmDeletion()">
                    <input type="hidden" name="announce_id" value="<?= htmlspecialchars($announce['announce_id']) ?>">
                    <button type="submit" class="delete-button">Supprimer</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>