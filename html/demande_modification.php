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
                <li class="breadcrumb-item active" aria-current="page">Demande de modification au bottin du personnel</li>
            </ol>
        </nav>
        <br>
        <div id="formContent">
            <div class="fadeIn first">
                <br>
            </div>
            <form method="post" action="./demande_envoyee.php">
                <h1 class="smaller-h1">Demande de modification au bottin du personnel</h1>
                <br>
                <input type="text" name="nom" placeholder="Votre nom complet" class="form-control bouton-margin" aria_label="Recherche" aria-describedby="basic-addon2">
                <input type="email" name="courriel" placeholder="Votre adresse courriel" class="form-control bouton-margin" aria_label="Recherche" aria-describedby="basic-addon2">
                <textarea name="message" placeholder="Identifiez l'employé selon les renseignements actuels. Soyez le plus précis possible (Nom complet, ville, bureau, adresse courriel, etc.)"" class="form-control bouton-margin" aria-label="With textarea"></textarea>
                <textarea name="message_modifier" placeholder="Inscrivez les nouveaux renseignements de l'employé." class="form-control bouton-margin" aria-label="With textarea"></textarea>
                <input type="submit" name="Envoyer">
            </form>
        </div>
    </main>
    <!-- END OF MAIN -->

    <!-- FOOTER -->
    <?php include "./footer.php" ?>
    <!-- END OF FOOTER -->

</body>
</html>
