<?php
include_once("../controler/verify_session.php");
verify_session();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modifier une annonce - CrewConnect</title>
  <link rel="stylesheet" href="../style/navbar.css">
  <link rel="stylesheet" href="../style/modify_annonce.css">
  <script>
    function confirmModification() {
      return confirm("Êtes-vous sûr de vouloir modifier cette annonce ?");
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
    // Récupération des annonces de l'utilisateur
    require '../model/recuperer_data.php';
    $announce = recuperer_annonce_user($_SESSION["user_id"]);
    // Par défaut, on affiche la liste
    $visibility_list = "visible";
    $visibility_form = "hidden";
    if (isset($_GET['list-announce'])) {
      $visibility_list = "hidden";
      $visibility_form = "visible";
    }
    ?>

    <div class="modify-announcement" style="visibility: <?= $visibility_list ?>">
      <form action="modify_annonce.php" method="GET">
        <select name="list-announce" id="list-announce">
          <?php
          foreach ($announce as $value) {
            echo '<option value="', $value['announce_id'], ',', htmlspecialchars($value['texte']), '">',
                 htmlspecialchars($value['texte']), '</option>';
          }
          ?>
        </select>
        <button type="submit" class="post-announcement">Modifier</button>
      </form>
    </div>

    <div class="modify-announcement" style="visibility: <?= $visibility_form ?>">
      <form action="../controler/modify_annonce.php" method="GET" onsubmit="return confirmModification()">
        <?php
        if (isset($_GET['list-announce'])) {
          list($announce_id, $texte) = explode(',', $_GET['list-announce']);
        }
        ?>
        <textarea class="text_annonce" name="form-announce" required><?= isset($texte) ? htmlspecialchars($texte) : '' ?></textarea>
        <input type="hidden" name="id_announce" value="<?= $announce_id ?>">
        <div class="announcement-options">
          <button type="submit" class="post-announcement">Poster</button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
