// JavaScript Document
/**=============================================================================
 *
 *	
 *===========================================================================**/

$(document).ready(function(){
	
	var timeSlide = 1000;
	// Editar Nombre de Producto ************************************************************
	$('#EditNombreBtn').click(function(){
			
		var valor_input = $('#div_nombre').html();

		if($('#DivInputNombre').hasClass('hidden') ) {
            $('#DivInputNombre').removeClass('hidden').addClass('show');
        };
		
		$('#InputNombre').val(valor_input);
		
		$('#CancelarEditNombreBtn').click(function(){
			$('#InputNombre').val('');
			$('#DivInputNombre').removeClass('show').addClass('hidden');
		});
		
		$('#GuardarNombreBtn').click(function(){
			var nombre_producto = $('#InputNombre').val();
			var id_producto = $('#InputID').val();

			
			$('#DivInputNombre').removeClass('show').addClass('hidden');
			$.ajax({	
					type: 'POST',
					url: 'includes/actualizacion_producto.php',
					data: 'nombre_producto='+nombre_producto+'&ID='+id_producto,
					success: function(msj) {
						if(msj == 1) {
							$('#error').addClass('alert-success');
							$('#error').html('<strong>El cambio fue realizado con éxito.</strong>');
							$('#error').fadeIn();
							$('#div_nombre').html(nombre_producto);
							setTimeout(function(){
									$('#error').fadeOut();
								},(timeSlide*2));
							return true;
						} else {
							$('#error').addClass('alert-danger');
							$('#error').html('<strong>El cambio no se pudo guardar.</strong>');
							$('#error').show();
							return true;
							setTimeout(function(){
									$('#error').fadeOut();
								},(timeSlide*2));
						}		
					},
					error:function() { alert("Ocurri&oacute; un error en la conexi&oacute;n. Favor de intentar de nuevo."); $('#recaptcha_response_field').focus(); Recaptcha.reload();
					return false;
					}
			});
			return false;

		});

	});
	
	// Editar Información de Producto ************************************************************
	$('#EditInfoBtn').click(function(){
		if 	( $('#div_info').html() == 'Sin informaci&oacute;n a&uacute;n.' ){
			var valor_input = ''	
		} else {
			var valor_input = $('#div_info').html();
		}
		
		if($('#DivInputInfo').hasClass('hidden') ) {
            $('#DivInputInfo').removeClass('hidden').addClass('show');
        };
		
		$('#InputInfo').val(valor_input);
		
		$('#CancelarEditInfoBtn').click(function(){
			$('#InputInfo').val('');
			$('#DivInputInfo').removeClass('show').addClass('hidden');
		});
		
		$('#GuardarInfoBtn').click(function(){
			var info_producto = $('#InputInfo').val();
			var id_producto = $('#InputID').val();

			
			$('#DivInputInfo').removeClass('show').addClass('hidden');
			$.ajax({	
					type: 'POST',
					url: 'includes/actualizacion_producto.php',
					data: 'info_producto='+info_producto+'&ID='+id_producto,
					success: function(msj) {
						if(msj == 1) {
							$('#error').addClass('alert-success');
							$('#error').html('<strong>El cambio fue realizado con éxito.</strong>');
							$('#error').fadeIn();
							$('#div_info').html(info_producto);
							setTimeout(function(){
									$('#error').fadeOut();
								},(timeSlide*2));
							return true;
						} else {
							$('#error').addClass('alert-danger');
							$('#error').html('<strong>El cambio no se pudo guardar.</strong>');
							$('#error').show();
							return true;
							setTimeout(function(){
									$('#error').fadeOut();
								},(timeSlide*2));
						}		
					},
					error:function() { alert("Ocurri&oacute; un error en la conexi&oacute;n. Favor de intentar de nuevo."); $('#recaptcha_response_field').focus(); Recaptcha.reload();
					return false;
					}
			});
			return false;

		});

	});

	// Editar Presentación de Producto ************************************************************
	$('#EditInfoBtn').click(function(){
			
		var valor_input = $('#div_info').html();

		if($('#DivInputInfo').hasClass('hidden') ) {
            $('#DivInputInfo').removeClass('hidden').addClass('show');
        };
		
		$('#InputInfo').val(valor_input);
		
		$('#CancelarEditInfoBtn').click(function(){
			$('#InputInfo').val('');
			$('#DivInputInfo').removeClass('show').addClass('hidden');
		});
		
		$('#GuardarInfoBtn').click(function(){
			var info_producto = $('#InputInfo').val();
			var id_producto = $('#InputID').val();

			
			$('#DivInputInfo').removeClass('show').addClass('hidden');
			$.ajax({	
					type: 'POST',
					url: 'includes/actualizacion_producto.php',
					data: 'info_producto='+info_producto+'&ID='+id_producto,
					success: function(msj) {
						if(msj == 1) {
							$('#error').addClass('alert-success');
							$('#error').html('<strong>El cambio fue realizado con éxito.</strong>');
							$('#error').fadeIn();
							$('#div_info').html(info_producto);
							setTimeout(function(){
									$('#error').fadeOut();
								},(timeSlide*2));
							return true;
						} else {
							$('#error').addClass('alert-danger');
							$('#error').html('<strong>El cambio no se pudo guardar.</strong>');
							$('#error').show();
							return true;
							setTimeout(function(){
									$('#error').fadeOut();
								},(timeSlide*2));
						}		
					},
					error:function() { alert("Ocurri&oacute; un error en la conexi&oacute;n. Favor de intentar de nuevo."); $('#recaptcha_response_field').focus(); Recaptcha.reload();
					return false;
					}
			});
			return false;

		});

	});

});