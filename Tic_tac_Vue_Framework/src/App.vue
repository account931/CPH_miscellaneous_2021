<template>
  <div>
  
    <div id="headX" class="jumbotron text-center gradient" style ='background-color:'> <!--#2ba6cb;-->
        <h1 id="h1Text"> <span id="textChange"> Tic tac Vue</span>   </h1>
        <p class="header_p">Sweet Alert 2, Awesome 5  <!--generates random lists, ramdomizes integers, etc--> 
		    <span class="glyphicon glyphicon-qrcode"></span>
		    <i class='fas fa-cat' style='font-size:36px'></i>      <!-- Fa Font Awesome 5 --> 
		    <i class='fas fa-seedling' style='font-size:36px'></i> <!-- Fa Font Awesome 5 -->
        </p>
        
		<p class="language"><a href="/eng">ENG</a></p>
	</div>
      
     
     
    <div id="app">
        
        <!-- menu with links --> <!-- imported as a subcomponent -->
        <router-menu-links> </router-menu-links>
        <!-- menu with links -->
        
        <img src="./assets/logo.png">
        
        <!-- router view goes here (components are loaded here) (uses animation) -->
        <transition name="moveInUp">
            <router-view/>
        </transition>        
        <!-- router view goes here (components are loaded here) (uses animation) -->
        
    </div>
  </div>
</template>

<script>
//import vue-router-menu
import routerMenuX from './components/Menu/VueRouterMenu.vue';



export default {
  name: 'App',
  //using other sub-component 
	    components: {
             'router-menu-links': routerMenuX 
   },
	   
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: -2em;
  margin-bottom: 1em;
}
#app img {width: 6%;}

.gradient {
  background: rgba(177,219,237,1);
  background: -moz-linear-gradient(left, rgba(177,219,237,1) 0%, rgba(37,184,228,1) 50%, rgba(186,223,238,1) 100%);
  background: -webkit-gradient(left top, right top, color-stop(0%, rgba(177,219,237,1)), color-stop(50%, rgba(37,184,228,1)), color-stop(100%, rgba(186,223,238,1)));
  background: -webkit-linear-gradient(left, rgba(177,219,237,1) 0%, rgba(37,184,228,1) 50%, rgba(186,223,238,1) 100%);
  background: -o-linear-gradient(left, rgba(177,219,237,1) 0%, rgba(37,184,228,1) 50%, rgba(186,223,238,1) 100%);
  background: -ms-linear-gradient(left, rgba(177,219,237,1) 0%, rgba(37,184,228,1) 50%, rgba(186,223,238,1) 100%);
  background: linear-gradient(to right, rgba(177,219,237,1) 0%, rgba(37,184,228,1) 50%, rgba(186,223,238,1) 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b1dbed', endColorstr='#badfee', GradientType=1 );
}

 /*  Language Selection at top right */
.language {
	position: absolute;
	right: 1em;
	top:0.2em;
	cursor:pointer;
}

.language :hover {
	color:white;
}


/* Router view animation */
.moveInUp-enter-active{
  animation: fadeIn 2s ease-in;
}
@keyframes fadeIn{
  0%{
    opacity: 0;
  }
  50%{
    opacity: 0.5;
  }
  100%{
    opacity: 1;
  }
}
.moveInUp-leave-active{
  animation: moveInUp .3s ease-in;
}
@keyframes moveInUp{
 0%{
  transform: translateY(0);
 }
  100%{
  transform: translateY(-400px);
 }
}
</style>
