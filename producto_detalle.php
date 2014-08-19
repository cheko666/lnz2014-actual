<?php
include('Connections/bd.php'); 

$updateGoTo = 'productos.php';

if (isset($_GET['codigo'])) {
	$codigo = $_GET['codigo'];
	$id_Producto=obtenerIDProducto($codigo);
}
if (isset($_GET['ID'])) {
	//$id_Producto = $_GET['ID'];

	mysql_select_db($database_Link, $Link);
mysql_query("SET NAMES 'utf8'");
	$query_Existe_Producto ="SELECT p.ID	
	FROM Productos p
	WHERE p.ID=".$_GET['ID']." AND p.Activo=1
	LIMIT 1";
	
	$Existe_Producto = mysql_query($query_Existe_Producto, $Link) or die(mysql_error());
	$row_Existe_Producto = mysql_fetch_assoc($Existe_Producto);
	if ($row_Existe_Producto['ID']=='' || $row_Existe_Producto['ID']==0) {
		header("Location: /");
	} else {
		$id_Producto = $row_Existe_Producto['ID'];
	}
}

if (!isset($_GET['ID']) && !isset($_GET['codigo'])) {
	header(sprintf("Location: %s", $updateGoTo));
}

	mysql_select_db($database_Link, $Link);
mysql_query("SET NAMES 'utf8'");
	$query_Codigo ="SELECT Codigo FROM Codigos c WHERE c.ProductosID = $id_Producto LIMIT 1";
	$Codigo = mysql_query($query_Codigo, $Link) or die(mysql_error());
	$row_Codigo = mysql_fetch_assoc($Codigo);
	
	$codigo = $row_Codigo['codigo'];

mysql_select_db($database_Link, $Link);
mysql_query("SET NAMES 'utf8'");
$query_Producto ="SELECT p.ID, p.Title AS Titulo, p.URLSegment AS URL_Producto, SUBSTRING_INDEX( p.Title,  ' ', 1 ) AS PalabraProd, p.Informacion, p.TieneFoto, p.NombreImagen, m.Title AS Marca, m.URLSegment AS URL_Marca, p.Activo, p.TienePromo, ppr.PromocionesID
FROM Productos p
JOIN Marcas m ON m.ID = p.MarcasID
LEFT JOIN Promociones_Productos ppr ON ppr.ProductosID = p.ID
WHERE p.ID=$id_Producto
GROUP BY ID";
$Producto = mysql_query($query_Producto, $Link) or die(mysql_error());
$row_Producto = mysql_fetch_assoc($Producto);

$titulo = $row_Producto['Titulo'];
$marca= $row_Producto['Marca'];

$metadescription = $row_Producto['Informacion']=='' ? $metadescription : limitarPalabras2($row_Producto['Informacion'],20) ;

$palabras_para_keywords = $titulo;
$palabras_para_keywords .= " ".$marca;
$palabras_para_keywords .= " ".$metadescription;

$metakeywords = eliminarPalabrasCortas($palabras_para_keywords);

$id_promo= $row_Producto['PromocionesID'];
$con_promo=$row_Producto['TienePromo'];

$PalabraProd = $row_Producto['PalabraProd'];

//Categorias
//******************************************************************************************
mysql_select_db($database_Link, $Link);
mysql_query("SET NAMES 'utf8'");
$query_Codigo_Categorias = "SELECT cp.CategoriasID, c.Title, c.URLSegment
FROM Categorias c
JOIN Categorias_Productos cp ON cp.CategoriasID = c.ID
WHERE cp.ProductosID = $id_Producto";
$Codigo_Categorias = mysql_query($query_Codigo_Categorias, $Link) or die(mysql_error());
$row_Codigo_Categorias = mysql_fetch_assoc($Codigo_Categorias);

$array_categorias = array();
$idCategoria= $row_Codigo_Categorias['CategoriasID'];
if (mysql_num_rows($Codigo_Categorias)>0) {
	do {
		$array_categorias[] = "<a href='categorias/".$row_Codigo_Categorias['URLSegment']."' style='background-color:#9EAEC5; -moz-border-radius: 8px; border-radius: 8px; -webkit-border-radius : 8px; color:#fff; text-decoration:none; padding:2px 6px;'>".$row_Codigo_Categorias['Title']."</a>";
	} while ($row_Codigo_Categorias = mysql_fetch_assoc($Codigo_Categorias));

}
//******************************************************************************************

