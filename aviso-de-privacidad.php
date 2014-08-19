<?php include('Connections/bd.php'); 
 
$titulo = "Aviso de Privacidad";

?>
<!DOCTYPE HTML>
<html><!-- InstanceBegin template="/Templates/layout.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="keywords" content="<?php echo $metakeywords;?>">
<meta name="description" content="<?php echo $metadescription;?>">
<link rel="canonical" href="<?php echo $url_base; ?>">
<title><?php if ($_SERVER['PHP_SELF']=='/index.php') {echo $titulo ;} else {echo $titulo.'  |  LancetaHG';}?></title>
<BASE HREF="<?php echo $url_base; ?>" />
<link href="css/layout.css" rel="stylesheet" type="text/css">
<link href="css/global.css" rel="stylesheet" type="text/css">
<link href="css/general.css" rel="stylesheet" type="text/css">
<link href="css/organictabs.css" rel="stylesheet" type="text/css">
<link href="css/ui-lightness/jquery-ui-1.10.4.custom.min.css" rel="stylesheet" type="text/css"/>
<link href="css/jquery.lightbox-0.5.css" rel="stylesheet" type="text/css"  media="screen" />
<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="js/jquery.lightbox-0.5.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.10.4.custom.min.js"></script>
<script type="text/javascript" src="js/organictabs.jquery.js"></script>
<script type="text/javascript" src="js/slides.min.jquery.js"></script>
<script type="text/javascript" src="js/funciones.js"></script>
<script type="text/javascript" src="js/funciones_validar.js"></script>
<script type="text/javascript">
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-45234024-1', 'www.lancetahg.com.mx');
  ga('send', 'pageview');
</script>
<!-- InstanceBeginEditable name="head" -->
<script>
	$(function() {
		
		$("#example-two").organicTabs({
			"speed": 200
		});
		
	});
