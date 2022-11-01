<?php 
/*
CE FICHIER PERMET AU PHOTOGRAPHE d'UPLOADER SES PROPRES PHOTOS DEPUIS L'ESPACE ADMIN.
- formulaire d'upload qui vérifie la taille, format des fichiers -> stocke dans un dossier 
- convertir l'image en chemin (text) à insérer en BDD. Ne pas stocker l'image mais son chemin d'accès
- Il faudra faire apparaître ses photos sur la partie client (galeries), 
*/

include $_SERVER['DOCUMENT_ROOT']. '/portfolio/lib/includes.php';
include $_SERVER['DOCUMENT_ROOT']. '/portfolio/admin/header-admin.php';
// $_SERVER['DOCUMENT_ROOT'] = /Applications/MAMP/htdocs Get the absolute path 

//Récupération de l'id de la catégorie(galerie) selectionnée
$category_id = $_GET['id'];


// Récupérer les libellés de champs de la table catégorie pour afficher l'id et titre dans le H1
$select = $db->query("SELECT id, name FROM categories WHERE id=$category_id");
$categories = $select->fetchAll(); ?>



<div class="container mt-5">

<?php
// BOUCLE POUR TITRE H1
foreach($categories as $category): ?>

    <h1>Télécharger dans galerie <?=$category['id'] . " : " . $category['name'] ?></h1>

<?php endforeach; ?>
    
    <!-- FORMULAIRE D'UPLOAD D'IMAGES -->
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="idCategorie" value="<?= $category['id'] ?>"><!-- INPUT HIDDEN-->
        <hr> 
        <div class="mt-2 mb-4">
            <img class="img-fluid" id="preview-file" alt="image" width="100" height="100" /><br><br>
            <input type="file" name="fileToUpload" id="fileToUpload" required 
                   onchange="document.getElementById('preview-file').src = window.URL.createObjectURL(this.files[0])">
        </div>
        <div class="mt-2 mb-4">
            <label for="description">Description / nom :</label>
            <br>
            <input type="text" class="rounded" name="description" id="description" size="50"><br>
        </div>
        <div class="mt-2 mb-4">
            <input type="submit" class="btn btn-dark" value="Télécharger" name="upload">
            <a href="list.php?id=<?=$category_id?>" class="btn btn-light">Annuler</a>
        </div>
    </form>

    <div class="container mt-5">
    <?php echo "id categorie : ";
          var_dump($category_id);
    ?>
    </div>

</div>

<!-- Note sur formulaire d'upload :
- enctype="multipart/form-data" : spécifie quel content-type utiliser quand formulaire 
- Les data sont envoyés en POST à upload.php pour traitement
-->
