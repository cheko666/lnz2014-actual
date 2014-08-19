<?php
include('../includes/verif_Authenticate.php');
 
$currentPage = $_SERVER["PHP_SELF"];

$titulo = 'Grupos ';

$maxRows = 10;
$pageNum = 0;

if (isset($_GET['pageNum'])) {
	if ($_GET['pageNum']==''){
  		$pageNum = $_GET['pageNum'];
	} else { $pageNum = $_GET['pageNum']; }
}
$startRow = $pageNum * $maxRows;

mysql_select_db($database_Link, $Link);
mysql_query("SET NAMES utf8");

if (!isset($_GET['grupo']) || $_GET['grupo']=='')
{
	$query="SELECT p.Serie, s.Nombre, count(*) AS Total_Productos, (count(p.ID)-SUM(TieneFoto)) AS Faltan_Fotos, SUM(IF(p.Informacion IS  NULL, '1', '0')) AS Faltan_Infos
	FROM Productos p
	JOIN Series s ON s.Serie = p.Serie
	WHERE p.Activo=1
	GROUP BY Serie";
	
}
else
{
	$grupo = $_GET['grupo'];
	$hay_id_grupo=1;
	
	$query="SELECT m.Title AS Marca, p.Serie, s.Nombre, p.NombreImagen, c.ProductosID AS ID, p.Title AS Nombre_Web, FotoTamano, IF(p.Informacion IS NOT NULL, 'Si', 'No') AS Tiene_Info, IF(p.TieneFoto = 1, 'Si', 'No') AS Tiene_Foto, IF(p.Activo = 1, 'Si', 'No') AS Activo
	FROM Codigos c
	LEFT JOIN Productos p ON p.ID = c.ProductosID
	JOIN Marcas m ON m.ID = p.MarcasID
	JOIN Series s ON s.Serie = LEFT(c.Codigo,3)
	WHERE c.AgotarExistencia = 'N' AND p.Activo = 1 AND s.Serie = $grupo
	GROUP BY ProductosID
	ORDER BY p.Title,Tiene_Foto";
		
}
$query_limit = sprintf("%s LIMIT %d, %d", $query, $startRow, $maxRows);
$Reg = mysql_query($query_limit,$Link) or die(mysql_error());
$row = mysql_fetch_assoc($Reg);

if ( empty($id_Producto) )
{
	$mensaje = 'No existen producto asociados al grupo que introdujo:<br>';
	$mensaje .= '<h3><span class="label label-default">'.$grupo.'</span></h3><br>';
	$mensaje .= 'Por favor, introduzca un grupo que sí exista.';
}


$subtitulo = (!isset($_GET['grupo']) || $_GET['grupo']=='') ? "" : $row['Nombre'];

if (isset($_GET['totalRows'])) {
  $totalRows = $_GET['totalRows'];
} else {
  $all = mysql_query($query);
  $totalRows = mysql_num_rows($all);
}
$totalPages = ceil($totalRows/$maxRows)-1;

$queryString = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum") == false && 
        stristr($param, "totalRows") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString = sprintf("&totalRows=%d%s", $totalRows, $queryString);
?>
<!DOCTYPE HTML><html><!-- InstanceBegin template="/Templates/layout_backend.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="keywords" content="<?php echo $metakeywords;?>">
<meta name="description" content="<?php echo $metadescription;?>">
<!-- InstanceBeginEditable name="doctitle" -->
<title><?php echo $titulo."| LancetaHG";?></title>
<!-- InstanceEndEditable -->
<BASE HREF="<?php echo $url_base; ?>" />
<link href="css/be.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/layout.css" rel="stylesheet" type="text/css">
<link href="../css/ui-lightness/jquery-ui-1.10.4.custom.min.css" rel="stylesheet" type="text/css"/>
<link href="../css/jquery.lightbox-0.5.css" rel="stylesheet" type="text/css"  media="screen" />
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>
<body>
    <?php include('../includes/header_admin.php');?>
	<div id="main">	
		<div style="clear:both"></div>
		<div id="contenido">
		<!-- InstanceBeginEditable name="Contenido" -->
		<div style="clear:both"></div>
			<div id="titulo">
				<div class="page-header">
				  <h1>Faltantes de información y fotos por series<small><?php //echo $titulo;?></small></h1>
				</div>
			</div>
			<div style="clear:both"></div>

			<div style="margin-bottom:10px;">
				<div style="float:left; width:150px;"><a href="javascript:window.history.back();">&laquo; Volver </a></div>
				<div style="float:right;">
					<form class="form-inline" role="form" action="series.php" method="get">
					  <div class="form-group">
						<label class="sr-only" for="inputMarca">Clave de Serie</label>
						<input type="text" class="form-control input-sm" id="inputMarca" name="grupo" placeholder="Serie">
					  </div>
					  <button type="submit" class="btn btn-default btn-sm">Buscar</button>
					</form>
				</div>
				<div style="clear:both"></div>
			</div>
            
