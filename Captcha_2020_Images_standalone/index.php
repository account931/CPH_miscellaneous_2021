<?php 

include 'Classes/Captcha/Img_Captcha_2022.php';//uses autoload instead of manual includin each class-> Error if it is included in 2 files=only1 is accepted 
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

      <link rel="stylesheet" type="text/css" media="all" href="css/img_captcha_2022.css">
	  <script src="js/img_captcha_2022.js"></script><!--  Core  JS-->

	  <!--  use SweetAlert for Bootstrap  -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
      <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet"/>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js"></script>
      <!--use SweetAlert for Bootstrap-->
	  
      
	  <meta name="viewport" content="width=device-width" />

    </head>

    <body>
	 
	 
	 
        <?php
		    use Classes\Captcha\Img_Captcha_2022;
			$model = new Img_Captcha_2022();
			
			$readImg = $model->readSubfoldersDirs('images/Captcha_2022'); //returns array("Cats"  => array("cat1.jpg", "cat2.jpeg", "cat3.jpg"), "Cars"  => array("car1.jpg", "car2.jpeg", "car3.jpg"));
            //dd($readImg);
        

            $allImages = $readImg; 
		    array_pop($allImages); //Mega Lame Fix, re-write it (deletes the last array element, that happens to be bizzare "")
		    //var_dump($allImages); //final check
			
			$categoryLength = count($allImages) - 1; //quantity of categories
		
		    //gets 9 random images, i.e ("Cats/cat1.jpg", "Boats/boat2.jpg", "Cars/car3.jpg")
		    $randomNine = $model->randomNineDigits(0, $categoryLength, $allImages); //gets 9 random images, i.e ("Cats/cat1.jpg", "Boats/boat2.jpg", "Cars/car3.jpg")
		    
			//Choose/select the check category (images categories user has to select)
			$checkCategory = explode("/", $randomNine[0])[0]; //e.g gets "Cars". $randomNine[0] is a 1st elem in $randomNine, e.g "Cars/car1.jpeg", so we split it and take 1st el
		
		
	
		    //Function to get correct captcha images, i.e user has to choose to pass the captcha
		    $correctCaptchaImages = $model->getCorrectImagesSelection($allImages, $randomNine, $checkCategory); 
		    //dd($correctCaptchaImages);
		    //NOT PASSING IT IN VIEW, SAVE TO SESSION .......................
		
		
		    //Gets the length of check category, i.e how many relevant pictures user has to select to pass the captcha..........
		    $checkCategoryLength = count($correctCaptchaImages);

		
		?>
	 
	 

        <div id="headX" class="jumbotron text-center gradient head-style" style =''> <!--#2ba6cb;-->
            <h1 id="h1Text"> <span id="textChange"> Captch images</span>   </h1>
            <p class="header_p">Captcha images <i class="fa fa-gift" style="font-size:36px"></i></p> 
            <!--<p class="language"><a href="../">Ru</a></p>-->
	    </div>



        <div class="item contact padding-top-0 padding-bottom-0" id="contact1">
            <div class="wrapper grey">
    	        <div class="container">

             
			        <!-- Build captcha based on 9 random images -->
						<div class="col-sm-12 col-xs-12">
						    <div class="col-sm-8 col-xs-12">
							
							    <div class="captcha-header">
						            <h3> Select all images containing <b> <?= $checkCategory ?> </b>.</h3>
							        <p> Hint: there are <b> <?=$checkCategoryLength ?> </b> of them. </b> </p>
								</div>
								
								
						        <?php 
						        foreach($randomNine as $randomOne){
								?>
						        <div class="col-sm-4 col-xs-4 captcha-img">
								    <center>
							        <img src="images/Captcha_2022/<?=$randomOne?>"  class="img-responsive my-cph" alt="a"/> <!-- captcha image -->
                                    <i class="fa fa-check watermark" style="font-size:44px; color:black;"></i>	             <!-- watermark check -->								
									</center>
							    </div>
								
								
								    
								
								
						        <?php 
								}// @endforeach
								?>
						       
							</div>
						</div>
					<!-- End Build captcha based on 9 random images -->
			 
			 

    	        </div><!-- /.container -->
    		</div><!-- /.wrapper -->

            <div style="height:177px;">
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



