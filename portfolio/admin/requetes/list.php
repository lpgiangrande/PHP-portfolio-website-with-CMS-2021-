<?php 

/* 
CE FICHIER SERT À RÉCUPÉRER EN BDD LA LISTE DES PHOTOS CONTENUES DANS UNE GALERIE A l'ID CORRESPONDANT, 
ET LES AFFICHER DANS UN TABLEAU À L'AIDE D'UN FOREACH
 */

// INCLUDES NECESSAIRES AU FONCTIONNEMENT ET À L'AFFICHAGE
include $_SERVER['DOCUMENT_ROOT']. '/portfolio/lib/includes.php';
include $_SERVER['DOCUMENT_ROOT']. '/portfolio/admin/header-admin.php';


//Récupération de l'id de la catégorie/galerie courante
$category_id = $_GET['id'];
var_dump($category_id);


// REQUETES SQL

// REQUETE 1 -> afficher l'id et titre de la galerie courante dans le H1
$select = $db->query("SELECT id, name FROM categories WHERE id=$category_id");
$categories = $select->fetchAll();


// REQUETE 2 ->  Afficher la liste de photos de la catégorie courante avec l'id récupéré

// Stocker la requête préparée
$select=$db->prepare("SELECT id, name, description FROM photos WHERE category_id=:category_id");
// Lier la variable $category_id récupérée en début de fichier au paramètre :category_id
$select->bindParam(':category_id', $category_id, PDO::PARAM_INT);
// Exécuter la requête
$select->execute();
$photos = $select->fetchAll();
?>

    <div class="container mt-5">

    <!-- TITRE DYNAMIQUE SELON ID GALERIE -->
    <?php foreach($categories as $category): ?>
        <h1>Photographies de la galerie 
            <?= $category['id'] . " : " . $category['name'] ?>
        </h1>
    <?php endforeach;?>
    

        <table class="table table-striped">
        <!-- Boutons Ajout & Retour-->
        <div class="mt-4 mb-2">
                <a href="add.php?id=<?= $category['id'] ?>" class="btn btn-secondary">Ajouter</a>
                <a href="category.php" class="btn btn-light">Retour</a>
        </div>
        <!-- AFFICHAGE LISTE PHOTOS DE LA GALERIE COURANTE -->
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Description</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($photos as $photo): ?>
                <tr>
                    <td><?= $photo['id'] ?></td>
                    <td><a class="link" href="#" class="link-name"><?= $photo['name'] ?></a></td>
                    <td><?= $photo['description'] ?></td>
                    <input type="hidden" name="idCategorie" value="<?= $category['id'] ?>"><!-- INPUT HIDDEN-->
                    <!-- LIEN POUR SUPPRESSION D'UNE PHOTO, VERS FICHIER DELETE.PHP-->
                    <td class="action-button">
                        <a href="delete.php?id=<?=$photo['id']?>" class="btn btn-dark" onclick="return confirm('Valider la suppression?')">
                        <i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr> 
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</body>
</html>

