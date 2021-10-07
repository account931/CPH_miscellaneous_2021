# tic-tac-Vue Framework + Vuex Store
- <p> Tic-tac-tac on Vue Framework 2.5. + Vuex Store </p>
- <p> Same as Tic_tac_Vue_Framework but Vuex Store was added </p>
- <p> Features inherited from Tic_tac_Vue_Framework: Vue router +  Vue-sweetalert2 </p>

- <p> Vue-sweetalerts difference from ordinary SweetAlert => </p>
     - <p> instead of Swal.fire({})                  => use => this.$swal  (or sometimes Vue.swal) </p>
     - <p> instead of let Toast = Swal.mixin({})     => use => let Toast = this.$swal.mixin({      </p>
     

# How it works (copy from Tic_tac_Vue_Framework Readme)
- <p> Built based on JQuery variant but transfered to Vue Framework. </p>
- <p> Main game component is 'src/component/TicTac/TicTacStart.vue'. It uses function computedAnswer(), outlined to external separate js file '/sub_functions/computedAnswer.js'. 
      While outlining had to modify the function by adding arg (this) => computedAnswerFile.computedAnswer(this); Otherwise, {this} is unavailable in subfunction 
  </p>
  
- <p> Main logic for building/drawing the game field was outlined from 'src/component/TicTac/TicTacStart.vue.' to a 'sub_components/gameField.vue' (for a purpose of cleaner code) 
      Game field is build based on array gameHits[], due to reactivity we do not need to rebuild the game field (like in JQuery) after every user hit.   
      We pass vats {horizontal, vertical, gameHits} from 'TicTacStart.vue.' to 'gameField.vue' as props + pass a parent function mainUserClick() to be able to fire it from child component.
          <draw-game-field  :verticalX  ="this.vertical" :horizontalX="this.horizontal" :gameHitsX  ="this.gameHits" @myEventX="mainUserClick"/>
 </p>
 
 - <p> While outlining 'sub_components/gameField' faced the issue: if in subcomponent in nested for loops u can't get passed from Parents props, then use computed to get them, see => 'sub_components/gameField'</p>     
 - <p> NB: remember that while adding an el to array (i.e adding hits) to maintain reactivity use this.gameHits.splice(item, 1, "x"); not this.gameHits[item] = "x"
        Use splice this way => this.gameHits.splice(item, 1, "x"); //(what array el index to start with, delete 1, new value)
  </p>
  
  - <p> Router & menu are in App.vue </p>
 
> tic-tac-toe on vue framework

## Build Setup

``` bash
# install dependencies
npm install

# serve with hot reload at localhost:8080
npm run dev

# build for production with minification
npm run build

# build for production and view the bundle analyzer report
npm run build --report

# run unit tests
npm run unit

# run all tests
npm test
```

For a detailed explanation on how things work, check out the [guide](http://vuejs-templates.github.io/webpack/) and [docs for vue-loader](http://vuejs.github.io/vue-loader).