mysql_select_db($database_Link, $Link);
mysql_query("SET NAMES 'utf8'");
$query_Promocion = "SELECT pr.Vigencia FROM Promociones pr WHERE pr.ID LIKE '$id_promo' LIMIT 1";
$Promocion = mysql_query($query_Promocion, $Link) or die(mysql_error());
$row_Promocion = mysql_fetch_assoc($Promocion);
$vigencia = $row_Promocion['Vigencia'];

$query_Presentacion_con_promo= ($con_promo==1) ?", ppr.PrecioRegular, ppr.PrecioFinal" : "";

mysql_select_db($database_Link, $Link);
mysql_query("SET NAMES 'utf8'");
$query_Presentacion = "SELECT c.Codigo, c.ProductosID, c.DescripcionProducto, c.Modelo, u.Title AS Unidad, c.Presentacion, c.AgotarExistencia ". $query_Presentacion_con_promo. "
FROM Codigos c
JOIN Unidades u ON u.ID = c.Unidad
LEFT JOIN Promociones_Productos ppr ON ppr.Codigo = c.Codigo 
WHERE c.ProductosID = $id_Producto AND c.AgotarExistencia='N'
ORDER BY c.Presentacion";
$Presentacion = mysql_query($query_Presentacion, $Link) or die(mysql_error());

mysql_select_db($database_Link, $Link);
mysql_query("SET NAMES 'utf8'");
$query_ProdSimilares = "SELECT p.ID, p.Title AS Titulo, p.URLSegment AS URL_Producto, p.TieneFoto, p.NombreImagen, m.Title AS Marca,  p.Activo, p.TienePromo
FROM Productos p
JOIN Marcas m ON m.ID = p.MarcasID
WHERE p.ID != $id_Producto AND p.Activo=1 AND p.Title LIKE '$PalabraProd%' 
GROUP BY p.ID ORDER BY p.TieneFoto DESC, p.TienePromo DESC, p.Title ASC LIMIT 0,12";
$ProdSimilares = mysql_query($query_ProdSimilares, $Link) or die(mysql_error());
$row_ProdSimilares = mysql_fetch_assoc($ProdSimilares);
$totalRows_ProdSimilares = mysql_num_rows($ProdSimilares);

mysql_select_db($database_Link, $Link);
mysql_query("SET NAMES 'utf8'");
$query_ProdRelacionados = "SELECT p.ID, p.Title AS Titulo, p.URLSegment AS URL_Producto, p.TieneFoto, p.NombreImagen, m.Title AS Marca,  p.Activo, p.TienePromo
FROM Productos p
JOIN Marcas m ON m.ID = p.MarcasID
JOIN Categorias_Productos cp ON cp.ProductosID  = p.ID 
WHERE cp.CategoriasID = '$idCategoria' AND p.ID != $id_Producto AND p.Activo=1
GROUP BY p.ID
ORDER BY p.TienePromo DESC, p.TieneFoto DESC, RAND(p.Title) ASC LIMIT 0,12";
$ProdRelacionados = mysql_query($query_ProdRelacionados, $Link) or die(mysql_error());
$row_ProdRelacionados = mysql_fetch_assoc($ProdRelacionados);
$totalRows_ProdRelacionados = mysql_num_rows($ProdRelacionados);

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
<link rel="stylesheet" type="text/css" href="css/carousel.css" media="screen" />
<script type="text/javascript" src="js/carousel.js"></script>

