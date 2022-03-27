(function(){ //START IIFE (Immediately Invoked Function Expression)

$(document).ready(function(){
	
	
	
	/*
    |--------------------------------------------------------------------------
    | If user click on the slot
    |--------------------------------------------------------------------------
    |
    |
    */
	
	$(document).on("click", '.slot', function() {   // this  click  is  used  to   react  to  newly generated cicles;
	    
		if( $(this).hasClass("taken-slot") ){
			swal({html:true, title:'Stopped!', text:'<b>Cannot </br> select taken slots', type: 'error'});
			return false;
		}
		
		//if user unselects time slot  
	    if ($(this).hasClass("selected")) {
			$(this).removeClass("selected");
			$(this).addClass("not-selected");
			$(".button-mine"). fadeOut(300);
			
			//clear form input, if was set prev
			$("#selected-time").html("");   //html in modal window 
			$('#selectedTimeSlot').val(""); //html the hidden input in modal window 
		
        //if user selects time slot 		
		} else {
			
			$(this).addClass("selected");
			$(this).removeClass("not-selected");
			$(".button-mine"). fadeIn(800);
			
			//html the form input with selected time slot
			$time = $(this).html();
			$("#selected-time").html($time);        //html in modal window 
			$('#selectedTimeSlot').val($time); //html the hidden input in modal window 
		}
		
		//add selected time slot to form............
	});
	
	
	
	
});
// end ready	
	
	
}()); //END IIFE (Immediately Invoked Function Expression)