<?php
include('../includes/verif_Authenticate.php');
 
if(isset($_GET['edit'])) {
	$id = $_GET['ID'];
	$title = $_GET['title'];
	$informacion = $_GET['informacion'];
	$url_segment = urls_amigables($title);
		
	mysql_select_db($database_Link, $Link);
	$query_upd_Producto ="UPDATE  lanceta_bd_tw.Productos p
	SET p.Title =  '$title',
	p.URLSegment = '$url_segment',
	p.Informacion = '$informacion'
	WHERE  p.ID = $id";
	$upd_Producto = mysql_query($query_upd_Producto, $Link) or die(mysql_error());
	
	header("Location: producto_detalle.php?ID=".$id."" );

	
} else {
 
	$titulo = 'Productos';
	if (isset($_GET['codigo'])) {
		$codigo = $_GET['codigo'];
		$id_Producto=obtenerIDProducto($codigo);
	}
	if (isset($_GET['ID'])) {
		$id_Producto = $_GET['ID'];
	}
	
	if (!isset($_GET['ID']) && !isset($_GET['codigo'])) {
		$updateGoTo = './';
		header(sprintf("Location: %s", $updateGoTo));
	}
	
	if ( empty($id_Producto) )
	{
		$mensaje = 'No existe producto asociado al código que introdujo:<br>';
		$mensaje .= '<h3><span class="label label-default">'.chunk_split($codigo,3, " ").'</span></h3><br>';
		$mensaje .= 'Por favor, introduzca un código que sí exista.';
	} else {
	
	mysql_select_db($database_Link, $Link);
	mysql_query("SET NAMES 'utf8'");
	$query_Codigo ="SELECT Codigo FROM Codigos WHERE ProductosID LIKE $id_Producto LIMIT 1";
	$Codigo = mysql_query($query_Codigo, $Link) or die(mysql_error());
	$row_Codigo = mysql_fetch_assoc($Codigo);
	
	$codigo = $codigo['Codigo'];
	
	mysql_select_db($database_Link, $Link);
	mysql_query("SET NAMES utf8");
	$query_Producto ="SELECT p.ID, p.Title AS Titulo, SUBSTRING_INDEX( p.Title,  ' ', 1 ) AS PalabraProd, m.Title AS Marca, p.URLSegment AS pURL, m.ID AS MarcaID, m.URLSegment AS URL, p.Informacion AS Info, p.TieneFoto, p.NombreImagen,p.FuenteImagen,p.FotoTamano, p.Activo, p.TienePromo, ppr.PromocionesID
	FROM Productos p
	JOIN Codigos c ON c.ProductosID = p.ID
	JOIN Marcas m ON m.ID = p.MarcasID
	LEFT JOIN Promociones_Productos ppr ON ppr.ProductosID = p.ID
	WHERE p.ID = $id_Producto
	GROUP BY ID";
	$Producto = mysql_query($query_Producto, $Link) or die(mysql_error());
	$row_Producto = mysql_fetch_assoc($Producto);
	
	$con_promo=$row_Producto['TienePromo'];
	$id_promo= $row_Producto['PromocionesID'];
	
	mysql_select_db($database_Link, $Link);
	$query_Promocion = "SELECT pr.Vigencia FROM Promociones pr WHERE pr.ID LIKE '$id_promo' LIMIT 1";
	$Promocion = mysql_query($query_Promocion, $Link) or die(mysql_error());
	$row_Promocion = mysql_fetch_assoc($Promocion);
	
	$vigencia = $row_Promocion['Vigencia'];
	
	$query_Presentacion_con_promo= ($con_promo==1) ?", ppr.PrecioRegular, ppr.PrecioFinal" : "";
	
	mysql_select_db($database_Link, $Link);
	mysql_query("SET NAMES 'utf8'");
	$query_Presentacion = "SELECT c.Codigo, c.ProductosID, c.DescripcionProducto AS Descripcion, c.Modelo, m.Title AS Marca, u.Title AS unidad, c.Presentacion, c.DarDeBaja, c.AgotarExistencia ". $query_Presentacion_con_promo. "
	FROM Codigos c
	JOIN Unidades u ON u.ID = c.Unidad
	JOIN Productos p ON p.ID = c.ProductosID
	JOIN Marcas m ON m.ID = p.MarcasID
	LEFT JOIN Promociones_Productos ppr ON ppr.Codigo = c.Codigo 
	WHERE c.ProductosID = $id_Producto
	ORDER BY c.Presentacion";
	$Presentacion = mysql_query($query_Presentacion, $Link) or die(mysql_error());
	}

}
?>
<!DOCTYPE HTML><html><!-- InstanceBegin template="/Templates/layout_backend.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="keywords" content="<?php echo $metakeywords;?>">
<meta name="description" content="<?php echo $metadescription;?>">
<!-- InstanceBeginEditable name="doctitle" -->
<title><?php echo $titulo."| LancetaHG";?></title>
<!-- InstanceEndEditable -->
<BASE HREF="<?php echo $url_base; ?>" />
<link href="css/be.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/layout.css" rel="stylesheet" type="text/css">
<link href="../css/ui-lightness/jquery-ui-1.10.4.custom.min.css" rel="stylesheet" type="text/css"/>
<link href="../css/jquery.lightbox-0.5.css" rel="stylesheet" type="text/css"  media="screen" />
<!-- InstanceBeginEditable name="head" -->
<script language="JavaScript" type="text/javascript" src="js/funciones.js"></script>
<!-- InstanceEndEditable -->
</head>
<body>
    <?php include('../includes/header_admin.php');?>
	<div id="main">	
		<div style="clear:both"></div>
		<div id="contenido">
		<!-- InstanceBeginEditable name="Contenido" -->
			<div style="clear:both"></div>
			<div>
				<div id="titulo">
					<div class="page-header">
					  <h1>Producto <small>Detalle</small></h1>
					</div>
				</div>
				<div style="clear:both"></div>
			</div>
			
