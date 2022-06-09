<?php
	session_start();
    require('log.php');
    require('connect.php');
    $courriel_utilisateur = $_SESSION['courriel'];
    $request = $conn->prepare("SELECT * FROM contact WHERE utilisateur_courriel = ?");
    $request->execute(array($courriel_utilisateur));
    $no=$request->rowCount();

    if (!empty($_POST['id'])) {
		// Déclaration des variables et protection contre les injections SQL
		$id = htmlspecialchars($_POST['id']);
		// Envoie de la suppression à la base de données
		$request = $conn->prepare("DELETE FROM contact WHERE id = ? and utilisateur_courriel = ?;");
		$request->execute(array($id, $courriel_utilisateur));
		header('location: resultats_bottin_tous.php?success=1');
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
            <li class="breadcrumb-item"><a href="./mon_bottin.php">Mon bottin personnel</a></li>
            <li class="breadcrumb-item"><a href="./connecte_recherche.php">Rechercher dans mon bottin personnel</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tous les contacts</li>
            </ol>
        </nav>
        <br>
        <?php if(isset($_SESSION['connect'])) {?>

            <div class="fadeIn first">
                <br>
            </div>
            <form>
                <h1 class="smaller-h1 text-center">Tous les contacts</h1>
                <br>
                <?php if (empty($no)) {
                            echo '<p class="text-center">Il n\'y a aucun contact dans votre bottin.</p>';
                        }
                        else {
                            echo '<table id="table_center" class="table table-hover">
                                    <tr>
                                    <th>ID</th>
                                    <th>Prénom</th>
                                    <th>Nom de famille</th>
                                    <th>Téléphone</th>
                                    <th>Mobile</th>
                                    <th>Courriel</th>
                                    </tr>';
                            while ($data = $request->fetch()) {
                                echo '<tr>
                                        <td>'.$data['id'].'</td>
                                        <td>'.$data['prenom'].'</td>
                                        <td>'.$data['nom'].'</td>
                                        <td>'.$data['telephone'].'</td>
                                        <td>'.$data['mobile'].'</td>
                                        <td>'.$data['courriel'].'</td>
                                    </tr>';
                            }
                            echo'</table><br>';
                            if ($no > 1) {
                                echo '<br><p class="text-center">Il y a '.$no.' contacts dans votre bottin.</p>';
                            } else {
                                echo '<br><p class="text-center">Il y a '.$no.' contact dans votre bottin.</p>';
                            }
                            echo '<p class="text-center"><a href="connecte_recherche.php">Retour</a></p>';
                        } ?>
            </form>
            <div id="formFooter">
                <form method="post" action="resultats_bottin_tous.php">
                    <p>Vous souhaitez supprimer un contact? Entrez son ID ici: </p>
                    <input type="text" placeholder="ID" name="id" aria_label="Recherche" aria-describedby="basic-addon2">
                    <br>
                    <button type="submit" class="btn btn-primary bouton-margin">Supprimer</button>                        
                </form>
                <hr/>
                <form method="post" action="modifier_contact.php">
                    <p>Vous souhaitez modifier un contact? Entrez son ID ici: </p>
                    <input type="text" placeholder="ID" name="id" aria_label="Recherche" aria-describedby="basic-addon2">
                    <br>
                    <button type="submit" class="btn btn-primary bouton-margin">Modifier</button>
                </form>
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
