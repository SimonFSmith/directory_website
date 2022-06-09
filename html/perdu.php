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
                <li class="breadcrumb-item active" aria-current="page">Navigation</li>
            </ol>
        </nav>
        <h2>Voici les possibilités qui s'offrent à vous</h2>
        <br>
        <h3>Liens rapides</h3>
        <h5>Chercher un employé par son prénom:</h5>
        <p>Cliquez<a href="index.php" target="_blank">ici</a>, entrez le prénom de l'employé et cliquez sur "Rechercher".</p>
        <h5>Chercher un employé par son département:</h5>
        <p>Cliquez<a href="recherche_departement.php" target="_blank">ici</a>, entrez le département de l'employé et cliquez sur "Rechercher".</p>
        <h5>Chercher un employé par sa ville:</h5>
        <p>Cliquez<a href="recherche_emplacement.php" target="_blank">ici</a>, entrez la ville de l'employé et cliquez sur "Rechercher".</p>
        <h5>Nous envoyer un message:</h5>
        <p>Cliquez<a href="nous_joindre.php" target="_blank">ici</a>, entrez votre nom complet, votre adresse courriel, votre message et cliquez sur "Envoyer".</p>
        <h5>Faire une demande de modification dans le bottin:</h5>
        <p>Cliquez<a href="demande_modification.php" target="_blank">ici</a>, entrez votre nom complet, votre adresse courriel, les informations de l'employé à modifier, les modifications à effectuer et cliquez sur "Envoyer".</p>
        <h5>Se connecter à votre bottin personnel:</h5>
        <p>Cliquez<a href="mon_bottin.php" target="_blank">ici</a>, entrez votre adresse courriel, votre mot de passe et cliquez sur "Se connecter".</p>
        <h5>Créer un compte pour avoir votre bottin personnel:</h5>
        <p>Cliquez<a href="inscription.php" target="_blank">ici</a>, entrez votre prénom, votre adresse courriel, votre mot de passe deux fois et cliquez sur "S'inscrire".</p>
        <br>
        <h3>Le bottin personnel</h3>
        <p>Le bottin personnel vous permet d'ajouter vos propres contacts et d'y avoir accès facilement et à un seul endroit. Lorsque vous êtes connecté, cliquez sur <br>
            "Mon bottin personnel" en haut de la page. Pour ajouter un contact, cliquez sur l'icône d'ajout juste au-dessus de la barre de recherche. Si vous souhaitez <br>
            modifier un contact ou en supprimer un de votre bottin personnel, cliquez sur "Afficher tous les contacts". Vous y verrez tous vos contacts avec un numéro <br>
            (ID) dans la colonne de gauche du tableau. Descendez au bas de la page et entrez l'ID du contact que vous souhaitez modifier ou supprimer dans la case <br>
            appropriée.</p>
    </main>
    <!-- END OF MAIN -->

    <!-- FOOTER -->
    <?php include "./footer.php" ?>
    <!-- END OF FOOTER -->

</body>
</html>