<?php
mysql_select_db($database_Link, $Link);
$query_Categorias = "SELECT * FROM categorias ORDER BY categoria ASC";
$Categorias = mysql_query($query_Categorias, $Link) or die(mysql_error());
$row_Categorias = mysql_fetch_assoc($Categorias);
$totalRows_Categorias = mysql_num_rows($Categorias);

/*
mysql_select_db($database_Link, $Link);
$query_Marcas = "SELECT * FROM Marcas ORDER BY marca ASC";
$Marcas = mysql_query($query_Marcas, $Link) or die(mysql_error());

mysql_select_db($database_Link, $Link);
$query_Marcas2 = "SELECT * FROM Marcas ORDER BY marca ASC";//consulta para seleccionar las palabras a buscar, esto va a depender de su base de datos
$Marcas2 = mysql_query($query_Marcas2) or die(mysql_error());
*/
?>

<script type="text/javascript">
/*
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
$(function() {
	<?php /*
	while($rowMarcas2= mysql_fetch_array($Marcas2)) {//se reciben los valores y se almacenan en un arreglo
		$elementos2[]= '"'.$rowMarcas2['marca'].'"';
	}
	$arreglo2= implode(",", $elementos2);//junta los valores del array en una sola cadena de texto
	*/
	?>	
	var availableTags2=new Array(<?php //echo $arreglo2; ?>);//imprime el arreglo dentro de un array de javascript
	$( "#tagsMarcas" ).autocomplete({
		source: availableTags2
	});
});
*/
</script>


<div class="bloquecontenido">
<h1>Categor&iacute;as</h1>
    <ul>
        <?php do { ?>
        <li><a href="categorias/<?php echo $row_Categorias['categoria_url']; ?>"><?php echo utf8_encode($row_Categorias['categoria']); ?></a></li>
        <?php } while ($row_Categorias = mysql_fetch_assoc($Categorias)); ?>
    </ul>
</div>
<?php /*
<div class="bloquecontenido">
    <h1>Marcas</h1>
<form name="form" id="form" action="productos.php">
	<div>   
    <select name="marca" id="marca" onchange="MM_jumpMenu('parent',this,0)" style="font-size:0.85em; padding:0px; margin:0;">
    	<option>Seleccione Marca...</option>
        <?php while ($row_Marcas = mysql_fetch_assoc($Marcas)) { ?>
        <option value="<?php echo "productos.php?marca=".$row_Marcas['marca']; ?>"><?php echo $row_Marcas['marca']; ?></option>
        <?php }  ?>
    </select>
    </div>
    <p class="center" style="margin:5px 0; font-weight:
    bold;">o escriba el nombre</br>de la marca</p>
    <div id="buscador_contentMarcas">
    <input type="submit" value="Buscar " class="search_button"/>
    <input name="marca" id="tagsMarcas" placeholder="Buscar marca" size="31" class="search"/>
    </div>
</form>
</div>
*/
mysql_free_result($Categorias);
?>
