<?php 

/* FICHIER PERMETTANT À L'ADMIN DE SUPPRIMER LUI-MÊME LES PHOTOS D'UNE GALERIE EN PARTICULIER */


include $_SERVER['DOCUMENT_ROOT']. '/portfolio/lib/includes.php';
include $_SERVER['DOCUMENT_ROOT']. '/portfolio/admin/header-admin.php';


// VARIABLES

//Récupération id de la photo à supprimer
$photo_id = $_GET['id']; 

//Récupération id de la galerie pour le header->retour à la liste suite à suppresion
$id = $_GET['$category_id'];
var_dump($id);



// REQUETE SUPPRESSION PHOTO 
$delete=$db->prepare("DELETE FROM photos WHERE id =:photo_id");
$delete->bindParam(':photo_id', $photo_id, PDO::PARAM_INT);
$delete->execute();


/* Redirection vers la liste des photos 
de la catégorie concernée après suppression 
d'une photo */
//header("location:list.php?id=$id"); 
header('location:category.php'); 
die;


