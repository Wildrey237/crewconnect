<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CrewConnect</title>
    <link rel="stylesheet" href="../style/page_accueil.css">
</head>
<body>
<?php include_once("navbar.php"); ?>
<div class="main">
    <div class="logo">
        <img src="../images/CC Fond BLANC_modifié.jpg" alt="Logo CrewConnect">
    </div>

    <?php
    $visilibility_list = "visible";
    $visilibility_form = "hidden";
    require '../model/recuperer_data.php';
    $announce = recuperer_annonce_user($_SESSION["user_id"]);
    if (isset($_GET['list-announce'])) {
        $visilibility_list = "hidden";
        $visilibility_form = "visible";
    }
    ?>
    <div class="modify-announcement" style="visibility: <?= $visilibility_list ?>">
        <form action="modify_annonce.php" method="GET">
            <select name="list-announce" id="list-announce">
                <?php
                foreach ($announce as $key => $value) {
                    echo '<option value="', $value['announce_id'], ',', htmlspecialchars($value['texte']), '">', htmlspecialchars($value['texte']), '</option>';
                }
                ?>
            </select>
            <button type="submit" class="post-announcement">Modifier</button>
        </form>
    </div>

    <div class="modify-announcement" style="visibility: <?= $visilibility_form ?>">
        <form action="" method="GET">
            <?php
            if (isset($_GET['list-announce'])) {
                list($announce_id, $texte) = explode(',', $_GET['list-announce']);
            }
            ?>
            <textarea class="text_annonce" name="form-announce" placeholder="<?= isset($texte) ? htmlspecialchars($texte) : '' ?>" required></textarea>
            <div class="announcement-options">
                <button type="submit" class="post-announcement">Poster</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>