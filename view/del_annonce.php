<?php
include_once("../controler/verify_session.php");
verify_session();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Supprimer une annonce - CrewConnect</title>
  <link rel="stylesheet" href="../style/navbar.css">
  <link rel="stylesheet" href="../style/del_annonce.css">
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
    $announcements = recuperer_annonce_user($_SESSION["user_id"]);
    ?>

    <div class="announcements">
      <?php foreach ($announcements as $announce): ?>
        <div class="announcement">
          <p>Annonce : <?= htmlspecialchars($announce['texte']) ?>  </p>
          <form action="../controler/del_annonce.php" method="POST" onsubmit="return confirmDeletion()">
            <input type="hidden" name="announce_id" value="<?= htmlspecialchars($announce['announce_id']) ?>">
            <button type="submit" class="delete-button"><img type="button"class="button" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSgy6cH4pk8uBtQ-_MBHx5MtDO8ms62KxR0UQ&s" width="28" height="35"></button>
          </form>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</body>
</html>
