<?php

require_once('UserAuthentication.class.php');  
// utilizamos conexion por defecto.
$userAuthentication = new UserAuthentication();

if(!$userAuthentication->isAuthenticated()) {
  // el usuario no está autenticado requiere login.
  header( "Location: /login/login.php?uri=". $_SERVER["REQUEST_URI"]);
}
include('../includes/db2.php');
?>