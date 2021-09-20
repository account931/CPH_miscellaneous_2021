<?php
session_start();
?>
<!DOCTYPE html>
    <html>
        <head>
            <title>Minus function</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">  
            <meta http-equiv="Content-Type" content="text/html">
            <meta name="description" content="Minus function" />  <!-- Create an on-line chart-->
            <meta name="keywords" content="Minus function">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        </head>
		
        <body>
          
            <div id="headX" class="col-sm-12 col-xs-12"> <!--#2ba6cb;-->
			    <h2> Minus function </h2>
                <form action=""  method="get">
				    <?php
                    $rand = rand();
                    $_SESSION['rand'] = $rand;
                    ?>
                    <label for="amount">Amount:</label><br>
                    <input type="number" id="amount" name="amount" value="0"   class="form-control"><br>
                    <label for="limiter">Limiter:</label><br>
                    <input type="number" id="limiter" name="limiter" value="0" class="form-control"><br><br>
					
					<input type="hidden" value="<?php echo $rand; ?>" name="randcheck" />

                    <input type="submit" value="Submit" name="submit" class="btn">
                </form>
	        </div>
        
		    <!-- Result Div -->
			<div class="col-sm-12 col-xs-12" style="height:2em;"></div>
			
            <div class="alert alert-success col-sm-12 col-xs-12"> <!--#2ba6cb;-->
			
			<?php
			
			echo $_GET['randcheck'] . " " . $_SESSION['rand'];
			
			//if form is submitted
            if(isset($_GET['submit']) /*&& $_GET['randcheck']==$_SESSION['rand'] */){
			    echo minusAction($_GET['amount'], $_GET['limiter']);
                unset($_GET['submit']);	
				
                				
			}

			
            function minusAction($start, $breakePoint){
	            $tempo = $start;
				$i = 0;
				$text = "";
                
				if(!isset($start) or !isset($breakePoint)){
					return "<p>Limiter or amount is not set <p>";
				}
				
				if($start <= 0 or $breakePoint <= 0){
					return "<p> Amount or limiter can't be zero</p>";
				}
				
				if($start < $breakePoint){
					return "<p>Limiter can't be greater than amount<p>";
				}
				
                while($tempo >= $breakePoint) {
					$i++;
	                $n = $tempo - $breakePoint;
	                $text.= "<p>" . $tempo . " - " . $breakePoint . " = " . $n . "</p>";
	                $tempo = $n;
                }
				$iText = "<p> <button type='button' class='btn btn-primary'>" . $i . " iterations were performed </button></p>";
				$text = $iText . "" . $text;
				return $text;
            }


            //$start       = 600;
            //$breakePoint = 7;
            //minusAction($start, $breakePoint);


            ?>
            </div>
            <!-- End Result Div -->
			
	    <script>
		    if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
            }
		</script>
        </body>
    </html>






