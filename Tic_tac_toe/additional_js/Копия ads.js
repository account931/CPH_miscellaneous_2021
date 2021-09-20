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

	
	
	
	
	
	
	var images = new Array();
    images[0] = "images/ads/sub_kyiv.jpg";
    images[1] = "images/ads/sub_od.jpg";
   
    setTimeout(changeImageZ, 2000);
    var x=0;

    function changeImageZ()
    {
		imgCC = images[x]; alert (imgCC);
        $(".ads img").attr('src', imgCC);
        x++;
        if (images.length == x) {
            x = 0;
        }
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	//-----------------------------------------------------------------------
	
	
	 
	 
	 
	
	//alert (adsArray.submergeKyiv.imgPath);
	
	
	// **************************************************************************************
    // **************************************************************************************
    //                                                                                     ** 
	
	var timerId = setInterval(function() {
		
		//alert ("time");
		
		for (var key in adsArray) {
			 imgX = adsArray[key]['imgPath'];
			 urlX = adsArray[key]['urlPath'];
			 
			 //var setDelay = setTimeout(function() {
				  $(".ads img").attr('src', imgX);
			//}, 1000);
			
		}
  
    }, 88882000);
   
	//                                                                                     **
    // **************************************************************************************
    // **************************************************************************************
	
	
	
	
	
	
	function setTimeInterval() 
	{
        /* myVar = */  setInterval(changeImage, 4000);
    }
    //                                                                                     **
    // **************************************************************************************
    // **************************************************************************************
	

	
	
	
	
	// **************************************************************************************
    // **************************************************************************************
    //                                                                                     ** 
	
    function changeImage()
	{
	  
	    
		//-------
		Object.keys(adsArray).forEach(function(key) {
			
            //alert(key, adsArray[key]);
	        imgX = adsArray[key]['imgPath'];
			urlX = adsArray[key]['urlPath'];
			
			/*setTimeout(function() {
			$(".ads img").attr('src', imgX);
			}, 1000);*/
			
			setDelay(imgX, urlX);
        });
		//-
		
		
	    /*for (var key in adsArray) {
			 imgX = adsArray[key]['imgPath'];
			 urlX = adsArray[key]['urlPath'];
			 
			 setTimeout(function() {
				  $(".ads img").attr('src', imgX);
			}, 1000);
			
		}*/
		
	}
	//                                                                                     **
    // **************************************************************************************
    // **************************************************************************************
	
	
	
	
	function setDelay(img, url) {
		setTimeout(function(){
			 //alert (img);
             $(".ads img").attr('src', img);
        }, 3000);
	}
	
	
	
	
	

	 //setInterval(function () {changeImage();}, 2000);
	



	
	
	
	
	
	

// END READY
});





