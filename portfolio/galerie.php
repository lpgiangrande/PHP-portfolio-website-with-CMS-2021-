<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!--CSS-->
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/portfolio.css">
    <link rel="stylesheet" href="css/footer.css">
    <!-- Fontawsome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <!--font logo -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <!-- font titles -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Gentium+Basic:wght@700&display=swap" rel="stylesheet">
    <!-- font body -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">
    <!-- JS -->
    <script src="js/nav.js"></script>


    <title>Studio AC | Portfolio</title>
  </head>
  <body> 
    <!-- pour bon fonctionnement de nav.js sur scroll | à changer -->
    <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>



    <!-- PAGE galerie.php : 
        Cette page affiche le contenu d'une galerie quand on clic sur sa miniature dans portfolio.php
    -->

    <!--HEADER et connexion BDD-->
    <?php 
      include 'includes/header.php'; 
      include 'lib/connexion.php';
    ?>

    <!-- VARIABLES pour afficher le TITRE et CONTENU de la galerie sélectionnée  -->
    <?php
      $category_id=intval($_GET['id']);


    // Récupérer le nom de la galerie selon l'ID passée dans l'url du lien de la miniature (SQL)
    // Afficher le bon titre dans le h1 (BOUCLE)

    $gallery_name = $db->prepare("SELECT name FROM categories WHERE id=:category_id");
    $gallery_name->bindValue(':category_id', $category_id, PDO::PARAM_INT);
    $gallery_name->execute();
    $categories= $gallery_name->fetchAll();?>

    <div class="container mb-5">

    <?php foreach($categories as $category): ?>
      <h1><?= $category['name'] ?></h1>
    <?php endforeach;?>

    </div>


    <!-- AFFICHER EN PHP, LES IMAGES DE LA BDD DANS UNE GRILLE BOOTSTRAP --> 
    <div class="container">
      <div class="row">

        <?php // Afficher le contenu d'une galerie correspondant à son id
        
        // Stocker la requête préparée
        $select_stmt=$db->prepare("SELECT * FROM photos WHERE category_id =:category_id");
        // Lier la variable $category_id définie au-dessus au paramètre :category_id ( $category_id=$_GET['id'];)
        $select_stmt->bindParam(':category_id', $category_id, PDO::PARAM_INT); // bindParam car la variable change à chaque tour de boucle
        // Lancer la requête
        $select_stmt->execute();
        // Boucle, tant qu'il y a des photos à afficher : 
        while ($data = $select_stmt->fetch(PDO::FETCH_ASSOC))
        {
        ?>
          <div class="col-md-6 mb-4 uploaded-pics">
            <img class="img-fluid rounded" src="<?=$data['path']?>" alt="<?=$data['name']?>">
          </div>
      <?php 
        } // fin boucle
      ?>
      </div>
    </div>
    <!-- FLECHES -->
    <div class="container mt-5" id="arrow">
      <a href="#" class="navig-link" id="top"><i class="fas fa-chevron-up fa-3x"></i></a>
    </div>
   <!-- FOOTER -->
   <?php include 'includes/footer.php'; ?>
  
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
    <script src="js/pageTop.js"></script>
  </body>
</html>
