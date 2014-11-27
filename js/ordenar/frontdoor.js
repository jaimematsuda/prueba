 

document.observe("dom:loaded", function() {

	// form submit
	Event.observe('home_input_form', 'submit', function(event){ 
		if(!Field.present('fd_inputbody') || $('fd_inputbody').value.substring(0,30) == 'Type your webpage address here') {
			alert('A webpage address must be filled in to create ads.');
			Event.stop(event);
		}
	});
	
	// keypress 
	Event.observe(document, 'keypress', function(event){ 
		var match_string = 'Type your webpage address here';
		var input_value = $('fd_inputbody').value.substring(0,30);
		
		if(input_value == match_string) {
			adjust_input('empty');
			$('fd_inputbody').focus();
			
		}
	});
	
	// blinking _
	new PeriodicalExecuter(function(pe) {
		var match_string = 'Type your webpage address here';
		
	  	if($('fd_inputbody').value.substring(0,30) == match_string) {
	  		switch($('fd_inputbody').value.substring(30,31)) {
	  			case '_': $('fd_inputbody').value = match_string+''; 	break;
	  			case '':  $('fd_inputbody').value = match_string+'_'; 	break;
	  		}
	  	} else {
	  		//pe.stop();
	  	}
	}, .6);
	
});

function adjust_input(type) {
	var match_string = 'Type your webpage address here';
	var input_value = $('fd_inputbody').value.substring(0,30);
	
	switch(type) {
		case 'empty': if(input_value == match_string) $('fd_inputbody').value = ''; break; 
		case 'full':  if(input_value == '') $('fd_inputbody').value = match_string; break;
	}
	
}
