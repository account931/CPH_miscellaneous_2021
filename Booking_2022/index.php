<?php 
session_start();
include 'Classes/My_Booking/BookingProcess.php';//
?>

<!doctype html>
<!--------------------------------Bootstrap  Main variant ------------------------------------------>
  <html lang="en-US">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="Content-Type" content="text/html">
      <meta name="description" content="Crypto-js" />
      <meta name="keywords" content="Crypto-js, encrypt Crypto-js, decrypt ">
      <title>My_Booking 2022</title>
  
      <!--Favicon-->
      <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- Fa fa lib -->

      <link rel="stylesheet" type="text/css" media="all" href="css/booking_2022.css">
	  <script src="js/booking_2022.js"></script><!--  Core  JS-->

	  <!--  use SweetAlert for Bootstrap  -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
      <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet"/>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js"></script>
      <!--use SweetAlert for Bootstrap-->
	  
      
	  <meta name="viewport" content="width=device-width" />

    </head>

    <body>
	 
	 
	 
        <?php
		    use Classes\My_Booking\BookingProcess; //namespace is must-have, otherwise class not found
			$model       = new BookingProcess();
			$todayIs     = $model->getCurrentDay();                   //gets today date, i.e "27-03-2022"
			
			//if isset $_GET['date-picker'], happens when user clicked "Change date"
			if(isset($_GET['date-picker']) && $_GET['date-picker'] != null  ){
			    $r = explode("-",$_GET['date-picker']); //$_GET['date-picker']) string comes reversed, i.e 2022-04-07, return it to "27-03-2022"
                $todayIs = $r[2] . "-" . $r[1]. "-" . $r[0];				
			}
			
			//$urlGetDate  = (isset($_GET['date-picker']) && $_GET['date-picker'] != null  ) ? $_GET['date-picker'] : $todayIs ;
			$sqlResult   = $model->getSQLDataForDate($todayIs);   //gets emulated SQL quiery result, type: array of objects
			$schedule    = $model->createSchedule($sqlResult);        //build Schedule with time slots
			
		?>
	 
	 
        <!------ Header -------->
        <div id="headX" class="jumbotron text-center gradient head-style" style ='background:blue;'> <!--#2ba6cb;-->
            <h1 id="h1Text"> <span id="textChange"> Booking 2022</span>   </h1>
            <p class="header_p"> 
			    Quick booking variant, no real DB is engaged, just emulated SQL DB query results </br>
			    <?= "today is " . $model->getCurrentDay(); ?>
			    <i class="fa fa-gift" style="font-size:36px"></i></p> 
                <!--<p class="language"><a href="../">Ru</a></p>-->
		</div>		
		<!------ END Header -------->		
		



		<!---------- Modal window ------------------->
		<div class="col-sm-12 col-xs-12">
		    
            <!-- The Modal -->
            <div class="modal fade" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Book here</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <p> You selected time:  </p>
							<p> <?=$todayIs; ?> </p>
							<p id="selected-time" class="shadowX time-p"> </p>
							
							<!-- Form -->
					        <div class="col-sm-12 col-xs-12">
					            <hr>
						        <form class="form-horizontal" method="post" action="#" enctype="multipart/form-data">
								
						            <input type="hidden"  name="selected-time-slot" id="selectedTimeSlot"/>   <!-- val() via jQ -->
								    
									<div class="form-group">
									    <label for="product-name" class="col-md-4 control-label">Name</label>
									    <div class="col-md-6">
									        <input type="text"  name="user-name" placeholder="name" class="form-control"/> 
									    </div>
									</div>
									
									<div class="form-group">
									    <label for="product-name" class="col-md-4 control-label">Eamil</label>
									    <div class="col-md-6">
									        <input type="text"  name="user-email" placeholder="email" class="form-control"/> 
									    </div>
									</div>
									
									
                                    <div class="col-md-6">
						                <button type="submit" onclick="alert('N/A');return false;" id="submBtn" class="btn btn-large btn-primary"> Confirm(N/A)</button>
									</div>
									
						        </form>
					        </div>	
					        <!-- End  Form -->
					
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>

                    </div>
                </div>
            </div>
				
		
        <!---------- End Modal window --------------->		
				

				
				
	   








        <div class="item contact padding-top-0 padding-bottom-0" id="contact1">
            <div class="wrapper grey">
    	        <div class="container">
                    <hr>
             
			        <!-- Build schedule list with time slots here  -->
						<div class="col-sm-12 col-xs-12">
						    <div class="col-sm-8 col-xs-12">
							    <h3> Slots for <?= $todayIs ?> </h3>
								
								
								<!-- DatePicker form, to change the date -->
								<form class="form-horizontal" method="get" action="" enctype="multipart/form-data">
								    <input type="date"  name="date-picker" id="datePicker" lang="en-US" />
									<button type="submit" id="changeDateBtn" class="btn btn-danger" data-dismiss="modal">Change date</button>
									<a href=" <?= parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH)?>"> Reset date </a> <!-- return base url without get -->
								</form>
								<!-- End DatePicker form, to change the date  -->
								
								
								<!-- Button to Open the Modal -->
								<div class="col-sm-12 col-xs-12 height-x">			
                                    <button type="button" class="btn btn-primary button-mine" data-toggle="modal" data-target="#myModal" style="margin-left:1%;">
                                        Book it
                                    </button>
                                 </div>
								 <!-- Button to Open the Modal -->
			
                                <?php
							    //echo '<pre>';
							    //var_dump($sqlResult);
                                //echo '</pre>';	
                                
                                echo $schedule;	//time slots grid list
                          
							
							?>
								
							</div>
						</div>
					<!-- End Build schedule list with time slots here -->
			 
			 

			 

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



