<?php

/********************************************************************************************************************/

/********************************************************************************************************************/

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_Link, $Link);
mysql_query("SET NAMES 'utf8'");
$query_Marcas = "SELECT m.* 
FROM Marcas m
GROUP BY m.Title
ORDER BY m.Title ASC";
$Marcas = mysql_query($query_Marcas, $Link) or die(mysql_error());

mysql_select_db($database_Link, $Link);
mysql_query("SET NAMES 'utf8'");
$query_Categorias = "SELECT * FROM Categorias c ORDER BY c.Title ASC";
$Categorias = mysql_query($query_Categorias, $Link) or die(mysql_error());
$row_Categorias = mysql_fetch_assoc($Categorias);
$totalRows_Categorias = mysql_num_rows($Categorias);

//Para Meta keywords en páginas estáticas
mysql_select_db($database_Link, $Link);
mysql_query("SET NAMES 'utf8'");
$query_Categorias_nombres = "SELECT Title FROM Categorias c ORDER BY c.Title ASC";
$Categorias_nombres = mysql_query($query_Categorias_nombres, $Link) or die(mysql_error());
$row_Categorias_nombres = mysql_fetch_assoc($Categorias_nombres);

do {
	$categorias[] = $row_Categorias_nombres['Title'];
} while ($row_Categorias_nombres = mysql_fetch_assoc($Categorias_nombres));

$metakeywords = implode(',',$categorias);
//Para Meta description en páginas estáticas
$metadescription = "LancetaHG, las tiendas de autoservicio con más de 5,000 productos para el médico y el paciente.";

$sucursales = 'Hospital General,Hiper Lanceta,La Raza,Tlalpan,Satélite,Aguascalientes';

mysql_select_db($database_Link, $Link);
mysql_query("SET NAMES 'utf8'");
$query_Promociones = "SELECT pr.* FROM Promociones pr WHERE pr.Activo";
$Promociones = mysql_query($query_Promociones, $Link) or die(mysql_error());
$hay_promos = ( mysql_num_rows($Promociones)==1 ) ? "true" : "false";
$row_Promociones= mysql_fetch_assoc($Promociones);

function obtenerIDProducto($codigo) {
	global $database_Link, $Link;
	$query_busq_id_Producto= "SELECT c.ProductosID
					FROM Codigos c
					JOIN Productos p ON p.ID = c.ProductosID
					WHERE c.Codigo = '$codigo' AND p.Activo=1 LIMIT 1";
	$busq_id_Producto=mysql_query($query_busq_id_Producto, $Link) or die(mysql_error());
	$row_busq_id_Producto= mysql_fetch_assoc($busq_id_Producto);
	$row_busq_id_Producto!='' ? $id_Producto=$row_busq_id_Producto['ProductosID'] : $id_Producto=0;	
	return $id_Producto;
}

function limitarPalabras($cadena, $longitud, $elipsis = "...") {
	$palabras = explode(' ', $cadena);
	$totalPalabras = count($palabras) -1;
	if ($totalPalabras >= $longitud){
		return implode(' ', array_slice($palabras, 0, $longitud)) . $elipsis;
	}else{
		return $cadena;
	}
}

function mostrarCantidadCodigosNuevos() {
	global $database_Link, $Link;
	$codigos_nuevos_cantidad = 0;
	$query_count_codigos_nuevos = "SELECT COUNT(*) AS Cantidad
	FROM  Codigos c
	WHERE  c.ProductosID IS NULL AND c.AgotarExistencia = 'N' AND c.DarDeBaja = 'N' AND c.Codigo!=1001 AND c.Codigo!=1002";
	$count_codigos_nuevos = mysql_query($query_count_codigos_nuevos, $Link) or die(mysql_error());
	$row_count_codigos_nuevos = mysql_fetch_assoc($count_codigos_nuevos);
	return $row_count_codigos_nuevos['Cantidad'];
}


function eliminarPalabrasCortas ($cadena) {
	// Tranformamos todo a minusculas
	$cadena = strtolower($cadena);
	
	//Rememplazamos caracteres especiales latinos
	$find = array('á', 'é', 'í', 'ó', 'ú');
	$repl = array('a', 'e', 'i', 'o', 'u');
	$cadena = str_replace ($find, $repl, $cadena);
	
	$find = array(' a ',' atras ', ' con ', ' de ', ' desde ', ' entre ',' hasta ',' hacia ',' mas ',' mediante ',' para ', ' por ',' que ',' segun ',' sin ',' sino ',' sobre ',' tras ', ' los ', ' las ', ' esta ', ' esta ', ' durante ', ' tiene ', ' contiene ');
	
	$cadena = str_replace ($find, ' ', $cadena);
	
	// Añaadimos los guiones
	$find = array('&', '\r\n', '\n', '+','.',','); 
	$cadena = str_replace ($find, ' ', $cadena);
	
	$str = explode(" ",$cadena);
	foreach($str as $row => $field ){
		if(strlen($field)>2){
			$cadena_keywords_array[] .= $field;
		}
	$cadena_keywords= implode(',',$cadena_keywords_array);	
	}
	return $cadena_keywords;
}

