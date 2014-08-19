<?php include('Connections/bd.php'); 
 
$titulo = "Registro para recibir nuestros avisos y promociones";


if(isset($_POST['btn_Enviar'])) {
	$tipo_usuario = $_POST['tipo_usuario']; 
	$especialidad = ucwords ( strtolower($_POST['especialidad']) );
	$organizacion = ucwords ( strtolower($_POST['organizacion']) );
	$nombre = ucwords ( strtolower($_POST['nombre']) );
	$apellidos = ucwords ( strtolower($_POST['apellidos']) );
	$lada = $_POST['lada'];
	$telefono = $_POST['telefono'];	
	$email = strtolower($_POST['email']);
	$estado = $_POST['estado'];
	$fecha = date('Y-m-d H:i:s');
	
	//Escritura en BD
	mysql_select_db($database_Link, $Link);
	mysql_query("SET NAMES 'utf8'");
	$insert_sql =
	"INSERT INTO Usuarios_Contacto (Destino,TipoUsuario,Especialidad,Nombre,Apellidos,Organizacion,Lada,Telefono,Email,Estado,Mensaje,AutorizaNewsletter,FechaCreacion) VALUES
	('newsletter',
	'$tipo_usuario',
	'$especialidad',
	'$nombre',
	'$apellidos',
	'$organizacion',
	'$lada',
	'$telefono',
	'$email',
	'$estado',
	NULL,
	'Si',
	'$fecha')";
	$res = mysql_query($insert_sql, $Link) or die(mysql_error());
	
}

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
$(function(){
	$(".radio-group li").bind("click", function(){
	$(".radio-group li").removeClass("radio-group-active");
	$(this).addClass("radio-group-active");
	val = $(this).attr("value");
	  if ( val=="Médico" || val=="Estudiante" ) {
		  $( "#tipo_usuario" ).val(val);
		  $("#tipo_usuario").attr('type', 'hidden'); 
		  $("#log").html('<div id="log_inner"></div>');
		  $("#log_inner").html('<label>Especialidad:</label><br><input type="text" name="especialidad"  id="especialidad" placeholder="Escriba su especialidad">');
	  } else if (val=="Otro") {
			val="";
			$( "#tipo_usuario" ).val(val);
			$("#tipo_usuario").attr('type', 'text');
			$("#log_inner").hide();
			 
	  } else {
			$( "#tipo_usuario" ).val(val);
			$("#log_inner").hide();
			$("#tipo_usuario").attr('type', 'hidden'); 
	  }
	});
	
	$('#aviso').scroll();
});
</script>
<script type="text/javascript" language="javascript">
	function validar()
	{
		var f=document.signupform;
		//Organización
		//*************************************************************************************
		if(f.organizacion.value==0)
		{
			alert("Por favor ingrese algo en el campo de organización.");
			f.organizacion.value="";
			f.organizacion.focus();
			f.organizacion.className = f.className + " focus";
			return false;
		} else {
			f.organizacion.className = f.className - " focus";
		}
		//*************************************************************************************
		//Nombre
		//*************************************************************************************
		if(f.nombre.value==0)
		{
			alert("Por favor ingrese algo en el campo de nombre.");
			f.nombre.value="";
			f.nombre.focus();
			f.nombre.className = f.className + " focus";
			return false;
		} else {
			f.nombre.className = f.className - " focus";
		}
		//*************************************************************************************
		//Apellidos
		//*************************************************************************************
		if(f.apellidos.value==0)
		{
			alert("Por favor ingrese algo en el campo de apellidos.");
			f.apellidos.value="";
			f.apellidos.focus();
			f.apellidos.className = f.className + " focus";
			return false;
		} else {
			f.apellidos.className = f.className - " focus";
		}
		//*************************************************************************************
		//Email		//*************************************************************************************
		if(f.email.value==0)
		{
			alert("Por favor ingrese algo en el campo de email.");
			f.email.value="";
			f.email.focus();
			f.email.className = f.className + " focus";
			return false;
		}
		
		if( validar_email(f.email.value) == false )
		{
			alert("Por favor revise o ingrese un email válido.");
			f.email.focus();
			f.email.className = f.className + " focus";
			return false;
		} else {
			f.email.className = f.className - " focus";
		}
		//*************************************************************************************
	
		//Teléfono		//*************************************************************************************
		if(f.telefono.value==0)
		{
			alert("Por favor ingrese algo en el campo de teléfono.");
			f.telefono.value="";
			f.telefono.focus();
			f.telefono.className = f.className + " focus";
			return false;
		} else {
			f.telefono.className = f.className - " focus";
		}
				//*************************************************************************************
	

		//Acción para el formulario validado
		f.setAttribute("action","newsletter_registro.php");
		f.submit();
	}
	function limpiar_formulario()
	{
		document.ContactoInicio.reset();
	}
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
                <div style="width:460px; margin:0 0	0 30px;">
				<form id="signupform" name="signupform" method="post">
					<fieldset>
							<label style="padding-left:9px;">Es Usted:<br>
							  <em>  (seleccione una opci&oacute;n)</em></label>
                            <div style="padding:5px 0 5px 10px;">
								 <ul class="radio-group">
									 <li value="Médico">Médico</li>
									 <li value="Paciente">Paciente</li>
									 <li value="Estudiante">Estudiante</li>
									 <li value="Organización">Organización</li>
									 <li value="Hospital">Hospital</li>
									 <li value="Otro">Otro</li>
							  </ul>
                                <div style="clear:left"></div> 
                      </div>   
						<div style="width:300px; margin:0 auto; text-align:center;">
							<input type="hidden" name="tipo_usuario"  id="tipo_usuario" value="Paciente" placeholder="Especifique">
						</div>
						<div id="log" style="text-align:center; margin-top:5px;"></div>
                        <hr>    
                    
                    	<p><label>Empresa o Instituci&oacute;n:</label>
						<input name="organizacion" type="text" id="organizacion" style="width:95%" /></p>
					  
                    	<p><label>Nombre:</label>
                    	<span class="asteriscoRojo"> *</span></br>
						<input name="nombre" type="text" id="nombre" style="width:95%" /></p>
                    
                    	<p>
                    		<label>Apellidos<span class="asteriscoRojo"> *</span></label>
                    		</br>
                      <input name="apellidos" type="text" id="apellidos" style="width:95%" /></p>
                    
                    	<p><label>Tel&eacute;fono</label>
                    	<span class="asteriscoRojo">*</span></br>
                    	<small>Lada 01</small>
                    		<input name="lada" type="text" id="lada" size="4" maxlength="3" /> 
                    		- 
                    		<input name="telefono" type="text" id="telefono" size="18" maxlength="8" /></p>

                    	<p><label>Email:</label>
                    	<span class="asteriscoRojo"> *</span>
							<input name="email" type="text" id="email" style="width:95%" /></p>

                    	<p><label>Estado:</label>
                    	<select name="estado">
						<option value="0" selected="selected">Seleccione...</option>
									<option value="Aguascalientes">Aguascalientes</option>
									<option value="Baja California Norte">Baja California Norte</option>
									<option value="Baja California Sur">Baja California Sur</option>
									<option value="Campeche">Campeche</option>
									<option value="Coahuila">Coahuila</option>
									<option value="Colima">Colima</option>
									<option value="Chiapas">Chiapas</option>
									<option value="Chihuahua">Chihuahua</option>
									<option value="Distrito Federal">Distrito Federal</option>
									<option value="Durango">Durango</option>
									<option value="Guanajuato">Guanajuato</option>
									<option value="Guerrero">Guerrero</option>
									<option value="Hidalgo">Hidalgo</option>
									<option value="Jalisco">Jalisco</option>
									<option value="Estado de México">Estado de México</option>
									<option value="Michoacán">Michoacán</option>
									<option value="Morelos">Morelos</option>
									<option value="Nayarit">Nayarit</option>
									<option value="Nuevo León">Nuevo León</option>
									<option value="Oaxaca">Oaxaca</option>
									<option value="Puebla">Puebla</option>
									<option value="Querétaro">Querétaro</option>
									<option value="Quintana Roo">Quintana Roo</option>
									<option value="San Luis Potosí">San Luis Potosí</option>
									<option value="Sinaloa">Sinaloa</option>
									<option value="Sonora">Sonora</option>
									<option value="Tabasco">Tabasco</option>
									<option value="Tamaulipas">Tamaulipas</option>
									<option value="Tlaxcala">Tlaxcala</option>
									<option value="Veracruz">Veracruz</option>
									<option value="Yucatán">Yucatán</option>
									<option value="Zacatecas">Zacatecas</option>
						</select>
						</p>		  
						
						<input onClick="validar()" class="submitOk" value="Enviar datos" name="btn_Enviar"></br>
				  </fieldset>
						<div id="btnEnviarContent"></div>
                        
