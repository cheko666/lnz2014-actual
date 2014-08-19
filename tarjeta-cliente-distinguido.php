<?php include('Connections/bd.php'); 
require_once('includes/UserAuthentication.class.php');  
// utilizamos conexion por defecto.
$userAuthentication = new UserAuthentication(); 
 
$titulo = "Tarjeta de Cliente Distinguido";

$metakeywords = "tarjeta,cliente,distinguido,descuento,beneficio,compra,".$metakeywords;

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
                  <p>En Lanceta HG, nos preocupamos por su econom&iacute;a, por tal 
                    motivo presentamos la <br>
                    <span class="enfasis">TARJETA de CLIENTE DISTINGUIDO</span>,
                    la cual le otorgar&aacute; grandes beneficios.</p>
                    <p class="center"><img src="images/ClienteD_tarjeta.jpg" width="300" height="180" class="imagen1"></p>
                    <h3>Beneficios</h3>
                    <ul class="lista1">
                      <li>Descuento inicial del 5%.</li>
                      <li><span class="enfasis">Descuento por volumen</span> de hasta el 15% conforme al promedio de compras trimestral.</li>
                      <li><span class="enfasis">Cupones de bonificaci&oacute;n</span> a clientes distinguidos.</li>
                      <li>La tarjeta de Cliente Distinguido es efectiva en cualquiera de las sucursales de Lanceta HG.</li>
                    </ul>
                  <h3>Requisitos</h3>
                  <p> Presentar en original y copia simple:</p>
                  <ul class="lista1">
                    <li>Registro federal de contribuyente*.</li>
                    <li>Comprobante de domicilio*.</li>
                    <li>Identificaci&oacute;n oficial*.</li>
                    <li>Factura reciente de compra en alguna de nuestras sucursales*.</li>
                    <li>Llenar la solicitud. <span class="pNotasLinks"><a href="Pdfs/ClientDistForm.pdf" class="enfasis" target="_blank">Ver solicitud en PDF</a></span></li>
                  </ul>
                  <h3>Restricciones</h3>
                    <ul class="lista1">
                      <li>El descuento ser&aacute; v&aacute;lido s&oacute;lo al presentar &eacute;sta tarjeta en caja.</li>
                      <li>No aplican descuentos en productos con otra promoci&oacute;n.</li>
                    </ul>
                    <p></p>
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
