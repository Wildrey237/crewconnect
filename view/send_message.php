<?php
session_start();
require '../model/inserer_data.php';
require '../model/recuperer_data.php';

if (!isset($_SESSION['user_id'])) {
    header("location:../index.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$id_receveur = $_GET['id_user'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['content']) && isset($_POST['id_receveur'])) {
        $content = trim($_POST['content']);
        $id_receveur = intval($_POST['id_receveur']);
        insert_message($content, $user_id, $id_receveur);
    }
}

$messages = recuperer_messages($user_id);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messagerie - CrewConnect</title>
    <link rel="stylesheet" href="../style/navbar.css">
    <link rel="stylesheet" href="../style/page_accueil.css">
</head>
<body>
<?php include_once("navbar.php"); ?>
<div class="main">
    <div class="logo">
        <img src="../images/CC Fond BLANC_modifié.jpg" alt="Logo CrewConnect">
    </div>
    <div class="search__container">
        <div class="messages-content">
            <h2>Messagerie</h2>
            <div class="message-list">
                <?php foreach ($messages as $message): ?>
                    <div class="message">
                        <?php
                        $sender_name = get_user_name_by_id($message['user_user_id']);
                        ?>
                        <p><strong><?php echo htmlspecialchars($sender_name); ?>:</strong> <?php echo htmlspecialchars($message['content']); ?></p>
                        <p class="date"><?php echo $message['sent_date']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
            <form action="send_message.php?id_user=<?php echo $id_receveur; ?>" method="post" class="message-form">
                <input type="hidden" name="id_receveur" value="<?php echo $id_receveur; ?>">
                <input type="text" name="content" placeholder="Entrer votre message" required>
                <input type="submit" value="Envoyer">
            </form>
        </div>
    </div>
</div>
</body>
</html>