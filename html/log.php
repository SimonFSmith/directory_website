<?php
    // Si le cookie existe
    if(isset($_COOKIE['auth'])) {
        $secret = htmlspecialchars($_COOKIE['auth']);
        // Vérification de la validité du code secret
        require('connect.php');
        $request = $conn->prepare("SELECT count(*) as nombre_compte FROM utilisateur WHERE secret = ?;");
        $request->execute(array($secret));
        while ($utilisateur_secret = $request->fetch()) {
            if ($utilisateur_secret['nombre_compte'] == 1) {
                $request_utilisateur = $conn->prepare("SELECT * FROM utilisateur WHERE secret = ?;");
                $request_utilisateur->execute(array($secret));
                while ($compte_utilisateur = $request_utilisateur->fetch()) {
                    $_SESSION['prenom'] = $compte_utilisateur['prenom'];
                    $_SESSION['connect'] = 1;
                    $_SESSION['courriel'] = $compte_utilisateur['courriel'];
                }
            }
        }
    }
?>