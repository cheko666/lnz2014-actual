// JavaScript Document
function funciones(){
 var xmlhttp=false;
 try {
 xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
 } catch (e) {
 try {
 xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
 } catch (E) {
 xmlhttp = false;
 }
 }
 if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
   xmlhttp = new XMLHttpRequest();
   }
   return xmlhttp;
}

function eliminarDato(codigo, usuario){
	   //donde se mostrará el resultado de la eliminacion
	   //divResultado = document.getElementById('mensaje');
	   
	   //usaremos un cuadro de confirmacion 
	   var eliminar = confirm("De verdad desea eliminar el codigo "+codigo+"?")
	   if ( eliminar ) {
		   //instanciamos el objetoAjax
		   ajax=funciones();
		   //uso del medotod GET
		   //indicamos el archivo que realizará el proceso de eliminación
		   //junto con un valor que representa el id del empleado
		   ajax.open("GET", "canasta_eliminaItem.php?codigo="+codigo+"&usuario="+usuario);
		   ajax.onreadystatechange=function() {
		   if (ajax.readyState==4) {
			   location.reload(true);
		   		//mostrar resultados en esta capa
		   		//divResultado.innerHTML = ajax.responseText
		   }
	   }
	   //como hacemos uso del metodo GET
	   //colocamos null
   ajax.send(null)
   }
}

function comprobar(codigo){
	   //donde se mostrará el resultado de la eliminacion
	   //divResultado = document.getElementById('mensaje');
	   
	   //usaremos un cuadro de confirmacion 
	   var eliminar = confirm("De verdad desea eliminar el codigo "+codigo+"?")
	   if ( eliminar ) {
		   //instanciamos el objetoAjax
		   ajax=funciones();
		   //uso del medotod GET
		   //indicamos el archivo que realizará el proceso de eliminación
		   //junto con un valor que representa el id del empleado
		   ajax.open("GET", "canasta_eliminaItem.php?codigo="+codigo);
		   ajax.onreadystatechange=function() {
		   if (ajax.readyState==4) {
			   location.reload(true);
		   		//mostrar resultados en esta capa
		   		//divResultado.innerHTML = ajax.responseText
		   }
	   }
	   //como hacemos uso del metodo GET
	   //colocamos null
   ajax.send(null)
   }
}

function enviarSolicitudCotizacion(usuario){
	   //donde se mostrará el resultado de la eliminacion
	   //divResultado = document.getElementById('mensaje');
	   
	   //usaremos un cuadro de confirmacion 
	   var pagina="cotizacion_enviada.php"
	   if ( pagina ) {
		   //instanciamos el objetoAjax
		   ajax=funciones();
		   //uso del medotod GET
		   //indicamos el archivo que realizará el proceso de eliminación
		   //junto con un valor que representa el id del empleado
		   ajax.open("GET", "cotizacion_envio.php?usuario="+usuario);
		   ajax.onreadystatechange=function() {
		   if (ajax.readyState==4) {
				location.href=pagina;
				//mostrar resultados en esta capa
				//divResultado.innerHTML = ajax.responseText
		   }
		}
	   //como hacemos uso del metodo GET
	   //colocamos null
   ajax.send(null)
   }
}

function validar_email(email)
{
	expr=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if ( expr.test(email) )
	{
        return true;		
	} else {
		return false;
	}		
}