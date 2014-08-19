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
}
</style>
</head>
<body>
  <div style="width:600px; margin:0 auto; padding:5px; font-family:Arial, Helvetica, sans-serif; font-size:12px;">
  <table width="570" border="0" align="center" cellpadding="0" cellspacing="0" style="margin:0; padding:0; border:0">
  <tr>
    <td>
    	<p style="text-align: center; ">&nbsp;<span style="font-size: small; "><font color="#666666">Si no ve la siguiente imagen, de un click&nbsp;</font></span><font color="#ffffff"><a href="http://www.lancetahg.com.mx/productos/promociones/colostomia" target="_blank"><span style="font-size: small;" title="Ver promoci&oacute;n en sitio web">aqu&iacute;</span></a></font><span style="font-size: small; ">.</span></p>
    </td>
  </tr>
  <tr align="center" style="margin:0; padding:0; border:0">
    <td style="margin:0; padding:0; border:0">
   	  <img src="http://www.lancetahg.com.mx/images/promo-colostomia-cabecera.jpg" width="560" height="230" title="Promoción Colostomía 16, 17 y 18 de julio de 2014" alt="Promoción Colostomía 16, 17 y 18 de julio de 2014"></td>
  </tr>
  <tr align="center" style="margin:0; padding:0; border:0">
    <td align="center" style="margin:0; padding:0; border:0">
    	<table width="570" border="0" cellpadding="0" cellspacing="0">
  <tr align="center" valign="middle">
    <td width="190" height="240">
    		<a onmouseout="this.style.backgroundColor='#FFFFFF'" onmouseover="this.style.backgroundColor='#F8F8F8'" style="border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-top-color: rgb(221, 221, 221); border-right-color: rgb(221, 221, 221); border-bottom-color: rgb(221, 221, 221); border-left-color: rgb(221, 221, 221); width: 168px; margin-top: 10px; margin-right: 10px; margin-bottom: 10px; margin-left: 10px; display: block; float: left; text-decoration: none; text-align: center; cursor: pointer; border-top-left-radius: 8px; border-top-right-radius: 8px; border-bottom-right-radius: 8px; border-bottom-left-radius: 8px; background-color: rgb(255, 255, 255); " href="http://www.lancetahg.com.mx/productos/533/bolsa-de-colostomia-alternacon-aro">
              <div style="min-height:200px; height:auto !important; height:200px; padding:5px 0; margin:0 auto; clear:both;">
					<div style="min-height:170px; height:auto !important; height:170px;">
                      <img src="http://www.lancetahg.com.mx/images/productos/ch/533-bolsa-de-colostomia-alternacon-aro.jpg" width="100" height="100" alt="Bolsa de Colostomía Alterna con Aro" title="Bolsa de Colostomía Alterna con Aro" style="border:none;">
                      <p style="font-size:14px; line-height:16px; color:#333; text-align:center; display:block; margin:3px auto;">Bolsa de Colostomía Alterna con Aro</p>
                      <p style="font-size:12px; line-height:13px; color:#999; text-align:center; display:block; margin:4px auto;">COLOPLAST</p>
                      <p style="font-size:12px; line-height:13px; color:#999; text-align:center; display:block; margin:4px auto;">de $ 54.00</p>
                      <p style="font-size:20px; line-height:20px; color:#C00; text-align:center; display:block; margin:4px auto; font-weight:bold;">a $ 45.00
</p>
                     </div>
                     <div style="-moz-border-radius: 10px; border-radius: 10px; -webkit-border-radius : 10px; margin:2px auto; padding:5px 10px; background-color:#6FD03C; color:#FFF; text-decoration:none; display:inline-block; width:80px;">Ver detalle</div>
                    </div>
          </a>
    </td>
    <td width="190" height="240">
    		<a onmouseout="this.style.backgroundColor='#FFFFFF'" onmouseover="this.style.backgroundColor='#F8F8F8'" style="border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-top-color: rgb(221, 221, 221); border-right-color: rgb(221, 221, 221); border-bottom-color: rgb(221, 221, 221); border-left-color: rgb(221, 221, 221); width: 168px; margin-top: 10px; margin-right: 10px; margin-bottom: 10px; margin-left: 10px; display: block; float: left; text-decoration: none; text-align: center; cursor: pointer; border-top-left-radius: 8px; border-top-right-radius: 8px; border-bottom-right-radius: 8px; border-bottom-left-radius: 8px; background-color: rgb(255, 255, 255); " href="http://www.lancetahg.com.mx/productos/1360/bolsa-de-colostomia-alterna-pediatrica-1-pieza">
              <div style="min-height:200px; height:auto !important; height:200px; padding:5px 0; margin:0 auto; clear:both;">
					<div style="min-height:170px; height:auto !important; height:170px;">
                      <img src="http://www.lancetahg.com.mx/images/productos/ch/1360-bolsa-de-colostomia-alterna-pediatrica-1-pieza.jpg" width="100" height="100" alt="Bolsa de Colostomía Alterna Pediátrica" title="Bolsa de Colostomía Alterna Pediátrica" style="border:none;">
                      <p style="font-size:14px; line-height:16px; color:#333; text-align:center; display:block; margin:3px auto;">Bolsa de Colostomía Alterna Pediátrica...</p>
                      <p style="font-size:12px; line-height:13px; color:#999; text-align:center; display:block; margin:4px auto;">COLOPLAST</p>
                      <p style="font-size:12px; line-height:13px; color:#999; text-align:center; display:block; margin:4px auto;">de $ 63.00</p>
                      <p style="font-size:20px; line-height:20px; color:#C00; text-align:center; display:block; margin:4px auto; font-weight:bold;">a $ 53.00
