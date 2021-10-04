<template>
    <div class="col-sm-12 col-xs-12">
    
        <table class='tableX' id='gameTable'> 
        
        <!-- Build game field based on array gameHits[], iterate over array, substitute for drawGameField() -->
        
        <!-- building horizontal -->
        <tr v-for="(item, index) in horizontal" :key="index">  
        
            <!-- building vertcial -->
            <!-- Uses fu**ing Vue iterator, instead of simple i++--> 

            <template v-for="(item2, index2) in vertical"> <!-- uses template to use v-loop without html tag -->
                <!-- Build empty td cell, used for building IF this iterator is undefined in gameHits[] -->            
                <td :key="index2" v-if="booksGet[index * horizontal + index2] == undefined " class="game-cell" :id="index * horizontal + index2"  @click="mainUserClick(index * horizontal + index2)">
                    Nul => {{index * horizontal + index2}}
                    <!-- {{index * horizontal + index2}} --> <!-- fu**ing iterator-->
                    <!-- {{item2}} -->                    
                </td>
            
                <!-- Build taken td cell ("0" of "X"), used for building IF this iterator is defined in gameHits[] as ("0" of "X") -->            
                <td :key="index2" v-if="booksGet[index * horizontal + index2] != undefined " class="game-cell" :id="index * horizontal + index2"> <!-- if array el is not undefined, dispplay it's value -->
                    {{ booksGet[index * horizontal + index2 ] }} => {{ index * horizontal + index2  }}
                    <!-- {{index * horizontal + index3}} --> <!-- fu**ing iterator-->
                    <!-- {{item2}} -->                    
                </td>
            
            </template>
            
            <!-- <span v-if="booksGet[index * horizontal + index2] == undefined " class="game-cell" :id="index * horizontal + index2"  @click="mainUserClick(index * horizontal + index2)">  Null </span> -->
            <!-- <span v-else class="game-cell" :id="index * horizontal + index2">  {{ booksGet[index * horizontal + index2] }} </span>  -->
        </tr> 
        <!-- iterate over array -->
        
       </table>
       
        
        <p>Here</p>
        <div v-for="(itemT, indexT) in booksGet" :key="indexT"> 
            {{itemT}}
            
        </div>
        
        {{this.testCom}}
       
    </div>
</template>




<script>
import Swal from 'sweetalert2';

export default {
  name: 'TicTacStart_1',
  data () {
    return {
      msg: 'Welcome to Your Vue.js App',
      maxSize: 9, 
      gameHits: new Array(9), //array contains users hits, both user and bot, i.e [x, x, 0, x, x....]
      winCombination: [ [0, 1, 2], [3, 4, 5], [6, 7, 8], [0, 3, 6], [1, 4, 7], [2, 5, 8], [0, 4, 8], [2, 4, 6 ] ], //win combinations: horiz, vertical, diagonal
      
      horizontal: 3, //value to build game field (table)
      vertical: 3,
	  idIterator: 0,
    }
  },
  
  computed: {
        booksGet () { //to ensure reactivity
            return this.gameHits;
        },

        testCom(){
            let res = '';
            for(let i=0; i < this.gameHits.length;i++){
                res+= "<p>" + this.gameHits[i] + "</p>";
            }
            return res;
        }        
    },
  
  methods: {
              
           /*
            |--------------------------------------------------------------------------
            | When User Clicks cell, User "X"
            |--------------------------------------------------------------------------
            |
            |
            */
            mainUserClick(item) {
                /*
                Swal.fire({
                    title: 'Good!',
                    text: 'Do you want to continue with ' + item , icon: 'success', confirmButtonText: 'Cool'
                });
                */
                
                //alert(this.gameHits.length);
                
                //this.gameHits[item] = "x"; //add to main array //VUE ALERT: this approach is NOT reactive
                this.gameHits.splice(item, 1, "x"); //2 Mega Fixes: 1.to ensure reactivity should use this approach to change array, not this.gameHits[item] = "x"  2. Use splice this way => this.gameHits.splice(item, 1, "x"); //(what array el index to start with, delete 1, new value)

                console.log(this.gameHits);
                
                /*
                if(checkGame() == true){
			       return false; //to prevent computedAnswer fire if the winner is present
		        } */
                
		        this.computedAnswer(); 
            },
            
            
            
           /*
            |--------------------------------------------------------------------------
            | Check winner based on array gameHits[] and array winCombination[]
            |--------------------------------------------------------------------------
            |
            |
            */
            checkGame() {
            
            },
            
            
            
            
            
            
           /*
            |--------------------------------------------------------------------------
            | computedAnswer
            |--------------------------------------------------------------------------
            |
            |
            */
            computedAnswer() {
                //Random variant with do while
		        let numberRandom;
		        do {
			        numberRandom = this.getRandomInt(0, this.maxSize-1);
                    //alert("numberRandom " + numberRandom);
		        } while(
			        this.gameHits[numberRandom] != undefined	//check if random number array elem has not been taken 
		        )
		        //gameHits[numberRandom] = "0";
                this.gameHits.splice(numberRandom, 1, "0"); //2 Mega Fixes: 1.to ensure reactivity should use this approach to change array, not this.gameHits[item] = "x"  2. Use splice this way => this.gameHits.splice(item, 1, "x"); //(what array el index to start with, delete 1, new value)


            },
            
            
            
	        //generate random number for bot player
	        getRandomInt(min, max) {
                min = Math.ceil(min);
                max = Math.floor(max);
                return Math.floor(Math.random() * (max - min + 1)) + min;
            },

    },
               
               
               
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h1, h2 {
  font-weight: normal;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}

table {
    width: 100%;
    border:0;
    border-collapse:collapse;
}

td {
    /*padding: 15px;*/
	height: 4em; width: 2em;
    text-align: center;
    border:1px gray solid;
    border-collapse:collapse;
	transition: background-color 2s ease-out 100ms;
}

.tableX td:hover{background-color: yellow;}


</style>
