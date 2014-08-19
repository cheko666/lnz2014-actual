// JavaScript Document
$(function() {
	var step = 4; 
	var current1 = 0;
	var current2 = 0; 
	var maximum1 = $('#my_carousel1 ul li').size();
	var maximum2 = $('#my_carousel2 ul li').size();  
	var visible = 4; 
	var speed = 200; 
	var liSize = 175;
	var carousel_height = 245;
	

	var ulSize1 = liSize * maximum1;
	var ulSize2 = liSize * maximum2;  
	var divSize = (liSize * visible)+15;  
	
	$('#my_carousel1 ul').css("width", ulSize1+"px").css("left", -(current1 * liSize)).css("position", "absolute");

	$('#my_carousel1').css("width", divSize+"px").css("height", carousel_height+"px").css("visibility", "visible").css("overflow", "hidden").css("position", "relative");
	
	$('#my_carousel2 ul').css("width", ulSize2+"px").css("left", -(current2 * liSize)).css("position", "absolute");

	$('#my_carousel2').css("width", divSize+"px").css("height", carousel_height+"px").css("visibility", "visible").css("overflow", "hidden").css("position", "relative");

	if(maximum1<=4) {
	$('#btnnext1').css("visibility","hidden");
	$('#btnprev1').css("visibility","hidden");
	}
	
	if(maximum2<=4) {
	$('#btnnext2').css("visibility","hidden");
	$('#btnprev2').css("visibility","hidden");
	}
	
	if ( (current1 + step) > (maximum1 - visible) ) {
		$('#btnnext1').css("visibility","hidden");
		$('#btnprev1').css("visibility","hidden");
	}
	if ( (current2 + step) > (maximum2 - visible) ) {
		$('#btnnext2').css("visibility","hidden");
		$('#btnprev2').css("visibility","hidden");
	}

	$('#btnnext1').click(function() { 
		if(current1 + step < 0 || (current1 + step) > (maximum1 - visible)) {return; }
		else {
			current1 = current1 + step;
			$('#my_carousel1 ul').animate({left: -((liSize * current1))}, speed, null);
			if ((current1 + step) < (maximum1 - visible)) { $('#btnnext1').css("visibility","hidden"); }
		}
		return false;
	});
	
	$('#btnprev1').click(function() { 
		if(current1 - step < 0 || current1 - step > maximum1 - visible) {return; }
		else {
			current1 = current1 - step;
			if (current1<= (maximum1-visible)) { $('#btnnext1').css("visibility","visible"); }
			$('#my_carousel1 ul').animate({left: -(liSize * current1)}, speed, null);
			
		}
		return false;
	});
 	
	
	$('#btnnext2').click(function() { 
		if(current2 + step < 0 || current2 + step > (maximum2 - visible)) {return; }
		else {
			current2 = current2 + step;
			$('#my_carousel2 ul').animate({left: -((liSize * current2))}, speed, null);
			if ((current2 + step) < (maximum1 - visible)) { $('#btnnext2').css("visibility","hidden"); }
		}
		return false;
	});
	
	$('#btnprev2').click(function() { 
		if(current2 - step < 0 || current2 - step > maximum2 - visible) {return; }
		else {
			current2 = current2 - step;
			if (current2<= (maximum1-visible)) { $('#btnnext2').css("visibility","visible"); }
			$('#my_carousel2 ul').animate({left: -(liSize * current2)}, speed, null);
		}
		return false;
	});
});