<div style="border-bottom:#999 thin solid;border-top:#999 thin solid; text-align:center; padding:10px; margin-bottom:10px;">
							<div style="text-align:center;"><h3 class="center">Aviso de privacidad</h3></div>
							<div style="margin:5px 0; padding:5px; border:1px solid #999;">
							<div id="aviso" style="height:150px;overflow:scroll;text-align:justify; margin:5px;">
Lanceta HG

Lanceta Group

Auto Servicio Médico
 


LANCETA HG S.A. DE C.V. (en adelante "LANCETA HG"), asume el compromiso de salvaguardar los datos personales que le son proporcionados por usted como resultado de facturar,  solicitar nuestra tarjeta de cliente distinguido o utilizar los servicios en línea, independientemente del formato en el que se presenta dicha solicitud,  utilizando cualquiera de los formatos autorizados por LANCETA HG, y la entrega de documentos adicionales que hayan sido solicitados o requeridos de acuerdo a los procedimientos de trámite de la tarjeta de cliente distinguido otorgada por LANCETA HG; por ende, emite el presente Aviso de Privacidad (el "Aviso") en cumplimiento de las disposiciones de la Ley Federal de Protección de Datos Personales en Posesión de los Particulares (la "Ley") y su Reglamento.

El presente Aviso establece los términos y condiciones bajo los cuales se recolectarán, almacenarán y utilizarán los datos personales de usted (el "Tratamiento"), que serán almacenados en la base de datos controlada por LANCETA HG.

