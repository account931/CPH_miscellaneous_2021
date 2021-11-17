<?php


const DEFAULT_ROLES = array('R', 'L', 'U', 'D' );


function getMaxDeletions($s) {
	$counterPairs     = array(array('R', 'L' ), array('U', 'D' ) );
	$allowedCharacter = false;
	$tempArray        = array();
	$clonePieces      = array();
	$countDeletion     = 0;
	$pairPosition;
	
	if(!is_string($s)){
		return "Argument must be string";
	} 
	
	$pieces = str_split($s);
	$clonePieces = $pieces ;
		
	foreach($pieces as $one){
		if(!in_array($one, DEFAULT_ROLES)){
			$allowedCharacter = false;
			break;
	    } else {
			$allowedCharacter = true;
		}
	}
	if($allowedCharacter == false){
		return "Not allowed character";
	} 
	
	//main 
	
	foreach($pieces as $oneItem){
		
		
		for($i = 0; $i < count($counterPairs); $i++){
			$position = array_search($oneItem, $counterPairs[$i]); //current arg item position 
			
			if(!is_bool($position)){
				
	            if(!in_array($oneItem, $tempArray)){
			        array_push($tempArray, $oneItem);
		        } 
		
			
				if($position == 1){
				    $pairPosition = 0;	
				} else {
					$pairPosition = 1;
				}
				
			    $findPair = $counterPairs[$i][$pairPosition]; //find the counter pair
				
				if(in_array($findPair, $clonePieces)){ //if  D in $pieces
					$deleteOne = array_search($oneItem,  $clonePieces );
					$deleteTwo = array_search($findPair, $clonePieces );
					array_splice($clonePieces , $deleteOne, 1);
					array_splice($clonePieces , $deleteTwo, 1);
					
					$countDeletion++;
					continue;
				}
			} 
			
			
            
		} 
		
	
	}
	$result = count($pieces) - count($clonePieces);
	return $result ;
	
}


$result = getMaxDeletions("UDUDUDRDRL");
echo $result;
?>