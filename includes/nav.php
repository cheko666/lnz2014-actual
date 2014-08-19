<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#lanceta-nabvar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse"  id="lanceta-nabvar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="productos">Porductos</a></li>
        <li><a href="tarjeta-cliente-distinguido">Cliente Distinguido</a></li>
        <li><a href="como-comprar">Cómo comprar</a></li>
        <li><a href="sucursales">Sucursales</a></li>
        <li><a href="contacto">Contacto</a></li>
      </ul>
      <!--
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      -->
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


    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>