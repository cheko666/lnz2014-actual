<?php include('Connections/bd.php'); 
require_once('includes/UserAuthentication.class.php');  
// utilizamos conexion por defecto.
$userAuthentication = new UserAuthentication(); 
 
$titulo = "Quienes somos";

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
                    <h2>Historia</h2>
                    <div style="float:right ;margin-left:10px; min-height:195;"><img src="images/_MG_1093.jpg" width="240" height="192" hspace="10" align="right"></div>
                    <p>Lanceta S.A., es creada en el a&ntilde;o 1977, como una empresa dedicada a la venta de productos de curaci&oacute;n, instrumental y equipos m&eacute;dicos, con un concepto tradicional de venta al sector gobierno y empresas particulares.</p>
                    <p>En 1990 cambia al novedoso y &uacute;nico concepto de autoservicio:<br>
                      Se convierte en el PRIMER AUTOSERVICIO M&Eacute;DICO EN AMERICA, para venta y atenci&oacute;n directa a m&eacute;dicos y pacientes, cambiando su raz&oacute;n social a Lanceta HG S.A. de C.V. </p>
                    <h2>Concepto</h2>
                    <p>Las tiendas Lanceta HG, son tiendas de autoservicio, que ofrecen por primera vez al m&eacute;dico y al p&uacute;blico general la venta directa de: productos m&eacute;dicos, material de curaci&oacute;n, instrumental, muebles y todo lo relacionado con el cuidado y atenci&oacute;n de la salud; a trav&eacute;s de un servicio aut&oacute;nomo, el cual le permite al comprador estar en contacto directo con el producto a adquirir y con ello hacer una selecci&oacute;n propia a trav&eacute;s de conocer y comparar el producto que busca. </p>
                    <p>Con gran orgullo aseguramos que contamos con m&aacute;s de 5,000 productos de 400 marcas.<br>
                      Tenemos una magn&iacute;fica relaci&oacute;n con nuestros proveedores, lo que por a&ntilde;os nos ha permitido establecer excelentes relaciones comerciales que se ven reflejadas en los precios que ofrecemos a nuestros clientes. </p>
                    <h2>Compromiso</h2>
                    <div style="float:right ;margin-left:10px; min-height:195;"><span style="clear:both;margin-top:10px; min-height:195;"><img src="images/20130309_hl_0030.jpg" width="240" height="159" hspace="10" align="right"></span></div>
                    <p>Entendemos las necesidades del profesional de la medicina, as&iacute; como de los pacientes que necesitan tener productos de calidad y de vanguardia, precios competitivos con abasto oportuno y confiable. Por lo que nuestro compromiso es mantener los est&aacute;ndares de calidad en servicio y atenci&oacute;n que usted merece. </p>
                    <h2>Caracter&iacute;sticas:</h2>
                    <ul class="lista1">
                      <li>Experiencia</li>
                      <li>Profesionalismo</li>
                      <li>Responsabilidad</li>
                      <li>Trato humano</li>
                      <li>Excelentes instalaciones</li>
                      <li>Trabajo en equipo...</li>
                    </ul>
                    <p><strong><em>&nbsp;&nbsp;&nbsp;y muchas ganas de atenderle!</em></strong></p>

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
