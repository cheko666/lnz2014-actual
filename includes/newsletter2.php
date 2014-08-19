<?php 
$hostname_Link = "localhost";
$database_Link = "lanceta_bd";
$username_Link = "lanceta_superAdm";
$password_Link = "070209S";
$Link = mysql_pconnect($hostname_Link, $username_Link, $password_Link) or trigger_error(mysql_error(),E_USER_ERROR); 

include ('funciones.php');
include ('stemm_es.php');
require_once('UserAuthentication.class.php');  
// utilizamos conexion por defecto.
$userAuthentication = new UserAuthentication(); 

?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="keywords" content="<?php echo $metakeywords;?>">
<meta name="description" content="<?php echo $metadescription;?>">
<title><?php echo utf8_encode($row_Promociones['titulo']).'  |  LancetaHG';?></title>
<style type="text/css">
html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed, 
figure, figcaption, footer, header, hgroup, 
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
	margin: 0;
	padding: 0;
	border: 0;
	font-size: 100%;
	/*font: inherit;*/
	/*vertical-align: baseline;*/
}
body {
		
}
p {
	text-align:left;
	color:#333333;
	font-size:1em;
	line-height:1.4em;
	margin:6px 0 6px;
	clear:inherit;
}
.content_producto {
	width:155px;
	min-height:200px;
	height:auto !important;
	height:200px;
	padding:0;
	margin:5px;
	clear:both;
}
</style>
</head>
<body>
  <div style="width:600px; margin:0 auto; padding:5px; font-family:Arial, Helvetica, sans-serif; font-size:12px;">
  <table width="560" border="0" align="center" cellpadding="0" cellspacing="0" style="margin:0; padding:0; border:0">
  <tr>
    <td>
    	<p style="text-align: center; ">&nbsp;<span style="font-size: small; "><font color="#666666">Si no ve la siguiente imagen, de un click&nbsp;</font></span><font color="#ffffff"><a href="http://www.lancetahg.com.mx/<?php echo $row_Promociones['url_completa'];?>"><span style="font-size: small;" title="Ver promoci&oacute;n en sitio web">aqu&iacute;</span></a></font><span style="font-size: small; ">.</span></p>
    </td>
  </tr>
  <tr align="center" style="margin:0; padding:0; border:0">
    <td style="margin:0; padding:0; border:0">
   	  <img src="http://www.lancetahg.com.mx/<?php echo $row_Promociones['url_img_cabecera'];?>" width="560" height="650" title="<?php echo utf8_encode($row_Promociones['titulo']);?>" alt="<?php echo utf8_encode($row_Promociones['titulo']);?>"></td>
  </tr>
    <td>
    	<table width="560" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><a href="http://www.lancetahg.com" title="Ir a www.lancetahg.com.mx" style="margin:0; padding:0; text-decoration:none;"><img src="http://www.lancetahg.com/images/newsletter-pie1.jpg" width="470" height="60" alt="Ir a www.lancetahg.com.mx" border="0" ></a>
    </td>
    <td>
    	<a href="https://www.facebook.com/lancetahg" title="Vis&iacute;tanos en Facebook" style="margin:0; padding:0; text-decoration:none;"><img src="http://www.lancetahg.com/images/newsletter-pie2.jpg" width="90" height="60" alt="Ir a www.lancetahg.com.mx" border="0" ></a>
    </td>
  </tr>
</table>
    </td>
  </tr>
  </table>
</div><!--Termina productos_grid-->
<?php
mysql_free_result($Categorias);
mysql_free_result($Marcas);
?>
</body>
</html>
