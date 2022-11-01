<?php 
$mdp = 'admin';
$mdp_hash = password_hash($mdp, PASSWORD_BCRYPT);
echo $mdp_hash;


echo $_SERVER['DOCUMENT_ROOT'];

?>