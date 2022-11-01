<?php 
include $_SERVER['DOCUMENT_ROOT']. '/portfolio/lib/includes.php';
include $_SERVER['DOCUMENT_ROOT']. '/portfolio/admin/header-admin.php';
?>
<!doctype html>
<html lang="fr">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <!--CSS-->
        <link rel="stylesheet" href="css/login.css">
        <!-- Fontawsome-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
        <!-- font body -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">

        <title>Modifier mot de passe</title>
    </head>
    <body>
        <div class="container mt-5">
            <div>
                <!-- FORMULAIRE -->
                <form action="#" method="POST">
                    <h2 class="mb-4 title">Choisir un nouveau mot de passe :</h2>
                        <!--PASSWORD-->
                        <input type="password" class="form-control-sm " id="password" name="password">
                        <!--CONFIRMER PASSWORD-->
                    <h4 class="mb-4 title">Confirmer mot de passe :</h4>
                        <input type="password" class="form-control-sm " id="password" name="password">     
                    <!--LOGIN BUTTON-->
                    <div class="login-button">
                        <button type="submit" class="btn btn-dark">Login</button>
                    </div>
                </form>
            </div>
        </div>
        <?php include 'lib/debug.php'?>; 
    </body>
</html>