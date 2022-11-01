<?php 
/* PAGE D'ACCUEIL DE L'ESPACE ADMIN UNE FOIS QU'IL S'EST CONNECTÉ */

// INCLUDES DES FICHIERS NECESSAIRES À LA COMMUNICATION AVEC LA BDD + LE HEADER DE LA PAGE ADMIN
include '../lib/includes.php';
include 'header-admin.php';


//include '../bdd/debug.php';
?>

<div class="container mt-5">
    <h1>Bienvenue, <?php echo $_SESSION['Auth']['username']; ?></h1>
    <a class="link" href="requetes/update_pass.php"><h5>Modifier votre mot de passe</h5></a>
</div>


  <?php
  include '../lib/debug.php';
  ?>
  
  <?php
    //echo '<br>';
    //echo $_SERVER['DOCUMENT_ROOT']; 
    //echo " -> Chemin du fichier CSS";
  ?> 
 

