<?php include('Connections/bd.php'); 

$titulo = $_POST['destino'] == 'sugerencias' ? 'Buz&oacute;n de Sugerencias' : 'Contacto' ;

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
                <div style="width:460px; margin:0 0	0 30px;">
				<table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
			  <td height="100" align="center">&nbsp;</td>
			</tr>
			<tr>
			  <td style="text-align:center;">
			  <?php
						$destino = $_POST['destino']; 
						$tipo_usuario = $_POST['tipo_usuario']; 
						$especialidad = ucwords ( strtolower($_POST['especialidad']) );
						$organizacion = ucwords ( strtolower($_POST['organizacion']) );
						$nombre = ucwords ( strtolower($_POST['nombre']) );
						$apellidos = ucwords ( strtolower($_POST['apellidos']) );
						$lada = $_POST['lada'];
						$telefono = $_POST['telefono'];
						$email = $_POST['email'];
						$estado = $_POST['estado'];
						$texto = $_POST['texto'];
						$autoriza_newsletter = $_POST['autoriza_newsletter'] == 'on' ? 'Si' : 'No' ;
						$fecha = date('Y-m-d H:i:s');
						
						switch ($destino) {
							
							case "ventas" :
							//$destinatario = "diseno@proceso-grafico.com";
							$destinatario = "ventas@lancetahg.com";
							break; 
														
							case "sugerencias" :
							//$destinatario = "diseno@proceso-grafico.com";
							$destinatario = "sugerencias@lancetahg.com";
							break; 
						}
						
						//Escritura en BD
						mysql_select_db($database_Link, $Link);
						mysql_query("SET NAMES 'utf8'");
						$insert_sql =
						"INSERT INTO Usuarios_Contacto (Destino,TipoUsuario,Especialidad,Nombre,Apellidos,Organizacion,Lada,Telefono,Email,Estado,Mensaje,AutorizaNewsletter,FechaCreacion) VALUES
						('$destino',
						'$tipo_usuario',
						'$especialidad',
						'$nombre',
						'$apellidos',
						'$organizacion',
						'$lada',
						'$telefono',
						'$email',
						'$estado',
						'$texto',
						'$autoriza_newsletter',
						'$fecha')";
						$res = mysql_query($insert_sql, $Link) or die(mysql_error());
						
						//Envio de correo	
						$header = "From: " . $email. " \r\n";
						$header .= "X-Mailer: PHP/" . phpversion() . "\r\n";
						$header .= "Mime-Version: 1.0 \r\n";
						$header .= "Content-Type: text/plain ; charset=utf-8";

						$mensaje = "Nombre:\r\n" . $nombre . " " . $apellidos . " \r\n \r\n";
						$mensaje .= "Empresa o Institución:\r\n" . $organizacion . " \r\n \r\n";
						$mensaje .= "Número de Teléfono:\r\n" . $lada . "-" . $telefono . " \r\n \r\n";
						$mensaje .= "Email:\r\n" . $email . " \r\n \r\n";
						$mensaje .= "Estado:\r\n" . $estado . " \r\n \r\n";
						$mensaje .= "Mensaje:\r\n" . $texto . "\r\n";

						
						$para = $destinatario;
						$asunto = 'Mensaje de visitante de la página web';
						
						mail($para, $asunto, $mensaje, $header);
						echo "<p class='center'>Su mensaje fue env&iacute;ado con &eacute;xito.</br><strong>Gracias</strong></p>";
			  ?>	  
			  </td>
			</tr>
			<tr>
			  <td height="100" align="center">&nbsp;</td>
			</tr>
		  </table>
                    </div>
				</div><!--Termina texto_grid-->
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
mysql_free_result($Categorias);
mysql_free_result($Marcas);
?>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>