function limitarPalabras2($cadena, $longitud) {
	$palabras = explode(' ', $cadena);
	$totalPalabras = count($palabras) -1;
	if ($totalPalabras >= $longitud){
		return implode(' ', array_slice($palabras, 0, $longitud));
	}else{
		return $cadena;
	}
}

function obtenerNombreUsuario ($idUser) {
	global $database_Link, $Link;
	mysql_select_db($database_Link, $Link);
mysql_query("SET NAMES 'utf8'");
	$query_NombreCliente = sprintf("SELECT clientes.nombre FROM clientes WHERE clientes.idClientes = $idUser");
	$NombreCliente = mysql_query($query_NombreCliente, $Link) or die(mysql_error());
	$row_NombreCliente = mysql_fetch_assoc($NombreCliente);
	$totalRows_NombreCliente = mysql_num_rows($NombreCliente);
	$nombre = $row_NombreCliente['nombre'];
	return $nombre;
}

function obtenerItemsCanasta ($idUser) {
	global $database_Link, $Link;
	mysql_select_db($database_Link, $Link);
mysql_query("SET NAMES 'utf8'");
	$query_CanastaCantidadItems = sprintf("SELECT COUNT(*) FROM `Canasta_items` WHERE `Canasta_items`.`idClientes`=1");
	$CanastaCantidadItems = mysql_query($query_CanastaCantidadItems, $Link) or die(mysql_error());
	$row_CanastaCantidadItems = mysql_fetch_assoc($CanastaCantidadItems);

	echo $row_CanastaCantidadItems;
}
function obtenerNoItemsCanasta($idUsuario) {
	global $database_Link, $Link;
	mysql_select_db($database_Link, $Link);
mysql_query("SET NAMES 'utf8'");
	$query = "SELECT COUNT(*) codigo FROM Canasta_items WHERE Canasta_items.idUsuarios=$idUsuario AND solicitado=0";
	$Resultado = mysql_query($query, $Link) or die(mysql_error());
	$row = mysql_fetch_array($Resultado);
	echo $row['codigo'];
}

function cambiarTextoUnidades ($txt_unidad)
{
	switch ($txt_unidad) {
	case "CJA":
		$txt_unidad="Caja";
		break;    
	case "PZA":
		$txt_unidad="Pieza";
		break;    
	case "PAQ":
		$txt_unidad="Paquete";
		break;    
	case "RLL":
		$txt_unidad="Rollo";
		break;    
	case "TBO":
		$txt_unidad="Tubo";
		break;    
	case "FCO":
		$txt_unidad="Frasco";
		break;    
	case "GALON":
		$txt_unidad="Gal&oacute;n";
		break;    
	case "HOJA":
		$txt_unidad="Hoja";
		break;    
	case "PAR":
		$txt_unidad="Par";
		break;    
	case "EQP":
		$txt_unidad="Equipo";
    	break;    
	case "JGO":
		$txt_unidad="Juego";
    	break;    
	case "SBR":
		$txt_unidad="Sobre";
    	break;    
	case "LTA":
		$txt_unidad="Lata";
    	break;    
	case "BLS":
		$txt_unidad="Bolsa";
    	break;    
	case "EST":
		$txt_unidad="Estuche";
    	break;    
	case "BOTE":
		$txt_unidad="Bote";
    	break;    
	case "CJTO":
		$txt_unidad="Conjunto";
		break;
	}
	return $txt_unidad;
}

function reemplazar_textos_busquedas($busqueda_stemm,$busqueda)
{
	$busqueda_stemm_en_array = str_split($busqueda_stemm);
	$busqueda_en_array = str_split($busqueda);
	$reemplazo = str_replace($busqueda_stemm_en_array,$busqueda_en_array,$reemplazo);
	echo $reemplazo;
	//$long=count($busqueda_en_array);
	//for (i)
}

function urls_amigables($url) {

// Tranformamos todo a minusculas
$url = strtolower($url);

//Rememplazamos caracteres especiales latinos

$find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');

$repl = array('a', 'e', 'i', 'o', 'u', 'n');

$url = str_replace ($find, $repl, $url);

// Añaadimos los guiones

$find = array(' ', '&', '\r\n', '\n', '+'); 
$url = str_replace ($find, '-', $url);

// Eliminamos y Reemplazamos demás caracteres especiales

$find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');

$repl = array('', '-', '');

$url = preg_replace ($find, $repl, $url);

return $url;

}
?>