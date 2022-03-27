(function(){ //START IIFE (Immediately Invoked Function Expression)

$(document).ready(function(){
	
	//sets the input type="date" to today or GET in URL (if isset)
	var results = window.location.href.split("?")[1]; //gets "date-picker=2022-04-07" if get is set
	if(results != undefined){
		//sets form datepicker input to $_GET value
		let t = results.split("=")[1]; //gets "2022-04-07"
		document.getElementById('datePicker').value = t; //u can set <input type="date"/> you need to bring the date in "YYYY-MM-DD" 
	} else {
  
	    //sets form datepicker input to today, no $_GET value
	    document.getElementById('datePicker').valueAsDate = new Date();
	}
	
	/*
    |--------------------------------------------------------------------------
    | If user click on the any time slot (either taken or free)
    |--------------------------------------------------------------------------
    |
    |
    */
	
	$(document).on("click", '.slot', function() {   // this  click  is  used  to   react  to  newly generated cicles;
	    
		//it slot is taken already
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
			
			$("*").removeClass("selected"); //remove class "selected" for prev clicked, if any
			$(this).addClass("selected");
			$(this).removeClass("not-selected");
			$(".button-mine"). fadeIn(800);
			
			//html the form input with selected time slot
			$time = $(this).html();
			$("#selected-time").html($time);        //html in modal window 
			$('#selectedTimeSlot').val($time);     //html the hidden input with $time  (in modal window)
		}
		
		
	});
	
	
	
	
	
	/*
    |--------------------------------------------------------------------------
    | If user click to change date of displaying slot list
    |--------------------------------------------------------------------------
    |
    |
    */
	
	$(document).on("click", '#changeDateBtn', function(e) {   // this  click  is  used  to   react  to  newly generated cicles;
	
	    //e.preventDefault();
	    let changedDate = $('#datePicker').val();  //gets input value, e,g 2022-03-25
		//$('#datePicker').val(changedDate.split("-")[2] + "-" +changedDate.split("-")[1] + "-" +changedDate.split("-")[0]);  //change 2022-03-25 to 25-03-2022
		
		//check if selected value is not past
		let selected  = new Date(changedDate);             //returns Sat Mar 26 2022 20:38:22 GMT+0100 (Центральная Европа, стандартное время)
		let yesterday = new Date(Date.now() - 86400000); // that is: 24 * 60 * 60 * 1000 //returns Sat Mar 26 2022 20:38:22 GMT+0100 (Центральная Европа, стандартное время)
		
		//alert(yesterday.getTime()); //1648323461323
		if(selected.getTime() <= yesterday.getTime()){  // yesterday.getTime() returns 1648323461323
		    swal({html:true, title:'Stopped!', text:'<b>Cannot </br> select yesterday', type: 'error'});
			return false;
		}
		//if all OK, form is submitted, with URL /?date-picker=2022-03-27
		//end check if selected value is not past
		
		
	});
	
	
	
});
// end ready		
	
}()); //END IIFE (Immediately Invoked Function Expression)