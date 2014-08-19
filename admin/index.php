<?php
include('../includes/verif_Authenticate.php');
 
$titulo = 'Panel de Administración';
?>
<!DOCTYPE HTML><html><!-- InstanceBegin template="/Templates/layout_backend.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="keywords" content="<?php echo $metakeywords;?>">
<meta name="description" content="<?php echo $metadescription;?>">
<!-- InstanceBeginEditable name="doctitle" -->
<title><?php echo $titulo." | LancetaHG";?></title>
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
			<div id="titulo">
				<div class="page-header">
				  <h1>Bienvenid@ <small><?php echo $userAuthentication->getUsername('username');?></small></h1>
				</div>
			</div>
			
			<h2 class="text-center">Te has logeado correctamente al sistema.</h2>
				<?php /*
			<h5 class="text-center">Ahora escoge a donde quieres ir o selecciona alguna opción del mennu superior:</h3>
		
			<div id="content_btn_admin" class="text-center" style="margin:20px auto; padding:5px; width:190px">
				<a href="../" ><div style="text-align:center; display:inline; margin: 10px auto; background-color:#090; color:#FFF; cursor:pointer; padding:20px; float:left;-moz-border-radius: 10px; border-radius: 10px; -webkit-border-radius : 10px; font-size:1.4em; width:150px;">Ir al sitio</div></a>

				<a href="admin_menu.php" ><div style="text-align:center; display:inline; margin: 10px; background-color:#36F; color:#FFF; cursor:pointer; padding:50px 30px; float:right;-moz-border-radius: 10px; border-radius: 10px; -webkit-border-radius : 10px; font-size:1.4em; width:250px;">Administrar sitio</div></a>
				<div style="clear:left"></div>
			</div>
				*/ ?>
            
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