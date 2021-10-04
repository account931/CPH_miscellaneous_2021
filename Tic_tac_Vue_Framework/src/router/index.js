import Vue from 'vue'
import Router from 'vue-router'
import HelloWorld from '@/components/HelloWorld'; //not used
import TicTacStart from '@/components/TicTac/TicTacStart';
import InfoPage from '@/components/InfoComponent';

Vue.use(Router)

export default new Router({
  routes: [
    {
     
   /* path: '/',
      name: 'HelloWorld',
      component: HelloWorld
    */
      
      //main game page
      path: '/',
      name: 'TicTacStart_2',
      component: TicTacStart,
    },

    {    
      //info page
      path: '/info',
      name: 'Informational Page',
      component: InfoPage,
    }
  ]
})
