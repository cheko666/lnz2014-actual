<div id="top">
	<div id="contenedor_top">
		<div style="float:left; width:150px; margin-right:15px;">
			<img src="../images/logo.png" height="27" width="150" />
		</div>
		<div style="float:left; width:400px;">
			<ul id="menu">
				<li><a href="productos">Productos</a></li>
				<li><a href="categorias">Categor&iacute;as</a></li>
				<li><a href="marcas">Marcas</a></li>
				<li><a href="usuarios">Usuarios</a></li>
			</ul>
		</div>
	  <div style="float:right; padding:8px 0 0; margin-left:20px">
		Hola <?php echo $userAuthentication->getUsername('username');?>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="login/logout.php">Cerrar sesi&oacute;n</a>
		</div>
		<div style="float:right; width:200px; margin:0; padding:0">
			<div id="buscador_content">
			  <form action="busqueda.php" method="get">
				<input type="submit" value=" " id="search-submit">
				<input name="codigo" id="tags" placeholder="Buscar c&oacute;digo..." size="31" class="search ui-autocomplete-input" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true">
			  </form>
			</div>
			<div id="buscador_content">
			  <form action="busqueda.php" method="get">
				<input type="submit" value=" " id="search-submit">
				<input name="ID" id="tags" placeholder="Buscar ID..." size="31" class="search ui-autocomplete-input" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true">
			  </form>
			</div>
			<div style="clear:right;"></div>						
		</div>
	</div>
</div>
