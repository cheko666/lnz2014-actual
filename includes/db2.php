<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
  }

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_idUsuario'] = NULL;
  $_SESSION['MM_TipoUsuario'] = 2;
  $_SESSION['PrevUrl'] = NULL;
  $_SESSION['MM_Logeado'] = 0;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_idUsuario']);
  unset($_SESSION['PrevUrl']);
  session_destroy();
	
  $logoutGoTo = "index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}

# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_Link = "localhost";
$database_Link = "lanceta_bd_tw";
$username_Link = "lanceta_superAdm";
$password_Link = "070209S";
$Link = mysql_pconnect($hostname_Link, $username_Link, $password_Link) or trigger_error(mysql_error(),E_USER_ERROR);

$url_base = "/admin/";

include ('funciones.php');
include ('stemm_es.php');

?>