LANCETA HG, con domicilio ubicado en Doctor Villada Núm. 81, Colonia Doctores, Delegación Cuauhtémoc, C.P. 06720, México D.F. (el "Domicilio"), fungirá como responsable en términos de la Ley.

Datos Personales.

Sus datos personales serán recabados de la solicitud de cliente distinguido autorizada y presentada ante LANCETA HG, así como de sus servicios en línea; Los datos personales que están, o pudieran estar, sujetos a Tratamiento por LANCETA HG son: Nombre o Razón Social, Edad, Fecha de Nacimiento, Nombre del Titular (en caso de ser persona moral), Registro Federal de Contribuyentes, Domicilio, Número de Teléfono, Correo Electrónico, así como los siguientes documentos: Comprobante de domicilio, Identificación Oficial, Registro Federal de Contribuyentes, así como cualquier otro dato personal, que sea necesario para cumplir con las finalidades que se señalan más adelante.

Finalidades del Tratamiento de Datos Personales.

El Tratamiento de los datos personales conforme al presente Aviso se realizará para cumplir con cualquiera de las siguientes finalidades que dan origen y son necesarias para la relación jurídica que se tenga o pudiera llegar a tener con usted: facturación, tramite de tarjetas de cliente distinguido o utilización de los servicios en línea de LANCETA HG. Las finalidades contenidas en el presente Aviso incluyen, sin limitación alguna, la posibilidad de transferir los datos personales a LANCETA GROUP S.A. DE C.V y/o AUTO SERVICIO MEDICO S.A. DE C.V; siempre que dicha transferencia sea requerida exclusivamente para cumplir con las finalidades aquí dispuestas. 

Usted podrá oponerse al Tratamiento de sus datos personales para aquellas finalidades distintas a las que se derivan o se originan de la relación jurídica que se tenga o pudiera llegar a tener con LANCETA HG, en cuyo caso deberá enviar un correo a sugerencias@lancetahg.com para realizar su solicitud.

Medidas de Seguridad para Protección de Datos Personales.

Consciente de la importancia que tiene la protección de la privacidad y confidencialidad de los datos personales, LANCETA HG, mantiene estrictos niveles de seguridad que restringen el Tratamiento de los datos personales exclusivamente para las finalidades para los cuales fueron recolectados, así como para protegerlos de la consulta, modificación, pérdida, alteración, divulgación y destrucción no autorizadas o no acorde a las finalidades del presente Aviso. LANCETA HG se encuentra en un esfuerzo continuo para implementar y aplicar nuevas medidas de seguridad a su base de datos.  La información es almacenada en un servidor seguro que reside detrás de un firewall diseñado para obstaculizar el acceso desde afuera de la empresa, Las medidas de seguridad incluyen, el resguardo bajo llave de la base de datos y una política interna sobre la entrega de las llaves con las cuales se puede tener acceso a la misma, Desafortunadamente ninguna transmisión por internet puede garantizar su seguridad al 100% por lo tanto, aunque LANCETA HG se esfuerce por proteger su información, no puede asegurar ni garantizar la seguridad de la transmisión de ninguna información de nuestros servicios en línea, por lo tanto usted corre su propio riesgo, en este apartado LANCETA HG ha enfocado sus esfuerzos en obtener la tecnología más moderna y actualizada a fin de ofrecer la mayor seguridad posible.

