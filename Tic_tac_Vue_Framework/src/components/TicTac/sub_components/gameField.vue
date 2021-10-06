<!-- This all below code used to be inside TicTacStart.vue & 100% worked. Outlined here (to subcomponent) to make code more clear -->
<!-- Template that contains logic to create/build a game Field with "x"/"0"(& auto-update it due to reactivity). Works 100% -->
<-- While building uses vars passed as props from Parent TicTacStart.vue. These TicTacStart vars are: vertical, horizontal, gameHits   -->  
<!-- Include MegaFix: if in subcomponent in nested loops u can't get passed from Parents props, then use computed to get them --> 

<template>
    <div class="col-sm-12 col-xs-12">
        <h5>Hello from /sub_components/gameField.vue</h5>
        
        <!-- BB => Vertical  {{this.verticalX}} + {{this.gameHitsX}} + {{this.ebHorizont}} -->
        
        
        
        <!-- Test for using computed to get passed props, Delete TRUE!!!!!! -->
        <!--
        <table class='tableX' id='gameTable444444'> 
            <tr v-for="(item, index) in fkGetHorizont" :key="index">
                   <td class="game-cell" v-for="(item2, index2) in fkGetVertical" :key="index2" > h test </td>
                
            </tr> 
        </table>  
        -->        
        <!-- Test -->    
        
        
        
        <h3> Subcomponent table </h3>
        <table class='tableX' id='gameTable111'> 
        
            <!-- Build game field based on array gameHits[], iterate over array, substitute for drawGameField() -->
        
            <!-- building horizontalX, i.e this.ebHorizont-->
            <tr v-for="(item, index) in /* this.horizontalX */ fkGetHorizont" :key="index">  
        
                <!-- building vertcial -->
                <!-- Uses fu**ing Vue iterator, instead of simple i++--> 

                <template v-for="(item2, index2) in /* this.verticalX */ fkGetVertical"> <!-- uses template to use v-loop without html tag -->                                                                                                  
                    
                    <!-- Build empty td cell, used for building IF this iterator is undefined in gameHits[] -->            
                    <td :key="index2" 
                        v-if="/*gameHitsX*/ fkGetGameHit[index * /*this.ebHorizont*/ /* this.horizontalX */ fkGetHorizont + index2] == undefined " class="game-cell" 
                        :id="index * /* this.horizontalX */ fkGetHorizont + index2"  
                        @click="childClick(index * fkGetHorizont + index2)"> <!-- call this child method childClick that'll call the parent method{mainUserClick} (in TicTacStart.vue) -->   <!-- was @click="mainUserClick(index * fkGetHorizont + index2)" -->
                        
                        <!-- Nul => {{index * horizontalX + index2}} -->
                        <!-- {{index * horizontalX + index2}} --> <!-- fu**ing iterator-->
                        <!-- {{item2}} -->                    
                    </td>
            
                    <!-- Build taken td cell ("0" of "X"), used for building IF this iterator is defined in gameHits[] as ("0" of "X") -->            
                    <td :key="index2" v-if="/*gameHitsX*/ fkGetGameHit[index * /* this.horizontalX */ fkGetHorizont + index2] != undefined " class="game-cell" :id="index * /* this.horizontalX */ fkGetHorizont + index2"> <!-- if array el is not undefined, dispplay it's value -->
                        {{ /*gameHitsX*/ fkGetGameHit[index * /* this.horizontalX */ fkGetHorizont + index2 ] }}  
                        <!-- {{index * horizontalX + index3}} --> <!-- fu**ing iterator-->
                        <!-- {{item2}} -->                    
                    </td>
            
                </template>
            
               <!-- <span v-if="gameHitsX[index * horizontalX + index2] == undefined " class="game-cell" :id="index * horizontalX + index2"  @click="mainUserClick(index * horizontalX + index2)">  Null </span> -->
               <!-- <span v-else class="game-cell" :id="index * horizontalX + index2">  {{ gameHitsX[index * horizontalX + index2] }} </span>  -->
            </tr> 
            <!-- iterate over array -->
        
       </table>
               
		    		   
	</div>
</template>




<script>

export default {
  name: 'Tic',
  props: ['horizontalXX', 'verticalX', 'gameHitsX', 'ebHorizont', 'thatX'], //props sent from parent
  //props: {horizontalX: Number, verticalX  : Number, gameHitsX: array},

  data () { return { 
       //zaeb: this,
      //horizontalX: this.ebHorizont,
      //vertical: this.verticalX
      //verttt: this.verticalX,
  }},
  computed: {
     //MegaFix => if in subcomponent in nested loops can't get passed from Parents props, then use computed to get them
     fkGetVertical () { return this.verticalX;},
     fkGetHorizont () { return this.ebHorizont;},
     fkGetGameHit  () { return this.gameHitsX;},
  },
  methods: {
      //call the parent method {mainUserClick} (in TicTacStart.vue)
      childClick(item){ 
          this.$emit("myEventX", item); //"myEventX" specified in TicTacStart.vue as <draw-game-field @myEventX="mainUserClick"/>
      },
  },
} 
</script>


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
    margin-bottom: 2em;
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

.redCell {background-color: red;} /* for winning line */

.timer{height:1.5em; color:red; font-size: 1.4em;}


</style>
