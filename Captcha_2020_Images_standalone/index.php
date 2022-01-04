<?php 
session_start();
include 'Classes/Captcha/Img_Captcha_2022.php';//
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
		    use Classes\Captcha\Img_Captcha_2022; //namespace is must-have, otherwise class not found
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
		    $_SESSION["correctCaptchaSet"] = json_encode($correctCaptchaImages);
		
		    //Gets the length of check category, i.e how many relevant pictures user has to select to pass the captcha..........
		    $checkCategoryLength = count($correctCaptchaImages);

		
		?>
	 
	 

        <div id="headX" class="jumbotron text-center gradient head-style" style ='background:orange;'> <!--#2ba6cb;-->
            <h1 id="h1Text"> <span id="textChange"> Captcha images</span>   </h1>
            <p class="header_p"> 
			    Partial/incomplete test code of Captcha carved from "L****-Y**_Comment_Vote_widgets". 
			    
			    <i class="fa fa-gift" style="font-size:36px"></i></p> 
                <!--<p class="language"><a href="../">Ru</a></p>-->
		</div>		
				
		



		<!---------- Modal window ------------------->
		<div class="col-sm-12 col-xs-12">
		        
		    <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="margin-left:11%;">
                    See a hint
            </button>

            <!-- The Modal -->
            <div class="modal fade" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Hint is here</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <img src="images/captcha_disclaimer.png"  class="img-responsive my-cph" alt="a"/>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>

                    </div>
                </div>
            </div>
				
		</div>	
        <!---------- End Modal window --------------->		
				

				
				
	   








        <div class="item contact padding-top-0 padding-bottom-0" id="contact1">
            <div class="wrapper grey">
    	        <div class="container">

             
			        <!-- Build captcha based on 9 random images -->
						<div class="col-sm-12 col-xs-12">
						    <div class="col-sm-8 col-xs-12">
							
							    <div class="captcha-header">
						            <h3> Select all images containing <b><span style="-webkit-text-stroke: 1.2px black; font-size:1.3em;"> <?= $checkCategory ?> </span></b></h3>
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
			 
			 
			 
			 
			        <!-- Form -->
					<div class="col-sm-12 col-xs-12">
					    <hr>
						<form class="form-horizontal" method="post" action="pages/check_captcha.php" enctype="multipart/form-data">
						    <input type="hidden"  name="hidden-captcha-array" id="captcha-array"/>          <!-- captcha JSON array, attached via JS, see /js/img_captcha_2022.js -->
						    <button type="submit" id="submBtn" class="btn btn-large btn-primary"> Submit captcha</button>
						</form>
					</div>	
					<!-- End  Form -->
			 
			 
			 
			 

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



