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
                <li class="breadcrumb-item"><a href="./mon_bottin.php">Mon bottin personnel</a></li>
                <li class="breadcrumb-item"><a href="./mot_de_passe_oublie.php">Mot de passe oublié</a></li>
                <li class="breadcrumb-item active" aria-current="page">Mot de passe envoyé</li>
            </ol>
        </nav>
        <br>
        <div id="formContent">
            <div class="fadeIn first">
                <br>
            </div>
            <form>
                <p>Mot de passe envoyé avec succès.</p>
            </form>
            <div id="formFooter">
            
            </div>
        </div>
    </main>
    <!-- END OF MAIN -->

    <!-- FOOTER -->
    <?php include "./footer.php" ?>
    <!-- END OF FOOTER -->

</body>
</html>
