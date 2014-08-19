<?php /*
if ($userAuthentication->isAuthenticated()==true) 
{	
$uri=$_SERVER['REQUEST_URI'];
?>
<div id="top">
	<div id="contenedor_top">
        <div class="navbar-header">
          <a style="float:left;padding:5px;font-size:18px;line-height:20px;height:50px;text-decoration:none;color:#CCC;" href="<?php echo 'http://www.lancetahg.com.mx/admin/';//echo !empty($uri) ? 'http://www.lancetahg.com.mx/admin'.$uri : 'http://www.lancetahg.com.mx/admin/';?>">Ir a Panel de Administración >></a>
        </div>


        <div style="float:right; width:140px; margin:0; padding:0">
            <div id="buscador_content" style="background-color:#FF9; width:100px;">
              <form action="http://www.lancetahg.com.mx/productos.php" method="get">
                <input type="submit" value=" " id="search-submit">
                <input name="codigo" id="tags" placeholder="C&oacute;digo" size="21" class="search ui-autocomplete-input" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true" style="width: 60px;">
              </form>
            </div>
            <div style="clear:right;"></div>						
		</div>

		<div style="float:right; padding:8px 0 0; margin-left:20px">
            Hola <?php echo $userAuthentication->getUsername('username');?>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="login/logout.php?uri=<?php echo $uri;?>">Cerrar sesi&oacute;n</a>
		</div>
	</div>
    <div style="clear:both"></div>
</div>
<?php } */?>