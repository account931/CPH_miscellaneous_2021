$(document).ready(function(){
	
	let maxSize = 9;
	let gameHits = new Array(maxSize);
	
    //swal("OK", "Start game", "success");
    drawGameField(true); //draw gane fields onLoad
 
	
	
	
	
	/*
    |--------------------------------------------------------------------------
    |  When User Clicks cell, User "X"
    |--------------------------------------------------------------------------
    |
    |
    */
	 $(document).on("click", '.game-cell', function() {   // this  click  is  used  to   react  to  newly generated cicles;
	    $id = $(this).attr('id');
		//alert($id);
		
		//prevent user clicks already taken cell
		if(gameHits[$id] != undefined){
			swal("Error detected", "Can't take not empty cell", "error");
			return false;
		}
		gameHits[$id] = "x"; //add to main array
		drawGameField(false); //renew with no animation
		if(checkGame() == true){
			return false; //to prevent computedAnswer fire if the winner is present
		}
		computedAnswer();
	});
	
	
	
 
	/*
    |--------------------------------------------------------------------------
    |  Draw game filed, uses array gameHits to display "x"/"0"
    |--------------------------------------------------------------------------
    |
    |
    */
    function drawGameField(speedFlag){
		var horizontal = 3;
		var vertical   = 3;
		var idIterator = 0;
		var result = "<table class='tableX'>"; 
		
		if(speedFlag == true){
			var animSpeed = 2000;
		} else {
			var animSpeed = 0;
		}
		
		for(var i = 0; i < horizontal; i++){
			result+= "<tr>";
			
			for(var j = 0; j < vertical; j++){
				var cellText = (gameHits[idIterator] == undefined ) ? "" : gameHits[idIterator];
			    result+= "<td class='game-cell' id='" + idIterator + "'>" +  cellText + "</td>";
                idIterator++;				
			}
			result+= "</tr>";
			
		}
		result+= "</table>"; 
		
		//with animation
		$("#game").stop().fadeOut(/*"slow"*/ animSpeed,function(){ 
		    $(this).html(result)
		}).fadeIn(animSpeed /*2000*/);
	}		
	

	
	
	
	/*
    |--------------------------------------------------------------------------
    | Computed answer, Bot Player answer
    |--------------------------------------------------------------------------
    |
    |
    */
	function computedAnswer(){
		
		//AI goes fisrt before random number 
		if (gameHits[0] == "x" && gameHits[1] == "x" && gameHits[2] == undefined) {
		    gameHits[2] = "0";	
			alert("AI engaged");
			
			drawGameField(false); //renew with no animation
		    checkGame();
			return true;
		}
		
		//generate random
		let numberRandom = getRandomInt(0, maxSize-1); //alert(numberRandom);
		if(gameHits[numberRandom] != undefined){ //if hit number was alredt doen re-random again
			computedAnswer();
	    } else {
			gameHits[numberRandom] = "0";
		}
		
		drawGameField(false); //renew with no animation
		checkGame();
		
	}
	
	
	
	//generate random number for bot player
	function getRandomInt(min, max) {
        min = Math.ceil(min);
        max = Math.floor(max);
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }

	
	
	
	
    /*
    |--------------------------------------------------------------------------
    | Check winner 
    |--------------------------------------------------------------------------
    |
    |
    */
	function checkGame(){
		if ( 
		    //horizontal check for "x" Player
		    (gameHits[0] == "x" && gameHits[1] == "x" && gameHits[2] == "x") || (gameHits[3] == "x" && gameHits[4] == "x" && gameHits[5] == "x") || (gameHits[6] == "x" && gameHits[7] == "x" && gameHits[8] == "x") 
		     //vertical check 
		     || (gameHits[0] == "x" && gameHits[3] == "x" && gameHits[6] == "x") || (gameHits[1] == "x" && gameHits[4] == "x" && gameHits[7] == "x") || (gameHits[2] == "x" && gameHits[5] == "x" && gameHits[8] == "x")
		     //diagonal
		     || (gameHits[0] == "x" && gameHits[4] == "x" && gameHits[8] == "x") || (gameHits[2] == "x" && gameHits[4] == "x" && gameHits[6] == "x")){
			  
			swal("Winner", "X won", "success");
			gameHits = new Array(maxSize); //clear array
			drawGameField(true); //redraw new game field
			return true;
		} else {
			return false;
		}
	}
	
	
	

// END READY
});