Tratamiento de Datos Personales.

El Tratamiento de los datos personales será conforme al presente Aviso y será realizado exclusivamente por el personal de LANCETA HG, que por virtud de las funciones que desempeñan dentro de la organización, requieran tener acceso a los datos personales para dar cumplimiento a las finalidades establecidas en el presente Aviso. LANCETA HG no tiene la intención de comercializar en forma alguna con los datos personales. Se le informa que, en aquellos casos establecidos por la Ley y el Reglamento, el Tratamiento o transferencia de sus datos personales podrá realizarse sin su consentimiento.

Derechos del Titular de los Datos Personales.

Usted tendrá, ya sea directamente o a través de un representante legal, derecho a acceder, rectificar, cancelar u oponerse al Tratamiento de sus datos personales, conforme a los términos y sujeto a las excepciones establecidas en la Ley, su Reglamento y cualquier otra disposición legal aplicable. En caso que desee ejercer cualquiera de los derechos antes mencionados deberá enviar un correo a sugerencias@lancetahg.com para realizar su solicitud.

Modificaciones al Aviso.

LANCETA HG, se reserva el derecho de revisar y modificar periódicamente el presente Aviso con el propósito de adaptarlo incluyendo, sin limitación alguna, sus actividades y/o aquellos cambios en las prácticas internas de LANCETA HG, o bien, las reformas legales que en el futuro entren en vigor. Las versiones modificadas del Aviso podrán ser consultadas en todo momento en nuestra página de internet www.lancetahg.com.

Consentimiento del Titular de los Datos Personales.

La decisión de entregar sus datos personales constituye en sí misma un signo inequívoco del consentimiento que usted otorga para el Tratamiento de sus datos.

Se le informa que, entre otros casos, no se requerirá su consentimiento para la transferencia de datos personales a: LANCETA GROUP S.A DE C.V y/o AUTO SERVICIO MEDICO S.A. DE C.V; que opera bajo el mismo proceso y políticas internas de protección de datos personales que LANCETA HG, de conformidad con lo dispuesto en la fracción III del Artículo 37 de la Ley de Protección de Datos Personales.

Revocación del Consentimiento del Titular.

Usted podrá, ya sea directamente o a través de un representante legal, revocar en cualquier momento su consentimiento para el Tratamiento de sus datos personales, sujeto a lo dispuesto en la Ley. En cuyo caso deberá enviar un correo a sugerencias@lancetahg.com para realizar su solicitud.

Legislación Aplicable.

El presente Aviso está sujeto a la legislación aplicable en la República Mexicana.





LANCETA GROUP S.A. DE C.V. (en adelante "LANCETA GROUP"), asume el compromiso de salvaguardar los datos personales que le son proporcionados por usted como resultado de facturar,  solicitar nuestra tarjeta de cliente distinguido o utilizar los servicios en línea, independientemente del formato en el que se presenta dicha solicitud,  utilizando cualquiera de los formatos autorizados por LANCETA GROUP, y la entrega de documentos adicionales que hayan sido solicitados o requeridos de acuerdo a los procedimientos de trámite de la tarjeta de cliente distinguido otorgada por LANCETA GROUP; por ende, emite el presente Aviso de Privacidad (el "Aviso") en cumplimiento de las disposiciones de la Ley Federal de Protección de Datos Personales en Posesión de los Particulares (la "Ley") y su Reglamento.

El presente Aviso establece los términos y condiciones bajo los cuales se recolectarán, almacenarán y utilizarán los datos personales de usted (el "Tratamiento"), que serán almacenados en la base de datos controlada por LANCETA GROUP.

LANCETA GROUP, con domicilio ubicado en Calzada de Tlalpan #4923, Colonia La Joya, Delegación Tlalpan, C.P. 14090, México D.F. (el "Domicilio"), fungirá como responsable en términos de la Ley.

