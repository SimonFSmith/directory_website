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
                <li class="breadcrumb-item active" aria-current="page">Recherche par département</li>
            </ol>
        </nav>
        <h1>Recherche par département</h1>
        <form method="_GET" action="resultats_recherche_departement.php">
            <div class="input-group mb-3 w-50">
                <input type="text" name="departement" class="form-control" placeholder="Entrez un département" aria_label="Recherche" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Rechercher</button>
                </div>
            </div>
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
