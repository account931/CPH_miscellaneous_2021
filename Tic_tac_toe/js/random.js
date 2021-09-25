$(document).ready(function(){
	
	let maxSize = 9;
	let gameHits = new Array(maxSize); //array contains users hits, both user and bot, i.e [x, x, 0, x, x....]
	let winCombination = [ [0, 1, 2], [3, 4, 5], [6, 7, 8], [0, 3, 6], [1, 4, 7], [2, 5, 8], [0, 4, 8], [2, 4, 6 ] ]; //win combinations: horiz, vertical, diagonal
	
    //swal("OK", "Start game", "success");
	
    drawGameField(true); //draw gane fields onLoad
    //$("#game").addClass( "classnameAnim" );
	

	
	
	/*
    |--------------------------------------------------------------------------
    |  When User Clicks cell, User "X"
    |--------------------------------------------------------------------------
    |
    |
    */
	 $(document).on("click", '.game-cell', function() {   // this  click  is  used  to   react  to  newly generated cicles;
	    id = $(this).attr('id');
		//alert(id);
		
		//document.getElementById('5').className = 'classname';
		//$( "#gameTable").addClass( "classnameAnim" );
		
		//prevent user clicks already taken cell
		if(gameHits[id] != undefined){
			swal("Error detected", "Can't take not empty cell", "error");
			return false;
		}
		
		gameHits[id] = "x"; //add to main array
		console.log("my " + gameHits);
		drawGameField(false); //renew with no animation
		if(checkGame() == true){
			return false; //to prevent computedAnswer fire if the winner is present
		}
		computedAnswer();
		console.log("bot "+ gameHits);
	});
	
	
	
 
	/*
    |--------------------------------------------------------------------------
    |  Draw/build game filed, uses array gameHits to display "x"/"0"
    |--------------------------------------------------------------------------
    |
    |
    */
    function drawGameField(speedFlag){ //alert("draw " + gameHits);
		var horizontal = 3;
		var vertical   = 3;
		var idIterator = 0;
		var result = "<table class='tableX' id='gameTable'>"; 
		
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
		
		let delayTime = 100; //delay time 
		
		//AI goes fisrt before random number assignment (if conditions are met) ------------
		
		//if first horizont line == [x, x, undefined]
		if (gameHits[0] == "x" && gameHits[1] == "x" && gameHits[2] == undefined) {
		    AI_engage_subfunction(2, "0");   //arrayIndex, cellValue(always "0")
			return true;
		}
		
		//if first horizont line == [undefined, x, x]
		if (gameHits[1] == "x" && gameHits[2] == "x" && gameHits[0] == undefined) {
		    AI_engage_subfunction(0, "0");  //arrayIndex, cellValue(always "0")
            return true;			
		}
		
		//if 2nd horizont line == [x, x, undefined]
		if (gameHits[3] == "x" && gameHits[4] == "x" && gameHits[5] == undefined) {
		    AI_engage_subfunction(5, "0");  //arrayIndex, cellValue(always "0") 
			return true;
		}
		// End AI  -------------------------------------------------------------------------
		
		
		
		
		
		//generate random //Working!!!
		/*
		let numberRandom = getRandomInt(0, maxSize-1); //alert(numberRandom);
		if(gameHits[numberRandom] != undefined){ //if hit number was already taken, do re-random again
			computedAnswer(); 
			return false; //fix
	    } else {
			gameHits[numberRandom] = "0";
		}
		*/
		
		
		//Random variant with do while
		let numberRandom;
		do {
			numberRandom = getRandomInt(0, maxSize-1);
		} while(
			gameHits[numberRandom] != undefined	//check if random number array elem has not been taken 
		)
		gameHits[numberRandom] = "0";
		
		//
		
		//computed answer with delay
		
		setTimeout(() => {
			drawGameField(false); //renew with no animation
		}, delayTime);
		
		//drawGameField(false); //renew with no animation
        
		
		//checkGame(); 
		
		if(checkGame() == true){
			return false; //to prevent computedAnswer fire if the winner is present
		}
		
		
	}
	
	
	
	//generate random number for bot player
	function getRandomInt(min, max) {
        min = Math.ceil(min);
        max = Math.floor(max);
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }

	
	
	
	
	/*
    |--------------------------------------------------------------------------
    | Subfunction, Used in computedAnswer(
    |--------------------------------------------------------------------------
    |
    |
    */
	function AI_engage_subfunction(arrayIndex, cellValue){
		
		let delayTime = 100; //delay time 
		
		gameHits[arrayIndex] = cellValue; //gameHits[2] = "0";	adds to specified array index (array gameHits) new value
	    //alert("AI engaged");
			
	    //flash message
	    $(".my-hidden"). show();
	    $(".my-hidden"). fadeOut(3400);	
		
		//Sweet alert 2 Toast -----
		const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: 'AI was engaged!!!'
        })
	    //Sweet alert 2 Toast ----
		

			
	    //computed answer with delay
	    setTimeout(() => {
			    drawGameField(false); //renew with no animation
		}, delayTime);
		checkGame();
	    //return true;
	 }
	
	
	
	
	
	/*
    |--------------------------------------------------------------------------
    | AnnounceWinner subfunction (used in checkGame(). 
	| Uses isConfirm for better UI (after the user/bot win, user clicks OK in swal and gamefield doesn't vanish immetiately, so user can see the results)
    |--------------------------------------------------------------------------
    |
    |
    */
	function AnnounceWinner(winneText){
		//alert("Announce");
		 swal({
			html:true,
            title: winneText,
            text: "Great",
            type: "success",
            //showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: 'Good, start new game!',
            cancelButtonText: "No, cancel it!",
            closeOnConfirm: true,
            closeOnCancel: false,
			background: "yellow",
			imageSize: "50x50"
        },
        function(isConfirm){
            if (isConfirm){
				
				
		        //swal("Winner", "X won", "success");
			    gameHits = new Array(maxSize); //clear the array
			    setTimeout(() => {
			        drawGameField(true); //redraw new game field
		        }, 1400);
			
			    //return true;
				
            } 
        });
	}
	
	
	
	/*
    |--------------------------------------------------------------------------
    | drawRedLine for winner combination
    |--------------------------------------------------------------------------
    |
    |
    */
	function drawRedLine(){
		//alert("draw line");
		
        let result = getWinningArrayNumber(); //gets the index of winning combination sub-array of array winCombination, i.e return 2 
		//alert("result winCombination: " + result);
		
		setTimeout(() => { //Mega Fix, otherwise without this delay, if Bot wins, it colorRow() first and then as specified in computedAnswer() redrasw game field with delay erasing colored cells
			colorRow(winCombination[result][0], winCombination[result][1], winCombination[result][2]);	//Fix
		}, 1200);
	
		
		
		
		//alert(gameHits);
		
		//WOKING VARIANT, reassigned to getWinningArrayNumber() ---------------
		/*
		//if 1st horizont row row elems have the same/equal values (regadless if "x" or "0")
		if(gameHits[0] == gameHits[1] && gameHits[0] == gameHits[2] && gameHits[1] == gameHits[2] && gameHits[0] != undefined ){ //additional Fix, check if undefined, otherwise it could compare undefined cells and draw line in empty undefined cells
		   alert("match 1");
		   colorRow(0, 1, 2);
		}
		
		//if 2nd horizont row elems have the same/equal values (regadless if "x" or "0")
		if(gameHits[3] == gameHits[4] && gameHits[3] == gameHits[5] && gameHits[4] == gameHits[5] && gameHits[3] != undefined ){ alert("match");
		   colorRow(3, 4, 5);
		}
		
		//if 3rd horizont row elems have the same/equal values (regadless if "x" or "0")
		if(gameHits[6] == gameHits[7] && gameHits[6] == gameHits[8] && gameHits[7] == gameHits[8] && gameHits[6] != undefined ){ alert("match2");
		   colorRow(6, 7, 8);
		}
		
		//if 1st vertical row row elems have the same/equal values (regadless if "x" or "0")
		if(gameHits[0] == gameHits[3] && gameHits[0] == gameHits[6] && gameHits[3] == gameHits[6] && gameHits[0] != undefined ){
		   colorRow(0, 3, 6);
		}
		
		//if 2nd vertical row row elems have the same/equal values (regadless if "x" or "0")
		if(gameHits[1] == gameHits[4] && gameHits[1] == gameHits[7] && gameHits[4] == gameHits[7] && gameHits[1] != undefined){
		   colorRow(1, 4, 7);
		}
		
		
		//if 3rd vertical row row elems have the same/equal values (regadless if "x" or "0")
		if(gameHits[2] == gameHits[5] && gameHits[2] == gameHits[8] && gameHits[5] == gameHits[8] && gameHits[2] != undefined ){
		   colorRow(2, 5, 8);
		}
		
		//if 1st diagonal row row elems have the same/equal values (regadless if "x" or "0")
		if(gameHits[0] == gameHits[4] && gameHits[0] == gameHits[8] && gameHits[0] == gameHits[8] && gameHits[0] != undefined ){
		   colorRow(0, 4, 8);
		}
		
		//if 2ndst diagonal row row elems have the same/equal values (regadless if "x" or "0")
		if(gameHits[2] == gameHits[4] && gameHits[2] == gameHits[6] && gameHits[4] == gameHits[6] && gameHits[2] != undefined){
		   colorRow(2, 4, 6);
		}
		*/
        //End WOKING VARIANT---------------
		
		
		
	}
	
	
	
	//subfunction, used in drawRedLine() and checkGame()
	//gets the index of winning combination sub-array of array winCombination, i.e return 2 
	function getWinningArrayNumber(){
		
		for(let i = 0; i < gameHits.length; i++){
			for(let j = 0; j < winCombination.length; j++){
				for(let n = 0; n < winCombination[j].length; n++){
					let temp1 = winCombination[j][n];
					let temp2 = winCombination[j][n+1];
					let temp3 = winCombination[j][n+2];
					if(gameHits[temp1] == gameHits[temp2] && gameHits[temp1] == gameHits[temp3] && gameHits[temp2] == gameHits[temp3] && gameHits[temp1] != undefined){
					    //alert(j);
						return j;
					} 
				}
		    }
	    }
		
    }
	
	
	
	
	//subfunction, used in drawRedLine()
	function colorRow(cell1, cell2, cell3){ 
	    //alert('start draw winner line ' + cell1 + " " + cell2 + " " + cell3);
		$("#"+ cell1).css("background-color", "red"); 
		$("#"+ cell2).css("background-color", "red"); 
		$("#"+ cell3).css("background-color", "red");

	}
	
	
	
    /*
    |--------------------------------------------------------------------------
    | Check winner based on array gameHits[] and array winCombination[]
    |--------------------------------------------------------------------------
    |
    |
    */
	function checkGame(){
		
		//variant 2, more short elegant variant ---------------
		let winnerText;
	    let result = getWinningArrayNumber(); //gets the index of winning combination sub-array of array winCombination, i.e return 2 
        
		if(result == null){  //no winning match was found
		    //alert("null, i.e no winning match so far");
			
			//check while no win match if it an even situation
			
		    //check if Players are even
		    let checkFlag = false;
		    for (var i = 0, l = gameHits.length; i < l; i++) {
                if (typeof(gameHits[i]) =='undefined') { //checks if any array element is undefined, meaning the gane is not finished yet
                    checkFlag = true;
			        break;
                } 
            }; 
		
		    if(checkFlag == false ){ //true if finds no undefined element
		        //alert("even");
			    AnnounceWinner("So close. You are even");
                return true;	//stop		
		    }
			
			return false;
		}
		
		
		
		
		//Goes here only if winning combination is found. Detect who wins "X" or "0"
		let t = winCombination[result][0]; //gets value of just one first cell (or other 2 must be tha same value)
		if(gameHits[t] == "x"){
			//alert("X won");
			winnerText = "Winner is  <i> You </i> !!! You <i>  won </i>!!!!";
		} else {
			//alert("0 won");
			winnerText = "Screw you. Bot screwed you. You are sucked .Winner is <i> Bot</i> !!! ";
		}
		drawRedLine(); //draw red line for winning cell combination
        AnnounceWinner(winnerText);
		return true;
		// End variant 2, more short elegant variant ---------------
		
			



		//Working version, reassined to more short elegant variant ----------------
		/*
		//check if main Player win "X"
		if ( 
		//horizontal check for "x" Player (Main Player)
		(gameHits[0] == "x" && gameHits[1] == "x" && gameHits[2] == "x") || (gameHits[3] == "x" && gameHits[4] == "x" && gameHits[5] == "x") || (gameHits[6] == "x" && gameHits[7] == "x" && gameHits[8] == "x") 
		//vertical check 
		|| (gameHits[0] == "x" && gameHits[3] == "x" && gameHits[6] == "x") || (gameHits[1] == "x" && gameHits[4] == "x" && gameHits[7] == "x") || (gameHits[2] == "x" && gameHits[5] == "x" && gameHits[8] == "x")
		//diagonal check
		|| (gameHits[0] == "x" && gameHits[4] == "x" && gameHits[8] == "x") || (gameHits[2] == "x" && gameHits[4] == "x" && gameHits[6] == "x")
	    ){
			    drawRedLine(); //draw red line for winning cell combination
                AnnounceWinner("Winner is  <i> You </i> !!! You <i>  won </i>!!!!");
				return true;
           
		} 
		
		
		//check if Bot wins (if "0" wins)
		if ( 
		    //horizontal check for Bot "0" Player (Main Player)
		    (gameHits[0] == "0" && gameHits[1] == "0" && gameHits[2] == "0") || (gameHits[3] == "0" && gameHits[4] == "0" && gameHits[5] == "0") || (gameHits[6] == "0" && gameHits[7] == "0" && gameHits[8] == "0") 
		     //vertical check 
		     || (gameHits[0] == "0" && gameHits[3] == "0" && gameHits[6] == "0") || (gameHits[1] == "0" && gameHits[4] == "0" && gameHits[7] == "0") || (gameHits[2] == "0" && gameHits[5] == "0" && gameHits[8] == "0")
		     //diagonal check
		     || (gameHits[0] == "0" && gameHits[4] == "0" && gameHits[8] == "0") || (gameHits[2] == "0" && gameHits[4] == "0" && gameHits[6] == "0")
			){
			    //alert("bot draw ");
				drawRedLine(); //draw red line for winning cell combination
                AnnounceWinner("Screw you. Bot screwed you. You are sucked .Winner is <i> Bot</i> !!! ");
				return true;	//stop			
			
		}
		
		
		
		//alert("found " + gameHits.indexOf());
		//alert(gameHits.indexOf(undefined) == -1 );
		
		
		
		//check if Players are even
		let checkFlag = false;
		for (var i = 0, l = gameHits.length; i < l; i++) {
            if (typeof(gameHits[i]) =='undefined') { //checks if any array element is undefined, meaning the gane is not finished yet
               checkFlag = true;
			   break;
            } 
        }; 
		
		if(checkFlag == false ){ //true if finds no undefined element
		    alert("even");
			AnnounceWinner("So close. You are even");
            return true;	//stop		
		} 
		
		return false;
		*/
		// End Working version, reassined to more short elegant variant -----
	}
	
	
	

// END READY
});




