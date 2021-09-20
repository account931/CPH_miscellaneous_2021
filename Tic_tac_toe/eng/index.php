<!doctype html>
<!--------------------------------Bootstrap  Main variant ------------------------------------------>
  <html lang="en-US">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="Content-Type" content="text/html">
      <meta name="description" content="create random list, integer" />
      <meta name="keywords" content="random, random list, random integer ">
      <title>Random list, integers </title>
  
      <!--Favicon-->
      <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

      <link rel="stylesheet" type="text/css" media="all" href="css/myRandomCss.css">
      <script src="random.js"></script><!--  Core  JS-->
	  <meta name="viewport" content="width=device-width" />

     </head>

     <body>

       <div id="headX" class="jumbotron text-center gradient" style =''> <!--#2ba6cb;-->
         <h1 id="h1Text"> <span id="textChange"> Randomize</span>   </h1>
           <p class="header_p">generates random lists, ramdomizes integers, etc <span class="glyphicon glyphicon-wrench"></span></p> 
           <p class="language"><a href="../">Ru</a></p>
	   </div>



       <div class="item contact padding-top-0 padding-bottom-0" id="contact1">
         <div class="wrapper grey">
    	   <div class="container">

             <div class="checkbox"> <!-- Checkbox ID will be used in JS to form div ids (randListDiv,etc) -->
               <label><input type="checkbox" value="" name="r" id="randList" checked >Random list</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			   <label><input type="checkbox" value="" name="r" id="randInteger">Random int</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			   <label><input type="checkbox" value="" name="r" id="randIntegList">Random int list</label>
              </div>
			


				
    	     <!------------------------START id="randList" DIV 1111 (visible by default)-------------------------------------->
    	     <!-- Each div should have id = checkboxID + "Div", input should be checkboxID + "_Input" to automate it in JS -->
			 <div class="col-md-12 random" id="randListDiv"> <!--5-->       
    		   <!--<h3 class="margin-bottom-40 editContent">Your  <span class='subtext'> text</span></h3>-->

               <!--------------------------------------------------- TextArea Form  Start------------------------------------------------->
    		   <p> Randomize the list <span class="span-small"> &nbsp;(enter the items, each from the new line)  </span>&nbsp;<span class='glyphicon glyphicon-retweet'></span></p>
			   
    		   <form role="form">  	
    		     <div class="form-group"><!--coordsInput-->
    		       <textarea class="form-control" rows="6" placeholder="Your list here.." id='randList_Input' required>
				   </textarea>	  		  				  			
    		     </div>
    			</form>	  		
               <!---------------------------------------------------TextArea FORm  END------------------------------------------------->
 
    		 </div><!-- /.col-md-5 --> <!-- END  <div class="col-md-5">-->

             <!----------------------------------------END id="randListDiv" DIV 1111----------------------------------->



  
  
  
  
  
  
  
  
             <!------------------------START id="randInteger" DIV 222 (hidden by default)(returns one single random int from range) -------------------------------------->
    		 <!-- Each div should have id = checkboxID + "Div", input should be checkboxID + "_Input" to automate it in JS -->
			 <div class="col-md-12 random" id="randIntegerDiv"> <!--5-->       
    		   <!--<h3 class="margin-bottom-40 editContent">Your  <span class='subtext'> text</span></h3>-->

               <!--------------------------------------------------- TextArea FORm  Start------------------------------------------------->
    		   <p> Select range for a random integer <span class='glyphicon glyphicon-list-alt'></span></p>
			   
			   <div class="form-group ">
			  
                   <label for="intMin">Integer min:</label>
                   <input type="number" class="form-control" id="randInteger_Input">
				  
               </div>
			   
			   <div class="form-group">
			    
                   <label for="intMax">Integer max:</label>
                   <input type="number" class="form-control" id="randInteger_Input2">
				 
               </div>
			   
    		   <!--<form role="form col-xs-4">  	  				  		  	   				  		
    		     <div class="form-group">
    			   <textarea class="form-control" rows="6" placeholder="Your text here.." id='coordsInput' required>
				   </textarea>	  		  				  			
    			 </div> -->
    				  		
               <!---------------------------------------------------TextArea FORm  END------------------------------------------------->		
    		 </div><!-- /.col-md-5 --> <!-- END  <div class="col-md-5">-->

             <!----------------------END id="randIntegerDiv DIV 222----------------------------------->

  
  
  
  
  
  
  
            <!------------------------START id="randIntegList" DIV 333 (hidden by default)(returns a list of random int within range) -------------------------------------->
    		 <!-- Each div should have id = checkboxID + "Div", input should be checkboxID + "_Input" to automate it in JS -->
			 <div class="col-md-12 random" id="randIntegListDiv"> <!--5-->       
    	

               <!--------------------------------------------------- TextArea FORm  Start------------------------------------------------->
    		   <p> Select range for random integer lists <span class='glyphicon glyphicon-check'></span></p>
			   
			   <div class="form-group ">
			  
                   <label for="intMin">Integer min:</label>
                   <input type="number" class="form-control" id="randIntegList_Input">
				  
               </div>
			   
			   <div class="form-group">
			    
                   <label for="intMax">Integer max:</label>
                   <input type="number" class="form-control" id="randIntegList_Input2">
				 
               </div>
			   
    				  		
               <!-------------------------------TextArea FORm  END------------------------------------------------->		
    		 </div><!-- /.col-md-5 --> <!-- END  <div class="col-md-5">-->

             <!----------------------END id="randIntegerDiv DIV 3333----------------------------------->
			 
			 
			 
			 
			 
  
  
  
  