Datos Personales.

Sus datos personales serán recabados de la solicitud de cliente distinguido autorizada y presentada ante LANCETA GROUP, así como de sus servicios en línea; Los datos personales que están, o pudieran estar, sujetos a Tratamiento por LANCETA GROUP son: Nombre o Razón Social, Edad, Fecha de Nacimiento, Nombre del Titular (en caso de ser persona moral), Registro Federal de Contribuyentes, Domicilio, Número de Teléfono, Correo Electrónico, así como los siguientes documentos: Comprobante de domicilio, Identificación Oficial, Registro Federal de Contribuyentes, así como cualquier otro dato personal, que sea necesario para cumplir con las finalidades que se señalan más adelante.

Finalidades del Tratamiento de Datos Personales.

El Tratamiento de los datos personales conforme al presente Aviso se realizará para cumplir con cualquiera de las siguientes finalidades que dan origen y son necesarias para la relación jurídica que se tenga o pudiera llegar a tener con usted: facturación, tramite de tarjetas de cliente distinguido o utilización de los servicios en línea de LANCETA GROUP. Las finalidades contenidas en el presente Aviso incluyen, sin limitación alguna, la posibilidad de transferir los datos personales a LANCETA HG S.A. DE C.V y/o AUTO SERVICIO MEDICO S.A. DE C.V; siempre que dicha transferencia sea requerida exclusivamente para cumplir con las finalidades aquí dispuestas. 

Usted podrá oponerse al Tratamiento de sus datos personales para aquellas finalidades distintas a las que se derivan o se originan de la relación jurídica que se tenga o pudiera llegar a tener con LANCETA GROUP, en cuyo caso deberá enviar un correo a sugerencias@lancetahg.com para realizar su solicitud.

Medidas de Seguridad para Protección de Datos Personales.

Consciente de la importancia que tiene la protección de la privacidad y confidencialidad de los datos personales, LANCETA GROUP, mantiene estrictos niveles de seguridad que restringen el Tratamiento de los datos personales exclusivamente para las finalidades para los cuales fueron recolectados, así como para protegerlos de la consulta, modificación, pérdida, alteración, divulgación y destrucción no autorizadas o no acorde a las finalidades del presente Aviso. LANCETA GROUP se encuentra en un esfuerzo continuo para implementar y aplicar nuevas medidas de seguridad a su base de datos.  La información es almacenada en un servidor seguro que reside detrás de un firewall diseñado para obstaculizar el acceso desde afuera de la empresa, Las medidas de seguridad incluyen, el resguardo bajo llave de la base de datos y una política interna sobre la entrega de las llaves con las cuales se puede tener acceso a la misma, Desafortunadamente ninguna transmisión por internet puede garantizar su seguridad al 100% por lo tanto, aunque LANCETA GROUP se esfuerce por proteger su información, no puede asegurar ni garantizar la seguridad de la transmisión de ninguna información de nuestros servicios en línea, por lo tanto usted corre su propio riesgo, en este apartado LANCETA GROUP ha enfocado sus esfuerzos en obtener la tecnología más moderna y actualizada a fin de ofrecer la mayor seguridad posible.

Tratamiento de Datos Personales.

El Tratamiento de los datos personales será conforme al presente Aviso y será realizado exclusivamente por el personal de LANCETA GROUP, que por virtud de las funciones que desempeñan dentro de la organización, requieran tener acceso a los datos personales para dar cumplimiento a las finalidades establecidas en el presente Aviso. LANCETA GROUP no tiene la intención de comercializar en forma alguna con los datos personales. Se le informa que, en aquellos casos establecidos por la Ley y el Reglamento, el Tratamiento o transferencia de sus datos personales podrá realizarse sin su consentimiento.

Derechos del Titular de los Datos Personales.

Usted tendrá, ya sea directamente o a través de un representante legal, derecho a acceder, rectificar, cancelar u oponerse al Tratamiento de sus datos personales, conforme a los términos y sujeto a las excepciones establecidas en la Ley, su Reglamento y cualquier otra disposición legal aplicable. En caso que desee ejercer cualquiera de los derechos antes mencionados deberá enviar un correo a sugerencias@lancetahg.com para realizar su solicitud.

Modificaciones al Aviso.

