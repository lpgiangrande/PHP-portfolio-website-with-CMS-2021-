<?php

include $_SERVER['DOCUMENT_ROOT']. '/portfolio/lib/includes.php';
include $_SERVER['DOCUMENT_ROOT']. '/portfolio/admin/header-admin.php';

$target_dir = "/Applications/MAMP/htdocs/portfolio/uploads/";  // DOSSIER OU VA l'IMAGE
$bddRoot = "/Portfolio/uploads/"; // Dans la requête SQL, on veut cet url et non ../uploads
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]); 
$bddValue = $bddRoot . basename($_FILES["fileToUpload"]["name"]); // $bddRoot(cjemin) + nom photo

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$category_id = $_POST['idCategorie'];
$name = $_FILES["fileToUpload"]["name"];
$description = $_POST['description'];

// SQL upload image 
$insert_stmt=$db->prepare(
"INSERT INTO photos (path, name, description, category_id) 
VALUES (:path, :name, :description, :category_id)");

$insert_stmt->bindParam(':path', $bddValue, PDO::PARAM_STR);
$insert_stmt->bindParam(':name', $name, PDO::PARAM_STR);
$insert_stmt->bindParam(':description', $description, PDO::PARAM_STR);
$insert_stmt->bindParam(':category_id', $category_id, PDO::PARAM_INT);
?>


<div class="container mt-5">
<?php
// Check if image file is a actual image or fake image
if(isset($_POST["upload"])) {

  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "Le format d'image est valide - " . $check["mime"] . ".<br><br>";
    $uploadOk = 1;
  } else {
    echo "Le fichier n'est pas une image.";
    $uploadOk = 0;
  }
  
//Check if file already exists
/*if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
} */

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Le fichier est trop lourd. ";
    $uploadOk = 0;
}

// Allow certain file formats (jpg and jpeg)
if($imageFileType != "jpg" && $imageFileType != "jpeg") {
    echo "Seuls les fichiers JPG & JPEG sont autorisés.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Votre image n'a pas pu être téléchargée.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      // Exécuter la requête
      $insert_stmt->execute();
    
      echo "L'image " . htmlspecialchars(basename( $_FILES["fileToUpload"]["name"])) . " a bien été téléchargée." ;
      ?>

      <br><br>
      <a href="list.php?id=<?=$category_id?>" class="btn btn-light">Retour</a>
      

      <div class="container mt-5 mb-3">
      <?php
      echo "<hr>";
      echo nl2br("ID de la table CATEGORIE : <b>$category_id</b>\n") ;
      echo nl2br("Champs PATH(chemin enregistré en BDD) de la table PHOTOS  : <b>$bddValue</b>\n"); 
      echo nl2br("Champs NAME (Nom de la photo) de la table PHOTOS : <b>$name</b>\n");  
      echo "Champs DESCRIPTION de la table PHOTOS : <b>$description</b>"; 
      ?>
      </div>
      
    <?php  
    } else {
      echo "L'image " . htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " ne peut pas être téléchargée.";
    }
  }
  
}
 
// $target_dir = "uploads/" - cible le dossier où seront placées les photos
// $target_file - définit le chemin du fichier qui sera uploadé 
// $uploadOk=1 is not used yet (will be used later)   ?
// $imageFileType - holds the file extension of the file (in lower case)

// /!\ Le dossier "uploads" doit être dans le même répertoire que "upload.php"
?>
</div>