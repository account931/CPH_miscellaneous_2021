$(document).ready(function(){
	
	
	
	var adsArray = {
		
		submergeKyiv : {
		    imgPath: "images/ads/sub_kyiv.jpg",
            urlPath: "google.com"			
		},
		
		
		submergeOdess : {
		    imgPath: "images/ads/sub_od.jpg",
            urlPath: "yahoo.com"			
		},
        
		
	};
	// end object
	
    // flash effect
	setInterval(function(){  $('.ads').fadeTo(100, 0.3, function() { $(this).fadeTo(500, 1.0); });        }, 4000);
	//$('.ads').fadeTo(100, 0.3, function() { $(this).fadeTo(500, 1.0); });
	
	
	
	// Array with Images
	var images = new Array();
    images[0] = "images/ads/sub_kyiv.jpg";
    images[1] = "images/ads/sub_od.jpg";
	
	
	
	// Array with links
	var url = new Array();
    url[0] = "https://www.facebook.com/events/150756798928628/";  //kyiv
    url[1] = "https://www.facebook.com/events/165143454205556/";  //odess
   
   
    setInterval(changeMyImage, 8000);
    var x=0;
	

	
	
    function changeMyImage()
    {
		
        //$(".ads img").attr('src', images[x]); //assign a picture
		  $("#link").attr('href', url[x]);  //assign href
		
		// change img with animation
		$(".ads img").stop().fadeOut("slow",function(){ 
		    $(this).attr('src', images[x]);
						}).fadeIn(1000);
	    // END change img with animation
		
		
        x++;
		
        if (images.length == x) {
            x = 0; 
        }
	}
    // **                                                                                  **
    // **************************************************************************************
    // **************************************************************************************	
	
	
	
	
	
	
	
	

	
	
	

// END READY
});