LANCETA GROUP, se reserva el derecho de revisar y modificar periódicamente el presente Aviso con el propósito de adaptarlo incluyendo, sin limitación alguna, sus actividades y/o aquellos cambios en las prácticas internas de LANCETA GROUP, o bien, las reformas legales que en el futuro entren en vigor. Las versiones modificadas del Aviso podrán ser consultadas en todo momento en nuestra página de internet www.lancetahg.com.

Consentimiento del Titular de los Datos Personales.

La decisión de entregar sus datos personales constituye en sí misma un signo inequívoco del consentimiento que usted otorga para el Tratamiento de sus datos.

Se le informa que, entre otros casos, no se requerirá su consentimiento para la transferencia de datos personales a: LANCETA HG S.A DE C.V y/o AUTO SERVICIO MEDICO S.A. DE C.V; que operan bajo el mismo proceso y políticas internas de protección de datos personales que LANCETA GROUP, de conformidad con lo dispuesto en la fracción III del Artículo 37 de la Ley de Protección de Datos Personales.

Revocación del Consentimiento del Titular.

Usted podrá, ya sea directamente o a través de un representante legal, revocar en cualquier momento su consentimiento para el Tratamiento de sus datos personales, sujeto a lo dispuesto en la Ley. En cuyo caso deberá enviar un correo a sugerencias@lancetahg.com para realizar su solicitud.

Legislación Aplicable.

El presente Aviso está sujeto a la legislación aplicable en la República Mexicana.





AUTO SERVICIO MEDICO S.A. DE C.V. (en adelante "AUTO SERVICIO MEDICO"), asume el compromiso de salvaguardar los datos personales que le son proporcionados por usted como resultado de facturar,  solicitar nuestra tarjeta de cliente distinguido o utilizar los servicios en línea, independientemente del formato en el que se presenta dicha solicitud,  utilizando cualquiera de los formatos autorizados por AUTO SERVICIO MEDICO, y la entrega de documentos adicionales que hayan sido solicitados o requeridos de acuerdo a los procedimientos de trámite de la tarjeta de cliente distinguido otorgada por AUTO SERVICIO MEDICO; por ende, emite el presente Aviso de Privacidad (el "Aviso") en cumplimiento de las disposiciones de la Ley Federal de Protección de Datos Personales en Posesión de los Particulares (la "Ley") y su Reglamento.

El presente Aviso establece los términos y condiciones bajo los cuales se recolectarán, almacenarán y utilizarán los datos personales de usted (el "Tratamiento"), que serán almacenados en la base de datos controlada por AUTO SERVICIO MEDICO.

AUTO SERVICIO MEDICO, con domicilio ubicado en San Miguel el Alto #620, Colonia Fátima, C.P. 20130, Aguascalientes (el "Domicilio"), fungirá como responsable en términos de la Ley.

Datos Personales.

Sus datos personales serán recabados de la solicitud de cliente distinguido autorizada y presentada ante AUTO SERVICIO MEDICO, así como de sus servicios en línea; Los datos personales que están, o pudieran estar, sujetos a Tratamiento por AUTO SERVICIO MEDICO son: Nombre o Razón Social, Edad, Fecha de Nacimiento, Nombre del Titular (en caso de ser persona moral), Registro Federal de Contribuyentes, Domicilio, Número de Teléfono, Correo Electrónico, así como los siguientes documentos: Comprobante de domicilio, Identificación Oficial, Registro Federal de Contribuyentes, así como cualquier otro dato personal, que sea necesario para cumplir con las finalidades que se señalan más adelante.

Finalidades del Tratamiento de Datos Personales.

El Tratamiento de los datos personales conforme al presente Aviso se realizará para cumplir con cualquiera de las siguientes finalidades que dan origen y son necesarias para la relación jurídica que se tenga o pudiera llegar a tener con usted: facturación, tramite de tarjetas de cliente distinguido o utilización de los servicios en línea de AUTO SERVICIO MEDICO. Las finalidades contenidas en el presente Aviso incluyen, sin limitación alguna, la posibilidad de transferir los datos personales a LANCETA HG S.A. DE C.V y/o LANCETA GROUP S.A. DE C.V; siempre que dicha transferencia sea requerida exclusivamente para cumplir con las finalidades aquí dispuestas. 

Usted podrá oponerse al Tratamiento de sus datos personales para aquellas finalidades distintas a las que se derivan o se originan de la relación jurídica que se tenga o pudiera llegar a tener con AUTO SERVICIO MEDICO, en cuyo caso deberá enviar un correo a sugerencias@lancetahg.com para realizar su solicitud.

