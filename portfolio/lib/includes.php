<?php 
/* 
- Ce fichier sert à regrouper des fichiers 
nécessaires à la connexion BDD, ou fichiers de débugage lors du développement
- A inclure dans les pages où ils sont utiles 
- constants.php facultatif(dev uniquement) */
include 'constants.php';
include 'connexion.php'; // connexion à la BDD
include 'form.php'; // Pour garder en mémoire dans l'input la saisie de l'identifiant de l'admin

// Pour le session_start() :
include 'auth.php'; // permet de rediriger vers l'espace admin si l'ID+Mdp admin sont corrects
?>