<script>
$(function() {	
	$('#detalle_producto_content_foto').lightBox();
	
	$( "#dialog-form" ).dialog({
      autoOpen: false,
      height: 450,
      width: 450,
      modal: true,
	  closeOnEscape:true, 
	  resizable:false, 
      buttons: {
        "Modificar": function() { 
		var id_prod = $('#id_prod').val(), info_prod = $('#info_prod').val(), nom_prod = $('#nom_prod').val();
		 
		$.post('includes/productos_modificar.php',{
			id_prod: id_prod, info_prod: info_prod
			
		});//End Post
		$("#info_prod").val(info_prod);
		$(this).dialog("close");
		location.reload();	
		},
		"Cancelar": function() {
          $( this ).dialog( "close" );
        }
      }
    });
	
	$('#btn_editar_info').button().click(function(){
		$( "#dialog-form" ).dialog( "open" );
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
					Productos
				</div>
				<div id='productos_grid' style="width:740px">
					<div style="width:580px; margin:10px auto;">
                    <div id="btn_regresar">
                        <div style="float:left;"><a href="javascript:window.history.back();">&laquo; Volver a resultados</a></div>
                        <div style="clear:both"></div>
                    </div>
					<div style="margin:0 0 20px;">
						<div id="detalle_producto_izq">
                        	<div class="detalle_producto_content_foto">
							<?php if ($row_Producto['TieneFoto'] == 0) { // Mostrar si NO hay foto ?>
							<img src="http://lancetahg.com.mx/images/productos/0.jpg" width="190" height="190" alt="Imagen no disponible" title="Imagen no disponible" />
							<?php } else { // Mostrar si hay foto ?>
							<a id="detalle_producto_content_foto" href="http://lancetahg.com.mx/images/productos/gd/<?php echo $row_Producto['NombreImagen']; ?>.jpg" title="<?php echo $row_Producto['Titulo'].$row_Producto['Marca']; ?>">
							<div id="imagen">
							  <img src="http://lancetahg.com.mx/images/productos/gd/<?php echo $row_Producto['NombreImagen']; ?>.jpg" width="150" alt="<?php echo utf8_encode($row_Producto['Titulo']); ?>" title="<?php echo utf8_encode($row_Producto['Titulo']); ?>"/>
							  <img src="http://lancetahg.com.mx/images/lanceta-icono.png" alt="" id="placeholder" />
                            </div> 
							</a>
							<?php } ?>
                            <div style="margin:5px auto; text-align:center; font-size:12px; font-style:italic; color:#666; line-height:16px;">
                            	Imagen ilustrativa proporcionada por el proveedor. Ésta puede variar.
                            </div>	
							</div><!--Termina detalle_producto_content_foto -->
						</div>
						<div class="detalle_producto_content_texto">
							<h1 class="detalle_producto_nombre"><?php echo $titulo; ?></h1>
							<h2><a href="marcas/<?php echo $row_Producto['URL_Marca']; ?>" class="link_dash" style="color:#666666;"><?php echo $row_Producto['Marca']; ?></a></h2>
                            <?php if( !empty($array_categorias) ) { ?>
                            
							<p class="detalle_producto_categorias">Categor&iacute;as</p>
                            <div style="margin:0 0 20px;"><?php echo implode("&nbsp;", $array_categorias); ?></div>  
                                                      
                            <?php }?>
                            
							<?php if ($con_promo==1 ) { //Bloque descuentos y promociones?>
                            <div id="descuento_label_container">
                                <div class="descuento_label_oferta"><?php echo $descuento; ?></div>
                                
                                <div style="float:left; margin-left:10px; width:220px; display:block; line-height:15px;">
                                    Promoci&oacute;n v&aacute;lida s&oacute;lo los d&iacute;as <br><strong><?php echo $vigencia;?></strong>. <br>
                                   Precios incluyen IVA.<br>
                                   V&aacute;lido sólo para las presentaciones marcadas.<br>
                                  Hasta agotar existencias.<br>
                                  Aplican restricciones.<br>
                                  No aplica con otras promociones.
								</div>
                                <div style="clear:both;"></div>
                            </div>
                            <?php } //Termina Bloque descuentos y promociones?>
							
							<div id="detalle_producto_descripcion">
								<?php
									if($row_Producto['Informacion']=='' || $row_Producto['Informacion']==NULL) {echo "<em>&nbsp;Sin informaci&oacute;n a&uacute;n.</em><br><br>";} else { echo nl2br($row_Producto['Informacion']); }?>
							</div>
						</div>
						<div style="clear:both"></div>
					</div>
                    <div style="margin:0 auto; text-align:center;">
					<p style="margin:15px 0 3px"><strong>Presentaciones</strong></p>
							<table width="100%" cellspacing="0" style="font-family:Arial, Helvetica, sans-serif">
								<tr bgcolor="#CCCCCC" style="text-transform:uppercase; font-size:0.5em; font-weight:bold">
									<td width="45" class="headProdDetalle">C&oacute;digo</td>
									<td width="100" class="headProdDetalle">Modelo</td>
									<td width="50" class="headProdDetalle">Unidad</td>
									<td width="" class="headProdDetalle">Presentaci&oacute;n</td>
									<td width="125" class="headProdDetalle">&nbsp;</td>
									</tr>
								<?php while ($row_Presentacion = mysql_fetch_assoc($Presentacion)) { ?>
									<tr>
										<td width="45" class="tdProdDetalle"><?php echo $row_Presentacion['Codigo']; ?></td>
										<td width="100" class="tdProdDetalle"><?php echo $row_Presentacion['Modelo']; ?></td>
										<td width="50" class="tdProdDetalle"><?php echo $row_Presentacion['Unidad']; ?></td>
										<td width="" class="tdProdDetalle"><?php echo $row_Presentacion['Presentacion'];?></td>
										<td width="125" class="tdProdDetalle">
                                        <?php if ($row_Presentacion['PrecioRegular']!=NULL) { ?> 
                                        	<table width="" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="30" rowspan="2"><img src="images/oferta_label_ch_preciopromocion.png" height="30" width="30" style="padding-right:5px;"></td>
    <td> de $ <?php echo number_format($row_Presentacion['PrecioRegular'], 2, '.', ',');?></td>
  </tr>
  <tr>
    <td class="detalle_producto_precio_despues"> a $ <?php echo number_format($row_Presentacion['PrecioFinal'], 2, '.', ',');?></td>
  </tr>
</table>
                                        <?php }?>
                                        </td>
									</tr>
									<?php } ; ?>
								</table>
                    </div>
                    <p>&nbsp;</p>
					</div>
					<div class="prodRelacion_content">
					<h3>Productos Similares</h3>
						<?php if ($row_ProdSimilares!='') { ?>
					<div id="my_carousel1" class="carousel group" style=" height: 230px; visibility: visible; overflow: hidden; position: relative;">
						<div id="btnprev1" class="arrow left btnprev" style="z-index:100;"></div>
						<div id="btnnext1" class="arrow right btnnext" style="z-index:100;"></div>
						<ul class="carousel-apps group" style="width: 690px; left: 0px; position: absolute;">
						<?php
						do { ?>
						<li>
                        <a onMouseOut="this.style.backgroundColor='#FFFFFF'" onMouseOver="this.style.backgroundColor='#F8F8F8'" style="background-color: #FFFFFF; border: 1px solid #DDDDDD; margin: 10px; display: block; float: left; text-decoration: none; text-align: center; cursor: pointer; -moz-border-radius: 8px; border-radius: 8px; -webkit-border-radius: 8px;" href="<?php echo 'productos/'.$row_ProdSimilares['ID'].'/'.$row_ProdSimilares['URL_Producto']; ?>" >
                            <div class="content_producto">
                                <div class="Prod_info">
                                    <?php if ($row_ProdSimilares['TieneFoto'] == 0) { // Mostrar si hay foto ?>
                                    <img src="http://lancetahg.com.mx/images/productos/0.jpg" width="100" height="100" alt="Imagen no disponible" title="Imagen no disponible" />
                                    <?php } else { // Mostrar si hay foto ?>
                                    <img src="http://lancetahg.com.mx/images/productos/ch/<?php echo $row_ProdSimilares['NombreImagen']; ?>.jpg" width="100" height="100" alt="<?php echo $row_ProdSimilares['Titulo']; ?>" title="<?php echo $row_ProdSimilares['Titulo']; ?>" />
                                    <?php } // Termina Mostrar si hay foto ?>
                                    <p class="prod_nombre"><?php $cadena = $row_ProdSimilares['Titulo']; echo limitarPalabras($cadena,5); ?></p>
                                    <p class="prod_marca"><?php echo $row_ProdSimilares['Marca']; ?></p>
                                    </div>
                                    <?php if($row_ProdSimilares['TienePromo']==1) { ?>
                                    <div class="descuento_label_ch_oferta">
                                    </div>
                                    <?php }  ?>                  
                                    <div class="boton">Ver detalle</div>
                                </div>
                        </a>
                        <div style="clear:left"></div>
						</li>
					<?php
					
					} while ($row_ProdSimilares = mysql_fetch_assoc($ProdSimilares));
					?>
					</ul>
				</div>
					<?php } else { ?>
					<p class="center">No hay algún otro producto con características similares.</p>
					<?php }?>
					<div style="clear:left"></div>
				</div><!--Finaliza Productos Similares por nombre de producto-->
				
					<div class="prodRelacion_content">
					<h3>Productos Relacionados</h3>
						<?php if ($row_ProdRelacionados!='') { ?>
					<div id="my_carousel2" class="carousel group" style=" height: 230px; visibility: visible; overflow: hidden; position: relative;">
						<div id="btnprev2" class="arrow left btnprev" style="z-index:100;"></div>
						<div id="btnnext2" class="arrow right btnnext" style="z-index:100;"></div>
						<ul class="carousel-apps group" style="width: 690px; left: 0px; position: absolute;">
						<?php
						do { ?>
						<li>
                        <a onMouseOut="this.style.backgroundColor='#FFFFFF'" onMouseOver="this.style.backgroundColor='#F8F8F8'" style="background-color: #FFFFFF; border: 1px solid #DDDDDD; margin: 10px; display: block; float: left; text-decoration: none; text-align: center; cursor: pointer; -moz-border-radius: 8px; border-radius: 8px; -webkit-border-radius: 8px;" href="<?php echo 'productos/'.$row_ProdRelacionados['ID'].'/'.$row_ProdRelacionados['URL_Producto']; ?>" >
                            <div class="content_producto">
                                <div class="Prod_info">
                                    <?php if ($row_ProdRelacionados['TieneFoto'] == 0) { // Mostrar si hay foto ?>
                                    <img src="http://lancetahg.com.mx/images/productos/0.jpg" width="100" height="100" alt="Imagen no disponible" title="Imagen no disponible" />
                                    <?php } else { // Mostrar si hay foto ?>
                                    <img src="http://lancetahg.com.mx/images/productos/ch/<?php echo $row_ProdRelacionados['NombreImagen']; ?>.jpg" width="100" height="100" alt="<?php echo $row_ProdRelacionados['Titulo']; ?>" title="<?php echo $row_ProdRelacionados['Titulo']; ?>" />
                                    <?php } // Termina Mostrar si hay foto ?>
                                    <p class="prod_nombre"><?php $cadena = $row_ProdRelacionados['Titulo']; echo limitarPalabras($cadena,5); ?></p>
                                    <p class="prod_marca"><?php echo $row_ProdRelacionados['Marca']; ?></p>
                                    </div>
                                    <?php if($row_ProdRelacionados['TienePromo']==1) { ?>
                                    <div class="descuento_label_ch_oferta">
                                    </div>
                                    <?php }  ?>                  
                                    <div class="boton">Ver detalle</div>
                                </div>
                        </a>
							<div style="clear:left"></div>
						</li>
					<?php
					
					} while ($row_ProdRelacionados = mysql_fetch_assoc($ProdRelacionados));
					?>
					</ul>
				</div>
					<?php } else { ?>
					<p class="center">No hay algún otro producto con características similares.</p>
					<?php }?>
					<div style="clear:left"></div>
				</div><!--Finaliza Productos Relacionados por nombre de producto-->
					
				</div><!--Termina productos_grid-->
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
mysql_free_result($Producto);
mysql_free_result($Categorias);
mysql_free_result($Marcas);
mysql_free_result($ProdRelacionados);
mysql_free_result($ProdSimilares);
mysql_free_result($Presentacion);
mysql_free_result($Categorias_nombres);
mysql_free_result($Promocion);
?>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>
