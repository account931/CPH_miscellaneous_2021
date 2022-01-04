<?php
//Page to show if captcha was wrong
session_start();
//simple equivalent of csrf, prevent from user access redirected pages directly by URL
if(!isset($_SESSION["CaptchaWrong"]) && $_SESSION["CaptchaWrong"] != true){
	die("<h2>You have no access here. Your captcha has expired, <a href='../'> go solve another captcha.  </a></h2>");
}
?>

<!doctype html>
<!--------------------------------Bootstrap  Main variant ------------------------------------------>
  <html lang="en-US">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="Content-Type" content="text/html">
      <meta name="description" content="Crypto-js" />
      <meta name="keywords" content="Crypto-js, encrypt Crypto-js, decrypt ">
      <title>Captcha images</title>
  
      <!--Favicon-->
      <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- Fa fa lib -->

      <link rel="stylesheet" type="text/css" media="all" href="../css/img_captcha_2022.css">
	  

	  <!--  use SweetAlert for Bootstrap  -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
      <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet"/>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js"></script>
      <!--use SweetAlert for Bootstrap-->
	  
      
	  <meta name="viewport" content="width=device-width" />

    </head>

    <body>
	 
	 
	 
        
	 
	 

        <div id="headX" class="jumbotron text-center gradient head-style" style ='background:red;'> <!--#2ba6cb;-->
            <h1 id="h1Text"> <span id="textChange"> Captcha was wrong</span>   </h1>
            <p class="header_p"> 
			    You failed to solve the captcha correctly </p> 
			    <p><i class="fa fa-exclamation-triangle" style="font-size:96px"></i></p> 
                <!--<p class="language"><a href="../">Ru</a></p>-->
				<p><a style="color:white; font-size:0.6em;" href="../"> go to main page and try again </a> </p>
	    </div>




        <div class="item contact padding-top-0 padding-bottom-0" id="contact1">
            <div class="wrapper grey">
    	        <div class="container">

             
			        <!-- Build captcha based on 9 random images -->
						<div class="col-sm-12 col-xs-12">
						    <div class="col-sm-8 col-xs-12">
							
							   
								
								
						       
						       

								
							</div>
						</div>
					<!-- End Build captcha based on 9 random images -->
			 
			 
			 
			 
			     
			 
			 
			 

    	        </div><!-- /.container -->
    		</div><!-- /.wrapper -->

            <div style="height:477px;">
			</div>


    	</div><!-- /.item -->
		
		
		
		
		<!------- Footer ---------->     
				<div class="footer" style="flex: 0 0 auto;"> <!-- navbar-fixed-bottom -->
				    <center>
				    Contact: <strong>dimmm931@gmail.com</strong><br>
					<?php  echo date("Y"); ?>
					</center>
				</div>
		<!------- END Footer ------->

	   
	   

	   
    
    </body>
</html>


<?php
//simple equivalent of csrf, prevent from user access redirected pages directly by URL
unset($_SESSION["CaptchaWrong"]);
?>
