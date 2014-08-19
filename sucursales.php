<?php include('Connections/bd.php'); 
require_once('includes/UserAuthentication.class.php');  
// utilizamos conexion por defecto.
$userAuthentication = new UserAuthentication(); 
 
$titulo = "Sucursales";

$metakeywords = $sucursales.",".$metakeywords;

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
<script>
$(function() {
	$('#gallery1 a').lightBox({fixedNavigation:true});
	$('#gallery2 a').lightBox({fixedNavigation:true});
	$('#gallery3 a').lightBox({fixedNavigation:true});
	$('#gallery4 a').lightBox({fixedNavigation:true});
	$('#gallery5 a').lightBox({fixedNavigation:true});
	$('#gallery6 a').lightBox({fixedNavigation:true});
	$('#hgMapa').lightBox();
	$('#hlMapa').lightBox();
	$('#rzMapa').lightBox();
	$('#tlMapa').lightBox();
	$('#stMapa').lightBox();
	$('#agMapa').lightBox();
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
				  <div class="bloque" style="margin-top:5px;">
					<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" >
					  <tr>
						<td>
						<h3>Hospital General</h3>
						<p>Dr. Villada No. 81 <br>
							Col. Doctores <br>
							C.P. 06720, M&eacute;xico, D.F.<br>
						  <em>(A unos pasos del Hospital General)</em></p>
						<p><strong>Tels. 5578.1958 al 60</strong></p>
						<p>Horario: <br><strong>Lunes a Viernes 9 a 19 hrs<br>
							S&aacute;bados 9 a 16 hrs.</strong></p>
						<a href="images/sucursales/hg_mapa.jpg" title="Mapa de Sucursal Hospital General" class="verMapa" id="hgMapa"></a>
						</td>
						<td width="186">
					<div id="gallery1" style="margin-top:5px;">
					  <ul style="margin:0; padding:0;">
						<li style="float:left; padding:2px;"> <a href="images/sucursales/hg_01.jpg" title="Sucursal Hospital General"> <img src="images/sucursales/hg_01.jpg" width="190" height="117" alt="" /> </a> </li>
					  <?php for ($i=2 ; $i<=8 ;$i++) {?>
						<li style="float:left; padding:2px; display:none;"> <a href="images/sucursales/hg_0<?php echo $i;?>.jpg" title="Sucursal Hospital General"> <img src="images/sucursales/hg_02.jpg" width="95" height="" alt="" /> </a> </li><?php }?>
					  </ul>
					  <div style="clear:left;"></div>
					</div>
						<p class="center" style="font-size:0.8em; line-height:1.1em;"><small>Click en la imagen para ver la galer&iacute;a de fotos.</small></p>
						</td>
					  </tr>
					</table>
				  </div>
				  
				  <div class="bloque">
					<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" >
					  <tr>
						<td>
						<h3>Hiper LancetaHG</h3>
						<p>Dr. Carral esq. Dr. Villada Local 1 
							<br>
							Col. Doctores<br>
						  C.P. 06720, M&eacute;xico, D.F.<br><em>(A unos pasos del Hospital General)</em></p>
						<p><strong>Tels. 5761.1810 al 12</strong></p>
						<p>Horario: <br><strong>Lunes a Viernes 9 a 19 hrs y<br>
							S&aacute;bados 9 a 16 hrs.</strong></p>
						<a href="images/sucursales/hl_mapa.jpg"  title="Mapa de Sucursal Hiper LancetaHG" class="verMapa" id="hlMapa"></a>
						</td>
						<td width="186">
					<div id="gallery2" style="margin-top:5px;">
					  <ul style="margin:0; padding:0;">
						<li style="float:left; padding:2px;"> <a href="images/sucursales/hl_01.jpg" title="Sucursal Hiper LancetaHG"> <img src="images/sucursales/hl_01_ch.jpg" width="190" height="117" alt="" /> </a> </li>
					  <?php for ($i=2 ; $i<=8 ;$i++) {?>
						<li style="float:left; padding:2px; display:none;"> <a href="images/sucursales/hl_0<?php echo $i;?>.jpg" title="Sucursal Hiper LancetaHG"> <img src="images/sucursales/hl_02.jpg" width="95" height="" alt="" /> </a> </li><?php }?>
					  </ul>
					  <div style="clear:left;"></div>
					</div>
						<p class="center" style="font-size:0.8em; line-height:1.1em;"><small>Click en la imagen para ver la galer&iacute;a de fotos.</small></p>
						</td>
					  </tr>
					</table>
				  </div>
				  
				  <div class="bloque">
					<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" >
					  <tr>
						<td>
						<h3>La Raza</h3>
						<p>Calz. Vallejo No. 275 
							<br>
							Col. H&eacute;roe de Nacozari<br>
						C.P. 07790, M&eacute;xico, D.F.<br><em>(Contra esquina del Hospital La Raza)</em></p>
						<p><strong>Tels. 5556.3542 /
		5556.3908 /
		5556.5077</strong></p>
						<p>Horario: <br><strong>Lunes a Viernes 9 a 19 hrs y <br>
							S&aacute;bados 9 a 16 hrs.</strong></p>
						<a href="images/sucursales/rz_mapa.jpg" title="Mapa de Sucursal La Raza" class="verMapa" id="rzMapa"></a>
						</td>
						<td width="186">
					<div id="gallery3" style="margin-top:5px;">
					  <ul style="margin:0; padding:0;">
						<li style="float:left; padding:2px;"> <a href="images/sucursales/rz_01.jpg" title="Sucursal La Raza"> <img src="images/sucursales/rz_01_ch.jpg" width="190" height="117" alt="" /> </a> </li>
					  <?php for ($i=2 ; $i<=8 ;$i++) {?>
						<li style="float:left; padding:2px; display:none;"> <a href="images/sucursales/rz_0<?php echo $i;?>.jpg" title="Sucursal La Raza"> <img src="images/sucursales/rz_02.jpg" width="95" height="" alt="" /> </a> </li><?php }?>
					  </ul>
					  <div style="clear:left;"></div>
					</div>
						<p class="center" style="font-size:0.8em; line-height:1.1em;"><small>Click en la imagen para ver la galer&iacute;a de fotos.</small></p>
						</td>
					  </tr>
					</table>
				  </div>
				  
				  <div class="bloque">
					<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" >
					  <tr>
						<td>
						<h3>Tlalpan</h3>
						<p>Calz. Tlalpan No. 4923 Col. La Joya<br>
						14090, M&eacute;xico, D.F.<br><em>(A cinco cuadras del hospital<br>
						M. Gea Gonz&aacute;lez)</em></p>
						<p><strong>Tels. 5573.3247 /
		1671.2621 al 23</strong></p>
						<p>Horario:<br>
						<strong>Lunes a Viernes 9 a 19 hrs<br>
						S&aacute;bados 9 a 16 hrs.</strong></p>
						<a href="images/sucursales/tl_mapa.jpg" title="Mapa de Sucursal Tlalpan" class="verMapa" id="tlMapa"></a>
						</td>
						<td width="186">
					<div id="gallery4" style="margin-top:5px;">
					  <ul style="margin:0; padding:0;">
						<li style="float:left; padding:2px;"> <a href="images/sucursales/tl_01.jpg" title="Sucursal Tlalpan"> <img src="images/sucursales/tl_01_ch.jpg" width="190" height="117" alt="" /> </a> </li>
					  <?php for ($i=2 ; $i<=8 ;$i++) {?>
						<li style="float:left; padding:2px; display:none;"> <a href="images/sucursales/tl_0<?php echo $i;?>.jpg" title="Sucursal Tlalpan"> <img src="images/sucursales/tl_02.jpg" width="95" height="" alt="" /> </a> </li><?php }?>
					  </ul>
					  <div style="clear:left;"></div>
					</div>
						<p class="center" style="font-size:0.8em; line-height:1.1em;"><small>Click en la imagen para ver la galer&iacute;a de fotos.</small></p>
						</td>
					  </tr>
					</table>
				  </div>
				  
				  <div class="bloque">
					<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" >
					  <tr>
						<td>
						<h3>Sat&eacute;lite</h3>
						<p>Blvd. Manuel &Aacute;vila Camacho No. 3225 <br>
						  Col. La Florida 
							<br>
							53160 Naucalpan, Edo. de M&eacute;xico<br><em>(Frente a las Torres de Sat&eacute;lite)</em></p>
						<p><strong>Tels. 5373.1253 /
		5373.1386 /
		5360.7435</strong></p>
						<p>Horario: <br>
							<strong>Lunes a Viernes 9 a 19 hrs<br>
							S&aacute;bados 9 a 16 hrs.</strong></p>
						<a href="images/sucursales/st_mapa.jpg" title="Mapa de Sucursal Sat&eacute;lite" class="verMapa" id="stMapa"></a>
						</td>
						<td width="186">
					<div id="gallery5" style="margin-top:5px;">
					  <ul style="margin:0; padding:0;">
						<li style="float:left; padding:2px;"> <a href="images/sucursales/st_01.jpg" title="Sucursal Satélite"> <img src="images/sucursales/st_01_ch.jpg" width="190" height="117" alt="" /> </a> </li>
					  <?php for ($i=2 ; $i<=8 ;$i++) {?>
						<li style="float:left; padding:2px; display:none;"> <a href="images/sucursales/st_0<?php echo $i;?>.jpg" title="Sucursal Satélite"> <img src="images/sucursales/st_02.jpg" width="95" height="" alt="" /> </a> </li><?php }?>
					  </ul>
					  <div style="clear:left;"></div>
					</div>
						<p class="center" style="font-size:0.8em; line-height:1.1em;"><small>Click en la imagen para ver la galer&iacute;a de fotos.</small></p>
						</td>
					  </tr>
					</table>
				  </div>
				  
				  <p>&nbsp;</p>
				  <h2>En el interior de la República</h2>
				  <div class="bloque">
					<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" >
					  <tr>
						<td>
						<h3>Aguascalientes, Ags.</h3>
						<p>San Miguel el Alto No. 620 <br>
							Col. F&aacute;tima<br>
						20130, Aguascalientes, Ags.                <br><em>(A una cuadra de la Universidad de Ags.)</em></p>
						<p><strong>Tels. 01 (449) 993.2870 al 72</strong></p>
						<p>Horario:<br>
						<strong>Lunes a Viernes 9 a 19 hrs<br> 
							S&aacute;bados 9 a 14 hrs.</strong></p>
						<a href="images/sucursales/ag_mapa.jpg" title="Mapa de Sucursal Aguascalientes, Ags." class="verMapa" id="agMapa"></a>
						</td>
						<td width="186">
					<div id="gallery6" style="margin-top:5px;">
					  <ul style="margin:0; padding:0;">
						<li style="float:left; padding:2px;"> <a href="images/sucursales/ag_01.jpg" title="Sucursal Aguascalientes, Ags."> <img src="images/sucursales/ag_01_ch.jpg" width="190" height="117" alt="" /> </a> </li>
					  <?php for ($i=2 ; $i<=8 ;$i++) {?>
						<li style="float:left; padding:2px; display:none;"> <a href="images/sucursales/ag_0<?php echo $i;?>.jpg" title="Sucursal Aguascalientes, Ags."> <img src="images/sucursales/ag_02.jpg" width="95" height="" alt="" /> </a> </li><?php }?>
					  </ul>
					  <div style="clear:left;"></div>
					</div>
						<p class="center" style="font-size:0.8em; line-height:1.1em;"><small>Click en la imagen para ver la galer&iacute;a de fotos.</small></p>
						</td>
					  </tr>
					</table>
					</div>
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
