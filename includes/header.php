		<header>
			<div id="logo"><a href="/"><img src="images/logo.png"></a></div>
			<nav>
					<ul id="menuList">
						<li><a href="productos">Productos</a></li>
						<li><a href="tarjeta-cliente-distinguido">Cliente Distinguido</a></li>
						<li><a href="como-comprar">Cómo comprar</a></li>
						<li><a href="sucursales">Sucursales</a></li>
						<li><a href="contacto">Contacto</a></li>
					</ul>
					<div id="buscadores_Content">
						<div id="buscador_content">
						  <form action="busqueda.php" method="get">
							<input type="submit" value=" " id="search-submit">
							<input name="search" id="tags" placeholder="Buscar..." size="31" class="search ui-autocomplete-input" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true">
						  </form>
						</div>
						<div id="JumpMenu_Marcas">
							<select name="marca" id="marca" onChange="MM_jumpMenu('parent',this,0)">
							<option style="margin:0; padding:0;">Seleccione Marca...</option>
							<?php while ($row_Marcas = mysql_fetch_assoc($Marcas)) { ?>
							<option  style="margin:0; padding:0;" value="<?php echo "marcas/".$row_Marcas['URLSegment']; ?>"><?php echo $row_Marcas['Title']; ?></option>
							<?php }  ?>
							</select>
						</div>
						<div style="clear:right;"></div>						
					</div><!-- Termina buscadores_Content -->
			</nav>
		</header>
