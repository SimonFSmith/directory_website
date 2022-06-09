<?php
	session_start();
    require('log.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="icon" href="images/logo_without_name.png">
    <title>Bottin - SimonFSmith Security</title>
</head>
<body>

    <!-- HEADER -->
    <?php include "./header.php" ?>
    <!-- END OF HEADER -->

    <!-- MAIN -->
    <main>
        <nav aria-lebel="breadcrumb">
            <ol class="breadcrumb" style="background-color: white;">
                <li class="breadcrumb-item"><a href="./index.php">Accueil</a></li>
                <li class="breadcrumb-item"><a href="./nous_joindre.php">Nous joindre</a></li>
                <li class="breadcrumb-item"><a href="./demande_modification.php">Demande de modification au bottin du personnel</a></li>
                <li class="breadcrumb-item active" aria-current="page">Demande envoyée</li>
            </ol>
        </nav>
        <br>
        <div id="formContent">
            <div class="fadeIn first">
                <?php
                    if(!empty($_POST['nom']) && !empty($_POST['courriel']) && !empty($_POST['message']) && !empty($_POST['message_modifier'])) {
                        $objet = 'Demande de modification au bottin de la part de '.htmlspecialchars($_POST['nom']);
                        $courriel = htmlspecialchars($_POST['courriel']);
                        $message_un = htmlspecialchars($_POST['message']);
                        $message_deux = htmlspecialchars($_POST['message_modifier']);
                        $message = htmlspecialchars($message_un . ' --- ' . $message_deux);
                        $destinataire = 'simfsmith@icloud.com';
                        $retour = mail($destinataire, $objet, $message);
                    }
                    else {
                        echo 'La demande n\'a pas été remplie correctement!<br>
                        <a href="nous_joindre.php">Retourner au formulaire</a>';
                        exit();
                    }
                    echo '<br><p>Votre demande a bien été envoyée!</p><br>';
                ?>
                
            </div>
        </div>
    </main>
    <!-- END OF MAIN -->

    <!-- FOOTER -->
    <?php include "./footer.php" ?>
    <!-- END OF FOOTER -->

</body>
</html>
