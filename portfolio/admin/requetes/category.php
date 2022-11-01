<?php 
include $_SERVER['DOCUMENT_ROOT']. '/portfolio/lib/includes.php';
include $_SERVER['DOCUMENT_ROOT']. '/portfolio/admin/header-admin.php';

/* lister les galeries du site dans un tableau, avec les options de gestion */

// 1. Requête SQL -> Récupération en BDD de l'iD & du nom des galeries 
// 2. Boucle foreach pour afficher les résultats de la requête dans un tableau


$select=$db->query('SELECT id, name FROM categories');
$categories = $select->fetchAll();
?>

<div class="container mt-5">
    <h1>Galeries</h1>
    <!--<a href="category-create.php" class="btn btn-info">Créer</a>-->
    

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Intitulé</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- afficher les infos (champs bdd sélectionnés) des galeries dans un tableau -->
            <?php foreach($categories as $category): ?>
            <tr>
                <td><?= $category['id'] ?></td>
                <td><?= $category['name'] ?></td>
                <td class="action-button">
                    <!-- Boutons Editer et Supprimer galerie -->
                    <a href="list.php?id=<?= $category['id'] ?>" class="btn btn-secondary">Consulter / Editer</a>
                    <a href="delete-category.php?id="<?= $category['id'] ?>" class="btn btn-dark" onclick="return confirm('Valider la suppression?')">Supprimer</a>
                </td>
            </tr> 
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
