<?php 
include ('db.php');
//include ('funciones_admin.php');
//Modificacion de la Info del producto
if(isset($_POST['id_prod']) && isset($_POST['info_prod'])) {
  $info_prod = utf8_decode($_POST['info_prod']);
  $id_prod = $_POST['id_prod'];

	mysql_select_db($database_Link, $Link);
	$update_Producto_Info = "UPDATE Productos p 
	SET p.Informacion = '$info_prod'
	WHERE p.ID=$id_prod";
	$Producto_Info = mysql_query($update_Producto_Info, $Link) or die(mysql_error());
    echo 1;
  } else {
	echo 0;
}

?>