<?php
include('db.php'); 
require_once('UserAuthentication.class.php');  
// utilizamos conexion por defecto.
$userAuthentication = new UserAuthentication();
if ($userAuthentication->isAuthenticated()==true)  { 
	$Administrador='1';
}

if (isset($_GET['codigo'])) {
	$codigo = $_GET['codigo'];
	$id_Producto=obtenerIDProducto($codigo);
}
if (isset($_GET['ID'])) {
	$id_Producto = $_GET['ID'];
}

if (!isset($_GET['ID']) && !isset($_GET['codigo'])) {
	$updateGoTo = 'catalogo_productos.php';
	header(sprintf("Location: %s", $updateGoTo));
}

mysql_select_db($database_Link, $Link);
$query_Producto = sprintf("SELECT p.ID, p.NombreArchivo, p.Title AS Titulo, SUBSTRING_INDEX( p.Title , ' ', 1 ) AS PalabraProd, m.Title AS Marca, p.URLSegment AS pURL, m.URLSegment AS URL, p.Informacion AS Info, p.TieneFoto, c.Title AS Categoria, cp.CategoriasID AS idCategoria, p.Activo
FROM Productos p  
JOIN Marcas m ON m.ID = p.MarcasID
JOIN Categorias_Productos cp ON cp.ProductosID = p.ID
JOIN Categorias c ON c.ID = cp.CategoriasID
WHERE p.ID=%s", GetSQLValueString($id_Producto, "int"));
$Producto = mysql_query($query_Producto, $Link) or die(mysql_error());
$row_Producto = mysql_fetch_assoc($Producto);
$metadescription = utf8_encode($row_Producto['Info']);
$titulo = $row_Producto['Titulo'];

$PalabraProd = $row_Producto['PalabraProd'];
$Categoria = $row_Producto['Categoria'];
$idCategoria= $row_Producto['idCategoria'];

mysql_select_db($database_Link, $Link);
$query_Descuento = "SELECT ppr.descuento FROM Productos_Promocion ppr
WHERE ppr.id_Producto=$id_Producto LIMIT 1";
$Descuento = mysql_query($query_Descuento, $Link) or die(mysql_error());
$row_Descuento = mysql_fetch_assoc($Descuento);
$descuento = $row_Descuento['descuento'];

mysql_select_db($database_Link, $Link);
$query_Presentacion = "SELECT CONCAT( Grupo, Producto ) AS codigo, pl.ProductosID, pl.DescripcionProducto AS nombre, pl.ClaveProveedor AS modelo, pl.PrecioUnitario AS PU, u.Title AS unidad, pl.Presentacion, pl.AgotarExistencia
FROM Productos_Lanceta pl
JOIN Unidades u ON u.ID = pl.Unidad
WHERE pl.ProductosID =$id_Producto
ORDER BY pl.Presentacion";
$Presentacion = mysql_query($query_Presentacion, $Link) or die(mysql_error());
$row_Presentacion = mysql_fetch_assoc($Presentacion);

mysql_select_db($database_Link, $Link);
$query_Producto_Categorias = sprintf("SELECT c.Title FROM Categorias c
JOIN Categorias_Productos cp ON cp.CategoriasID = c.ID
WHERE cp.ProductosID=%s", $id_Producto);
$Producto_Categorias = mysql_query($query_Producto_Categorias, $Link) or die(mysql_error());
$array_categorias = array();
while ($rowProducto_Categorias = mysql_fetch_array($Producto_Categorias,MYSQL_ASSOC)){
	$array_categorias[] = utf8_encode($rowProducto_Categorias['Title']);
}

mysql_select_db($database_Link, $Link);
$query_ProdSimilares = "SELECT p.ID, p.Title AS Titulo, p.URLSegment AS URL, p.TieneFoto, p.NombreArchivo, m.Title AS Marca,  p.Activo
FROM Productos p
JOIN Marcas m ON m.ID=p.MarcasID
JOIN Categorias_Productos cp ON cp.ProductosID = p.ID
JOIN Productos_Lanceta pl ON pl.ProductosID = p.ID
WHERE p.ID!=$id_Producto AND p.Activo=1 AND p.Title LIKE '$PalabraProd%'
GROUP BY p.ID ORDER BY p.TieneFoto DESC, p.Title ASC LIMIT 0,12";
$ProdSimilares = mysql_query($query_ProdSimilares, $Link) or die(mysql_error());
$row_ProdSimilares = mysql_fetch_assoc($ProdSimilares);
$totalRows_ProdSimilares = mysql_num_rows($ProdSimilares);

mysql_select_db($database_Link, $Link);
$query_ProdRelacionados = "SELECT p.ID, p.Title AS Titulo, p.URLSegment AS URL, p.TieneFoto, p.NombreArchivo, m.Title AS Marca,  p.Activo
FROM Productos p
JOIN Marcas m ON m.ID=p.MarcasID
JOIN Categorias_Productos cp ON cp.ProductosID = p.ID
JOIN Productos_Lanceta pl ON pl.ProductosID = p.ID
WHERE p.ID!=$id_Producto AND p.Activo=1 AND cp.CategoriasID = $idCategoria
GROUP BY p.ID ORDER BY p.TieneFoto DESC, RAND(p.Title) ASC LIMIT 0,12";
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
		window.location.href = "/productos/"+id_prod+"/"+nom_prod;	
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
							<img src="images/productos/0.jpg" width="190" height="190" alt="Imagen no disponible" title="Imagen no disponible" />
							<?php } else { // Mostrar si hay foto ?>
							<a id="detalle_producto_content_foto" href="images/productos/gd/<?php echo $row_Producto['NombreArchivo']; ?>.jpg" title="<?php echo utf8_encode($row_Producto['Titulo'])."</br><small>Marca: ".$row_Producto['Marca']."</small>"; ?>"><img src="images/productos/gd/<?php echo $row_Producto['NombreArchivo']; ?>.jpg" width="190" height="190" alt="<?php echo utf8_encode($row_Producto['Titulo']); ?>" title="<?php echo utf8_encode($row_Producto['Titulo']); ?>" /> </a>
							<?php } ?>
							</div>
						</div>
						<div class="detalle_producto_content_texto">
							<?php if ($Administrador)  { ?>
							<p>ID :<strong><?php echo $id_Producto; ?></strong></p>
							<p>Estatus Producto :<?php if($row_Producto['Activo'] == 1) {echo '<strong>Activo</strong>'; } else {echo '<strong>No Activo</strong>'; } ?></p>
							<?php }?>
							<h1 class="detalle_producto_nombre"><?php echo $titulo; ?></h1>
							<p class="detalle_producto_marca"><a href="marcas/<?php echo $row_Producto['URL']; ?>"><?php echo utf8_encode($row_Producto['Marca']); ?></a></p>
							<p class="detalle_producto_categorias">Categor&iacute;as:<br><?php echo implode(" · ", $array_categorias); ?></p>
							<?php if ($descuento >0 ) { ?>
								<div id="descuento_label_container">
								  <div class="descuento_label"><?php echo $descuento; ?></div>
									
									<div style="float:left; margin-left:10px; width:220px; display:block; text-align:left; font-size:12px; font-style:italic; line-height:14px;">
									  Hasta agotar existencias.<br>
										Las im&aacute;genes s&oacute;lo son ilustrativas, <br>
										el producto puede diferir. <br>
									  Aplican restricciones.<br>
									  No aplica con otras promociones.
		</div>
									<div style="clear:both;"></div>
								</div>
								<?php }?>
							
							<div id="detalle_producto_descripcion">
								<?php 
								$descLarga=$row_Producto['Info'];
								if($Administrador) { ?> 
								<div id="dialog-form" title="Editar informaci&oacute;n">
								  <form style="background-color:#fff" accept-charset="utf-8">
								  <fieldset>
									<label for="name">Informaci&oacute;n del producto</label><br>
									<textarea name="info_prod" cols="50" rows="15" class="text ui-widget-content ui-corner-all" id="info_prod"><?php echo utf8_encode($descLarga); ?></textarea>
									<input type="hidden" id="id_prod" name="id_prod" value="<?php echo $id_Producto;?>">
									<input type="hidden" id="nom_prod" name="nom_prod" value="<?php echo $row_Producto['pURL']; ?>">
								  </fieldset>
								  </form>
								</div>
								
								<div><img src="images/btn_editar2.png" height="20" width="20" style="padding-top:5px;"/> <button id="btn_editar_info">Editar</button></div> <?php }?>
								<?php
									if($row_Producto['Info']=='' || $row_Producto['Info']==NULL) {echo "<em>&nbsp;Sin informaci&oacute;n a&uacute;n.</em><br><br>";} else { echo utf8_encode(nl2br($descLarga)); }?>
							</div>
						</div>
						<div style="clear:both"></div>
					</div>
                    <div style="margin:0 auto; text-align:center;">
					<p style="margin:15px 0 3px"><strong>Presentaciones</strong></p>
							<table width="100%" cellspacing="0" style="font-family:Arial, Helvetica, sans-serif">
								<tr bgcolor="#CCCCCC" style="text-transform:uppercase; font-size:0.5em; font-weight:bold">
									<?php if ($Administrador)  { ?>
									<td width="45" class="headProdDetalle">Activo</td>
									<?php } ?>
									<td width="45" class="headProdDetalle">C&oacute;digo</td>
									<td width="130" class="headProdDetalle">Modelo</td>
									<td width="50" class="headProdDetalle">Unidad</td>
									<td width="" class="headProdDetalle">Presentaci&oacute;n</td>
									</tr>
								<?php do { ?>
									<tr <?php if($row_Presentacion['AgotarExistencia']=='S' && $Administrador) { ?>bgcolor="#FFCCCC" <?php } if($row_Presentacion['AgotarExistencia']=='S' && !$Administrador) {?> style="display:none;" <?php }?>>
									<?php if ($Administrador)  { ?>
									<td width="45" class="tdProdDetalle"><?php if($row_Presentacion['AgotarExistencia']=='S') { ?>No <?php } else { ?> Si<?php }?></td>
									<?php } ?>
										<td width="45" class="tdProdDetalle"><?php echo $row_Presentacion['codigo']; ?></td>
										<td width="130" class="tdProdDetalle"><?php echo $row_Presentacion['modelo']; ?></td>
										<td width="50" class="tdProdDetalle"><?php echo cambiarTextoUnidades($row_Presentacion['unidad']); ?></td>
										<td width="" class="tdProdDetalle"><?php echo utf8_encode($row_Presentacion['Presentacion']);?></td>
									</tr>
									<?php } while ($row_Presentacion = mysql_fetch_assoc($Presentacion)); ?>
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
								<a onMouseOut="this.style.backgroundColor='#FFFFFF'" onMouseOver="this.style.backgroundColor='#F8F8F8'" style="background-color: #FFFFFF; border: 1px solid #DDDDDD; margin: 0; display: block; text-decoration: none; cursor: pointer; -moz-border-radius: 8px; border-radius: 8px; -webkit-border-radius: 8px; text-align: center;" href="<?php echo 'productos/'.$row_ProdSimilares['ID'].'/'.$row_ProdSimilares['URL']; ?>" >
								<div class="content_producto">
								<div class="Prod_info" style="text-align:center;">
									<?php if ($row_ProdSimilares['TieneFoto'] == 0) { // Mostrar si hay foto ?>
									  <img src="images/productos/00.jpg" width="100" height="100" alt="Imagen no disponible" title="Imagen no disponible" />
									  <?php } else { // Mostrar si hay foto ?>
									  <img src="images/productos/ch/<?php echo $row_ProdSimilares['NombreArchivo']; ?>.jpg" width="100" height="100" alt="<?php echo utf8_encode($row_ProdSimilares['Titulo']); ?>" title="<?php echo utf8_encode($row_ProdSimilares['Titulo']); ?>" />
									  <?php } // Mostrar si hay foto ?>
			<p class="prod_nombre"><?php $cadena = utf8_encode($row_ProdSimilares['Titulo']); echo limitarPalabras($cadena,5); ?></p>
									  <p class="prod_marca"><?php echo $row_ProdSimilares['Marca']; ?></p>
								  </div>
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
								<a onMouseOut="this.style.backgroundColor='#FFFFFF'" onMouseOver="this.style.backgroundColor='#F8F8F8'" style="background-color: #FFFFFF; border: 1px solid #DDDDDD; margin: 0; display: block; text-decoration: none; cursor: pointer; -moz-border-radius: 8px; border-radius: 8px; -webkit-border-radius: 8px; text-align: center;" href="<?php echo 'productos/'.$row_ProdRelacionados['ID'].'/'.$row_ProdRelacionados['URL']; ?>" >
								<div class="content_producto">
								<div class="Prod_info"  style="text-align:center;">
									<?php if ($row_ProdRelacionados['TieneFoto'] == 0) { // Mostrar si hay foto ?>
									  <img src="images/productos/00.jpg" width="100" height="100" alt="Imagen no disponible" title="Imagen no disponible" />
									  <?php } else { // Mostrar si hay foto ?>
									  <img src="images/productos/ch/<?php echo $row_ProdRelacionados['NombreArchivo']; ?>.jpg" width="100" height="100" alt="<?php echo utf8_encode($row_ProdRelacionados['Titulo']); ?>" title="<?php echo utf8_encode($row_ProdRelacionados['Titulo']); ?>" />
									  <?php } // Mostrar si hay foto ?>
			<p class="prod_nombre"><?php $cadena = utf8_encode($row_ProdRelacionados['Titulo']); echo limitarPalabras($cadena,5); ?></p>
									  <p class="prod_marca"><?php echo $row_ProdRelacionados['Marca']; ?></p>
								  </div>
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
?>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>