</script>
<!-- InstanceEndEditable -->
</head>
<body oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
	<?php  include("includes/top.php");?>
	<div id="main">	
	<?php include('includes/header.php');?>
		<div id="banner_content">
		<!-- InstanceBeginEditable name="Banner" -->
		
		<!-- InstanceEndEditable -->
		</div>
		<div style="clear:both"></div>
		<div id="col_izquierda">
			<?php include("includes/sidebar.php"); ?>
		</div><!--Termina col_derecha-->
		<div id="col_derecha">
			<div id="contenido">
			  <!-- InstanceBeginEditable name="Contenido" -->
              	<div id="titulo">
              		<h1><?php echo $titulo;?></h1>
                </div>
				<div id="texto_grid">
                    <div id="example-two">
                                        
                                <ul class="nav">
                                    <li class="nav-one"><a href="#priv1" class="current">Lanceta HG</a></li>
                                    <li class="nav-two"><a href="#priv2">Lanceta Group</a></li>
                                    <li class="nav-three"><a href="#priv3">Auto Servicio M&eacute;dico</a></li>
                                </ul>
                                
                                <div class="list-wrap">
                                
                                    <ul id="priv1">
                                        <li>
                                            <p class="aviso_privacidad"><u>LANCETA HG S.A. DE C.V.</u> (en adelante &ldquo;LANCETA HG&rdquo;), asume el compromiso de salvaguardar los datos personales que le son proporcionados por usted como resultado de facturar,&nbsp; solicitar nuestra tarjeta de cliente distinguido o utilizar los servicios en l&iacute;nea, independientemente del formato en el que se presenta dicha solicitud,&nbsp; utilizando cualquiera de los formatos autorizados por LANCETA HG, y la entrega de documentos adicionales que hayan sido solicitados o requeridos de acuerdo a los procedimientos de tr&aacute;mite de la tarjeta de cliente distinguido otorgada por LANCETA HG; por ende, emite el presente Aviso de Privacidad (el &ldquo;<u>Aviso</u>&rdquo;) en cumplimiento de las disposiciones de la Ley Federal de Protecci&oacute;n de Datos Personales en Posesi&oacute;n de los Particulares (la &ldquo;<u>Ley</u>&rdquo;) y su Reglamento.</p>
                                            <p class="aviso_privacidad">El presente Aviso establece los t&eacute;rminos y condiciones bajo los cuales se recolectar&aacute;n, almacenar&aacute;n y utilizar&aacute;n los datos personales de usted (el &ldquo;<u>Tratamiento</u>&rdquo;), que ser&aacute;n almacenados en la base de datos controlada por LANCETA HG.</p>
                                            <p class="aviso_privacidad">LANCETA HG, con domicilio ubicado en Doctor Villada N&uacute;m. 81, Colonia Doctores, Delegaci&oacute;n Cuauht&eacute;moc, C.P. 06720, M&eacute;xico D.F. (el &ldquo;<u>Domicilio</u>&rdquo;), fungir&aacute; como responsable en t&eacute;rminos de la Ley.</p>
                                            <h4><strong>Datos Personales.</strong></h4>
                                            <p class="aviso_privacidad">Sus datos personales ser&aacute;n recabados de la solicitud de cliente distinguido autorizada y presentada ante LANCETA HG, as&iacute; como de sus servicios en l&iacute;nea; Los datos personales que est&aacute;n, o pudieran estar, sujetos a Tratamiento por LANCETA HG son: Nombre o Raz&oacute;n Social, Edad, Fecha de Nacimiento, Nombre del Titular (en caso de ser persona moral), Registro Federal de Contribuyentes, Domicilio, N&uacute;mero de Tel&eacute;fono, Correo Electr&oacute;nico, as&iacute; como los siguientes documentos: Comprobante de domicilio, Identificaci&oacute;n Oficial, Registro Federal de Contribuyentes, as&iacute; como cualquier otro dato personal, que sea necesario para cumplir con las finalidades que se se&ntilde;alan m&aacute;s adelante.</p>
                                            <h4><strong>Finalidades del Tratamiento de Datos Personales.</strong></h4>
                                            <p class="aviso_privacidad">El Tratamiento de los datos personales conforme al presente Aviso se realizar&aacute; para cumplir con cualquiera de las siguientes finalidades que dan origen y son necesarias para la relaci&oacute;n jur&iacute;dica que se tenga o pudiera llegar a tener con usted: facturaci&oacute;n, tramite de tarjetas de cliente distinguido o utilizaci&oacute;n de los servicios en l&iacute;nea de LANCETA HG. Las finalidades contenidas en el presente Aviso incluyen, sin limitaci&oacute;n alguna, la posibilidad de transferir los datos personales a LANCETA GROUP S.A. DE C.V y/o AUTO SERVICIO MEDICO S.A. DE C.V; siempre que dicha transferencia sea requerida exclusivamente para cumplir con las finalidades aqu&iacute; dispuestas. </p>
                                            <p class="aviso_privacidad">Usted podr&aacute; oponerse al Tratamiento de sus datos personales para aquellas finalidades distintas a las que se derivan o se originan de la relaci&oacute;n jur&iacute;dica que se tenga o pudiera llegar a tener con LANCETA HG, en cuyo caso deber&aacute; enviar un correo a <a href="mailto:sugerencias@lancetahg.com">sugerencias@lancetahg.com</a> para realizar su solicitud.</p>
                                            <h4><strong>Medidas de Seguridad para Protecci&oacute;n de Datos Personales.</strong></h4>
                                            <p class="aviso_privacidad">Consciente de la importancia que tiene la protecci&oacute;n de la privacidad y confidencialidad de los datos personales, LANCETA HG, mantiene estrictos niveles de seguridad que restringen el Tratamiento de los datos personales exclusivamente para las finalidades para los cuales fueron recolectados, as&iacute; como para protegerlos de la consulta, modificaci&oacute;n, p&eacute;rdida, alteraci&oacute;n, divulgaci&oacute;n y destrucci&oacute;n no autorizadas o no acorde a las finalidades del presente Aviso. LANCETA HG se encuentra en un esfuerzo continuo para implementar y aplicar nuevas medidas de seguridad a su base de datos. &nbsp;La informaci&oacute;n es almacenada en un servidor seguro que reside detr&aacute;s de un firewall dise&ntilde;ado para obstaculizar el acceso desde afuera de la empresa, Las medidas de seguridad incluyen, el resguardo bajo llave de la base de datos y una pol&iacute;tica interna sobre la entrega de las llaves con las cuales se puede tener acceso a la misma, Desafortunadamente ninguna transmisi&oacute;n por internet puede garantizar su seguridad al 100% por lo tanto, aunque LANCETA HG se esfuerce por proteger su informaci&oacute;n, no puede asegurar ni garantizar la seguridad de la transmisi&oacute;n de ninguna informaci&oacute;n de nuestros servicios en l&iacute;nea, por lo tanto usted corre su propio riesgo, en este apartado LANCETA HG ha enfocado sus esfuerzos en obtener la tecnolog&iacute;a m&aacute;s moderna y actualizada a fin de ofrecer la mayor seguridad posible.</p>
                                            <h4><strong>Tratamiento de Datos Personales.</strong></h4>
                                            <p class="aviso_privacidad">El Tratamiento de los datos personales ser&aacute; conforme al presente Aviso y ser&aacute; realizado exclusivamente por el personal de LANCETA HG, que por virtud de las funciones que desempe&ntilde;an dentro de la organizaci&oacute;n, requieran tener acceso a los datos personales para dar cumplimiento a las finalidades establecidas en el presente Aviso. LANCETA HG no tiene la intenci&oacute;n de comercializar en forma alguna con los datos personales. Se le informa que, en aquellos casos establecidos por la Ley y el Reglamento, el Tratamiento o transferencia de sus datos personales podr&aacute; realizarse sin su consentimiento.</p>
                                            <h4><strong>Derechos del Titular de los Datos Personales.</strong></h4>
                                            <p class="aviso_privacidad">Usted tendr&aacute;, ya sea directamente o a trav&eacute;s de un representante legal, derecho a acceder, rectificar, cancelar u oponerse al Tratamiento de sus datos personales, conforme a los t&eacute;rminos y sujeto a las excepciones establecidas en la Ley, su Reglamento y cualquier otra disposici&oacute;n legal aplicable. En caso que desee ejercer cualquiera de los derechos antes mencionados deber&aacute; enviar un correo a <a href="mailto:sugerencias@lancetahg.com">sugerencias@lancetahg.com</a> para realizar su solicitud.</p>
                                            <h4><strong>Modificaciones al Aviso.</strong></h4>
                                            <p class="aviso_privacidad">LANCETA HG, se reserva el derecho de revisar y modificar peri&oacute;dicamente el presente Aviso con el prop&oacute;sito de adaptarlo incluyendo, sin limitaci&oacute;n alguna, sus actividades y/o aquellos cambios en las pr&aacute;cticas internas de LANCETA HG, o bien, las reformas legales que en el futuro entren en vigor. Las versiones modificadas del Aviso podr&aacute;n ser consultadas en todo momento en nuestra p&aacute;gina de internet www.lancetahg.com.</p>
                                            <h4><strong>Consentimiento del Titular de los Datos Personales.</strong></h4>
                                            <p class="aviso_privacidad">La decisi&oacute;n de entregar sus datos personales constituye en s&iacute; misma un signo inequ&iacute;voco del consentimiento que usted otorga para el Tratamiento de sus datos.</p>
                                            <p class="aviso_privacidad">Se le informa que, entre otros casos, no se requerir&aacute; su consentimiento para la transferencia de datos personales a: LANCETA GROUP S.A DE C.V y/o AUTO SERVICIO MEDICO S.A. DE C.V; que opera bajo el mismo proceso y pol&iacute;ticas internas de protecci&oacute;n de datos personales que LANCETA HG, de conformidad con lo dispuesto en la fracci&oacute;n III del Art&iacute;culo 37 de la Ley de Protecci&oacute;n de Datos Personales.</p>
                                            <h4><strong>Revocaci&oacute;n del Consentimiento del Titular.</strong></h4>
                                            <p class="aviso_privacidad">Usted podr&aacute;, ya sea directamente o a trav&eacute;s de un representante legal, revocar en cualquier momento su consentimiento para el Tratamiento de sus datos personales, sujeto a lo dispuesto en la Ley. En cuyo caso deber&aacute; enviar un correo a <a href="mailto:sugerencias@lancetahg.com">sugerencias@lancetahg.com</a> para realizar su solicitud.</p>
                                            <h4><strong>Legislaci&oacute;n Aplicable.</strong></h4>
                                            <p class="aviso_privacidad">El presente Aviso est&aacute; sujeto a la legislaci&oacute;n aplicable en la Rep&uacute;blica Mexicana.</p>
                                        </li>
                                    </ul>
                                    
                                    <ul id="priv2" class="hide">
                                        <li>
                                            <p class="aviso_privacidad"><u>LANCETA GROUP S.A. DE C.V.</u> (en adelante &ldquo;LANCETA GROUP&rdquo;), asume el compromiso de salvaguardar los datos personales que le son proporcionados por usted como resultado de facturar,&nbsp; solicitar nuestra tarjeta de cliente distinguido o utilizar los servicios en l&iacute;nea, independientemente del formato en el que se presenta dicha solicitud,&nbsp; utilizando cualquiera de los formatos autorizados por LANCETA GROUP, y la entrega de documentos adicionales que hayan sido solicitados o requeridos de acuerdo a los procedimientos de tr&aacute;mite de la tarjeta de cliente distinguido otorgada por LANCETA GROUP; por ende, emite el presente Aviso de Privacidad (el &ldquo;<u>Aviso</u>&rdquo;) en cumplimiento de las disposiciones de la Ley Federal de Protecci&oacute;n de Datos Personales en Posesi&oacute;n de los Particulares (la &ldquo;<u>Ley</u>&rdquo;) y su Reglamento.</p>
                                            <p class="aviso_privacidad">El presente Aviso establece los t&eacute;rminos y condiciones bajo los cuales se recolectar&aacute;n, almacenar&aacute;n y utilizar&aacute;n los datos personales de usted (el &ldquo;<u>Tratamiento</u>&rdquo;), que ser&aacute;n almacenados en la base de datos controlada por LANCETA GROUP.</p>
                                            <p class="aviso_privacidad">LANCETA GROUP, con domicilio ubicado en Calzada de Tlalpan #4923, Colonia La Joya, Delegaci&oacute;n Tlalpan, C.P. 14090, M&eacute;xico D.F. (el &ldquo;<u>Domicilio</u>&rdquo;), fungir&aacute; como responsable en t&eacute;rminos de la Ley.</p>
                                            <h4><strong>Datos Personales.</strong></h4>
                                            <p class="aviso_privacidad">Sus datos personales ser&aacute;n recabados de la solicitud de cliente distinguido autorizada y presentada ante LANCETA GROUP, as&iacute; como de sus servicios en l&iacute;nea; Los datos personales que est&aacute;n, o pudieran estar, sujetos a Tratamiento por LANCETA GROUP son: Nombre o Raz&oacute;n Social, Edad, Fecha de Nacimiento, Nombre del Titular (en caso de ser persona moral), Registro Federal de Contribuyentes, Domicilio, N&uacute;mero de Tel&eacute;fono, Correo Electr&oacute;nico, as&iacute; como los siguientes documentos: Comprobante de domicilio, Identificaci&oacute;n Oficial, Registro Federal de Contribuyentes, as&iacute; como cualquier otro dato personal, que sea necesario para cumplir con las finalidades que se se&ntilde;alan m&aacute;s adelante.</p>
                                            <h4>Finalidades del Tratamiento de Datos Personales.</h4>
                                            <p class="aviso_privacidad">El Tratamiento de los datos personales conforme al presente Aviso se realizar&aacute; para cumplir con cualquiera de las siguientes finalidades que dan origen y son necesarias para la relaci&oacute;n jur&iacute;dica que se tenga o pudiera llegar a tener con usted: facturaci&oacute;n, tramite de tarjetas de cliente distinguido o utilizaci&oacute;n de los servicios en l&iacute;nea de LANCETA GROUP. Las finalidades contenidas en el presente Aviso incluyen, sin limitaci&oacute;n alguna, la posibilidad de transferir los datos personales a LANCETA HG S.A. DE C.V y/o AUTO SERVICIO MEDICO S.A. DE C.V; siempre que dicha transferencia sea requerida exclusivamente para cumplir con las finalidades aqu&iacute; dispuestas. </p>
                                            <p class="aviso_privacidad">Usted podr&aacute; oponerse al Tratamiento de sus datos personales para aquellas finalidades distintas a las que se derivan o se originan de la relaci&oacute;n jur&iacute;dica que se tenga o pudiera llegar a tener con LANCETA GROUP, en cuyo caso deber&aacute; enviar un correo a <a href="mailto:sugerencias@lancetahg.com">sugerencias@lancetahg.com</a> para realizar su solicitud.</p>
                                            <h4><strong>Medidas de Seguridad para Protecci&oacute;n de Datos Personales.</strong></h4>
                                            <p class="aviso_privacidad">Consciente de la importancia que tiene la protecci&oacute;n de la privacidad y confidencialidad de los datos personales, LANCETA GROUP, mantiene estrictos niveles de seguridad que restringen el Tratamiento de los datos personales exclusivamente para las finalidades para los cuales fueron recolectados, as&iacute; como para protegerlos de la consulta, modificaci&oacute;n, p&eacute;rdida, alteraci&oacute;n, divulgaci&oacute;n y destrucci&oacute;n no autorizadas o no acorde a las finalidades del presente Aviso. LANCETA GROUP se encuentra en un esfuerzo continuo para implementar y aplicar nuevas medidas de seguridad a su base de datos. &nbsp;La informaci&oacute;n es almacenada en un servidor seguro que reside detr&aacute;s de un firewall dise&ntilde;ado para obstaculizar el acceso desde afuera de la empresa, Las medidas de seguridad incluyen, el resguardo bajo llave de la base de datos y una pol&iacute;tica interna sobre la entrega de las llaves con las cuales se puede tener acceso a la misma, Desafortunadamente ninguna transmisi&oacute;n por internet puede garantizar su seguridad al 100% por lo tanto, aunque LANCETA GROUP se esfuerce por proteger su informaci&oacute;n, no puede asegurar ni garantizar la seguridad de la transmisi&oacute;n de ninguna informaci&oacute;n de nuestros servicios en l&iacute;nea, por lo tanto usted corre su propio riesgo, en este apartado LANCETA GROUP ha enfocado sus esfuerzos en obtener la tecnolog&iacute;a m&aacute;s moderna y actualizada a fin de ofrecer la mayor seguridad posible.</p>
                                            <h4><strong>Tratamiento de Datos Personales.</strong></h4>
                                            <p class="aviso_privacidad">El Tratamiento de los datos personales ser&aacute; conforme al presente Aviso y ser&aacute; realizado exclusivamente por el personal de LANCETA GROUP, que por virtud de las funciones que desempe&ntilde;an dentro de la organizaci&oacute;n, requieran tener acceso a los datos personales para dar cumplimiento a las finalidades establecidas en el presente Aviso. LANCETA GROUP no tiene la intenci&oacute;n de comercializar en forma alguna con los datos personales. Se le informa que, en aquellos casos establecidos por la Ley y el Reglamento, el Tratamiento o transferencia de sus datos personales podr&aacute; realizarse sin su consentimiento.</p>
                                            <h4><strong>Derechos del Titular de los Datos Personales.</strong></h4>
                                            <p class="aviso_privacidad">Usted tendr&aacute;, ya sea directamente o a trav&eacute;s de un representante legal, derecho a acceder, rectificar, cancelar u oponerse al Tratamiento de sus datos personales, conforme a los t&eacute;rminos y sujeto a las excepciones establecidas en la Ley, su Reglamento y cualquier otra disposici&oacute;n legal aplicable. En caso que desee ejercer cualquiera de los derechos antes mencionados deber&aacute; enviar un correo a <a href="mailto:sugerencias@lancetahg.com">sugerencias@lancetahg.com</a> para realizar su solicitud.</p>
                                            <h4><strong>Modificaciones al Aviso.</strong></h4>
                                            <p class="aviso_privacidad">LANCETA GROUP, se reserva el derecho de revisar y modificar peri&oacute;dicamente el presente Aviso con el prop&oacute;sito de adaptarlo incluyendo, sin limitaci&oacute;n alguna, sus actividades y/o aquellos cambios en las pr&aacute;cticas internas de LANCETA GROUP, o bien, las reformas legales que en el futuro entren en vigor. Las versiones modificadas del Aviso podr&aacute;n ser consultadas en todo momento en nuestra p&aacute;gina de internet www.lancetahg.com.</p>
                                            <h4><strong>Consentimiento del Titular de los Datos Personales.</strong></h4>
                                            <p class="aviso_privacidad">La decisi&oacute;n de entregar sus datos personales constituye en s&iacute; misma un signo inequ&iacute;voco del consentimiento que usted otorga para el Tratamiento de sus datos.</p>
                                            <p class="aviso_privacidad">Se le informa que, entre otros casos, no se requerir&aacute; su consentimiento para la transferencia de datos personales a: LANCETA HG S.A DE C.V y/o AUTO SERVICIO MEDICO S.A. DE C.V; que operan bajo el mismo proceso y pol&iacute;ticas internas de protecci&oacute;n de datos personales que LANCETA GROUP, de conformidad con lo dispuesto en la fracci&oacute;n III del Art&iacute;culo 37 de la Ley de Protecci&oacute;n de Datos Personales.</p>
                                            <h4><strong>Revocaci&oacute;n del Consentimiento del Titular.</strong></h4>
                                            <p class="aviso_privacidad">Usted podr&aacute;, ya sea directamente o a trav&eacute;s de un representante legal, revocar en cualquier momento su consentimiento para el Tratamiento de sus datos personales, sujeto a lo dispuesto en la Ley. En cuyo caso deber&aacute; enviar un correo a <a href="mailto:sugerencias@lancetahg.com">sugerencias@lancetahg.com</a> para realizar su solicitud.</p>
                                                <h4><strong>Legislaci&oacute;n Aplicable.</strong></h4>
                                            <p class="aviso_privacidad">El presente Aviso est&aacute; sujeto a la legislaci&oacute;n aplicable en la Rep&uacute;blica Mexicana.</p>
                                        
                                        </li>
                                    </ul>
                                    
                                    <ul id="priv3" class="hide">
                                        <li>
                                            <p class="aviso_privacidad"><u>AUTO SERVICIO MEDICO S.A. DE C.V.</u> (en adelante &ldquo;AUTO SERVICIO MEDICO&rdquo;), asume el compromiso de salvaguardar los datos personales que le son proporcionados por usted como resultado de facturar,&nbsp; solicitar nuestra tarjeta de cliente distinguido o utilizar los servicios en l&iacute;nea, independientemente del formato en el que se presenta dicha solicitud,&nbsp; utilizando cualquiera de los formatos autorizados por AUTO SERVICIO MEDICO, y la entrega de documentos adicionales que hayan sido solicitados o requeridos de acuerdo a los procedimientos de tr&aacute;mite de la tarjeta de cliente distinguido otorgada por AUTO SERVICIO MEDICO; por ende, emite el presente Aviso de Privacidad (el &ldquo;<u>Aviso</u>&rdquo;) en cumplimiento de las disposiciones de la Ley Federal de Protecci&oacute;n de Datos Personales en Posesi&oacute;n de los Particulares (la &ldquo;<u>Ley</u>&rdquo;) y su Reglamento.</p>
                                            <p class="aviso_privacidad">El presente Aviso establece los t&eacute;rminos y condiciones bajo los cuales se recolectar&aacute;n, almacenar&aacute;n y utilizar&aacute;n los datos personales de usted (el &ldquo;<u>Tratamiento</u>&rdquo;), que ser&aacute;n almacenados en la base de datos controlada por AUTO SERVICIO MEDICO.</p>
                                            <p class="aviso_privacidad">AUTO SERVICIO MEDICO, con domicilio ubicado en San Miguel el Alto #620, Colonia F&aacute;tima, C.P. 20130, Aguascalientes (el &ldquo;<u>Domicilio</u>&rdquo;), fungir&aacute; como responsable en t&eacute;rminos de la Ley.</p>
                                            <h4><strong>Datos Personales.</strong></h4>
                                            <p class="aviso_privacidad">Sus datos personales ser&aacute;n recabados de la solicitud de cliente distinguido autorizada y presentada ante AUTO SERVICIO MEDICO, as&iacute; como de sus servicios en l&iacute;nea; Los datos personales que est&aacute;n, o pudieran estar, sujetos a Tratamiento por AUTO SERVICIO MEDICO son: Nombre o Raz&oacute;n Social, Edad, Fecha de Nacimiento, Nombre del Titular (en caso de ser persona moral), Registro Federal de Contribuyentes, Domicilio, N&uacute;mero de Tel&eacute;fono, Correo Electr&oacute;nico, as&iacute; como los siguientes documentos: Comprobante de domicilio, Identificaci&oacute;n Oficial, Registro Federal de Contribuyentes, as&iacute; como cualquier otro dato personal, que sea necesario para cumplir con las finalidades que se se&ntilde;alan m&aacute;s adelante.</p>
                                            <h4><strong>Finalidades del Tratamiento de Datos Personales.</strong></h4>
                                            <p class="aviso_privacidad">El Tratamiento de los datos personales conforme al presente Aviso se realizar&aacute; para cumplir con cualquiera de las siguientes finalidades que dan origen y son necesarias para la relaci&oacute;n jur&iacute;dica que se tenga o pudiera llegar a tener con usted: facturaci&oacute;n, tramite de tarjetas de cliente distinguido o utilizaci&oacute;n de los servicios en l&iacute;nea de AUTO SERVICIO MEDICO. Las finalidades contenidas en el presente Aviso incluyen, sin limitaci&oacute;n alguna, la posibilidad de transferir los datos personales a LANCETA HG S.A. DE C.V y/o LANCETA GROUP S.A. DE C.V; siempre que dicha transferencia sea requerida exclusivamente para cumplir con las finalidades aqu&iacute; dispuestas. </p>
                                            <p class="aviso_privacidad">Usted podr&aacute; oponerse al Tratamiento de sus datos personales para aquellas finalidades distintas a las que se derivan o se originan de la relaci&oacute;n jur&iacute;dica que se tenga o pudiera llegar a tener con AUTO SERVICIO MEDICO, en cuyo caso deber&aacute; enviar un correo a <a href="mailto:sugerencias@lancetahg.com">sugerencias@lancetahg.com</a> para realizar su solicitud.</p>
                                            <h4><strong>Medidas de Seguridad para Protecci&oacute;n de Datos Personales.</strong></h4>
                                            <p class="aviso_privacidad">Consciente de la importancia que tiene la protecci&oacute;n de la privacidad y confidencialidad de los datos personales, AUTO SERVICIO MEDICO, mantiene estrictos niveles de seguridad que restringen el Tratamiento de los datos personales exclusivamente para las finalidades para los cuales fueron recolectados, as&iacute; como para protegerlos de la consulta, modificaci&oacute;n, p&eacute;rdida, alteraci&oacute;n, divulgaci&oacute;n y destrucci&oacute;n no autorizadas o no acorde a las finalidades del presente Aviso. AUTO SERVICIO MEDICO se encuentra en un esfuerzo continuo para implementar y aplicar nuevas medidas de seguridad a su base de datos. &nbsp;La informaci&oacute;n es almacenada en un servidor seguro que reside detr&aacute;s de un firewall dise&ntilde;ado para obstaculizar el acceso desde afuera de la empresa, Las medidas de seguridad incluyen, el resguardo bajo llave de la base de datos y una pol&iacute;tica interna sobre la entrega de las llaves con las cuales se puede tener acceso a la misma, Desafortunadamente ninguna transmisi&oacute;n por internet puede garantizar su seguridad al 100% por lo tanto, aunque AUTO SERVICIO MEDICO se esfuerce por proteger su informaci&oacute;n, no puede asegurar ni garantizar la seguridad de la transmisi&oacute;n de ninguna informaci&oacute;n de nuestros servicios en l&iacute;nea, por lo tanto usted corre su propio riesgo, en este apartado AUTO SERVICIO MEDICO ha enfocado sus esfuerzos en obtener la tecnolog&iacute;a m&aacute;s moderna y actualizada a fin de ofrecer la mayor seguridad posible.</p>
                                            <h4><strong>Tratamiento de Datos Personales.</strong></h4>
                                            <p class="aviso_privacidad">El Tratamiento de los datos personales ser&aacute; conforme al presente Aviso y ser&aacute; realizado exclusivamente por el personal de AUTO SERVICIO MEDICO, que por virtud de las funciones que desempe&ntilde;an dentro de la organizaci&oacute;n, requieran tener acceso a los datos personales para dar cumplimiento a las finalidades establecidas en el presente Aviso. AUTO SERVICIO MEDICO no tiene la intenci&oacute;n de comercializar en forma alguna con los datos personales. Se le informa que, en aquellos casos establecidos por la Ley y el Reglamento, el Tratamiento o transferencia de sus datos personales podr&aacute; realizarse sin su consentimiento.</p>
                                            <h4><strong>Derechos del Titular de los Datos Personales.</strong></h4>
                                            <p class="aviso_privacidad">Usted tendr&aacute;, ya sea directamente o a trav&eacute;s de un representante legal, derecho a acceder, rectificar, cancelar u oponerse al Tratamiento de sus datos personales, conforme a los t&eacute;rminos y sujeto a las excepciones establecidas en la Ley, su Reglamento y cualquier otra disposici&oacute;n legal aplicable. En caso que desee ejercer cualquiera de los derechos antes mencionados deber&aacute; enviar un correo a <a href="mailto:sugerencias@lancetahg.com">sugerencias@lancetahg.com</a> para realizar su solicitud.</p>
                                            <h4><strong>Modificaciones al Aviso.</strong></h4>
                                            <p class="aviso_privacidad">AUTO SERVICIO MEDICO, se reserva el derecho de revisar y modificar peri&oacute;dicamente el presente Aviso con el prop&oacute;sito de adaptarlo incluyendo, sin limitaci&oacute;n alguna, sus actividades y/o aquellos cambios en las pr&aacute;cticas internas de AUTO SERVICIO MEDICO, o bien, las reformas legales que en el futuro entren en vigor. Las versiones modificadas del Aviso podr&aacute;n ser consultadas en todo momento en nuestra p&aacute;gina de internet www.lancetahg.com.</p>
                                            <h4><strong>Consentimiento del Titular de los Datos Personales.</strong></h4>
                                            <p class="aviso_privacidad">La decisi&oacute;n de entregar sus datos personales constituye en s&iacute; misma un signo inequ&iacute;voco del consentimiento que usted otorga para el Tratamiento de sus datos.</p>
                                            <p class="aviso_privacidad">Se le informa que, entre otros casos, no se requerir&aacute; su consentimiento para la transferencia de datos personales a: LANCETA HG S.A DE C.V y/o LANCETA GROUP S.A. DE C.V; que opera bajo el mismo proceso y pol&iacute;ticas internas de protecci&oacute;n de datos personales que AUTO SERVICIO MEDICO, de conformidad con lo dispuesto en la fracci&oacute;n III del Art&iacute;culo 37 de la Ley de Protecci&oacute;n de Datos Personales.</p>
                                            <h4><strong>Revocaci&oacute;n del Consentimiento del Titular.</strong></h4>
                                            <p class="aviso_privacidad">Usted podr&aacute;, ya sea directamente o a trav&eacute;s de un representante legal, revocar en cualquier momento su consentimiento para el Tratamiento de sus datos personales, sujeto a lo dispuesto en la Ley. En cuyo caso deber&aacute; enviar un correo a <a href="mailto:sugerencias@lancetahg.com">sugerencias@lancetahg.com</a> para realizar su solicitud.</p>
                                                <h4><strong>Legislaci&oacute;n Aplicable.</strong></h4>
                                            <p class="aviso_privacidad">El presente Aviso est&aacute; sujeto a la legislaci&oacute;n aplicable en la Rep&uacute;blica Mexicana.</p>
                    
                                        </li>
                                    </ul>
                                     
                                     
                                </div> <!-- END List Wrap -->
                             
                             </div>
				</div><!--Termina texto_grid-->	
				<?php include('includes/banners.php')?>				
		 		<div style="clear:both;"></div>		  		      
			  <!-- InstanceEndEditable -->
			</div><!--Termina contenido-->	
		</div><!--Termina col_derecha-->
			
	<?php include('includes/footer.php');?>		
	</div><!--Termina main-->	
<!-- InstanceBeginEditable name="Scripts" -->
<script type="text/javascript">
<!--
//-->
</script>
<?php
mysql_free_result($Categorias);
mysql_free_result($Marcas);
?>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>
