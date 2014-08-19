<?php include('Connections/bd.php'); 
require_once('includes/UserAuthentication.class.php');  
// utilizamos conexion por defecto.
$userAuthentication = new UserAuthentication(); 
 
$titulo = "C&oacute;mo comprar";

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
              <h2>En la Cd. de M&eacute;xico y &Aacute;rea Metropolitana</h2>
                  <div class="bloque" style="margin-top:10px;">
                    <h4>Asistiendo a nuestras sucursales:</h4>
                    <ul class="lista1">
                      <li>Hospital General</li>
                      <li>Hiper LancetaHG</li>
                      <li>La Raza</li>
                      <li>Tlalpan</li>
                      <li>Sat&eacute;lite</li>
                      <li>Aguascalientes, Ags.</li>
                    </ul>
                    <p>Le invitamos a recorer los pasillos de cualquiera de nuestras <a href="sucursales" class="enfasis">sucursales</a>, <br><span class="enfasis">&iexcl;siempre encontrar&aacute; m&aacute;s de lo que imagina! </span></p>
                    <p>&nbsp;</p>
                    <h4>Solicitud de cotizaci&oacute;n v&iacute;a sitio de internet o correo electr&oacute;nico:</h4>
                    <ul class="lista1">
                    <li>Navegue por el sitio y vaya apuntando los c&oacute;digos de los productos de su inter&eacute;s.</li>
                    <li>Cuando haya terminado su selección de productos, <a href="contacto" class="enfasis">Ingrese al apartado de contacto</a> e  ingrese sus datos, as&iacute; como los c&oacute;digos y cantidades de los productos deseados.</li>
                    <li>Nuestro servicio de marketing le enviar&aacute; la cotizaci&oacute;n al correo que Ud. registr&oacute;.</li>
                    
                    <li>De aceptar la cotizaci&oacute;n, habr&aacute; que hacer un dep&oacute;sito o transferencia, y enviarla por correo. Su pedido ser&aacute; enviado a la direcci&oacute;n registrada en un plazo de 4 días.</li>
                    </ul>
                    <p>&nbsp;</p>
            <h4>V&iacute;a telef&oacute;nica:</h4>
            <p>1. Comun&iacute;quese a la <a href="sucursales" class="enfasis">sucursal</a> de su preferencia.</p>
            <p>2. Solicite cotizaci&oacute;n.<br>
            </p>
            <p><strong>Sucursal Hospital General</strong></p>
            <ul class="lista1">
              <li>5761.4162 y 65</li>
              <li>5578.2041</li>
              <li>5588.6345</li>
            </ul>
            <p><strong>Sucursal Hiper LancetaHG</strong></p>
            <ul class="lista1">
              <li>5761.1810</li>
            </ul>
            <p><strong>Sucursal La Raza</strong></p>
            <ul class="lista1">
              <li>5556.3542</li>
              <li>5556.3908</li>
              <li>5556.5077</li>
            </ul>
            <p><strong>Sucursal Tlalpan</strong></p>
            <ul class="lista1">
              <li>5573.3247</li>
              <li>1671.2621 al 23</li>
            </ul>
            <p><strong>Sucursal Sat&eacute;lite</strong></p>
            <ul class="lista1">
              <li>5360.7435</li>
            </ul>
        <p><strong>Sucursal Aguascalientes, Ags.</strong></p>
            <ul class="lista1">
              <li>01 (449) 993.2870 al 72</li>
            </ul>
                  </div>
                  <hr>
                  <p>&nbsp;</p>
                  <h2>Cotizaciones y pedidos desde otros estados</h2>
                  <p><strong style="margin-top:15px">V&iacute;a telef&oacute;nica:</strong>&nbsp;&nbsp;</p>
                  <ul class="lista1">
                    <li>Llamando al <span class="enfasis">01 800 024.3710</span>.</li>
                    <li>Solicite cotización de los productos de su interés.</li>
                    <li>Realice el pago. (Opciones indicadas más abajo)</li>
                    <li>La mercancía se enviará por paquetería. </li>
                  </ul>
<h3>Opciones de pago para D.F. y otros estados:</h3>
                  <p style="margin-top:20px"><big><strong>Para sucursales Hospital General y La Raza</strong></big></p>
                  <ul class="lista1">
                    <li>Tarjeta de cr&eacute;dito VISA o MASTER CARD.</li>
                    <li>Transferencia bancaria o dep&oacute;sito.
                        <div class="bloque" style="padding:0 0 0 10px; margin:5px 0 10px 0; width:400px;">
                          <p>Deposite en el banco de su preferencia:</p>
                          <p><strong>BANCOMER</strong> <br>
                            No. Cta. 0446218954<br>
                            SUC. 3544 CENTRO MEDICO                          </p>
                          <p><strong>HSBC</strong> <br>
                            No. Cta. 4041637257 <br>
                            Suc. 56 EUGENIO SUE</p>
                      </div>
                    </li>
                    <li>Pago con cheque a nombre de <span class="enfasis">LANCETA HG S.A. de C.V</span> (bajo autorizaci&oacute;n de Lanceta HG).</li>
                    <li>Env&iacute;e su pago por fax o por correo electr&oacute;nico. Al nosotros confirmar el dep&oacute;sito procedemos al env&iacute;o.</li>
                  </ul>
                  <p style="margin-top:20px"><big><strong>Para sucursales Tlalpan, Sat&eacute;lite e HiperLancetaHG</strong></big></p>
                  <ul class="lista1">
                    <li>Tarjeta de cr&eacute;dito VISA o MASTER CARD.</li>
                    <li>Pago con cheque a nombre de <span class="enfasis">LANCETA Group S.A. de C.V</span> (bajo autorizaci&oacute;n de Lanceta HG).</li>
                    <li>Env&iacute;e su pago por fax o por correo electr&oacute;nico. Al nosotros confirmar el dep&oacute;sito procedemos al env&iacute;o.</li>
                  </ul>
                  <h2>Envi&oacute; de mercancia para D.F. y otros estados:</h2>
                  <ul class="lista1">
                    <li>Su pedido ser&aacute; enviado por Multipak, Mexpost, Estafeta o el transporte de su preferencia.</li>
                    <li>El flete corre por cuenta del cliente y estar&aacute; incluido en la factura.</li>
                  </ul>
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
