//file used in TicTacStart.vue
export const computedAnswerFile = {
	

    /*
    |--------------------------------------------------------------------------
    | computedAnswer
    |--------------------------------------------------------------------------
    |
    |
    */    
	computedAnswer: function(thisX){ //can't use this as an arg name, it will crash

        
        let delayTime = 300; //delay time
                
        //AI goes fisrt before random number assignment (if conditions are met) ------------
        //(only several combinations are programmed, feel free to add more)
                
        //Section when Bot tries to prevent the user to win by using counter-measures (prevent user from completing full "x" combination)
        //if first horizont line == [x, x, undefined]
		if (thisX.gameHits[0] == "x" && thisX.gameHits[1] == "x" && thisX.gameHits[2] == undefined) {
		    thisX.AI_engage_subfunction(2, "0");   //arrayIndex, cellValue(always "0")
			return true;
		}
		        
		        //if first horizont line == [undefined, x, x]
		        if (thisX.gameHits[1] == "x" && thisX.gameHits[2] == "x" && thisX.gameHits[0] == undefined) {
		            thisX.AI_engage_subfunction(0, "0");  //arrayIndex, cellValue(always "0")
                    return true;			
		        }
		
		        //if 2nd horizont line == [x, x, undefined]
		        if (thisX.gameHits[3] == "x" && thisX.gameHits[4] == "x" && thisX.gameHits[5] == undefined) {
		           thisX.AI_engage_subfunction(5, "0");  //arrayIndex, cellValue(always "0") 
			       return true;
		        }
                
                //Section when Bot tries to win by completing full "0" combination
                //if 1st horizont line == [0, 0, undefined]
		        if (thisX.gameHits[0] == "0" && thisX.gameHits[1] == "0" && thisX.gameHits[2] == undefined) {
		           thisX.AI_engage_subfunction(2, "0");  //arrayIndex, cellValue(always "0") 
			       return true;
		        }
                //End AI goes fisrt before random number assignment (if conditions are met) ------------
                
                
                
                
                //Random variant with do while
		        let numberRandom;
		        do {
			        numberRandom = thisX.getRandomInt(0, thisX.maxSize-1);
                    //alert("numberRandom " + numberRandom);
		        } while(
			        thisX.gameHits[numberRandom] != undefined	//check if random number array elem has not been taken 
		        )
                
                
                //Bot answers, setTimeout for bot answer to appear with light delay
                setTimeout(() => { 
                    
                    //Insert "0" to gameHits[] 
		            //gameHits[numberRandom] = "0";
                    thisX.gameHits.splice(numberRandom, 1, "0"); //2 Mega Fixes: 1.to ensure reactivity should use thisX approach to change array, not thisX.gameHits[item] = "x"  2. Use splice thisX way => thisX.gameHits.splice(item, 1, "x"); //(what array el index to start with, delete 1, new value)
                    
                    thisX.userCanPlay = true; //enable user's turn to play
                    
                    if(thisX.checkGame() == true){
			           return false; //to prevent computedAnswer fire if the winner is present
		            }
                                    
                }, delayTime);                
                
                
		        

            }
            
    };
