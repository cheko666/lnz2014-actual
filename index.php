<?php include('Connections/bd.php'); 

$currentPage = $_SERVER["PHP_SELF"];
$titulo = "Tiendas de Autoservicio para M&eacute;dicos y Pacientes  |  LancetaHG";

$maxRows_Productos = 15;

mysql_select_db($database_Link, $Link);
mysql_query("SET NAMES 'utf8'");
$query_Banners= "SELECT pr.titulo, pr.url, pr.activo";

mysql_select_db($database_Link, $Link);
mysql_query("SET NAMES 'utf8'");
$query_Productos = "SELECT p.ID, p.Title AS Titulo, p.URLSegment AS URL_Producto, p.TieneFoto, p.NombreImagen, m.Title AS Marca,  p.Activo, p.TienePromo
FROM Productos p
JOIN Marcas m ON m.ID = p.MarcasID
WHERE p.Activo = 1 AND p.NombreImagen IS NOT NULL
GROUP BY p.ID
ORDER BY RAND()";
$query_limit_Productos = sprintf("%s LIMIT 1,%d", $query_Productos, $maxRows_Productos);
$Productos = mysql_query($query_limit_Productos, $Link) or die(mysql_error());
$row_Productos = mysql_fetch_assoc($Productos);

?>
<!DOCTYPE HTML><html><!-- InstanceBegin template="/Templates/layout.dwt.php" codeOutsideHTMLIsLocked="false" -->
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
<script>
$(function() {
	$('#slides').slides({
		preload: true,
		preloadImage: 'imagenes/slides/loading.gif',
		play: 5000,
		pause: 2500,
		hoverPause: true
	});
});
</script>
<!-- InstanceEndEditable -->
</head>
<body oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
	<?php  include("includes/top.php");?>
	<div id="main">	
	<?php include('includes/header.php');?>
		<div id="banner_content">
		<!-- InstanceBeginEditable name="Banner" -->
        <div style="clear:left;"></div>
<?php if($hay_promos=='true') {?>
        <div id="example">
            <div id="slides">
                <div class="slides_container">
                	<a href="<?php echo $row_Promociones['url_completa'];?>" title="<?php echo utf8_encode($row_Promociones['Title']);?>"><img src="<?php echo $row_Promociones['url_img_banner_princ'];?>" width="905" height="160" alt="<?php echo utf8_encode($row_Promociones['titulo']);?>"></a>
		<?php /* ?>
                    <a href="#" title="Tiendas cerradas por semana santa e inventarios"><img src="images/aviso-semanastainventarios-2014-banner-principal.jpg" width="905" height="160" alt="Tiendas cerradas por semana santa e inventarios"></a>
		<?php */ ?>
                    
                </div>
                
                <a href="#" class="prev"><img src="images/slides/arrow-prev.png" width="24" height="43" alt="Arrow Prev"></a>
                <a href="#" class="next"><img src="images/slides/arrow-next.png" width="24" height="43" alt="Arrow Next"></a>
            </div>
        </div>
<?php } ?>
        
		<!-- InstanceEndEditable -->
		</div>
		<div style="clear:both"></div>
		<div id="col_izquierda">
			<?php include("includes/sidebar.php"); ?>
		</div><!--Termina col_derecha-->
		<div id="col_derecha">
			<div id="contenido">
			  <!-- InstanceBeginEditable name="Contenido" -->
              	<div id="titulo">Bienvenidos</div>
				<div id="productos_grid">	
                
                    <h2 class="center">Algunos de nuestros productos</h2>
										<?php include ('includes/producto-item.php'); ?>
                    <div style="clear:both"></div>
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
mysql_free_result($Promociones);
?>

<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>