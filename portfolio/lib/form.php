<?php
/* 
Cette fonction sert à garder en mémoire dans l'input 
l'identifiant de l'admin si le mot de passe est faux 
au rechargemen de la page
*/

function input($id){ // en param l'id du champs
    $value = isset($_POST[$id]) ? $_POST[$id] : ''; 
    // si l'admin a tappé son id, afficher l'id, sinon, ne rien afficher
    return "<input type='text' class='form-control-sm' id='$id' name='$id' 
    value='$value'>";
}
