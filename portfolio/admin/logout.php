<?php

/* 
FICHIER DE DECONNEXION DE L'ESPACE ADMIN
*/

// auth 1 = admin, auth 0 = déconnexion
// $auth = 0; 
include '/Applications/MAMP/htdocs/portfolio/lib/includes.php';

// Détruit toutes les variables de session
$_SESSION = array();

// Pour détruire complètement la session, 
// effacer également le cookie de session.
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000, // seconds
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finalement, on détruit la variable de session.
session_destroy();


// redirection à la déconnexion
header('Location:' . ADMIN . 'login.php');
die();
?>


<?php 
/* en théorie, les sessions sont automatiquement supprimées après 24 minutes (temps par défaut). 
En pratique, ce n'est pas le cas car il faut que PHP exécute du code pour supprimer ces sessions expiréesen théorie, les sessions sont automatiquement supprimées après 24 minutes (temps par défaut). En pratique, 
ce n'est pas le cas car il faut que PHP exécute du code pour supprimer ces sessions expirées */