<?php if (!empty($id_Producto)) {?>
		<div id="producto-contenedor" style="width:950px; margin:0 auto 50px;">

            <div style="margin-bottom:20px;">
                <div style="float:left; width:150px;"><p><a href="javascript:window.history.back();">&laquo; Volver </a></p></div>
                <div style="float:right;width:400px;">
                     <p class="text-right"><a href="../productos/<?php echo $id_Producto; ?>/<?php echo $row_Producto['pURL']?>" target="_blank">Ver producto en el sitio público</a></p> 
                </div>
                <div style="clear:both"></div>
            </div>

            <div id="error" class="alert text-center" style="display:none;"></div>
            
            <div id="producto-detalle-contenedor" class="panel panel-default" style="margin:0 auto 30px;">
              <div class="panel-heading">
                  <strong>Producto</strong>
				</div>
              <div class="panel-body">
                    <div id="producto-detalle-imagen-contenedor" style="float:left; width:445px; margin:10px; border:solid 1px #CCC; padding:20px; border-radius:6px;-webkit-border-radius:10px;-moz-border-radius:10px;">
            
                                <div style="margin-bottom:5px; padding-bottom:10px;">
                                    <?php if ($row_Producto['TieneFoto'] == 0) { // Mostrar si NO hay foto ?>
                                    <img src="../images/productos/0.jpg" width="400" height="400" alt="Imagen no disponible" title="Imagen no disponible" />
                                    <?php } else { // Mostrar si hay foto ?>
                                    <img src="http://lancetahg.com.mx/images/productos/gd/<?php echo $row_Producto['NombreImagen']; ?>.jpg" width="400" height="400" alt="<?php echo utf8_encode($row_Producto['Titulo']); ?>" title="<?php echo utf8_encode($row_Producto['Titulo']); ?>" />
                                    <?php } ?>
                                </div>  
                                <div <?php echo ($row_Producto['TieneFoto'] == 1) ? 'class="show"' : 'class="hidden"'?> style="padding:20px;">

                                  <div>
                                    <p><span class="help-block">Nombre de imagen: </span><?php echo $row_Producto['NombreImagen'].'.jpg'; ?></p>
                                    <p><span class="help-block">Fuente de la imagen: </span><?php echo $row_Producto['FuenteImagen']; ?></p>
                                    <p><span class="help-block">Tamaño de la imagen: </span><?php echo $row_Producto['FotoTamano']; ?></p>
                                  </div>                          
                                    
                                </div>
                        
                    </div><!-- Termina producto-detalle-imagen-contenedor-->
            
                    <div id="producto-detalle-texto-contenedor" style="float:left; width:445px; margin:10px; border:solid 1px #CCC; padding:20px; border-radius:6px;-webkit-border-radius:10px;-moz-border-radius:10px;<?php if (isset($_GET['sec'])=='detalle') { echo 'background-color:#FFD;'; }?>">
                    
                        <p class="text-right">ID Producto <span class="label label-default"><big><?php echo $id_Producto; ?></big></span></p>
  					<form role="form" action="<?php $_SERVER['PHP_SELF'];?>" method="get">
                        
                        <div class="form-group">
                            <label for="InputProductoNombre">Nombre</label>
                            <input type="type" class="form-control" id="InputProductoNombre" name="title" placeholder="Nombre de producto" value="<?php echo $row_Producto['Titulo'];?>">
                        </div>

                        <div class="form-group">
                            <label for="InputProductoMarca">Marca</label>
                            <p><?php echo $row_Producto['Marca']; ?></p>
                        </div>
                    
                       
                        <div class="form-group">
                            <label for="InputProductoInformacion">Información</label>
                            <textarea name="informacion" class="form-control" rows="10"><?php if($row_Producto['Info']=='' || $row_Producto['Info']==NULL) { echo "Sin información aún."; } else { echo $row_Producto['Info']; }?></textarea>
                        </div>
                        
                        <?php if ($con_promo==1 ) { //Bloque descuentos y promociones?>
                        <div class="panel panel-default">
                          <div class="panel-heading">Promoción</div>
                          <div class="panel-body">
                          
                            <div id="descuento_label_container">
                                <div class="descuento_label_oferta"><?php echo $descuento; ?></div>
                                    Promoci&oacute;n v&aacute;lida s&oacute;lo los d&iacute;as <br><strong><?php echo $vigencia;?></strong>. <br>
                                   Precios incluyen IVA.<br>
                                   V&aacute;lido sólo para las presentaciones marcadas.<br>
                                  Hasta agotar existencias.<br>
                                    Las im&aacute;genes s&oacute;lo son ilustrativas, el producto puede diferir.                                <br>
                                  Aplican restricciones.<br>
                                  No aplica con otras promociones.
                                <div style="clear:both;"></div>
                            </div>
                            
                          </div>
                        </div>
                        <?php } //Termina Bloque descuentos y promociones?>
                     
                  	<div style="float:right; display:inline-block;">
				  		<a class="btn btn-danger btn-xs" href="producto_detalle.php?ID=<?php echo $row_Producto['ID']; ?>" role="button">Cancelar</a>
						<input type="hidden" name="ID" value="<?php echo $row_Producto['ID']; ?>">
                        
                      <button type="submit" name="edit" class="btn btn-success btn-xs">Guardar</button>  
					</div>                     

					</form>
                     
                    </div><!-- Termina producto-detalle-texto-contenedor-->  
            
                    <div style="clear:both"></div>
                    
                     
				</div><!-- Termina panel-body-->
                 
            </div><!-- Termina producto-detalle-contenedor-->

			<div id="producto-presentaciones-contenedor" style="margin:0 auto;">
					<div class="panel panel-default">
					<!-- Default panel contents -->
					<div class="panel-heading text-center"><strong>Información de Lanceta</strong> (excepto Presentación)</div>
                    	<div class="table-responsive">
							<table class="table table-hover table-bordered">
								<thead>
									<tr>
									<th width="35">C&oacute;digo</th>
									<th width="200">Descripción</th>									
									<th width="100">Modelo</th>
									<th width="180">Marca</th>
									<th width="50">Unidad</th>
									<th width="210">Presentaci&oacute;n</th>
									<?php if ($con_promo==1) { ?> 
									<th width="150">Precio Promoción</th>
									<?php }?>
									<th width="20"><small>Dar Baja</small></th>
									<th width="20"><small>Agot. Exis.</small></th>
									<th width="20"><small>Activo Web</small></th>
								</thead>
								<?php while ($row_Presentacion = mysql_fetch_assoc($Presentacion)) { ?>
                                <?php if($row_Presentacion['AgotarExistencia']=='N') { ?>
								<tr <?php  if($row_Presentacion['AgotarExistencia']=='S') { ?>bgcolor="#FFCCCC" <?php }?>>
									<td width="35"><?php echo $row_Presentacion['Codigo']; ?></td>
                                  <td width="200"><small><?php echo $row_Presentacion['Descripcion']; ?></small></td>
                                    <td width="100"><?php echo $row_Presentacion['Modelo']; ?></td>
                                    <td width="180"><small><?php echo $row_Presentacion['Marca']; ?></small></td>
                                    <td width="50"><?php echo $row_Presentacion['unidad']; ?></td>
                                    <td width="210" ><?php echo $row_Presentacion['Presentacion'];?><div style="float:right;"><a class="btn btn-warning btn-xs disabled" href="#" role="button">Editar</a></div></td>
                                    <?php if ($row_Presentacion['precio_antes']!=NULL) { ?> 
                                    <td width="125">
                                        <table width="" border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <td width="30" rowspan="2"><img src="../images/oferta_label_ch_preciopromocion.png" height="30" width="30" style="padding-right:5px;"></td>
                                            <td> de $ <?php echo number_format($row_Presentacion['precio_antes'], 2, '.', ',');?></td>
                                          </tr>
                                          <tr>
                                            <td class="detalle_producto_precio_despues"> a $ <?php echo number_format($row_Presentacion['precio_despues'], 2, '.', ',');?></td>
                                          </tr>
                                        </table>
                                    </td>
                                    <?php }?>
                                    <td width="20"><?php echo $row_Presentacion['DarDeBaja'];?></td>
                                    <td width="20"><?php echo $row_Presentacion['AgotarExistencia'];?></td>
                                    <td width="20">
                                    <?php if($row_Presentacion['AgotarExistencia']=='S') { ?>
                                        No
                                    <?php } else { ?>
                                        Si
                                    <?php }?>
                                    </td>
                                </tr>
                                <?php } }?>
                            </table>
						</div><!--Div Table responsive-->
					</div>
                    </div><!-- Termina #producto-presentaciones-contenedor -->
                             
                                
        </div><!-- Termina producto-contenedor -->
					

<?php } else {?>
	<div class="alert alert-danger text-center">
    	<?php echo $mensaje;?>
    </div>
<?php }?>            

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