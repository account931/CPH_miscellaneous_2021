//Vuex store
import Vue from 'vue';
import Vuex from 'vuex';
//import axios from 'axios';


Vue.use(Vuex);
const debug = process.env.NODE_ENV !== 'production';

//Vuex store itself
export default new Vuex.Store({
    state: {
	    maxSize  : 9, 
        gameHits : new Array(9), //array contains users hits, both user and bot, i.e [x, x, 0, x, x....]
        winCombination: [ [0, 1, 2], [3, 4, 5], [6, 7, 8], [0, 3, 6], [1, 4, 7], [2, 5, 8], [0, 4, 8], [2, 4, 6 ] ], //win combinations: horiz, vertical, diagonal
      
        horizontal : 3, //value to build game field (table)
        vertical   : 3,
	    idIterator : 0,
        counterTime: '', //used to counting sec till new game will start
        userCanPlay: true, // flag if it is user's turn to play, to prevent user's multiple clicking without his turn
        
	
    },
  
    
    getters: {
		/*
        //minor getter, can delete (both from Login_component)
        getCart(state) {
            return state.userCanPlay;
        },
        
        isLoggedIn: state => !!state.userCanPlay, //get value (true/false) based on other state
		*/
    },
    

    actions: {

	  
        //triggers mutation to update Vuex array gameHits[]) with "X", action is triggered from TicTacStart.vue
        updateVuexGameHitsX({ commit }, dataTestX) { 
            return commit('setGameHitsX', dataTestX ); //sets dataTestX to store via mutation
        },
        
		//triggers mutation to update Vuex array gameHits[]) with "0", action is triggered from TicTacStart.vue
        updateVuexGameHits0({ commit }, dataTestX ) { 
            return commit('setGameHits0', dataTestX ); //sets dataTestX to store via mutation
        },
        
		//triggers mutation to update Vuex boolean var userCanPlay), triggered action is from TicTacStart.vue
        updateUserCanPlay({ commit }, dataTestX) { 
            return commit('setUserCanPlay', dataTestX ); //sets dataTestX to store via mutation
        },
           
    
	    
		//triggers mutation to reset Vuex array gameHits[] to empty/undefined
        resetVuexGameHits({ commit }) { 
            return commit('resetGameHits' ); 
        },
        
        
		
		//triggers mutation to set Vuex var counterTime
        setVuexCounterTime({ commit }, dataTestX) { 
            return commit('setFirstCounterTime', dataTestX); 
        },
		 
		//triggers mutation to update Vuex var counterTime
        updateVuexCounterTime({ commit }, dataTestX) { 
            return commit('setCounterTime', dataTestX ); 
        },
        
        
      
      
	  
	},


    /*
    |--------------------------------------------------------------------------
	|
    |--------------------------------------------------------------------------
    |
    |
    */
    mutations: {
		
		//mutation to update Vuex array gameHits[] with new hit, "X"
        setGameHitsX(state, response) {  
            state.gameHits.splice(response, 1, "x");
            //state.posts = response.data/*.data*/;
	        console.log('set X executed in store ' + response);
        },
		
		
		
		//mutation to update Vuex array gameHits[] with new hit, "0"
        setGameHits0(state, arrayIndex) {  //cellValue is always "0" here
            state.gameHits.splice(arrayIndex, 1, "0");
	        console.log('set 0 executed in store ' + arrayIndex);
        },
		
		
		//mutation to update Vuex boolean var userCanPlay with new value, true/false
        setUserCanPlay(state, response) {  
            state.userCanPlay = response;
        },
     
        //mutation to reset Vuex array gameHits[] to empty/undefined
        resetGameHits(state) {  
            state.gameHits = new Array(state.maxSize);
			//state.gameHits.splice(0, 1, "c"); //(index, how many to delete, what to replace)
        },
		
		
		//mutation to set Vuex var counterTime to initial time
        setFirstCounterTime(state, response) {  
            state.counterTime = response;
        },
		
		//mutation to updare Vuex var counterTime with --
        setCounterTime(state, response) {  
            state.counterTime = state.counterTime - response;
        },
        
    },
    strict: debug
});




  


	 
 
 
