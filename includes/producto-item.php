<div>

	<?php if($currentPage == '/productos.php' || $basename == 'busqueda') {
		include 'paginator2.php'; 
	} else {
		include 'paginator.php'; 
	} ?>

	<?php do { ?>
		<a onMouseOut="this.style.backgroundColor='#FFFFFF'" onMouseOver="this.style.backgroundColor='#F8F8F8'" style="background-color: #FFFFFF; border: 1px solid #DDDDDD; margin: 10px; display: block; float: left; text-decoration: none; text-align: center; cursor: pointer; -moz-border-radius: 8px; border-radius: 8px; -webkit-border-radius: 8px;" href="<?php echo 'productos/'.$row_Productos['ID'].'/'.$row_Productos['URL_Producto']; ?>" >
			<div class="content_producto">
				<div class="Prod_info">
					<?php if ($row_Productos['TieneFoto'] == 0) { // Mostrar si hay foto ?>
					<img src="http://lancetahg.com.mx/images/productos/0.jpg" width="100" height="100" alt="Imagen no disponible" title="Imagen no disponible" />
					<?php } else { // Mostrar si hay foto ?>
					<img src="http://lancetahg.com.mx/images/productos/ch/<?php echo $row_Productos['NombreImagen']; ?>.jpg" width="100" height="100" alt="<?php echo $row_Productos['Titulo']; ?>" title="<?php echo $row_Productos['Titulo']; ?>" />
					<?php } // Termina Mostrar si hay foto ?>
					<p class="prod_nombre"><?php $cadena = $row_Productos['Titulo']; echo limitarPalabras($cadena,5); ?></p>
					<p class="prod_marca"><?php echo $row_Productos['Marca']; ?></p>
					</div>
					<?php if($row_Productos['TienePromo']==1) { ?>
                    <div class="descuento_label_ch_oferta">
                    </div>
                    <?php }  ?>                  
					<div class="boton">Ver detalle</div>
				</div>
		</a>
	<?php } while ($row_Productos = mysql_fetch_assoc($Productos)); ?>

	<?php if($currentPage == '/catalogo_productos.php') {
		include 'paginator2.php'; 
	} else {
		include 'paginator2.php'; 
	} ?>
    <div style="clear:both"></div>
</div><!--Termina productos-->