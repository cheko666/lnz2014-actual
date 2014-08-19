<?php include('Connections/bd.php'); 
 
$categoria = $_GET['cat'];

$currentPage = 'categorias/'.$_GET['cat'].'/';

mysql_select_db($database_Link, $Link);
mysql_query("SET NAMES 'utf8'");
$query_Categoria = "SELECT * FROM Categorias c WHERE c.URLSegment LIKE '%$categoria' LIMIT 1";
$Categoria = mysql_query($query_Categoria, $Link) or die(mysql_error());
$row_Categoria = mysql_fetch_assoc($Categoria);

$idCategoria= $row_Categoria['ID'];

$titulo = $row_Categoria['Title'];

$maxRows_Productos = 21;
$pageNum_Productos = 0;

if (isset($_GET['pageNum_Productos'])) {
	if ($_GET['pageNum_Productos']==''){
  		$pageNum_Productos = $_GET['pageNum_Productos'];
	} else { $pageNum_Productos = $_GET['pageNum_Productos']-1; }
}
$startRow_Productos = $pageNum_Productos * $maxRows_Productos;

mysql_select_db($database_Link, $Link);
mysql_query("SET NAMES 'utf8'");
$query_Productos = "SELECT p.ID, p.Title AS Titulo, p.URLSegment AS URL_Producto, p.TieneFoto, p.NombreImagen, m.Title AS Marca,  p.Activo, p.TienePromo
FROM Productos p
JOIN Marcas m ON m.ID = p.MarcasID
JOIN Categorias_Productos cp ON cp.ProductosID  = p.ID 
WHERE cp.CategoriasID=$idCategoria AND p.Activo=1
GROUP BY p.ID
ORDER BY p.TienePromo DESC, p.TieneFoto DESC, p.Title ASC";
$query_limit_Productos = sprintf("%s LIMIT %d, %d", $query_Productos, $startRow_Productos, $maxRows_Productos);
$Productos = mysql_query($query_limit_Productos, $Link) or die(mysql_error());
$row_Productos = mysql_fetch_assoc($Productos);

if (isset($_GET['totalRows_Productos'])) {
  $totalRows_Productos = $_GET['totalRows_Productos'];
} else {
  $all_Productos = mysql_query($query_Productos);
  $totalRows_Productos = mysql_num_rows($all_Productos);
}
$totalPages_Productos = ceil($totalRows_Productos/$maxRows_Productos)-1;
?>
<!DOCTYPE HTML>
<html><!-- InstanceBegin template="/Templates/layout.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="keywords" content="<?php echo $metakeywords;?>">
<meta name="description" content="<?php echo $metadescription;?>">
<link rel="canonical" href="<?php echo $url_base; ?>">
<title><?php if ($_SERVER['PHP_SELF']=='/index.php') {echo $titulo ;} else {echo $titulo.'  |  LancetaHG';}?></title>
<BASE HREF="<?php echo $url_base; ?>" />
<link href="css/layout.css" rel="stylesheet" type="text/css">
<link href="css/global.css" rel="stylesheet" type="text/css">
<link href="css/general.css" rel="stylesheet" type="text/css">
<link href="css/organictabs.css" rel="stylesheet" type="text/css">
<link href="css/ui-lightness/jquery-ui-1.10.4.custom.min.css" rel="stylesheet" type="text/css"/>
<link href="css/jquery.lightbox-0.5.css" rel="stylesheet" type="text/css"  media="screen" />
<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="js/jquery.lightbox-0.5.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.10.4.custom.min.js"></script>
<script type="text/javascript" src="js/organictabs.jquery.js"></script>
<script type="text/javascript" src="js/slides.min.jquery.js"></script>
<script type="text/javascript" src="js/funciones.js"></script>
<script type="text/javascript" src="js/funciones_validar.js"></script>
<script type="text/javascript">
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-45234024-1', 'www.lancetahg.com.mx');
  ga('send', 'pageview');
</script>
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>
<body oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
	<?php  include("includes/top.php");?>
	<div id="main">	
	<?php include('includes/header.php');?>
		<div id="banner_content">
		<!-- InstanceBeginEditable name="Banner" -->
		
		<!-- InstanceEndEditable -->
		</div>
		<div style="clear:both"></div>
		<div id="col_izquierda">
			<?php include("includes/sidebar.php"); ?>
		</div><!--Termina col_derecha-->
		<div id="col_derecha">
			<div id="contenido">
			  <!-- InstanceBeginEditable name="Contenido" -->
				<div id="titulo">
                	<h1><?php echo $titulo;?></h1>
                </div>	
				<div id="productos_grid">
                
				<?php if(mysql_num_rows($Productos)==0) { echo "<div class='mensaje'>".$mensajeProductoNoEncontrado."</div>";?>
				<?php } else { ?>
		              
				<?php include ('includes/producto-item.php'); ?>

				<?php } ?>
				</div><!--Termina productos_grid-->
				<?php include('includes/banners.php');?>				
		 		<div style="clear:both;"></div>		  		      
			  <!-- InstanceEndEditable -->
			</div><!--Termina contenido-->	
		</div><!--Termina col_derecha-->
			
	<?php include('includes/footer.php');?>		
	</div><!--Termina main-->	
<!-- InstanceBeginEditable name="Scripts" -->
<script type="text/javascript">
<!--
//-->
</script>
<?php
mysql_free_result($Productos);
mysql_free_result($Categorias);
mysql_free_result($Marcas);
mysql_free_result($Categorias_nombres);
?>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>
