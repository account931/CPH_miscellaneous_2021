<!doctype html>
<!--------------------------------Bootstrap  Main variant ------------------------------------------>
    <html lang="en-US">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="Content-Type" content="text/html">
            <meta name="description" content="Tic tac toe JS" />
            <meta name="keywords" content="Tic tac toe JS ">
            <title>Tic tac toe JS</title>
  
            <!--Favicon-->
            <link rel="shortcut icon" href="images/favicon_loho.ico" type="image/x-icon">

            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
			
			<!-- Sweet Alert_2 --> <!-- Must go first, before Sweet Alert_1 in order not to conflict (Sweet Alert_2 will work, but Sweet Alert_1 won't) --> 
			<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
			
			<!-- Sweet Alert_1 --> 
	        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css"> <!-- Sweet Alert_1 CSS -->
            <script src='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js'></script>     <!--Sweet Alert_1 JS   -->  
            

			
			<!-- Fa Font Awesome 5 -->
			<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

            <link rel="stylesheet" type="text/css" media="all" href="css/myRandomCss.css">
            <script src="js/random.js"></script><!--  Core Random JS-->
	        <script src="additional_js/ads.js"></script><!--  Change ads JS-->

	        <meta name="viewport" content="width=device-width" />

        </head>

        <body>

            <div id="headX" class="jumbotron text-center gradient" style =' background-color: ;'> <!--#2ba6cb;-->
                <h1 id="h1Text"> <span id="textChange"> Tic tac toe JS</span>   </h1>
                <p class="header_p">Sweet Alert 2, Awesome 5  <!--generates random lists, ramdomizes integers, etc--> 
				    <span class="glyphicon glyphicon-qrcode"></span>
					<i class='fas fa-cat' style='font-size:36px'></i>      <!-- Fa Font Awesome 5 --> 
					<i class='fas fa-seedling' style='font-size:36px'></i> <!-- Fa Font Awesome 5 -->

                </p>
		        <p class="language"><a href="/eng">ENG</a></p>
	        </div>



            <div class="item contact padding-top-0 padding-bottom-0" id="contact1">
                <div class="wrapper grey">
    	            <div class="container">
					
					    <!-- Flash message by BS, hidden by defaul. Dispalay that AI was engaged -->
						<div class="flash-div">
					        <div class="alert alert-danger alert-dismissible my-hidden"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Info! </strong> AI was engaged.</div>
						</div>
						
						<!-- Game field goes here by JS -->
                        <div id="game"></div>
             
    	            </div><!-- /.container -->			
                </div><!-- /.wrapper -->

                <div style="height:77px;"></div>


    	
    	     </div><!-- /.item -->
		
		
		
		
		    <!---------- Footer ---------->     
		    <div class="footer">
				Contact: <strong>dimmm931@gmail.com</strong><br>
				<?php  echo date("Y"); ?>
			</div>
		    <!---------- END Footer --------->  
		
		
		
		
		    <!-- ##### -- Advertise -- #### -->
		   <div class="ads ">
		        <a target="_blank" href="https://www.facebook.com/events/165143454205556/" id="link">
				    <img src="images/ads/sub_od.jpg" alt="Submerged"/>  
				</a>	
			</div>
		    <!-- ##### -- END Advertise -- #### -->
		
		

    </body>
</html>




