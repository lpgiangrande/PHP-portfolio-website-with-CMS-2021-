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
    <link rel="stylesheet" href="css/contact.css">
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

    <title>Studio AC | Contact</title>
  </head>
  <body> 
  <!--HEADER -->
  <?php include 'includes/header.php'; ?>


    <div class="container mt-5 mb-5">
    <br><br><br><br>
      <!--COORDONNEES-->
      <div class="row">
        <div class="col-md-5">
          <div class="portrait">
            <img id="roundPicture" class="img-fluid"src="images/imgContact/portrait.jpg" alt="mon portrait">
          </div>
          <h3 class="mt-5 mb-3">Coordonnées</h2>
          <br>
          <span>Anne Capretz - Photographe</span>
          <br>
          <span>Studio AC Paris</span>
          <br>
          <span class="light">22 rue Vergniaud Paris 13e</span>
          <br><br>
          <span>Horaires d'ouverture</span>
          <br>
          <span class="light">Du lundi au vendredi</span>
          <br>
          <span class="light">de 9h &agrave; 12h, de 14h &agrave; 19h</span>
          <br>
          <br>
          <span>Coordonnées</span>
          <br>
          <span class="light">06 00 00 00 00</span>
          <br>
          <span class="light">01 00 00 00 00</span>
          <br>
          <span><a href="mailto:contact.photographe.test@gmail.com">contact.photographe.test@gmail.com</a></span>
          <br>
          <span class="light">ou via ce formulaire</span>
        </div>
        <!--FORMULAIRE DE CONTACT-->
        <div class="col-md-7">
        <br><br><br><br><br><br><br><br><br>
        <!--TITRE-->
          <h2 class="mt-5 mb-5">Formulaire de Contact</h2>
          
          <!--FORM-->
          <form class="row" id="form-contact" name="formulaire" action="" method="post">
          <!-- ALERT BOOTSTRAP si envoi mail = success -->
            <div class="alert alert-secondary alert-dismissible collapse" role="alert">
              <strong>Mail envoyé.</strong> Nous vous contacterons au plus tard dans les 48h.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="redirectAfterClose()"></button>
           </div>
            <div class="row mt-3">
              <div class="col-md-6 mb-3">
                <label for="inputEmail" class="form-label"><b>Email</b></label>
                <input type="email" class="form-control" id="inputEmail" name="email" onblur="validEmail(this);" required>
                <span id="noEmail"></span>
              </div>
              <div class="col-md-6 mb-3">
                <label for="inputPhone" class="form-label"><b>Téléphone</b></label>
                <input type="text" class="form-control" id="inputPhone" name="phone" minlength="10" maxlength="10"required>
                <span id="noPhone"></span>
              </div>
            </div>
            <div class="row mt-1">
              <div class="col-12 mb-3">
                <label for="inputMessage" class="form-label"><b>Message</b></label>
                <textarea class="form-control" id="inputMessage" rows="3" name="message" minlength="10" maxlength="150" required ></textarea>
                <span id="noMessage"></span>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-12 mb-2">
                <button type="button" class="btn btn-dark" id="sendButton" name="send" onclick="sendEmail()">Envoyer</button>
              </div>
            </div>
         </form>
        </div>
      </div>
    </div>

<script src="http://code.jquery.com/jquery-3.5.1.min.js"></script>

<script type="text/javascript">

function validEmail(emailInput){
  const emailRegex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

  if(emailRegex.test(emailInput.value) == false){
    alert ('email invalide');
    return false;
  }
return true;
}

// fonctions pour l'envoi d'email
function sendEmail(){
  
  var email = $("#inputEmail");
  var phone = $("#inputPhone");
  var message = $("#inputMessage");

  if((email) && isNotEmpty(phone) && isNotEmpty(message))
  {
    $.ajax({ // ou $.post() 
      url: 'sendEmail.php',
      method: 'POST',
      dataType: 'json',
      data:{
        email: email.val(),
        phone: phone.val(),
        message: message.val()
      }, success: function(response){
        $('#form-contact')[0].reset();
      } 
    });
    $('.alert').show();
  }
}

function redirectAfterClose(){
  window.location.href='index.php';
}

function isNotEmpty(caller){
  if(caller.val()==""){
    caller.css('border', '1px solid red');
    return false;
  }else{
    caller.css('border', '');
    return true;    
  }
} 

//https://www. pierre-giraud.com/jquery-apprendre-cours/creation-requete-ajax/
</script>

    <!--MAP -->
    <div class="container-fluid mt-5 map" id="greyscale">
        <br />
        <iframe id="map-size" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d27452.4482487029!2d2.3591198054291302!3d48.82405325064375!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e670397230f03b%3A0x264240885a2a92df!2sSTUDIO%20PHOTO%20NOVAK!5e0!3m2!1sfr!2sfr!4v1612777231719!5m2!1sfr!2sfr" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">></iframe>
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
  </body>
</html>