</p>
                     </div>
                     <div style="-moz-border-radius: 10px; border-radius: 10px; -webkit-border-radius : 10px; margin:2px auto; padding:5px 10px; background-color:#6FD03C; color:#FFF; text-decoration:none; display:inline-block; width:80px;">Ver detalle</div>
                    </div>
          </a>
    </td>
    <td width="190" height="240">
    		<a onmouseout="this.style.backgroundColor='#FFFFFF'" onmouseover="this.style.backgroundColor='#F8F8F8'" style="background-color: #FFFFFF; border: 1px solid #DDDDDD; width:168px; margin: 10px ; display: block; float: left; text-decoration: none; text-align: center; cursor: pointer; -moz-border-radius: 8px; border-radius: 8px; -webkit-border-radius: 8px;" href="http://www.lancetahg.com.mx/productos/372/polvo-adapt-hidrocoloide">
              <div style="min-height:200px; height:auto !important; height:200px; padding:5px 0; margin:0 auto; clear:both;">
					<div style="min-height:170px; height:auto !important; height:170px;">
                      <img src="http://www.lancetahg.com.mx/images/productos/ch/372-polvo-adapt-hidrocoloide.jpg" width="100" height="100" alt="Polvo Adapt Hidrocoloide" title="Polvo Adapt Hidrocoloide" style="border:none;">
                      <p style="font-size:14px; line-height:16px; color:#333; text-align:center; display:block; margin:3px auto;">Polvo Adapt <br>
                      Hidrocoloide</p>
                      <p style="font-size:12px; line-height:13px; color:#999; text-align:center; display:block; margin:4px auto;">HOLLISTER</p>
                      <p style="font-size:12px; line-height:13px; color:#999; text-align:center; display:block; margin:4px auto;">de $ 236.00</p>
                      <p style="font-size:20px; line-height:20px; color:#C00; text-align:center; display:block; margin:4px auto; font-weight:bold;">a $ 187.00
</p>
                     </div>
                     <div style="-moz-border-radius: 10px; border-radius: 10px; -webkit-border-radius : 10px; margin:2px auto; padding:5px 10px; background-color:#6FD03C; color:#FFF; text-decoration:none; display:inline-block; width:80px;">Ver detalle</div>
                    </div>
          </a>
    </td>
  </tr>
  <tr align="center" valign="middle">
    <td width="190" height="240">
    		<a onmouseout="this.style.backgroundColor='#FFFFFF'" onmouseover="this.style.backgroundColor='#F8F8F8'" style="border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-top-color: rgb(221, 221, 221); border-right-color: rgb(221, 221, 221); border-bottom-color: rgb(221, 221, 221); border-left-color: rgb(221, 221, 221); width: 168px; margin-top: 10px; margin-right: 10px; margin-bottom: 10px; margin-left: 10px; display: block; float: left; text-decoration: none; text-align: center; cursor: pointer; border-top-left-radius: 8px; border-top-right-radius: 8px; border-bottom-right-radius: 8px; border-bottom-left-radius: 8px; background-color: rgb(255, 255, 255); " href="http://www.lancetahg.com.mx/productos/383/toalla-removedora-de-adhesivo">
              <div style="min-height:200px; height:auto !important; height:200px; padding:5px 0; margin:0 auto; clear:both;">
					<div style="min-height:170px; height:auto !important; height:170px;">
                      <img src="http://www.lancetahg.com.mx/images/productos/ch/383-toalla-removedora-de-adhesivo.jpg" width="100" height="100" alt="Toalla Removedora de Adhesivo" title="Toalla Removedora de Adhesivo" style="border:none;">
                      <p style="font-size:14px; line-height:16px; color:#333; text-align:center; display:block; margin:3px auto;">Toalla Removedora <br>
                      de Adhesivo</p>
                      <p style="font-size:12px; line-height:13px; color:#999; text-align:center; display:block; margin:4px auto;">HOLLISTER</p>
                      <p style="font-size:12px; line-height:13px; color:#999; text-align:center; display:block; margin:4px auto;">de $ 94.00</p>
                      <p style="font-size:20px; line-height:20px; color:#C00; text-align:center; display:block; margin:4px auto; font-weight:bold;">a $ 73.00
