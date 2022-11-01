<?php
/* Pour dire qu'on a pas d'identification, 
car on a le fichier auth.php dans les includes, 
ne pas rediriger en boucle : */
$auth = 0;
include $_SERVER['DOCUMENT_ROOT']. '/portfolio/lib/includes.php';

/**
 * TRAITEMENT DU FORMULAIRE DE LOGIN ADMIN
 **/

if(isset($_POST['username']) && isset($_POST['password'])){
    $username = htmlspecialchars(trim($_POST['username'])); // trim : enlever les espaces
    $password = sha1($_POST['password']);
    /* SHA1 : pas d'équivalent à password_hash() dans PHPMYADMIN.
    il vaudrait mieux permettre à l'admin de créer son mot de passe à sa 1ere connexion
    Ici, le mot de passe admin a été créer directement dans PMA */

    $select = "SELECT * FROM admin WHERE username = :username AND password = :password";

    $stmt = $db->prepare($select);
    $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    $stmt->bindValue(':password', $password, PDO::PARAM_STR);

    $stmt->execute();

    //var_dump($select->rowCount());
    if($stmt->rowCount() > 0){ //si une ligne correspondante existe en bdd
        $_SESSION['Auth'] = $stmt->fetch(PDO::FETCH_ASSOC);
        // Avant redirection :
        header('Location:' . ADMIN . 'admin-index.php'); // si auth. réussie, redirection vers la page d'admin
        die();
    }
}
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
        <link rel="stylesheet" href="/portfolio/css/login.css">
        <!-- Fontawsome-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
        <!-- font body -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">

        <title>Authentification</title>
    </head>
    <body>
        <div class="container mt-5">
            <div class="login-div">
                <div class="logo">
                    <i class="fas fa-camera-retro fa-5x"></i>
                </div>
                <h1 class="mb-4 title">Espace administrateur</h1>
                <!-- FORMULAIRE D'IDENTIFICATION -->
                <form action="#" method="POST">
                    <div class="fields">
                        <!--USERNAME-->
                        <label for="username">Nom d'utilisateur</label>
                        <div class="username">
                            <svg class="svg-icon" viewBox="0 0 20 20">
                                <path d="M12.075,10.812c1.358-0.853,2.242-2.507,2.242-4.037c0-2.181-1.795-4.618-4.198-4.618S5.921,4.594,5.921,6.775c0,1.53,0.884,3.185,2.242,4.037c-3.222,0.865-5.6,3.807-5.6,7.298c0,0.23,0.189,0.42,0.42,0.42h14.273c0.23,0,0.42-0.189,0.42-0.42C17.676,14.619,15.297,11.677,12.075,10.812 M6.761,6.775c0-2.162,1.773-3.778,3.358-3.778s3.359,1.616,3.359,3.778c0,2.162-1.774,3.778-3.359,3.778S6.761,8.937,6.761,6.775 M3.415,17.69c0.218-3.51,3.142-6.297,6.704-6.297c3.562,0,6.486,2.787,6.705,6.297H3.415z"></path>
                            </svg>
                            <?= input('username'); // pour que le login reste affiché. CF form.php ?> 
                        </div>
                    </div>
                    <div class="fields">
                        <!--PASSWORD-->
                        <label for="password">Mot de passe</label>
                        <div class="password">
                            <svg class="svg-icon" viewBox="0 0 20 20">
                                <path d="M17.308,7.564h-1.993c0-2.929-2.385-5.314-5.314-5.314S4.686,4.635,4.686,7.564H2.693c-0.244,0-0.443,0.2-0.443,0.443v9.3c0,0.243,0.199,0.442,0.443,0.442h14.615c0.243,0,0.442-0.199,0.442-0.442v-9.3C17.75,7.764,17.551,7.564,17.308,7.564 M10,3.136c2.442,0,4.43,1.986,4.43,4.428H5.571C5.571,5.122,7.558,3.136,10,3.136 M16.865,16.864H3.136V8.45h13.729V16.864z M10,10.664c-0.854,0-1.55,0.696-1.55,1.551c0,0.699,0.467,1.292,1.107,1.485v0.95c0,0.243,0.2,0.442,0.443,0.442s0.443-0.199,0.443-0.442V13.7c0.64-0.193,1.106-0.786,1.106-1.485C11.55,11.36,10.854,10.664,10,10.664 M10,12.878c-0.366,0-0.664-0.298-0.664-0.663c0-0.366,0.298-0.665,0.664-0.665c0.365,0,0.664,0.299,0.664,0.665C10.664,12.58,10.365,12.878,10,12.878"></path>
                            </svg>
                            <input type="password" class="form-control-sm " id="password" name="password">
                        </div>
                    </div>
                    <!--LOGIN BUTTON-->
                    <div class="login-button">
                        <button type="submit" class="btn">Login</button>
                    </div>
                    <!--RESET PASSWORD-->
                    <div class="reset-pwd">
                        <a href="#">Mot de passe oublié ?</a>
                    </div>
                </form>
                </div>
        </div>
        <?php include '/Applications/MAMP/htdocs/portfolio/lib/debug.php';?>
    </body>
</html>
