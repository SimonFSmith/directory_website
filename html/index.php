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
                <li class="breadcrumb-item active" aria-current="page">Accueil</li>
            </ol>
        </nav>
        <h1>Répertoire du personnel</h1>
        <form method="_GET" action="resultats_recherche.php">
            <div class="input-group mb-3 w-50">
                <input type="text" name="recherche" class="form-control" placeholder="Entrez un prénom" aria_label="Recherche" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Rechercher</button>
                </div>
            </div>
            <br><br>
            <h5>Nouveau sur le site? Cliquez<a href="perdu.php">ici</a>pour en apprendre plus.</h5>
        </form>
    </main>
    <!-- END OF MAIN -->

    <!-- RIGHT SIDE BAR -->
    <?php include "./right_side_bar.php" ?>
    <!-- END OF RIGHT SIDE BAR -->

    <!-- FOOTER -->
    <?php include "./footer.php" ?>
    <!-- END OF FOOTER -->

</body>
</html>