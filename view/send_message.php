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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Chatbox</title>
</head>
<body>
<nav>
    <p class="logo-upper p-3 m-0 border-0 bd-example text-light">WERJ</p>
</nav>

<h1 class="text-center">Messagerie</h1><br>
<div class="container mt-5">
    <div class="row">
        <div class="col-sm-5 m-auto">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-3">
                        <?php foreach ($messages as $message): ?>
                            <div class="message">
                                <?php
                                $sender_name = get_user_name_by_id($message['user_user_id']);
                                ?>
                                <p><strong><?php echo htmlspecialchars($sender_name); ?>
                                        :</strong> <?php echo htmlspecialchars($message['content']); ?></p>
                                <p class="date"><?php echo $message['sent_date']; ?></p>
                            </div>
                        <?php endforeach; ?>
                        <form action="send_message.php?id_user=<?php echo $id_receveur; ?>" method="post">
                            <input type="hidden" name="id_receveur" value="<?php echo $id_receveur; ?>">
                            <input type="text" name="content" placeholder="Entrer votre message" required>
                            <input type="submit" value="Envoyer">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>