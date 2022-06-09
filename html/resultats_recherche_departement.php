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
                <li class="breadcrumb-item"><a href="./recherche_departement.php">Recherche par département</a></li>
                <li class="breadcrumb-item active" aria-current="page">Résultats de recherche</li>
            </ol>
        </nav>
        <br>

            <div class="fadeIn first">
                <br>
            </div>
            <form>
                <h1 class="smaller-h1 text-center">Résultats de recherche</h1>
                <br>
                <?php

                    if (!empty($_GET['departement'])) {
                        include('connect.php');
                        $departement = $_GET['departement'];
                        /*$resultat = $conn->prepare("SELECT * FROM ville WHERE nom_ville = ?;") or die (print_r($conn->errorInfo()));
                        $resultat->execute(array($ville));
                        $no = $resultat->rowCount();
                        if ($no == 0) {
                            echo '<br><p class="text-center">'.$ville.' est introuvable dans l\'organisation.</p>';
                            echo '<br><p class="text-center"><a href="recherche_emplacement.php">Retour</a></p>';
                            die();
                        }*/
                        $recherche = '%'.$departement.'%';
                        $req = $conn->prepare("SELECT * FROM utilisateur_ad WHERE ville LIKE (?);") or die (print_r($conn->errorInfo()));
                        $req->execute(array($recherche));
                        $no=$req->rowCount();

                        if (empty($no)) {
                            echo '<br><p class="text-center">Votre recherche n\'a donné aucun résultat.</p>';
                            echo '<br><p class="text-center"><a href="recherche_emplacement.php">Retour</a></p>';
                        }
                        else {
                            echo '<table id="table_center">
                                    <tr>
                                        <th>Prénom</th>
                                        <th>Nom de famille</th>
                                        <th>Téléphone</th>
                                        <th>Mobile</th>
                                        <th>Courriel</th>
                                        <th>Fonction</th>
                                        <th>Ville</th>
                                        <th>Bureau</th>
                                    </tr>';
                            while ($data = $req->fetch()) {
                                echo '<tr>
                                        <td>'.$data['prenom'].'</td>
                                        <td>'.$data['nom'].'</td>
                                        <td>'.$data['telephone'].'</td>
                                        <td>'.$data['mobile'].'</td>
                                        <td>'.$data['courriel'].'</td>
                                        <td>'.$data['fonction'].'</td>
                                        <td>'.$departement.'</td>
                                        <td>'.$data['bureau'].'</td>
                                    </tr>';
                            }
                            echo'</table><br>';
                            if ($no > 1) {
                                echo '<br><p class="text-center">Votre recherche a donnée '.$no.' résultats.</p>';
                            } else {
                                echo '<br><p class="text-center">Votre recherche a donnée '.$no.' résultat.</p>';
                            }
                        }
                    }
                    else {
                        echo '<br><p class="text-center">Vous n\'avez pas entré de nom de département!</p>';
                        echo '<br><p class="text-center"><a href="recherche_departement.php">Retour</a></p>';
                    }

                ?>
            </form>
            <div id="formFooter">
            </div>

    </main>
    <!-- END OF MAIN -->

    <!-- FOOTER -->
    <?php include "./footer.php" ?>
    <!-- END OF FOOTER -->

</body>
</html>
