<?php

/* CONNEXION À LA BASE DE DONNÉES AVEC PDO */ 

$host = "localhost"; 
$port = 8888; 
$dbname = "portfoliophoto"; 
$user = "portfoliophoto"; 
$pass = "2021ProjetPro";

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $db->setAttribute
        (
        PDO::ATTR_ERRMODE, 
        PDO::ERRMODE_WARNING,
        );
    
} catch (PDOException $e) { // Si le try rate, afficher un message d'erreur
    die("Erreur de connexion à la base de données ". $e->getMessage()); //getMessage() précise l'erreur 
}

//$db = null;
?>