</p>
                     </div>
                     <div style="-moz-border-radius: 10px; border-radius: 10px; -webkit-border-radius : 10px; margin:2px auto; padding:5px 10px; background-color:#6FD03C; color:#FFF; text-decoration:none; display:inline-block; width:80px;">Ver detalle</div>
                    </div>
          </a>
    </td>
    <td width="190" height="240">
    		<a onmouseout="this.style.backgroundColor='#FFFFFF'" onmouseover="this.style.backgroundColor='#F8F8F8'" style="border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-top-color: rgb(221, 221, 221); border-right-color: rgb(221, 221, 221); border-bottom-color: rgb(221, 221, 221); border-left-color: rgb(221, 221, 221); width: 168px; margin-top: 10px; margin-right: 10px; margin-bottom: 10px; margin-left: 10px; display: block; float: left; text-decoration: none; text-align: center; cursor: pointer; border-top-left-radius: 8px; border-top-right-radius: 8px; border-bottom-right-radius: 8px; border-bottom-left-radius: 8px; background-color: rgb(255, 255, 255); " href="http://www.lancetahg.com.mx/productos/373/pasta-hidrocoloide-adapt">
              <div style="min-height:200px; height:auto !important; height:200px; padding:5px 0; margin:0 auto; clear:both;">
					<div style="min-height:170px; height:auto !important; height:170px;">
                      <img src="http://www.lancetahg.com.mx/images/productos/ch/373-pasta-hidrocoloide-adapt.jpg" width="100" height="100" alt="Pasta Hidrocoloide Adapt" title="Pasta Hidrocoloide Adapt" style="border:none;">
                      <p style="font-size:14px; line-height:16px; color:#333; text-align:center; display:block; margin:3px auto;">Pasta Hidrocoloide <br>
                      Adapt</p>
                      <p style="font-size:12px; line-height:13px; color:#999; text-align:center; display:block; margin:4px auto;">HOLLISTER</p>
                      <p style="font-size:12px; line-height:13px; color:#999; text-align:center; display:block; margin:4px auto;">de $ 272.00</p>
                      <p style="font-size:20px; line-height:20px; color:#C00; text-align:center; display:block; margin:4px auto; font-weight:bold;">a $ 217.00
</p>
                     </div>
                     <div style="-moz-border-radius: 10px; border-radius: 10px; -webkit-border-radius : 10px; margin:2px auto; padding:5px 10px; background-color:#6FD03C; color:#FFF; text-decoration:none; display:inline-block; width:80px;">Ver detalle</div>
                    </div>
          </a>
    </td>
    <td width="190" height="240">
    		<a onmouseout="this.style.backgroundColor='#FFFFFF'" onmouseover="this.style.backgroundColor='#F8F8F8'" style="border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-top-color: rgb(221, 221, 221); border-right-color: rgb(221, 221, 221); border-bottom-color: rgb(221, 221, 221); border-left-color: rgb(221, 221, 221); width: 168px; margin-top: 10px; margin-right: 10px; margin-bottom: 10px; margin-left: 10px; display: block; float: left; text-decoration: none; text-align: center; cursor: pointer; border-top-left-radius: 8px; border-top-right-radius: 8px; border-bottom-right-radius: 8px; border-bottom-left-radius: 8px; background-color: rgb(255, 255, 255); " href="http://www.lancetahg.com.mx/productos/2067/bolsa-colostomia">
              <div style="min-height:200px; height:auto !important; height:200px; padding:5px 0; margin:0 auto; clear:both;">
					<div style="min-height:170px; height:auto !important; height:170px;">
                      <img src="http://www.lancetahg.com.mx/images/productos/ch/2067-bolsa-colostomia.jpg" width="100" height="100" alt="Bolsa Colostomía" title="Bolsa Colostomía" style="border:none;">
                      <p style="font-size:14px; line-height:16px; color:#333; text-align:center; display:block; margin:3px auto;">Bolsa <br>
                      Colostomía</p>
                      <p style="font-size:12px; line-height:13px; color:#999; text-align:center; display:block; margin:4px auto;">PIESA</p>
                      <p style="font-size:12px; line-height:13px; color:#999; text-align:center; display:block; margin:4px auto;">de $ 24.00</p>
                      <p style="font-size:20px; line-height:20px; color:#C00; text-align:center; display:block; margin:4px auto; font-weight:bold;">a $ 19.00
</p>
                </div>
                     <div style="-moz-border-radius: 10px; border-radius: 10px; -webkit-border-radius : 10px; margin:2px auto; padding:5px 10px; background-color:#6FD03C; color:#FFF; text-decoration:none; display:inline-block; width:80px;">Ver detalle</div>
              </div>
          </a>
    </td>
  </tr>
</table>
    </td>
  </tr>
  <tr>
    <td>
    <div style="margin:0 0 10px; line-height:14px; font-size:12px; font-weight:500; text-align:center; text-transform:uppercase; font-stretch:condensed;"><br>Promoci&oacute;n v&aacute;lida s&oacute;lo el 16, 17 y 18 de julio de 2014.<br>Las imágenes sólo son ilustrativas, el producto puede diferir.<br>
      PRECIOS INCLUYEN IVA. VÁLIDO SÓLO PARA LAS PRESENTACIONES PARTICIPANTES. </div>
    </td>
  </tr>
  <tr>
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
