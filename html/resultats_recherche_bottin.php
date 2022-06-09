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
            <li class="breadcrumb-item"><a href="./connecte_recherche.php">Rechercher dans mon bottin personnel</a></li>
            <li class="breadcrumb-item active" aria-current="page">Résultats de recherche</li>
            </ol>
        </nav>
        <br>
        <?php if(isset($_SESSION['connect'])) {?>

            <div class="fadeIn first">
                <br>
            </div>
            <form>
                <h1 class="smaller-h1 text-center">Résultats de recherche</h1>
                <br>
                <?php
                    include('connect.php');
                    $prenom = $_GET['recherche'];
                    $request = $conn->prepare("SELECT * FROM contact WHERE prenom = ?");
                    $request->execute(array($prenom));
                    $no=$request->rowCount();

                    if (empty($no)) {
                        echo 'Votre recherche n\'a donné aucun résultat.';
                    }
                    else {
                        echo '<table id="table_center">
                                <tr>
                                    <th>Prénom</th>
                                    <th>Nom de famille</th>
                                    <th>Téléphone</th>
                                    <th>Mobile</th>
                                    <th>Courriel</th>
                                </tr>';
                        while ($data = $request->fetch()) {
                            echo '<tr>
                                    <td>'.$data['prenom'].'</td>
                                    <td>'.$data['nom'].'</td>
                                    <td>'.$data['telephone'].'</td>
                                    <td>'.$data['mobile'].'</td>
                                    <td>'.$data['courriel'].'</td>
                                </tr>';
                        }
                        echo'</table><br>';
                        if ($no > 1) {
                            echo '<br><p class="text-center">Votre recherche a donnée '.$no.' résultats.</p>';
                        } else {
                            echo '<br><p class="text-center">Votre recherche a donnée '.$no.' résultat.</p>';
                        }
                    }
                ?>
            </form>
            <div id="formFooter">
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
