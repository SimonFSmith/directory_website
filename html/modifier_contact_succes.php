<?php
	session_start();
    require('log.php');
    require('connect.php');
    $courriel_utilisateur = $_SESSION['courriel'];

    if (!empty($_POST['id']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['telephone']) && !empty($_POST['mobile']) && !empty($_POST['courriel'])) {
		require('connect.php');
		// Déclaration des variables et protection contre les injections SQL
        $id_contact = htmlspecialchars($_POST['id']);
		$nom = htmlspecialchars($_POST['nom']);
		$prenom = htmlspecialchars($_POST['prenom']);
		$telephone = htmlspecialchars($_POST['telephone']);
        $mobile = htmlspecialchars($_POST['mobile']);
        $courriel = htmlspecialchars($_POST['courriel']);
        $courriel_utilisateur = $_SESSION['courriel'];
		// Vérification du format du courriel
		if (!filter_var($courriel, FILTER_VALIDATE_EMAIL)) {
			header('location: inscription.php?error=1&message=Format d\'adresse courriel invalide.');
			exit();
		}
		// Envoie de l'ajout à la base de données
		$request = $conn->prepare("UPDATE contact SET nom = ?, prenom = ?, telephone = ?, mobile = ?, courriel = ?, utilisateur_courriel = ? WHERE id = ?;");
		$request->execute(array($nom, $prenom, $telephone, $mobile, $courriel, $courriel_utilisateur, $id_contact));
		header('location: modifier_contact_succes.php?success=1');
	}
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
                <li class="breadcrumb-item"><a href="./connecte_recherche.php">Rechercher dans mon bottin personnel</a></li>
                <li class="breadcrumb-item"><a href="./resultats_bottin_tous.php">Tous les contacts</a></li>
                <li class="breadcrumb-item active" aria-current="page">Modifier un contact</li>
            </ol>
        </nav>
        <br>
        <?php if(isset($_SESSION['connect'])) {
            ?>
        <div id="formContent">
            <div class="fadeIn first">
                <br>
            </div>
            <form method="post" action="modifier_contact.php">
                <h1>Modifier un contact</h1>
                <br>
                <?php if (isset($_GET['success'])) {
                    echo '<p>Contact modifié avec succès.</p>';
                    echo '<p class="text-center"><a href="resultats_bottin_tous.php">Retourner à tous les contacts</a></p>';
				} ?>
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
