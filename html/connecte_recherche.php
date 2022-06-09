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
                <li class="breadcrumb-item active" aria-current="page">Rechercher dans mon bottin personnel</li>
            </ol>
        </nav>
        <br>
        <?php if(isset($_SESSION['connect'])) {?>
        <div id="formContent">
            <div class="fadeIn first">
                <br>
            </div>
            <form  method="_GET" action="resultats_recherche_bottin.php">
                <h1 id="message_bienvenue"></h1>
                <h1 class="smaller-h1">Mon bottin</h1>
                <a href="./ajouter_contact.php" class="btn btn-light bouton-margin">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                        <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                    </svg>
                </a>
                <br>
                <input type="text" class="form-control" placeholder="Recherche" aria_label="Recherche" name="recherche" aria-describedby="basic-addon2">
                <br>
                <button class="btn btn-outline-secondary" type="submit">Rechercher</button>
                <br>
                <a href="./resultats_bottin_tous.php" class="btn btn-primary bouton-margin">Afficher tous les contacts</a>
                <p>Pour modifier ou supprimer un contact, cliquez sur "Afficher tous les contacts" et descendez au bas de la page.</p>
            </form>
            <div id="formFooter">
                <small><a href="logout.php">Déconnexion</a></small>
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
        </div>
    </main>
    <!-- END OF MAIN -->

    <!-- FOOTER -->
    <?php include "./footer.php" ?>
    <!-- END OF FOOTER -->

</body>

<script>
    let date = new Date();
    let heureCourante = date.getHours();
    let message;
    var prenom = ('<?php echo $_SESSION['prenom']; ?>');

    if (heureCourante >= 5 && heureCourante < 11) {
        message = "Bon matin " + prenom +"!";
    }
    else if (heureCourante >= 11 && heureCourante < 14) {
        message = "Bon midi " + prenom +"!";
    }
    else if (heureCourante >= 14 && heureCourante < 18) {
        message = "Bon après-midi " + prenom +"!";
    }
    else if (heureCourante >= 18 && heureCourante < 23) {
        message = "Bonsoir " + prenom +"!";
    }
    else if (heureCourante >= 0 && heureCourante < 5) {
        message = "Bonne nuit! " + prenom +"!";
    }
    else {
        message = "Erreur.";
    }
    let le_h1 = document.getElementById("message_bienvenue");
    le_h1.textContent = message;
</script>

</html>
