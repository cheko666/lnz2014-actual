<?php include('Connections/bd.php'); 
$maxRows_Productos_Promo = 6;

mysql_select_db($database_Link, $Link);
$query_Productos_Promo = "SELECT p.ID, p.Title AS Titulo, p.URLSegment AS URL, p.TieneFoto, p.NombreArchivo, m.Title AS Marca,  p.Activo, ppr.descuento
FROM Productos p
JOIN Marcas m ON m.ID=p.MarcasID
JOIN Productos_Promocion ppr ON ppr.id_Producto=p.ID
JOIN Productos_Lanceta pl ON pl.ProductosID = p.ID
WHERE ppr.id_promo=1 AND p.Activo=1 AND ppr.activo=1 AND pl.AgotarExistencia='N'
GROUP BY p.ID
ORDER BY p.TieneFoto DESC, Titulo ASC";
$query_limit_Productos_Promo = sprintf("%s LIMIT 1,%d", $query_Productos_Promo, $maxRows_Productos_Promo);
$Productos_Promo = mysql_query($query_limit_Productos_Promo, $Link) or die(mysql_error());
$row_Productos_Promo = mysql_fetch_assoc($Productos_Promo);

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
                    <div id="productos_grid" style="background-color:#f4f4f4; border: #999 solid 1px; margin-bottom:30px;">
                    <h2 class="center">Productos en promoci&oacute;n</h2>
                            <?php do { ?>
                                <a onMouseOut="this.style.backgroundColor='#FFFFFF'" onMouseOver="this.style.backgroundColor='#F8F8F8'" style="background-color: #FFFFFF; border: 1px solid #DDDDDD; margin: 10px ; display: block; float: left; text-decoration: none; text-align: center; cursor: pointer; -moz-border-radius: 8px; border-radius: 8px; -webkit-border-radius: 8px;" href="<?php echo 'productos/'.$row_Productos_Promo['ID'].'/'.$row_Productos_Promo['URL']; ?>" >
                                    <div class="content_producto">
                                        <div class="Prod_info">
                                            <?php if ($row_Productos_Promo['TieneFoto'] == 0) { // Mostrar si hay foto ?>
                                            <img src="images/productos/00.jpg" width="100" height="100" alt="Imagen no disponible" title="Imagen no disponible" />
                                            <?php } else { // Mostrar si hay foto ?>
                                            <img src="images/productos/ch/<?php echo $row_Productos_Promo['NombreArchivo']; ?>.jpg" width="100" height="100" alt="<?php echo utf8_encode($row_Productos_Promo['Titulo']); ?>" title="<?php echo utf8_encode($row_Productos_Promo['Titulo']); ?>" />
                                            <?php } // Termina Mostrar si hay foto ?>
                                            <p class="prod_nombre"><?php $cadena = utf8_encode($row_Productos_Promo['Titulo']); echo limitarPalabras($cadena,5); ?></p>
                                            <p class="prod_marca"><?php echo $row_Productos_Promo['Marca']; ?></p>
                                            </div>
                                        <div class="descuento_label_ch">
                                        <?php echo $row_Productos_Promo['descuento'];?>
                                        </div>
                                        <div class="boton">Ver detalle</div>
                                        </div>
                                    </a>
                                <?php } while ($row_Productos_Promo = mysql_fetch_assoc($Productos_Promo)); ?>
                        <div style="clear:both"></div>
                        <div id="btn_regresar">
                            <div style="width:400px; margin:0 auto;"><a href="productos/promociones/descuentos">Ver todos los productos en promoci&oacute;n &raquo;</a></div>
                            <div style="clear:both"></div>
                        </div>
                    </div><!--Termina div-->
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
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>
