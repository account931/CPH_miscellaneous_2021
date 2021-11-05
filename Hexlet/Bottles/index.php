<?php
session_start();
?>
<!DOCTYPE html>
    <html>
        <head>
            <title>Bottles function</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">  
            <meta http-equiv="Content-Type" content="text/html">
            <meta name="description" content="Bottles function" />  <!-- Create an on-line chart-->
            <meta name="keywords" content="Bottles function">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!-- fa fa icon -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        </head>
		
        <body>
		    

          
            <div id="headX" class="col-sm-12 col-xs-12"> <!--#2ba6cb;-->
			    <h2> Bottles function </h2>
				<p> Task is: threre are Boxes with bottles (boxes include 2 bottles , 6, 19). Customer wants x bottles. What packsize and how many will u give him?
				
                <form action=""  method="get">
			
                    <label for="amount">Amount:</label><br>
                    <input type="number" id="amount" name="amount" value="0"   class="form-control"><br>
                    
                    <input type="submit" value="Submit" name="submit" class="btn">
                </form>
	        </div>
        
		    <!-- Result Div -->
			<div class="col-sm-12 col-xs-12" style="height:2em;"></div>
			
            <div class="alert alert-success col-sm-12 col-xs-12"> <!--#2ba6cb;-->
			
			<?php
			

			
			define("SMALL_PACK", 2);
			define("MIDDL_PACK", 6);
			const LARGE_PACK = 19 ;
			
			
            function bottlesCalc($quant){
				//global LARGE_PACK;
				
				$quant = (int)$quant;
				
				if($quant <= 0){
					return "Can not be zero";
				}
				
				//if bottles more or equal LARGE_PACK //19
				if($quant >= LARGE_PACK){
					$neededBoxes = floor($quant/LARGE_PACK); //floor to round int
					$result      = "<p class='alert alert-info'> You need <b>" . $neededBoxes .  " of LARGE_PACK(x" . LARGE_PACK . ")</b>"; //You neede x of LARGE_PACK(x19)
					$change      = $quant - (LARGE_PACK * $neededBoxes) . " separated bottles <i class='fa fa-flask' style='font-size:30px'></i></p>";
					
					//alternative calc for Middle pack(x6)
					$alternative = "<p class='alert alert-danger'> Or alternatively you can use " . floor($quant/MIDDL_PACK) . " of MIDDL_PACK(x" . MIDDL_PACK . ")  + "  .  ($quant - (floor($quant/MIDDL_PACK)) * MIDDL_PACK )  . " separated bottles </p>";

                    //alternative calc for Small pack(x2)
					$alternative.= "<p class='alert alert-danger'> Or alternatively you can use " . floor($quant/SMALL_PACK) . " of SMALL_PACK(x" . SMALL_PACK . ")  +  "  .  ($quant - (floor($quant/SMALL_PACK)) * SMALL_PACK )  . " separated bottles </p>";



					return $result . " + " . $change . " " . $alternative;
				}
				
				
				//if bottles more or equal MIDDL_PACK //6
				if($quant >= MIDDL_PACK){
					$neededBoxes = floor($quant/MIDDL_PACK); //floor to round int
					$result      = "<p class='alert alert-info'>You need <b>" . $neededBoxes .  " of MIDDL_PACK(x" . MIDDL_PACK . ")</b>";
					$change      = $quant - (MIDDL_PACK * $neededBoxes) . " separated bottles <i class='fa fa-flask' style='font-size:30px'></i></p>";
					
					//alternative calc for Large pack
					$alternative = "<p class='alert alert-danger'> Or alternatively you can use 1 of LARGE_PACK(x" . LARGE_PACK . ")  - "  .  (LARGE_PACK - $quant)  . " separated bottles </p>";

                    //alternative calc for Small pack
					$alternative.= "<p class='alert alert-danger'> Or alternatively you can use " . floor($quant/SMALL_PACK) . " of SMALL_PACK(x" . SMALL_PACK . ")  +  "  .  ($quant - (floor($quant/SMALL_PACK)) * SMALL_PACK )  . " separated bottles </p>";


					return $result . " + " . $change . " " . $alternative;
				}
				
				
				//if bottles less than 6 (i.e use Small pack)
				if($quant < MIDDL_PACK){
					$neededBoxes = floor($quant/SMALL_PACK); //floor to round int
					$result      = "<p class='alert alert-info'> You need <b>" . $neededBoxes .  " of SMALL_PACK(x" . SMALL_PACK . ")</b>";
					$change      = $quant - (SMALL_PACK * $neededBoxes) . " separated bottles <i class='fa fa-flask' style='font-size:30px'></i></p>";
					
					//alternative calc for middle pack
					//$alternative = "<p> Or alternatively you can use " . floor(MIDDL_PACK/$quant) .  " of MIDDL_PACK(x" . MIDDL_PACK . ")  - "  .  (MIDDL_PACK - $quant)  . " separated bottles </p>";
                    $alternative = "<p class='alert alert-danger'> Or alternatively you can use 1 of MIDDL_PACK(x" . MIDDL_PACK . ")  - "  .  (MIDDL_PACK - $quant)  . " separated bottles </p>";


					return $result . " + " . $change . " " . $alternative;
				}
	             
            }





            
			
			echo $_GET['randcheck'] . " " . $_SESSION['rand'];
			
			//if form is submitted
            if(isset($_GET['submit']) && $_GET['amount'] != "" /*&& $_GET['randcheck']==$_SESSION['rand'] */){
				echo "<p> Get is  " . $_GET['amount'] .  " / Customer requested  <b>" . $_GET['amount'] .  " bottles </b></p>";
				echo bottlesCalc($_GET['amount']);
				
			}

            ?>
            </div>
            <!-- End Result Div -->
			
	
        </body>
		
    </html>






