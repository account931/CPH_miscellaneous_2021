<!-- https://github.com/hayanisaid/Vue-router -->
<!-- Vue-Router Main menu with Links          -->

<template>
  <div class="menu">
    <!-- <h1> {{ msg }} </h1> -->
    
    <!--- Menu Variant 2  -->
        <nav class="navbar navbar-inverse fix-for-non-working-click-in-mobile" data-toggle="collapse" data-target="#myNavbar"> <!-- .fix-for-non-working-click-in-mobile is a fix for non-working click in mobile -->
	                                                                                                                         <!--  we've duplicated from button this {data-toggle="collapse" data-target="#myNavbar"} to close bootstrap responsive menu on click-->
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"> 
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <a class="navbar-brand" href="#">Menu Var 2</a>
                    </div>
                        <div class="collapse navbar-collapse" id="myNavbar"> 
                            <ul class="nav navbar-nav">
                                <!--<li class="active"><a href="#">Home</a></li>-->
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Sub Page 1-1</a></li>
                                        <li><a href="#">Sub Page 1-2</a></li>
                                        <li><a href="#">Sub Page 1-3</a></li>
                                    </ul>
                                </li>
                                <!--<li><a href="#">Page Not-Used</a></li>-->
		
        
		                        <!-- Vue routert links -->
                                <li class="nav-item">
                                    <router-link class="nav-link" to="/">Game</router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link class="nav-link" to="/info">Info</router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link class="nav-link" to="/contact">Contact</router-link>
                                </li>
                               
                        
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                                <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!--- End Menu Variant 2 --->
                
    
  </div>
</template>





<script>
export default {
  name: 'VueRouterMenu',
  data () {
    return {
      msg: 'This is menu'
    }
  }
}
</script>




<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
/* mine */
.nav-item   {margin-left:2em; }
.nav-item a {color:black;}
.navbar-brand {color:black}

</style>
