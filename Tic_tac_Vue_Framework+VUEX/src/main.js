// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router';
import store from './store/index'; //import Vuex Store

//vue-sweetalert2
import VueSweetalert2 from 'vue-sweetalert2';
// If you don't need the styles, do not connect
import 'sweetalert2/dist/sweetalert2.min.css';
Vue.use(VueSweetalert2);
//vue-sweetalert2


Vue.config.productionTip = false

/* eslint-disable no-new */
new Vue({
  el: '#app',
  store, //connect Vuex store, must-have
  router,
  components: { App },
  template: '<App/>'
})