<!-------------------------------------------------------START BUTTONS---------------------------------------->
                                        <!--mine-->
					<br>
					<div class="col-md-8"  id="" style="margin-top:33px;">  


    				  	   
										
    				  		<button id="splitButton" type="button" class="btn btn-primary btn-embossed btn-lg btn-wide bt-mobile-mine">Random it</button>
                            <button id="clearButton" type="button"  class="btn btn-primary btn-embossed btn-lg btn-wide bt-mobile-mine">Reset</button >
							<button id="examplebutton" type="button" class="btn btn-primary btn-embossed btn-lg btn-wide bt-mobile-mine">Example</button>
                            <button id="instructionButton" type="button" class="btn btn-primary btn-embossed btn-lg btn-wide bt-mobile-mine">Instruction</button>
                            <!--<button id="cr_footer" type="button" class="btn btn-primary btn-embossed btn-lg btn-wide">CR Footer</button>-->
    				</div>
<!-------------------------------------------------------START BUTTONS---------------------------------------->







<!------------------------------------------INSTR  WORKING------------------------------->
<br><div class="col-md-8 jumbotron"  id="hiddenInstructions" style="display:none;margin-top:2%;"> 

<!-- INSTRUCTIONS-->

<!--RU-->

<!--<a href='#' target="_blank" style="font-size:18px; "/>View Video Instructions</a>-->
<br>
A tool that randomizes your list of names/items &nbsp; <span class='glyphicon glyphicon-user'></span>
<!-- END RU-->

<br><br>How to proceed:
<br>1.Enter your list or range of integers to randomize.
<br>2.Click "Random it" button and get results.
<br>3.Click "Copy" button to copy results.



<!--<br>10.Pls know /Help center - > <span style="color:red;"> notifications only</span>-->
<!--<br>11.Double paragraphs - > <span style="color:red;"> being implemented</span>-->
<!--<br>9.Missing dot in the end of the sentence - > <span style="color:red;"> being implemented</span>-->

 <!--<br><br><i>Note: numbered and bulleted list option and other inner GCases formats will not be saved.</i><br></p>-->
<!--END  INSTRUCTIONS-->

 </div>
<!-----------------------------------------END INSTR---------------------->



					
					
					<!--------------------------------mine RESULTS------------------------------------->
					<br><br>
					<div class="col-md-8"  id="resultFinal" style="margin-top:33px;"></div> <br><br><br>
					<!--------------------------------- end  mine-------------------------------------->
					
    		                          

<!--------------  some---------->
<br><br>
<div class="col-md-8">
<p id="highLight_errors_button" style="display:none;cursor:pointer;padding:10px;margin-top:17px;text-decoration:underline;color:red;">show more details >></p>
<div id="highLight_errors" style="display:none;padding:19px;border:1px dotted red;box-shadow: 5px 5px 25px red ;"><!-- Highlights with red double spaces-->
</div><!--end id="highLight_errors -->
<br><br>
</div><!--div class="col-md-8">-->
<!----------------end some------>


                                        

    			</div><!-- /.container -->
				
				
				
					
					
					
    		
    		</div><!-- /.wrapper -->

                <div style="height:77px;"></div>


    	
    	</div><!-- /.item -->
		
		
		<!-----Footer ---->
		        
				<div class="footer">
				    Contact: <strong>dimmm931@gmail.com</strong><br>
					<?php  echo date("Y"); ?>
				</div>
		<!--END Footer ---->
    
    </body>
</html>




<!--
<?php
// Record (with CLASS) all the  input  to  txt;  //;
      include("Classes/RecordTxt.php");
      RecordTxt::RecordAnyInput(array(/*$user*/), 'recordText/random.txt');// Record  to  text;
//End  Record;
?>-->
