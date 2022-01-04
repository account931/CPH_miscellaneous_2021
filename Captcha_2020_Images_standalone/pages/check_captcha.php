<?php
//Page to handle form $_POST, checks validation + check if captcha is correct
session_start();
include '../Classes/Check_captcha/Check_Img_Captcha_2022.php';//

//var_dump($_SESSION["correctCaptchaSet"]); //session with correct captcha answers
//var_dump($_POST['hidden-captcha-array']);

//check if $_POST exists
if(!isset($_POST['hidden-captcha-array'])){
	die("<h2>You have no access here. Stopped. No data. </h2>");
}



//Function to check user's captcha and Server-side correct answer
use Classes\Check_captcha\Check_Img_Captcha_2022; //namespace is must-have, otherwise class not found

$model = new Check_Img_Captcha_2022(); //
if($model->checkIfCaptchaCorrect($_POST['hidden-captcha-array']) == true){
	//All is good, do here what ever you want with form inputs.....
	//...................
	//return "Captcha was successfully solved!!! Validation was also OK (was runned before captcha check. Do further what u want....)";
    //echo "OK";
	$_SESSION["CaptchaOK"] = true; // simple equivalent of csrf, prevent from user access redirected pages directly by URL
	header("Location: ../pages/if_captcha_ok.php");
    die();
} else {
   //return redirect()->back()->withInput()->with('flashMessageFailX', 'Captcha is incorrect. Try harder !!!' ); //->withErrors($request->validator->messages()); //Error was here ->withErrors($validator);
   //echo "Wrong";
    $_SESSION["CaptchaWrong"] = true; // simple equivalent of csrf, prevent from user access redirected pages directly by URL
	header("Location: ../pages/if_captcha_wrong.php");
}


?>