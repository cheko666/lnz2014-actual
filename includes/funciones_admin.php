<?php
function buscarCodigo($codigo) {
	global $database_Link, $Link;
	mysql_select_db($database_Link, $Link);
	$query = "SELECT CONCAT( pl.Grupo, pl.Producto ) AS Codigo, ProductosID AS ID, DescripcionProducto AS Descripcion, m.Title AS Marca
	FROM Productos_Lanceta pl
	JOIN Marcas m ON m.ID = pl.Marca
	WHERE CONCAT( pl.Grupo, pl.Producto ) ='$codigo'
	LIMIT 1";
	$Resultado = mysql_query($query, $Link) or die(mysql_error());
	
	return $Resultado;
}

function modificarInfoProducto($info_prod) {
	global $database_Link, $Link;
	mysql_select_db($database_Link, $Link);
	$query = "SELECT CONCAT( pl.Grupo, pl.Producto ) AS Codigo, ProductosID AS ID, DescripcionProducto AS Descripcion, m.Title AS Marca
	FROM Productos_Lanceta pl
	JOIN Marcas m ON m.ID = pl.Marca
	WHERE CONCAT( pl.Grupo, pl.Producto ) ='$codigo'
	LIMIT 1";
	$Resultado = mysql_query($query, $Link) or die(mysql_error());
	
	return;

}

?>