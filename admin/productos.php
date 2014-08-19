<?php
include('../includes/verif_Authenticate.php');
 
$currentPage = $_SERVER["PHP_SELF"];

$titulo = 'Lista de Productos ';

$maxRows = 30;
$pageNum = 0;

if (isset($_GET['pageNum'])) {
	if ($_GET['pageNum']==''){
  		$pageNum = $_GET['pageNum'];
	} else { $pageNum = $_GET['pageNum']; }
}
$startRow = $pageNum * $maxRows;

mysql_select_db($database_Link, $Link);
mysql_query("SET NAMES utf8");

if (!isset($_GET['busqueda']) || $_GET['busqueda']=='')
{
	$query="SELECT p.ID, p.Serie, p.Title, p.TieneFoto, p.NombreImagen, p.Informacion, m.Title AS Marca,  p.Activo, p.TienePromo
FROM Productos p
JOIN Marcas m ON m.ID = p.MarcasID
WHERE p.Activo=1
GROUP BY p.ID
ORDER BY Title";	
}
else
{
	if ($_GET['busqueda']== 'agua') {
		$busqueda = $_GET['busqueda'];	
	}else {
		$busqueda = stemm_es::stemm($_GET['busqueda']);			
	}
	
		
	$hay_id=1;
	
	$query="SELECT p.ID, p.Serie, p.Title, p.TieneFoto, p.NombreImagen, p.Informacion, m.Title AS Marca,  p.Activo, p.TienePromo
FROM Productos p
JOIN Marcas m ON m.ID = p.MarcasID
WHERE p.Activo=1 AND p.Title LIKE '$busqueda%'
GROUP BY p.ID
ORDER BY p.TienePromo DESC, p.TieneFoto DESC, p.Title ASC";
		
}
$query_limit = sprintf("%s LIMIT %d, %d", $query, $startRow, $maxRows);
$Reg = mysql_query($query_limit,$Link) or die(mysql_error());
$row = mysql_fetch_assoc($Reg);

if ( empty($id_Producto) )
{
	$mensaje = 'No existen productos asociados a la busqueda que introdujo:<br>';
	$mensaje .= '<h3><span class="label label-default">'.$busqueda.'</span></h3><br>';
	$mensaje .= 'Por favor, introduzca un producto que sí exista.';
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
				  <h1><?php echo $titulo;?><small></small></h1>
				</div>
			</div>
			<div style="clear:both"></div>

			<div style="margin-bottom:10px;">
				<div style="float:left; width:150px;"><a href="javascript:window.history.back();">&laquo; Volver </a></div>
				<div style="float:right;width:600px;">
					<form class="form-inline text-right" role="form" action="productos.php" method="get">
					  <div class="form-group">
						<label class="sr-only" for="inputMarca">Producto</label>
						<input type="text" class="form-control input-sm" id="busqueda" name="busqueda" placeholder="Producto">
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



    <div style="margin:0 auto;">
	<table class="table table-hover">
    	<thead>
            <tr class="jumbotron">
              <th width="80" align="center">Foto</th>
              <th>Nombre de producto</th>
                <th width="190" align="center">Marca</th>
                <th width="40">Serie</th>
              <th width="50" align="center">Info</th>
              <th width="80">&nbsp;</th>
		</thead>
          <?php
		  do {
			  $estatus= ($row['Faltan_Fotos']==0 && $row['Faltan_Infos']==0) ? '<img src="../images/Yes_check.png" width="20" height="20">' : '<img src="../images/No_check.png" width="20" height="20">';
			?>  
			<tr>
			  <td width="80" align="center"><?php if (!$row['TieneFoto']) { // Mostrar si hay foto ?>
			    <img src="http://www.lancetahg.com.mx/images/productos/0.jpg" width="60" height="60" alt="<?php echo $row_Producto['Title']; ?>" title="<?php echo $row_Producto['Title']; ?>" />
			    <?php } else { // Mostrar si hay foto ?>
			    <img src="http://www.lancetahg.com.mx/images/productos/ch/<?php echo $row['NombreImagen']; ?>.jpg" width="60" height="60" alt="<?php echo $row_Producto['Title']; ?>" title="<?php echo $row_Producto['Title']; ?>" />
			    <?php } // Termina Mostrar si hay foto ?></td>
            <td><?php echo $row['Title'];?></td>
            <td width="190"><?php  echo $row['Marca']?></td>
            <td width="40"><?php echo $row['Serie'];?></td>
            <td width="50" align="center">
				<?php if (!$row['Informacion']) { // Mostrar si hay foto ?>
                    <img src="../images/No_check.png" width="20" height="20">
				<?php } else { // Mostrar si hay foto ?>
                    <img src="../images/Yes_check.png" width="20" height="20">
				<?php } // Termina Mostrar si hay foto ?> 
            </td>
            <td width="80"><a class="btn btn-warning btn-xs" href="producto_detalle.php?ID=<?php echo $row['ID'];?>" role="button">Ver detalle</a></td>
			</tr>
		<?php	  
		  } while ($row = mysql_fetch_assoc($Reg))
		  ?>
	  </table>
	
	</div>
	<?php }?>            

	<?php include('../includes/paginator3.php');?>
    
    
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