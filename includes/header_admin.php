<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Navegación</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Panel administración</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Productos<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="productos.php">Lista de Productos</a></li>
            <li class="divider"></li>            
            <li role="presentation" class="dropdown-header">Acciones Básicas</li>
            <li class="disabled"><a href="productos_crear.php">Crear</a></li>
            <li class="disabled"><a href="#">Editar</a></li>
            <li class="disabled"><a href="#">Eliminar</a></li>
            <li class="divider"></li>
		  	<li role="presentation" class="dropdown-header">Reportes</li>
          </ul>
        </li>
        <? /*
        <li class="dropdown">
          <a href="#" class="dropdown-toggle disabled" data-toggle="dropdown">Marcas<b class="caret"></b></a>
          <ul class="dropdown-menu">
		  	<li role="presentation" class="dropdown-header">Acciones Básicas</li>
            <li class="disabled"><a href="productos_crear.php">Crear</a></li>
            <li class="divider"></li>
		  	<li role="presentation" class="dropdown-header">Consultas</li>
			<li class="disabled"><a href="marcas.php<?php ?>">Listar Marcas</a></li>
          </ul>
        </li>
		*/ ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Series<b class="caret"></b></a>
          <ul class="dropdown-menu">
		  	<li role="presentation" class="dropdown-header">Reportes</li>
			<li><a href="series.php">Faltantes información y fotos por serie</a></li>
          </ul>
        </li>
      </ul>
        <div id="buscador_content" style="background-color:#FF9; width:100px; margin:13px 0 0 15px;">
          <form action="producto_detalle.php" method="get" class="navbar-right">
            <input type="submit" value=" " id="search-submit">
            <input name="codigo" id="tags" placeholder="C&oacute;digo" size="21" class="search ui-autocomplete-input" autocomplete="off" role="textbox" style="width: 60px;">
          </form>
        </div>
        <?php if($userAuthentication->getUserId()==1 ) { ?>      
        <div id="buscador_content" style="background-color:#FF9; width:100px; margin:13px 0 0 15px;">
          <form action="producto_detalle.php" method="get" class="navbar-right">
            <input type="submit" value=" " id="search-submit">
            <input name="ID" id="tags" placeholder="ID" size="21" class="search ui-autocomplete-input" autocomplete="off" role="textbox" style="width: 60px;">
          </form>
        </div> 
        <?php } ?>
	  <p class="navbar-text navbar-right">Hola <?php echo $userAuthentication->getUsername('username');?> &nbsp;<?php if($userAuthentication->getUserId()==1 ) { ?>| &nbsp;<a href="codigos_nuevos.php">Nuevos códigos <span class="badge"><?= mostrarCantidadCodigosNuevos(); ?></span></a><?php } ?> &nbsp;| &nbsp;<a href="../login/logout.php?uri=<?php echo $uri;?>" class="navbar-link">Cerrar sesión</a></p>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
