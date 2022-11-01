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
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    <!-- font body -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@200&display=swap" rel="stylesheet">
    <!-- JS -->
    <script src="js/nav.js"></script>
    
    <title>Studio AC | Portfolio</title>
  </head>
  <body> 
    <!--HEADER -->
    <?php include 'includes/header.php'; ?>

    <!-- pour bon fonctionnement de nav.js sur scroll | à changer -->
    <br/><br/><br/><br/><br/><br/><br/><br/>
    <br/><br/><br/><br/><br/><br/><br/><br/>

    
    <!-- GALERIES --> 
    <section>
        <div class="container">
            <div class="row justify-content-center mt-3">
                <!-- Galerie 1 -->
                <div class="col-sm-6 mx-2 preview" id="preview1">
                    <a class="preview-link" href="galerie.php?id=1">
                        <div class="title">Paysages</div>
                    </a><!-- galerie.php?id=-->
                </div>
                <!-- Galerie 2 -->
                <div class="col-sm-6 mx-3 preview" id="preview2">
                    <a class="preview-link" href="galerie.php?id=2">
                        <div class="title">Portraits</div>
                    </a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <!-- Galerie 3 -->
                <div class="col-sm-6 mx-2 preview" id="preview3">
                    <a class="preview-link" href="galerie.php?id=3">
                        <div class="title">Urbain</div>
                    </a>
                </div>
                <!-- Galerie 4 -->
                <div class="col-sm-6 mx-3 preview" id="preview4">
                    <a class="preview-link" href="galerie.php?id=4">
                        <div class="title">Nocturne</div>
                    </a>
                </div>
            </div>
        </div>
    </section>
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
  </body>
</html>