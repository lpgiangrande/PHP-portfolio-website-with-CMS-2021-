<?php 

/*
DÉMARRER LA SESSION ADMIN, AMENER L'ADMIN SUR SA PAGE D'ACCUEIL SI $AUTH=1
*/

session_start(); // fonction avant tout chargement de contenu

if(!isset($auth)){  // Si la variable de session n'est pas définie, si pas de $auth definie : 0 ou 1, on ne peut pas gérer l'authentification
    if (!isset($_SESSION['Auth']['id'])) {
        header('Location:' . ROOT .'login.php'); // ROOT defini dans constants.php ramènera toujours au bon endroit
        die(); // Important pour la sécurité, dès qu'il y a un header location
    }
}
?>