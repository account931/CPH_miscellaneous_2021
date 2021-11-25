<?php
//Task: some game (game field like tic tac toe), you can move arrow/item Right, Left, Up, Down
//You have to implement function getMaxDeletions($s), arg $s must be a string and should contain only allowed chars => const DEFAULT_ROLES = array('R', 'L', 'U', 'D' );
//Fucntion have to calculate amount of unnecessary movements those can be skipped, e.g User enetered "UDL", i.e "Up, Down,Left" => "Up, Down" are unnecessary movements to be deleted as they will moveUser to the same filed, so "Up, Down" must be deleted, so funct must return 2

const DEFAULT_ROLES = array('R', 'L', 'U', 'D' ); //allowed chars 


function getMaxDeletions($s) {
	
	$counterPairs     = array(array('R', 'L' ), array('U', 'D' ) ); //for comparison
	$allowedCharacter = false; //for checking if arg contains allowed characters only 
	$tempArray        = array();
	$clonePieces      = array(); //will contain temp array, copy of $pieces  
	$countDeletion     = 0; //can be used as return function value (alternative variant). See Line 47 for amendments
	$pairPosition;
	
	
	//Check if arg $s is a string
	if(!is_string($s)){
		throw new Exception("Argument must be string");
		//return "Argument must be string";
	} 
	
	
	$pieces = str_split($s); //split arg string to an array $pieces, i.e ["U", "R", "D"]
	$clonePieces = $pieces ; //copy to a temp array
	
    //Check if arg string $s contains only allowed character fom const DEFAULT_ROLES
	foreach($pieces as $one){
		if(!in_array($one, DEFAULT_ROLES)){
			$allowedCharacter = false;
			break;
	    } else {
			$allowedCharacter = true;
		}
	}
	if($allowedCharacter == false){
		throw new Exception("Not allowed character");
		//return "Not allowed character";
	} 
	//End Check if arg string $s contains only allowed character fom const DEFAULT_ROLES


	
	
	//main/core functionality, calc the unnecessary movements
	
	//foreach($pieces as $oneItem){
	for($j = 0; $j < count($pieces); $j++){  //use here {$clonePieces} not {$pieces} to use {$countDeletion} as a return value (alternative variant)
		
		
		for($i = 0; $i < count($counterPairs); $i++){
			
			$position = array_search($pieces[$j], $counterPairs[$i]); //find position of  a current arg item, e.g "U" in $counterPairs, can be 1 or 0 if found or FALSE if not found
			
			//if not bool, i.e if $position is FALSE it means it is not found
			if(!is_bool($position)){
				
	            if(!in_array($pieces[$j], $tempArray)){
			        array_push($tempArray, $pieces[$j]);
		        } 
		
			    //if position of current arg item (e.g "U") in $counterPairs is 1, so his counterPartner position is 0 and vice versa
				if($position == 1){
				    $pairPosition = 0;	
				} else {
					$pairPosition = 1;
				}
				
			    $findPair = $counterPairs[$i][$pairPosition]; //find the value of counter pair (counterPartner), e.g if a current arg item, e.g "U", $findPair will be "D"  
				
				if(in_array($findPair, $clonePieces)){ //if  "D" in $clonePieces (clone of $pieces), i.e array contains both "U" and "D" which is unnecessary movement
					
					$deleteOne = array_search($pieces[$j],  $clonePieces ); //find position of "U" (current arg item) in $clonePieces (to delete it in next step)
					$deleteTwo = array_search($findPair, $clonePieces );    //find position of "D" in $clonePieces (to delete it in next step) 
					
					array_splice($clonePieces , $deleteOne, 1); //delete it "U" from $clonePieces
					$countDeletion++; //not used?? => can be used as return function value (alternative variant), in this case in Line 47 use not {$pieces} but  for($j = 0; $j < count($clonePieces ); $j++){ 
					
					array_splice($clonePieces , $deleteTwo, 1); //delete it "D" from $clonePieces
					$countDeletion++; //not used?? => can be used as return function value (alternative variant), in this case in Line 47 use not {$pieces} but  for($j = 0; $j < count($clonePieces );
					
					++$j; //skip current iteration or it will procuded incorrect result
				}
			} 
			
			
            
		} 
		
	
	}
	$result = count($pieces) - count($clonePieces); //initial arg array $pieces ["U", "R", "D"] minus $clonePieces [ "R"] (where u have deleted all unnecessary movement )
	//return $countDeletion; //can use $countDeletion as a return function value (alternative variant), just in this case in Line 47 use not {$pieces} but  for($j = 0; $j < count($clonePieces ); 
	return $result;
	
	
}

//run the function itself in a try catch
try {
  $result = getMaxDeletions("RUDRL");
} catch(Exception $e) {
  echo 'Message: getMaxDeletions fucntion was stopped due to error => <b> ' .$e->getMessage() . '</b>';
}


echo "Function returns " . $result; 
//Test values
//"RRRL"   must return 2  
//"URDL"   must return 2 
//"RUDRL"  must return 4 
//"RRR"    must return 0
//"RUDRLJ" must return exception "Not allowed character"
// 88      must return exception "Argument must be string"
?>