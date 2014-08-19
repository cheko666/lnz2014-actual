<?php
include('db.php');

mysql_select_db($database_Link, $Link);
$query_Productos = "SELECT ID,Title FROM Marcas2";
$Productos = mysql_query($query_Productos, $Link) or die(mysql_error());
$row_Productos = mysql_fetch_assoc($Productos);
  
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Untitled Document</title>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<th scope="col">Nombre del Producto</th>
		<th scope="col">Nombre SEO</th>
	</tr>
</table>
<?php
do { 
	$nombre= utf8_encode($row_Productos['Title']);
	$nombre_urlamigable = urls_amigables($nombre);
	$id = $row_Productos['ID'];
	echo $nombre_urlamigable;
	
	$updateSQL= "UPDATE Marcas2 x SET x.URLSegment='$nombre_urlamigable' WHERE x.ID=$id";
	mysql_select_db($database_Link, $Link);
	$Result = mysql_query($updateSQL, $Link) or die(mysql_error());
	
	}
while ($row_Productos = mysql_fetch_assoc($Productos)) 
?>
</body>
</html>