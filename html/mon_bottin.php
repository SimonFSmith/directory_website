<?php
	session_start();
    require('log.php');
	// Validation du formulaire
	if(!empty($_POST['courriel']) && !empty($_POST['password'])) {
		require('connect.php');
		// Déclaration des variables
		$courriel = htmlspecialchars($_POST['courriel']);
		$password = htmlspecialchars($_POST['password']);
		// Vérification du format du courriel
		if (!filter_var($courriel, FILTER_VALIDATE_EMAIL)) {
			header('location: mon_bottin.php?error=1&message=Format d\'adresse courriel invalide.');
			exit();
		}
		// Chiffrage du mot de passe
		$salt = sha1($courriel);
		$password = $salt.sha1($password."2232")."1111";
		// Vérification du courriel déjà utilisé
		$request = $conn->prepare("SELECT count(*) as nombre_courriel from utilisateur WHERE courriel = ?");
		$request->execute(array($courriel));
		while ($verif_courriel = $request->fetch()) {
			if ($verif_courriel['nombre_courriel'] != 1) {
				header('location: mon_bottin.php?error=1&message=Connexion impossible_erreurCouriel.');
				exit();
			}
		}
		// 
		$request = $conn->prepare("SELECT * FROM utilisateur WHERE courriel = ?;") or die(print_r($conn->errorinfo()));
		$request->execute(array($courriel));
		while ($utilisateur = $request->fetch()) {
			if ($password == $utilisateur['password']) {
				$_SESSION['connect'] = 1;
				$_SESSION['courriel'] = $utilisateur['courriel'];
                $_SESSION['prenom'] = $utilisateur['prenom'];
                if (isset($_POST['auto'])) {
                    setcookie('auth', $utilisateur['secret'], time()+3600, '/', null, false, true);
                }
				header('location: connecte_recherche.php?success=1');
                exit();
			}
			else {
				header('location: mon_bottin.php?error=1&message=Connexion impossible_erreurMotDePasse.');
				exit();
			}
		}
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

    <!-- MAIN -->
    <main>
        <nav aria-lebel="breadcrumb">
            <ol class="breadcrumb" style="background-color: white;">
                <li class="breadcrumb-item"><a href="./index.php">Accueil</a></li>
                <li class="breadcrumb-item active" aria-current="page">Mon bottin personnel</li>
            </ol>
        </nav>
        <br>

        <div id="login-body">
            <?php if (isset($_SESSION['connect'])) {
            header('location: connecte_recherche.php?success=1');
            exit();?>
            <br><br>
            <small><a href="logout.php">Déconnexion</a></small>
            <?php } else {?>
                <div id="formContent">
                    <div class="fadeIn first">
                        <br>
                    </div>
                        <h1 class="smaller-h1">Connexion</h1>
                        <?php
				            if (isset($_GET['error'])) {
					            // Affichage de l'erreur s'il y en a une
					            if (isset($_GET['message'])) {
						            // Affichage du message s'il y en a un
						            echo '<div class="alerte erreur">Erreur:<br>'.htmlspecialchars($_GET['message']).'</div>';
					            }
				            }
                            elseif (isset($_GET['success'])) {
                                echo '<div class="alerte succes">Vous êtes maintenant connecté.</div>';
                            }
			            ?>
                        <form method="post" action="mon_bottin.php">
                        <input type="email" id="login" class="fadeIn second" name="courriel" placeholder="Adresse courriel" required>
                        <input type="password" id="password" class="fadeIn third" name="password" placeholder="Mot de passe" required>
                        <br>
                        <button type="submit" class="btn btn-primary bouton-margin">Se connecter</button>
                        <br>
                        <label id="option"><input class="form-check-input" type="checkbox" name="auto">Se souvenir de moi</label>

                    </form>
                    <div id="formFooter">
                        <p class="grey">Première visite sur le bottin ? <a href="inscription.php">Inscrivez-vous</a></p>
                    </div>
                    <?php } ?>
                </div>
        </div>
    </main>
    <!-- END OF MAIN -->

    <!-- FOOTER -->
    <?php include "./footer.php" ?>
    <!-- END OF FOOTER -->

</body>
</html>
