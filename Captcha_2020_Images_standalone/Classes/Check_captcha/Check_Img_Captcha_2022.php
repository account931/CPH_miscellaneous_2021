<?php
//Model 
namespace Classes\Check_captcha;


class Check_Img_Captcha_2022 
{

	

    /**
    * Function to check user's captcha and Server-side correct answer
    * @param FormValidateRequest $request
	* @param 
    * @return boolean 
    */
	function checkIfCaptchaCorrect($request){
	     	//Checking user's captcha and Server-side correct answer
	    $flag = false;
		
	    //Get correct captcha set from session
	    $sessionCorrectCatchachaSet = json_decode( $_SESSION["correctCaptchaSet"]); //E.g => array ["Turns/turn3.jpg", "Turns/turn1.jpg"] 
		//dd($sessionCorrectCatchachaSet);
		
		//Get user's answered captcha set
		$userCatchachaSet = json_decode($request); // E.g => array ["Turns/turn3.jpg", "Turns/turn1.jpg"]
		//dd($userCatchachaSet);
		
		//dd($userCatchachaSet);
		//dd($request->all());
		
		if(count($sessionCorrectCatchachaSet) != count($userCatchachaSet) ){
			return false; //"Your captcha does not equal length";
		}
		
		foreach($sessionCorrectCatchachaSet as $correct){ //$correct is "Boatss/boat3.jpg"
			
			    //$oneImg = explode("/", $correct)[1]; //dd($oneImg); //e.g  "boat1.jpeg"
				
				if (!in_array($correct,  $userCatchachaSet)) {
				//if (!array_search($oneImg, $userCatchachaSet)){
					$flag = false; //dd("Stopped. Incorrect captcha");
					//return redirect()->back()->withInput()->with('flashMessageFailX', 'Captcha is incorrect!!!' ); //->withErrors($request->validator->messages()); //Error was here ->withErrors($validator);
					//break;
					return false;
					
				} else {
					$flag = true;
				}
		}
		
		if($flag == true){
			return true;
		} else {
			return false;
		}
		
		}
		
		

	
}
