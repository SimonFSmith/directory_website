<header>
    <nav class="navbar">
        <a href="index.php"><img src="../images/logo_with_name.png" alt="Logo"></a>
        <h3 id="message_bienvenue"></h1>
        <form class="form-inline">
            <a href="./mon_bottin.php"><button type="button" class="btn btn-light" id="bouton-bottin-personnel">Mon bottin personnel</button></a>
            <a href="./nous_joindre.php"><button type="button" class="btn btn-light" id="bouton-nous-joindre">Nous joindre</button></a>
        </form>
    </nav>
    <hr>
</header>

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