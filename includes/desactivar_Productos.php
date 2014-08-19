<?php
/*
Código para desactivar productos de la página en donde todos sus códigos de Lanceta estén como Agotar Existencia
*/
include('db2.php');

mysql_select_db($database_Link, $Link);
$query_IDs = "SELECT DISTINCT (ProductosID) AS ID
FROM  `Productos_Lanceta` 
WHERE ProductosID !=0
AND ProductosID IS NOT NULL ";
$IDs = mysql_query($query_IDs, $Link) or die(mysql_error());
$row_IDs = mysql_fetch_assoc($IDs);

?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Untitled Document</title>
</head>
<body>
<table width="400" border="1" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<th scope="col">ID</th>
		<th scope="col">Códigos Agotar Exis.</th>
		<th scope="col">Códigos Totales</th>
		<th scope="col">Estatus Prod.</th>
	</tr>
<?php do {
	$id_prod=$row_IDs['ID'];
	$estatus_producto='Activo';
	mysql_select_db($database_Link, $Link);
	$query_Codigos_AgotarExistencia = "SELECT COUNT(*) AS cantidad FROM Productos_Lanceta pl WHERE pl.ProductosID =$id_prod AND AgotarExistencia='S'";
	$Codigos_AgotarExistencia = mysql_query($query_Codigos_AgotarExistencia, $Link) or die(mysql_error());
	$row_Codigos_AgotarExistencia = mysql_fetch_assoc($Codigos_AgotarExistencia);
	$Codigos_AgotarExistencia= $row_Codigos_AgotarExistencia['cantidad'];
	
	
	mysql_select_db($database_Link, $Link);
	$query_Total_Codigos = "SELECT COUNT(*) AS total FROM Productos_Lanceta pl WHERE pl.ProductosID =$id_prod";
	$Total_Codigos = mysql_query($query_Total_Codigos, $Link) or die(mysql_error());
	$row_Total_Codigos = mysql_fetch_assoc($Total_Codigos);
	$Total_Codigos= $row_Total_Codigos['total'];

	if($Codigos_AgotarExistencia==$Total_Codigos) {
		mysql_select_db($database_Link, $Link);
		$update_desactivar_Producto= "UPDATE Productos SET Activo=0 WHERE ID = $id_prod";
		$desactivar_Producto = mysql_query($update_desactivar_Producto, $Link) or die(mysql_error());
		$estatus_producto='Desactivado';
	}
?>
	<tr>
		<td align="center"><?php echo $id_prod; ?></td>
		<td align="center"><?php echo $Total_Codigos; ?></td>
		<td align="center"><?php echo $Codigos_AgotarExistencia; ?></td>
		<td align="center"><?php echo $estatus_producto; ?></td>
	</tr>
<?php } while ($row_IDs = mysql_fetch_assoc($IDs)) ?>
</table>
</body>
</html>