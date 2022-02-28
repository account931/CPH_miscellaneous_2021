<?php
//start file to run Adminer without SQL password. NB: you create tempo password in Line 9 and have to use it as password to log in
//https://github.com/vrana/adminer/blob/master/adminer/sqlite.php

function adminer_object() {
    include_once "./plugins/plugin.php";
    include_once "./plugins/login-password-less-plugin.php";
	
	//can use plugin autoloader instead of include
	/*
    foreach (glob("plugins/*.php") as $filename) {
        include_once "./$filename";
    } */
	
    return new AdminerPlugin(array(
        // TODO: inline the result of password_hash() so that the password is not visible in source codes
		//create instance of class
        new AdminerLoginPasswordLess(password_hash("YOUR_PASSWORD_HERE", PASSWORD_DEFAULT)), //use this password to enter
    ));
}
// include original Adminer or Adminer Editor
include "./adminer-core-4.7.5.php";  //same as include "adminer-core-4.7.5.php";