<?php
session_start();
?>
<!DOCTYPE html>
    <html>
        <head>
            <title>Bool randomizer</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">  
            <meta http-equiv="Content-Type" content="text/html">
            <meta name="description" content="Bool randomizer" />  <!-- Create an on-line chart-->
            <meta name="keywords" content="Bool randomizer">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        </head>
		
        <body>
		    

          
            <div id="headX" class="col-sm-12 col-xs-12"> <!--#2ba6cb;-->
			    <h2> Bool randomizer </h2>
				<p>Task: there is a boolean ranomizer, you have to refactor it the way it returns not rand boolean but rand 3 digits </p>
                
	        </div>
        
		    <!-- Result Div -->
			<div class="col-sm-12 col-xs-12" style="height:2em;"></div>
			
            <div class="alert alert-success col-sm-12 col-xs-12"> <!--#2ba6cb;-->
			
			<?php
			
			//function randomly returns true or false
			function randBoolean(){
				$randBoool  = (bool)rand(0, 1);
				$randBooolF = $randBoool == 1 ? "True" : "False";
				return $randBooolF;
			}
			
			
			//Bool randomizer refactored to return 3 random digits
			function randBooleanRefactored($min, $max){
				$randArray = array();
				
				$randBoool  = (bool)rand(0, 1);
				array_push($randArray, (int)$randBoool);
				//$randBooolF = $randBoool == 1 ? "True" : "False";
				
				while(count($randArray ) < 3 ){
				
				    $random = rand($min, $max);
				    if (!in_array($random, $randArray)){
					    array_push($randArray, $random);
				    }
				}
				return $randArray[0] . " " . $randArray[1] . " " . $randArray[2];
			}
			
			
			
			
			//function returns 3 random digits
			function randomThreeDigits($min, $max){
				$randArray = array();
				
				while(count($randArray ) < 3 ){
				
				    $random = rand($min, $max);
				    if (!in_array($random, $randArray)){
					    array_push($randArray, $random);
				    }
				}
				return $randArray ;
			}
			
			
			//----------------------------------------------------
			echo "<p>Just bool randomizer</p>";
            echo randBoolean();
			
			echo "<hr><p>Bool randomizer refactored to return 3 random digits</p>";
			echo randBooleanRefactored(0, 7);
			
			
			echo "<hr><p>Random 3 digits </p>";
            $result = randomThreeDigits(0, 4) ;
			//echo array
			foreach($result as $v){
				echo  $v . " ";
			}
            ?>
            </div>
            <!-- End Result Div -->
			
	
        </body>
		    
    </html>






