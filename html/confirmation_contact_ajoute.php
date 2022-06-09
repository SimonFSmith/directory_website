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
                <li class="breadcrumb-item"><a href="./connecte_recherche.php">Rechercher dans mon bottin</a></li>
                <li class="breadcrumb-item"><a href="./ajouter_contact.php">Ajouter un contact</a></li>
                <li class="breadcrumb-item active" aria-current="page">Contact ajouté</li>
            </ol>
        </nav>
        <br>
        <?php if(isset($_SESSION['connect'])) {?>
        <div id="formContent">
            <div class="fadeIn first">
                <br>
            </div>
            <form>
                <p>Contact ajouté avec succès.</p>
            </form>
            <div id="formFooter">
            
            </div>
        </div>
        <?php } else { ?>
            <div id="formContent">
                <div class="fadeIn first">
                    <br>
                    <h1 class="smaller-h1">Accès interdit</h1>
                    <a href="mon_bottin.php">Cliquez ici pour rejoindre la page de connexion</a>     
                </div>
                <br>
            </div>
        <?php } ?>
    </main>
    <!-- END OF MAIN -->

    <!-- FOOTER -->
    <?php include "./footer.php" ?>
    <!-- END OF FOOTER -->

</body>
</html>
