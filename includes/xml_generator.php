<?php
$ruta_base = 'http://www.lancetahg.com.mx';
$directorio= '/productos/';
require('db.php');
$codigo='<?xml version="1.0" encoding="UTF-8"?>
   <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
     xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">';

mysql_select_db($database_Link, $Link);
$ssql="select p.URLSegment AS ruta, DATE(p.FechaModificacion) AS fecha, p.Title, p.NombreArchivo, p.TieneFoto From Productos p WHERE p.Activo=1";   
$rs = mysql_query($ssql,$Link) or die(mysql_error());
$fila=mysql_fetch_assoc($rs);
$total = mysql_num_rows($rs);
while($fila=mysql_fetch_assoc($rs)){
	$codigo .='<url>
			   <loc>'.$ruta_base.$directorio.$fila['ruta'].'</loc>
			   <lastmod>'.$fila['fecha'].'</lastmod> 
			   <changefreq>weekly</changefreq>
			   <priority>0.7</priority>';
   if($fila['TieneFoto']==1) {			   
   		$codigo .='<image:image>
				<image:loc>'.$ruta_base.'/images/productos/gd/'.$fila['NombreArchivo'].'.jpg</image:loc>
				<image:title>'.htmlspecialchars(utf8_encode($fila['Title'])).'</image:title>
			</image:image>
			</url>';
   } else {
	$codigo .=	'<image:image>
			<image:loc>'.$ruta_base.'/images/productos/0.jpg</image:loc>
			<image:title>'.htmlspecialchars(utf8_encode($fila['Title'])).'</image:title>
		</image:image>
		</url>';	   
	}
}
$codigo .='</urlset>';

//Ahora creamos el archivo con el código necesario

$fp=fopen("/home3/lanceta/public_html/sitemap.xml","w+");
if ($fp)
{
   fwrite ($fp,$codigo);
   fclose($fp);
   echo "<p><b>Archivo sitemap creado correctamente</b>";
}
else{ 
   echo "<p><b>Ha habido un problema y el archivo no ha sido creado correctamente</b>";
}
?>