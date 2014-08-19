<?php include('Connections/bd.php'); 
require_once('includes/UserAuthentication.class.php');  
// utilizamos conexion por defecto.
$userAuthentication = new UserAuthentication(); 
 
$titulo = "Proveedores";

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
				<div id="texto_grid">
                	<table width="300" border="0" align="center" cellpadding="0" cellspacing="10">
  <tr>
    <td align="center" style="text-align:center;">
    	<img src="images/lanceta_contrarecibo.jpg" width="155" height="200" style="border:#999999 solid 1px;"/>
    </td>
  </tr>
  <tr>
    <td align="center" style="text-align:center; font-size:14px; font-weight:bold;">
    	<a href="Pdfs/Lncta_contrarecibo.pdf" target="_blank" alt="Descarga el formato de contrarecibo" title="Click para descargar contrarecibo">&raquo;Descargar archivo&laquo;</a></td>
  </tr>
  <tr>
    <td align="center" style="text-align:center;"><em class="boldCentrado"><small><strong>Adobe Acrobat necesario para visualizar el archivo. <br>
Si no lo tiene puede bajarlo de <a href="http://www.adobe.com/la/products/acrobat/readstep2.html" target="_blank">aquí.</a></strong></small></em></td>
  </tr>
</table>
				</div><!--Termina texto_grid-->	
				<?php include('includes/banners.php')?>				
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
mysql_free_result($Categorias);
mysql_free_result($Marcas);
?>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>
