<?php
require_once('../includes/UserAuthentication.class.php');  
if(isset($_POST['username']) && $_POST['password']) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $userAuthentication = new UserAuthentication();
  if($userAuthentication->doLogin($username,$password)) {
    echo 1;
  } else {
	echo 0;
  }
}

?>