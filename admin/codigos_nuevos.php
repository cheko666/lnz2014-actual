<?php
include('../includes/verif_Authenticate.php');
 
$titulo = '';

$maxRows = 30;
$pageNum = 0;

mysql_select_db($database_Link, $Link);
mysql_query("SET NAMES utf8");
$query_codigos= "SELECT c.Codigo, c.DescripcionProducto AS Descripcion, c.Modelo, m.Title AS Marca, u.Title AS Unidad, c.AgotarExistencia, c.DarDeBaja
FROM Codigos c
JOIN Unidades u ON u.ID = c.Unidad
LEFT JOIN Codigos_M8 m8 ON CONCAT(m8.Grupo,m8.Producto) = c.Codigo
LEFT JOIN Marcas m ON m.ID = m8.Marca
WHERE c.ProductosID IS NULL AND c.AgotarExistencia = 'N' AND c.DarDeBaja = 'N' AND c.Codigo!=1001 AND c.Codigo!=1002
ORDER BY Marca,Descripcion";
$query_codigos_limit = sprintf("%s LIMIT %d, %d", $query_codigos, $startRow, $maxRows);
$codigos = mysql_query($query_codigos_limit,$Link) or die(mysql_error());
$row_codigos= mysql_fetch_assoc($codigos);

?>
<!DOCTYPE HTML><html><!-- InstanceBegin template="/Templates/layout_backend.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="keywords" content="<?php echo $metakeywords;?>">
<meta name="description" content="<?php echo $metadescription;?>">
<!-- InstanceBeginEditable name="doctitle" -->
<title><?php echo $titulo."| LancetaHG";?></title>
<!-- InstanceEndEditable -->
<BASE HREF="<?php echo $url_base;?>"/>
<link href="css/be.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/layout.css" rel="stylesheet" type="text/css">
<link href="../css/ui-lightness/jquery-ui-1.10.4.custom.min.css" rel="stylesheet" type="text/css"/>
<link href="../css/jquery.lightbox-0.5.css" rel="stylesheet" type="text/css"  media="screen" />
<!-- InstanceBeginEditable name="head" -->

	ScriptsPie
	<!-- InstanceEndEditable -->
</head>
<body>
    <?php include('../includes/header_admin.php');?>
	<div id="main">	
		<div style="clear:both"></div>
		<div id="contenido">
		<!-- InstanceBeginEditable name="Contenido" -->
			<div id="titulo">
				<div class="page-header">
				  <h1>Códigos nuevos<small><?php //echo $titulo;?></small></h1>
				</div>
			</div>
			<div style="clear:both"></div>
			
			<form action="codigos_nuevos.php" class="form-horizontal" role="form" >
            
			<div class="form-group">
				<button type="submit" class="btn btn-default">Agregar</button>
			</div>

			<div class="form-group">			
		<table class="table table-hover">
            <thead>
                <tr>
					<th width="40">Código</th>
					<th>Descripción</th>
					<th width="170" align="center">Marca</th>
					<th width="80" align="center">Modelo</th>
					<th width="50" align="center">Unidad</th>
					<th width="60" align="center"><small>Dar de Baja</small></th>
					<th width="60" align="center"><small>Agotar Exis.</small></th>
					<th width="10">Selecc.</th>
				</tr>
            <?php while ($row_codigos = mysql_fetch_assoc($codigos)) { ?>
				<tr>
					<td width="40"><?php echo $row_codigos['Codigo'];?></td>
					<td><strong><?php echo $row_codigos['Descripcion'];?></strong></td>
					<td width="170"><?php echo $row_codigos['Marca'];?></td>
					<td width="80" align="center"><?php echo $row_codigos['Modelo'];?></td>
					<td width="50" align="center"><?php echo $row_codigos['Unidad'];?></td>
					<td width="60" align="center"><?php echo $row_codigos['DarDeBaja'];?></td>
					<td width="60" align="center"><?php echo $row_codigos['AgotarExistencia'];?></td>
					<td width="10"><input type="checkbox" name="codigos[]" value="<?php echo $row_codigos['Codigo']; ?>"></td>
				</tr>
            <?php }?>
		 </table>
                     
			</div>
			
			</form>
			
		<!-- InstanceEndEditable -->
		</div><!--Termina contenido-->				
	</div><!--Termina main-->	
	<?php include('../includes/footer_admin.php');?>		
	<script type="text/javascript" src="../js/jquery-1.10.2.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script type="text/javascript" src="../js/jquery.lightbox-0.5.js"></script>
</body>
<!-- InstanceEnd --></html>