/**=============================================================================
 *
 *	Filename:  function.ajax.js
 *	
 *	(c)Autor: Arkos Noem Arenom
 *	
 *	Description: Ajax para hacer las consultas
 *	
 *	Licence: GPL|LGPL
 *	
 *===========================================================================**/

$(document).ready(function(){
	
	var timeSlide = 500;
	$('#login_username').focus();
	$('#timer').hide(0);
	$('#timer').css('display','none');
	$('#login_userbttn').click(function(){
		$('#timer').fadeIn(100);
		$('.box-info, .box-success, .box-alert, .box-error').slideUp(timeSlide);
		setTimeout(function(){
			if ( $('#username').val() != "" && $('#password').val() != "" ){
				
				$.ajax({
					type: 'POST',
					url: '../includes/log_inout_ajax.php',
					data: 'username=' + $('#username').val() + '&password=' + $('#password').val(),
					success:function(msj){
						if ( msj == 1 ){
							$('#alertBoxes').html('<div class="box-success"></div>');
							$('.box-success').hide(0).html('Bienvenid@ Espere un momento&#133;');
							$('.box-success').slideDown(timeSlide);
							setTimeout(function(){
								window.location.href = "../admin/";
							},(timeSlide + 300));
						}
						else{
							$('#alertBoxes').html('<div class="box-error"></div>');
							$('.box-error').hide(0).html('Los datos son incorrectos, favor de verificarlos e introdúzcalos de nuevo.');
							$('.box-error').fadeIn(timeSlide);
						}
						$('#timer').fadeOut(100);
					},
					error:function(){
						$('#timer').fadeOut(100);
						$('#alertBoxes').html('<div class="box-error"></div>');
						$('.box-error').hide(0).html('Ha ocurrido un error durante la ejecución. Vuelva a intentar.');
						$('.box-error').slideDown(timeSlide);
					}
				});
				
			}
			else{
				$('#alertBoxes').html('<div class="box-error"></div>');
				$('.box-error').hide(0).html('Uno o más campos están vacíos. Favor de ingresar los datos.');
				$('.box-error').slideDown(timeSlide);
				$('#timer').fadeOut(100);
			}
		},timeSlide);
		
		return false;
		
	});
	
	
	
	$('#sessionKiller').click(function(){
			window.location.href = "logout.php";
	});
	
		
	//Validate the Recaptcha' Before continuing with POST ACTION
	$('#btnVerificar').click(function(){
				
		$.ajax({	
				type: 'POST',
				url: 'validateform.php',
				data: 'recaptcha_challenge_field=' + $('#recaptcha_challenge_field').val() + '&recaptcha_response_field=' + $('#recaptcha_response_field').val(),
				success: function(html) {
					if(html == 1) {
						//Add the Action to the Form
						$('#signupform').attr('action', 'contacto_envio.php'); //<-- your script to process the form
						$('#btnVerificar').hide();
						$('#btnEnviarContent').html('<input type="submit" class="submitOk" value="Enviar datos">');
						//Indicate a Successful Captcha
						$('#alertBoxes').html('<div class="box-success"></div>');
						$('#alertBoxes').show();
						$('.box-success').hide(0).html('<big>Bien</big></br>Ahora puede enviar el formulario.');
						$('.box-success').slideDown(500);
						return true;
					} else {
						Recaptcha.reload();
						$('#recaptcha_response_field').focus();
						$('#alertBoxes').html('<div class="box-error"></div>');
						$('#alertBoxes').show();
						$('.box-error').hide(0).html('El texto que ingreso est&aacute; mal.</br>Favor de intentar de nuevo.');
						$('.box-error').fadeIn(400);
						setTimeout(function(){
								$('.box-error').fadeOut();
							},(3600));
					}		
				},
				error:function() { alert("Ocurri&oacute; un error en la conexi&oacute;n. Favor de intentar de nuevo."); $('#recaptcha_response_field').focus(); Recaptcha.reload(); return false; }
		});
		return false;
	});
	
	/*
	$("#tags").keyup(function() //se crea la funcioin keyup
	{
		var texto = $(this).val();//se recupera el valor de la caja de texto y se guarda en la variable texto
		var dataString = 'palabra='+ texto;//se guarda en una variable nueva para posteriormente pasarla a search.php
		if(texto=='')//si no tiene ningun valor la caja de texto no realiza ninguna accion
		{
		}
		else
		{
		$.ajax({//metodo ajax
			type: "POST",//aqui puede  ser get o post
			url: "search.php",//la url adonde se va a mandar la cadena a buscar
			data: dataString,
			cache: false,
			success: function(html)//funcion que se activa al recibir un dato
			{
			$("#display").html(html).show();// funcion jquery que muestra el div con identificador display, como formato html, tambien puede ser .text
			}
		});
		}return false;    
	});
	*/	
});