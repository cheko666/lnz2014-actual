<?php
include('../Connections/bd.php'); 
require_once('../includes/UserAuthentication.class.php');  
// utilizamos conexion por defecto.
$userAuthentication = new UserAuthentication(); 

$titulo='';
?>
<!DOCTYPE HTML><html>
<head>
<meta charset="UTF-8">
<meta name="keywords" content="<?php echo $metakeywords;?>">
<meta name="description" content="<?php echo $metadescription;?>">
<link rel="canonical" href="http://www.lancetahg.com.mx/">
<!-- TemplateBeginEditable name="doctitle" -->
<title>
<?php echo $_SERVER['PHP_SELF']=='/index.php' ? $titulo : $titulo.'  |  LancetaHG';?>
</title>
<!-- TemplateEndEditable -->
<BASE HREF="http://www.lancetahg.com.mx/" />
<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="../css/lyt.css" rel="stylesheet" type="text/css">
<link href="../css/ui-lightness/jquery-ui-1.10.4.custom.min.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="../js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="../js/jquery-ui-1.10.4.custom.min.js"></script>
<script type="text/javascript" src="../js/funciones.js"></script>
<script type="text/javascript" src="../js/funciones_validar.js"></script>
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
<!-- TemplateBeginEditable name="head" -->
<!-- TemplateEndEditable -->
</head>
<body>
	<?php  include("../includes/top.php");?>
    
	<div id="main">	
    
		<?php include('../includes/header2.php');?>
    
		<div id="banner_content">
        <div style="clear:left;"></div>
		<?php /*
        <div id="example">
            <div id="slides">
                <div class="slides_container">
                    <a href="productos/promociones/ginecologia" title="Descuentos en Ginecolog&iacute;a"><img src="images/promo-ginecologia-banner-principal.jpg" width="905" height="160" alt="Descuentos en Ginecolog&iacute;a"></a>
                    
                </div>
                
                <a href="#" class="prev"><img src="images/slides/arrow-prev.png" width="24" height="43" alt="Arrow Prev"></a>
                <a href="#" class="next"><img src="images/slides/arrow-next.png" width="24" height="43" alt="Arrow Next"></a>
            </div>
        </div>
		*/ ?>
		</div>
        
		<div style="clear:both"></div>
        
		<div id="col_izquierda">
			<?php include("../includes/sidebar.php"); ?>
		</div><!--Termina col_izquierda-->
        
		<div id="col_derecha">
        
			<div id="contenido">
            
                <div class="page-header">
                    <h1><? echo $titulo;?> <small><? echo $subtitulo;?></small></h1>
                </div>
				<?php 
                echo $es_principal!=true ? "<div id='contenido_inner'>" : "<div>";
                ?>	
				
				<!-- TemplateBeginEditable name="contenido_inner" -->
                Contenido
				<!-- TemplateEndEditable -->	
                <div style="clear:both"></div>
			  </div><!--Termina contenido_inner-->
                
			  <?php include('../includes/banners.php');?>					
		 		<div style="clear:both;"></div>		  		      
		    </div><!--Termina contenido-->	
            
		</div><!--Termina col_derecha-->
			
		<?php include('../includes/footer2.php');?>	
        	
	</div><!--Termina main-->	
<script type="text/javascript" src="../js/jquery-1.10.2.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- TemplateBeginEditable name="ScriptsPie" -->

<!-- TemplateEndEditable -->
</body>
</html>