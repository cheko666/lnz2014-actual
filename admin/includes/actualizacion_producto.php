<?php

$hostname_Link = "localhost";
$database_Link = "lanceta_bd_tw";
$username_Link = "lanceta_superAdm";
$password_Link = "070209S";
$Link = mysql_connect($hostname_Link, $username_Link, $password_Link) or trigger_error(mysql_error(),E_USER_ERROR); 

include ('../../includes/funciones.php');

if (isset($_POST['id'])) {
	
	//actualiza los datos del empleados
	mysql_select_db($database_Link, $Link);
	
	if (isset($_POST['title']) && isset($_POST['id'])) {
		
		$id = $_POST['id'];
		$title = $_POST['title'];
		$informacion = $_POST['informacion'];		
		$url_segment = urls_amigables($title);
		
		//$nombre_producto = 	utf8_decode($_POST['nombre_producto']);
		$query_upd_Producto="UPDATE Productos p
		SET p.Title = '$title',
		p.Informacion = '$informacion',
		p.URLSegment = '$url_segment' WHERE p.ID = $id";
	}
	
	$Resultado = mysql_query($query_upd_Producto, $Link) or die(mysql_error());
	if ($Resultado) { echo 1; } else { echo 0;}

}

if (isset($_POST['codigo'])) {
	
	$codigo = $_POST['codigo'];
	//actualiza los datos del empleados
	mysql_select_db($database_Link, $Link);
	
	if (isset($_POST['presentacion'])) {
	$presentacion = utf8_decode($_POST['presentacion']);
	$query="UPDATE Productos_Lanceta pl SET pl.Presentacion='$presentacion' WHERE Concat(pl.Grupo,pl.Producto)=$codigo";
	}
	
	$Resultado = mysql_query($query, $Link) or die(mysql_error());
	if ($Resultado) { echo 1; } else { echo 0;}
		
}
?>