<?php if (empty($row)) {?>
	<div class="alert alert-danger text-center">
    	<?php echo $mensaje;?>
    </div>
<?php } else { ?>      

<?php include('../includes/paginator3.php');?>


	<?php if ($hay_id_grupo) {?>
    <div class="panel panel-default">
      <div class="panel-heading">
      	<h2 class="text-center">Serie &nbsp;<?php echo $row['Serie']; ?></h2></div>
      <div class="panel-body">
      
			  <table class="table table-hover">
			  <thead>
					<tr>
					<th width="80">Códigos</th>
					<th>Nombre en Web</th>
					<th width="150">Marca</th>
					<th width="150">Modelos</th>
					<th width="80">    Foto</th>
					<th width="50">Info</th>
					<th width="80">&nbsp;</th>
			  </thead>
			  <?php 
			  do {
				  
				?>  
				<tr>
					<td width="80">
					<?php
					$id=$row['ID'];
					mysql_select_db($database_Link, $Link);
					$q_codigos="SELECT c.Codigo 
					FROM Codigos c
					WHERE ProductosID = $id AND ProductosID != 0 AND ProductosID IS NOT NULL AND AgotarExistencia = 'N'
					ORDER BY Codigo";
					$Reg_codigos = mysql_query($q_codigos,$Link) or die(mysql_error());
					while($row_codigos = mysql_fetch_assoc($Reg_codigos)) {
						echo $row_codigos['Codigo']."<br>";
						
					} ;
					?>
					</td>
					<td><?php echo $row['Nombre_Web'];?></td>
					<td width="150"><?php echo $row['Marca'];?></td>
					<td width="150">
                    
					<?php
					mysql_select_db($database_Link, $Link);
					$q_modelos="SELECT c.Modelo
					FROM Codigos c
					WHERE ProductosID = $id AND ProductosID != 0 AND ProductosID IS NOT NULL
					ORDER BY Codigo";
					$Reg_modelos = mysql_query($q_modelos,$Link) or die(mysql_error());
					while($row_modelos = mysql_fetch_assoc($Reg_modelos)) {
						echo $row_modelos['Modelo']."<br>";
						
					} ;
					?>
                    
                    </td>
					<td width="80" align="center">
						<?php if ($row['Tiene_Foto'] == 'No') { // Mostrar si hay foto ?>
							<img src="http://www.lancetahg.com.mx/images/productos/0.jpg" width="60" height="60">				<?php } else { // Mostrar si hay foto ?>
							<img src="http://www.lancetahg.com.mx/images/productos/ch/<?php echo $row['NombreImagen']; ?>.jpg" width="60" height="60" alt="<?php echo $row_Producto['Nombre_Web']; ?>" title="<?php echo $row_Producto['Nombre_Web']; ?>" />
						<?php } // Termina Mostrar si hay foto ?>
					</td>
                    <td width="50">
					<?php
					echo $row['Tiene_Info']=='Si' ? '<img src="../images/Yes_check.png" width="20" height="20">' : '<img src="../images/No_check.png" width="20" height="20">';?></td>
					<td width="80"><a class="btn btn-warning btn-xs" href="producto_detalle.php?ID=<?php echo $row['ID'];?>" role="button">Ver detalle</a></td>
				</tr>
			<?php	  
			  } while ($row = mysql_fetch_assoc($Reg))
			  ?>
			 </table>
        <div class="clearfix"></div>

      </div>
    </div>
	<?php } else {?>
    <div style="width:900px; margin:0 auto;">
	<table class="table table-hover">
    	<thead>
            <tr>
            <th width="40">Serie</th>
            <th>Nombre de serie</th>
            <th width="170" align="center">Marcas</th>
            <th width="80" align="center">Total de productos</th>
            <th width="50" align="center">Faltan Fotos</th>
            <th width="50" align="center">Faltan Infos</th>
            <th width="75" align="center">Completo</th>
            <th width="80">&nbsp;</th>
		</thead>
          <?php
		  do {
			  $estatus= ($row['Faltan_Fotos']==0 && $row['Faltan_Infos']==0) ? '<img src="../images/Yes_check.png" width="20" height="20">' : '<img src="../images/No_check.png" width="20" height="20">';
			?>  
			<tr>
				<td width="40"><?php echo $row['Serie'];?></td>
			  <td><strong><?php echo $row['Nombre'];?></strong></td>
				<td width="170">
                	<ul>
				  <?php 
					mysql_select_db($database_Link, $Link);
					$q_marcas="SELECT m.Title
					FROM Marcas m
					JOIN Marcas_Series ms ON ms.Marca = m.ID
					WHERE ms.Grupo = ".$row['Serie']." AND m.ID!= 0
					GROUP BY Title
					";
					$Reg_marcas = mysql_query($q_marcas,$Link) or die(mysql_error());
					while($row_marcas = mysql_fetch_assoc($Reg_marcas)) {
						echo "<li><small>".$row_marcas['Title']."</small></li>";						
					} ;
					?>
                    </ul>				
                </td>
				<td width="80" align="center"><?php echo $row['Total_Productos'];?></td>
				<td width="50" align="center"><?php echo $row['Faltan_Fotos'];?></td>
			  <td width="50" align="center"><?php echo $row['Faltan_Infos'];?></td>
				<td width="75" align="center">
                	<?php
					echo $estatus;
					?>
                </td>
				<td width="80"><a class="btn btn-warning btn-xs" href="series.php?grupo=<?php echo $row['Serie'];?>" role="button">Ver detalle</a></td>
			</tr>
		<?php	  
		  } while ($row = mysql_fetch_assoc($Reg))
		  ?>
		 </table>
          </div>
	<?php }?>            

	<?php include('../includes/paginator3.php');?>
    
	<?php } ?>
    
		<!-- InstanceEndEditable -->
		</div><!--Termina contenido-->				
	</div><!--Termina main-->	
	<?php //include('../includes/footer_admin.php');?>		
	<script type="text/javascript" src="../js/jquery-1.10.2.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script type="text/javascript" src="../js/jquery.lightbox-0.5.js"></script>
</body>
<!-- InstanceEnd --></html>