Medidas de Seguridad para Protección de Datos Personales.

Consciente de la importancia que tiene la protección de la privacidad y confidencialidad de los datos personales, AUTO SERVICIO MEDICO, mantiene estrictos niveles de seguridad que restringen el Tratamiento de los datos personales exclusivamente para las finalidades para los cuales fueron recolectados, así como para protegerlos de la consulta, modificación, pérdida, alteración, divulgación y destrucción no autorizadas o no acorde a las finalidades del presente Aviso. AUTO SERVICIO MEDICO se encuentra en un esfuerzo continuo para implementar y aplicar nuevas medidas de seguridad a su base de datos.  La información es almacenada en un servidor seguro que reside detrás de un firewall diseñado para obstaculizar el acceso desde afuera de la empresa, Las medidas de seguridad incluyen, el resguardo bajo llave de la base de datos y una política interna sobre la entrega de las llaves con las cuales se puede tener acceso a la misma, Desafortunadamente ninguna transmisión por internet puede garantizar su seguridad al 100% por lo tanto, aunque AUTO SERVICIO MEDICO se esfuerce por proteger su información, no puede asegurar ni garantizar la seguridad de la transmisión de ninguna información de nuestros servicios en línea, por lo tanto usted corre su propio riesgo, en este apartado AUTO SERVICIO MEDICO ha enfocado sus esfuerzos en obtener la tecnología más moderna y actualizada a fin de ofrecer la mayor seguridad posible.

Tratamiento de Datos Personales.

El Tratamiento de los datos personales será conforme al presente Aviso y será realizado exclusivamente por el personal de AUTO SERVICIO MEDICO, que por virtud de las funciones que desempeñan dentro de la organización, requieran tener acceso a los datos personales para dar cumplimiento a las finalidades establecidas en el presente Aviso. AUTO SERVICIO MEDICO no tiene la intención de comercializar en forma alguna con los datos personales. Se le informa que, en aquellos casos establecidos por la Ley y el Reglamento, el Tratamiento o transferencia de sus datos personales podrá realizarse sin su consentimiento.

Derechos del Titular de los Datos Personales.

Usted tendrá, ya sea directamente o a través de un representante legal, derecho a acceder, rectificar, cancelar u oponerse al Tratamiento de sus datos personales, conforme a los términos y sujeto a las excepciones establecidas en la Ley, su Reglamento y cualquier otra disposición legal aplicable. En caso que desee ejercer cualquiera de los derechos antes mencionados deberá enviar un correo a sugerencias@lancetahg.com para realizar su solicitud.

Modificaciones al Aviso.

AUTO SERVICIO MEDICO, se reserva el derecho de revisar y modificar periódicamente el presente Aviso con el propósito de adaptarlo incluyendo, sin limitación alguna, sus actividades y/o aquellos cambios en las prácticas internas de AUTO SERVICIO MEDICO, o bien, las reformas legales que en el futuro entren en vigor. Las versiones modificadas del Aviso podrán ser consultadas en todo momento en nuestra página de internet www.lancetahg.com.

Consentimiento del Titular de los Datos Personales.

La decisión de entregar sus datos personales constituye en sí misma un signo inequívoco del consentimiento que usted otorga para el Tratamiento de sus datos.

Se le informa que, entre otros casos, no se requerirá su consentimiento para la transferencia de datos personales a: LANCETA HG S.A DE C.V y/o LANCETA GROUP S.A. DE C.V; que opera bajo el mismo proceso y políticas internas de protección de datos personales que AUTO SERVICIO MEDICO, de conformidad con lo dispuesto en la fracción III del Artículo 37 de la Ley de Protección de Datos Personales.

Revocación del Consentimiento del Titular.

Usted podrá, ya sea directamente o a través de un representante legal, revocar en cualquier momento su consentimiento para el Tratamiento de sus datos personales, sujeto a lo dispuesto en la Ley. En cuyo caso deberá enviar un correo a sugerencias@lancetahg.com para realizar su solicitud.

Legislación Aplicable.

El presente Aviso está sujeto a la legislación aplicable en la República Mexicana.











							</div>
						</div>
					  </div>                        
				  </form>
                    </div>
				</div><!--Termina texto_grid-->
                <?php include('includes/banners.php');?>					
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
