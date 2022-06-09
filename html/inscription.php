<?php
	session_start();
	if (!empty($_POST['prenom']) && !empty($_POST['courriel']) && !empty($_POST['password']) && !empty($_POST['password2'])) {
		require('connect.php');
		// Déclaration des variables et protection contre les injections SQL
		$prenom = htmlspecialchars($_POST['prenom']);
		$courriel = htmlspecialchars($_POST['courriel']);
		$password = htmlspecialchars($_POST['password']);
		$password2 = htmlspecialchars($_POST['password2']);
		// Vérification des mots de passe
		if ($password != $password2) {
			// Message d'erreur dans l'URL en cas de mots de passe non identiques
			header('location: inscription.php?error=1&message=Vos mots de passe ne correspondent pas.');
			exit();
		}
		// Vérification du format du courriel
		if (!filter_var($courriel, FILTER_VALIDATE_EMAIL)) {
			header('location: inscription.php?error=1&message=Format d\'adresse courriel invalide.');
			exit();
		}
		// Vérification du courriel déjà utilisé
		$request = $conn->prepare("SELECT count(*) as nombre_courriel from utilisateur WHERE courriel = ?");
		$request->execute(array($courriel));
		while ($verif_courriel = $request->fetch()) {
			if ($verif_courriel['nombre_courriel'] != 0) {
				header('location: inscription.php?error=1&message=Cette adresse courriel est déjà utilisée.');
				exit();
			}
		}
		// Hash du courriel
		$secret = sha1($courriel).time();
		$secret = sha1($secret).time();
		// Chiffrage du mot de passe
		$salt = sha1($courriel);
		$password = $salt.sha1($password."2232")."1111";
		// Envoie de l'inscription à la base de données
		$request = $conn->prepare("INSERT INTO utilisateur(prenom, courriel, password, secret) VALUES (?, ?, ?, ?);");
		$request->execute(array($prenom, $courriel, $password, $secret));
		header('location: inscription.php?success=1');
		exit();
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

<main>
	<nav aria-lebel="breadcrumb">
		<ol class="breadcrumb" style="background-color: white;">
			<li class="breadcrumb-item"><a href="./index.php">Accueil</a></li>
			<li class="breadcrumb-item"><a href="./mon_bottin.php">Mon bottin personnel</a></li>
            <li class="breadcrumb-item active" aria-current="page">Inscription</li>
		</ol>
	</nav>
    <br>
	
	<div id="login-body">
		<div id="formContent">
			<div class="fadeIn first">
				<br>
			</div>
			<h1 class="smaller-h1">S'inscrire</h1>
			<?php
				if (isset($_GET['error'])) {
					// Affichage de l'erreur s'il y en a une
					if (isset($_GET['message'])) {
						// Affichage du message s'il y en a un
						echo '<div class="alerte erreur">Erreur:<br>'.htmlspecialchars($_GET['message']).'</div>';
					}
				}
				elseif (isset($_GET['success'])) {
					echo '<div class="alerte succes">Vous êtes maintenant inscrit.<a class="blanc" href="mon_bottin.php"> Connectez-vous!</a></div>';
				}
			?>
			<form method="post" action="inscription.php">
				<input type="text" id="login" class="fadeIn second" name="prenom" placeholder="Prénom" required />
				<input type="email" id="login" class="fadeIn second" name="courriel" placeholder="Adresse courriel" required />
				<input type="password" id="password" class="fadeIn third" name="password" placeholder="Mot de passe" required />
				<input type="password" id="password" class="fadeIn third" name="password2" placeholder="Retapez votre mot de passe" required />
				<button type="submit" class="btn btn-primary bouton-margin">S'inscrire</button>
			</form>
			<div id="formFooter">
				<p class="grey">Déjà inscrit au bottin?<a href="mon_bottin.php">Connectez-vous</a></p>
            </div>
		</div>
	</div>
</main>

    <!-- FOOTER -->
    <?php include "./footer.php" ?>
    <!-- END OF FOOTER -->

</body>
</html>