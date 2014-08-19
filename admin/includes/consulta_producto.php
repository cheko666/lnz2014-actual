<?php

if (!empty($id_Producto)) {?>
		<div id="producto_info">

			<div id="titulo_bottom">
				<div style="float:left; width:150px;"><a href="javascript:window.history.back();">&laquo; Volver </a></div>
				<?php /*
				<div style="float:right;">
					<form class="form-inline" role="form" action="proveedores_infofotos.php" method="get">
					  <div class="form-group">
						<label class="sr-only" for="inputMarca">Clave Marca</label>
						<input type="text" class="form-control input-sm" id="inputMarca" name="grupo" placeholder="Clave Proveedor">
					  </div>
					  <button type="submit" class="btn btn-default btn-sm">Buscar</button>
					</form>
				</div>
				*/ ?>
				<div style="clear:both"></div>
			</div>

				<div style="width:95%; margin:10px auto;">
					<div class="alert alert-warning text-center fade in">
					  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					  <div id="Alert">
					  </div>
					</div>
					  
						<div style="margin:0 auto 10px; width:900px;">
							<div style="float:left;">
								<div class="panel panel-default">
								  <div class="panel-heading">Imagen</div>
								  <div class="panel-body">
									<div style="margin-bottom:5px;">
										<?php if ($row_Producto['TieneFoto'] == 0) { // Mostrar si NO hay foto ?>
										<img src="../images/productos/0.jpg" width="400" height="400" alt="Imagen no disponible" title="Imagen no disponible" />
										<?php } else { // Mostrar si hay foto ?>
										<img src="../images/productos/gd/<?php echo $row_Producto['NombreArchivo']; ?>.jpg" width="400" height="400" alt="<?php echo utf8_encode($row_Producto['Titulo']); ?>" title="<?php echo utf8_encode($row_Producto['Titulo']); ?>" />
										<?php } ?>
									</div>  
									<div <?php echo ($row_Producto['TieneFoto'] == 1) ? 'class="show"' : 'class="hidden"'?> style="padding:10px;">
										<dl style="margin-bottom:10px;">
											<dt>Nombre del archivo de la imagen</dt>
											<dd><?php echo $row_Producto['NombreArchivo'].".jpg";?></dd>
										</dl>
										<a class="btn btn-danger btn-xs disabled" href="#" role="button">Quitar foto</a>
										
									</div>
						
									<div style="padding:10px; background-color:#F3F3F3;">
										<form role="form">
										  <div class="form-group" style="margin-bottom:5px;">
											<label for="archivo_imagen">Cambiar imagen</label>
											<input type="file" id="archivo_imagen">
											<p class="help-block" style="margin-bottom:5px;">La imagen debe ser extensión <strong>.jpg</strong></p>
										  </div>
										</form>
									</div>
									
								  </div>
								</div>
								
							</div>
							<div style="float:right; width:420px;">
							
								<p>ID Producto <span class="label label-default"><?php echo $id_Producto; ?></span> &nbsp;|&nbsp; Estatus Producto <?php if($row_Producto['Activo'] == 1) {echo '<span class="label label-success">Activo</span>'; } else {echo '<span class="label label-danger">No Activo</span>'; } ?></p>
							
								<div class="panel panel-default">
								  <div class="panel-heading">Nombre de producto <div style="float:right;"><a class="btn btn-warning btn-xs" href="#" role="button" data-toggle="modal" data-target="#EditNombreModal">Editar</a></div>
									<!-- Modal -->
									<div class="modal fade" id="EditNombreModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									  <div class="modal-dialog">
										<div class="modal-content">
										  <div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title" id="myModalLabel">Modificar <small></small></h4>
											
										  </div>
											<form role="form" name="form_nombre_producto" id="form_nombre_producto">
											  <div class="modal-body">
													<div class="form-group">
														<label for="nombre_producto">Nombre de producto</label>
														  <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" value="<?php echo $row_Producto['Titulo']; ?>">
														  <input type="hidden" id="id_producto" name="id_producto" value="<?php echo $row_Producto['ID']; ?>">
													</div>
											  </div>
											  <div class="modal-footer">
												<button type="button" class="btn btn-default btn-xs" data-dismiss="modal" onClick="">Cancelar</button>
												<button type="button" class="btn btn-primary btn-xs" id="btn-form-enviar" onClick="enviarDatosProducto()">Modificar</button>
											  </div>
											</form>
										</div>
									  </div>
									</div><!-- Modal -->
						
								  </div>
								  <div class="panel-body">
									<h2><?php echo $row_Producto['Titulo']; ?></h2>								
								  </div>
								</div>
								
								<div class="panel panel-default">
								  <div class="panel-heading">Marca</div>
								  <div class="panel-body">
									<h2><a href="marcas.php?idm=<?php echo $row_Producto['MarcaID']; ?>"><?php echo utf8_encode($row_Producto['Marca']); ?></a></h2>								
								  </div>
								</div>
								
									<?php /*
									<p class="detalle_producto_categorias">Categor&iacute;as:<br><?php echo implode(" · ", $array_categorias); ?></p>
									*/ ?>
						
								<div class="panel panel-default">
								  <div class="panel-heading">Información del producto<div style="float:right;"><a class="btn btn-warning btn-xs disabled" href="#" role="button">Editar</a></div>
								  </div>
								  <div class="panel-body">
									<?php 
									$descLarga=$row_Producto['Info'];
									if($row_Producto['Info']=='' || $row_Producto['Info']==NULL) {
										echo "<em>&nbsp;Sin informaci&oacute;n a&uacute;n.</em><br><br>";
									} else {
										echo nl2br($descLarga);
									}?>
								  </div>
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
						
							</div>
							<div style="clear:both"></div>
						</div>
					
                    <div style="margin:0 auto;">
					<div class="panel panel-default">
					<!-- Default panel contents -->
					<div class="panel-heading text-center"><strong>Información de Lanceta</strong> (excepto Presentación)</div>
                    	<div class="table-responsive">
							<table class="table table-hover table-bordered">
								<thead>
									<tr>
									<th width="45">C&oacute;digo</th>
									<th width="200">Descripción</th>									
									<th width="100">Modelo</th>
									<th width="180">Marca</th>
									<th width="50">Unidad</th>
									<th width="210">Presentaci&oacute;n</th>
									<?php if ($con_promo==1) { ?> 
									<th width="150">Precio Promoción</th>
									<?php }?>
									<th width="20"><small>Activo</small></th>
								</thead>
								<?php while ($row_Presentacion = mysql_fetch_assoc($Presentacion)) { ?>
								<tr <?php if($row_Presentacion['AgotarExistencia']=='S') { ?>bgcolor="#FFCCCC" <?php }?>>
									<td width="45"><?php echo $row_Presentacion['codigo']; ?></td>
                                    <td width="200"><small><?php echo $row_Presentacion['DescripcionProducto']; ?></small></td>
                                    <td width="100"><?php echo $row_Presentacion['Modelo']; ?></td>
                                    <td width="180"><small><?php echo $row_Presentacion['Marca']; ?></small></td>
                                    <td width="50"><?php echo cambiarTextoUnidades($row_Presentacion['unidad']); ?></td>
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
                                    <td width="20">
                                    <?php if($row_Presentacion['AgotarExistencia']=='S') { ?>
                                        No
                                    <?php } else { ?>
                                        Si
                                    <?php }?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </table>
						</div><!--Div Table responsive-->
					</div>
                    </div>
                    <p>&nbsp;</p>
					</div>			
			</div>
		</div>			
<?php } else {?>
	<div class="alert alert-danger text-center">
    	<?php echo $mensaje;?>
    </div>
<?php }?>            
