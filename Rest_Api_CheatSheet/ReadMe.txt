Contains implementations of miscellaneous Rest approaches (just brief copy from ReadMe_Laravel_Com_Commands.txt).

Content:
1. JSON example
2.cURL example (access token is passed in headers)
2.1 cURL example (access token is passed in URL String)
3.JS example (access token is passed in headers)

---------------

1. JSON example

{
 "book": [
    { "id":"01", "language": "Java", "edition": "third", "author": "Herbert Schildt" },
	
    { "id":"07", "language": "C++", "edition": "second", "author": "E.Balagurusamy" }
 ]
}



----------------------------


2.cURL example (access token is passed in headers)
From -> https://github.com/account931/Laravel-Yii2_Comment_Vote_widgets/blob/master/blog_Laravel/app/Http/Controllers/Elastic/ElasticController.php

#Authentication: u can send Bearer token in Headers(ajax,cURL, etc) or send token as String Query in ajax as url?token=xxxxx => fetch('api/post/get_all?token=' + state.api_tokenY 
# U can save token to Session =>  $_SESSION['o_token'] = $access_token['oauth_token'];
#A WebHook is an automated call made from one application to another, an HTTP callback: an HTTP POST that occurs when something happens; a simple event-notification via HTTP POST. WebHooks will POST a message to a URL when certain things happen

#Controller:

public function index(Request $request) 
{ 
    if ($request->has('elastic-search')) { // equivalent if (isset($search_data) && !empty($search_data) )
	    //Elastic Cloud Search via POST (works via /Get as well)
		    //Elastic Cloud Api Keys. SENSITIVE DATA. Gets real values from .env!!!!!!!!
		    $Private_Api_Key   = env('ElasticPrivate_Api_Key');   //.env variable
		    $Public_Search_Key = env('ElasticPublic_Search_Key'); //.env variable
					
		    //construct the url to use in cURL
            $url = "https://myelasticz.ent.us-central1.gcp.cloud.es.io/api/as/v1/engines/my-elastic-enginez/search"; //URL //my-elastic-enginez is my engine
            $authorization = "Authorization: Bearer " . $Public_Search_Key; //Inject the token (Private Api Key) into the header
  
            //cURL Start-> Version for localhost and 000webhost.com, cURL is not supported on zzz.com.ua hosting

            $curl = curl_init();
  
            //curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));//new Inject the token into the header
            //$dataX = '{"id":"' . $this->UUID . '" ,"type": "Feature","geometry": {"coordinates": [' . $myLng . ',' . $myLat . '],"type": "Point"}, "properties": {"title":"' . $myName . '", "description":"' . $myDescript.'"} }'; //MEGA FIX->mega Error was here, {$myName, $myDescript} must be in {""}
            //$dataX = '{"query": "kingston"}';
			$dataX = '{"query":"' . $request->input('elastic-search') . '" }';  

            curl_setopt_array($curl, array(
                CURLOPT_URL            => $url,
	            CURLOPT_HTTPHEADER     => array('Content-Type: application/json' , $authorization ), //Inject the token into the header
                CURLOPT_RETURNTRANSFER => true,
				//CURLOPT_USERPWD => 'user:pass', //authorization variant 2
                CURLOPT_ENCODING       => "",
                CURLOPT_MAXREDIRS      => 10,
                CURLOPT_TIMEOUT        => 30,
                CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST   => "POST",
                CURLOPT_POSTFIELDS      => $dataX,//"{\n  \"customer\" : \"con\",\n  \"customerID\" : \"5108\",\n  \"customerEmail\" : \"jordi@correo.es\",\n  \"Phone\" : \"34600000000\",\n  \"Active\" : false,\n  \"AudioWelcome\" : \"https://audio.com/welcome-defecto-es.mp3\"\n\n}",
                /*CURLOPT_HTTPHEADER => array(
                  "cache-control: no-cache",
                  "content-type: application/json",
                  "x-api-key: whateveriyouneedinyourheader"
                ),*/
            ));
            //curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); //must option to Kill SSL, otherwise sets an error


            $response = curl_exec($curl);
            $err = curl_error($curl); //return string with last error or if no errof empty string

            curl_close($curl);

            if ($err) {
                //echo "cURL Error #:" . $err;
				//$elasticResults = "cURL Error #:" . $err;
				throw new \App\Exceptions\myException("cURL Exception happened while Elastic Cloud Search " . $err);

            } else {
                //echo "<p> FEATURE STATUS=></p><p>Below is response from API-></p>";
                //echo "Elastic Cloud response is => " . $response;
				$elasticResults = $response; 
            }
			
			$elasticResults = json_decode($elasticResults, false);//Decode the result from JSON to array or object,  true used for ARRAY [], not  used  for OBJECT '->'
			//dd($elasticResults); //to see response structure
		    //dd($elasticResults['results'][0]['_meta']['engine']); //if 2nd json_decode() arg is true, i.e returns array
			//dd($elasticResults->results[0]->_meta->engine);         //if 2nd json_decode() is false, i.e returns object
			 
	  
	}
 }
 
 ----------------
 
 
 VIEW:
                    <!--------------- Elastic Search Results ----------------------->
					<div class="col-sm-12 col-xs-12">
					    <hr> <i class="fa fa-retweet" style="font-size:36px"></i> <hr>

						<!-- If NO Elastic results come at all -->
						@if(empty($elasticResults))
							<br>
                            <p>Elastic Data does not exist (you did not search anything)</p>
						
                        <!----  If any Elastic results come ----->						
                        @else
							
						
							
							
							<!-- If Elastic results contains no Error, show the results -->
							@if(empty($elasticResults->error))
								
								<!-- check if 14-days trial ends and Elastic Cloud returns {"ok": false, message: "Unknown resource"} -->
								@if($elasticResults->ok == false)
									<p>Elastic error => <b> {{ $elasticResults->message }} </b></p>
								    <p> If u see this, it is probably because Elastic Cloud 14-days trial ends </p>
								
                                <!-- If everything is OK -->								
							    @else 
									
							        <p>Your Elastic data is here! You searched for <b><i> {{ $_GET['elastic-search']}} </i></b>. Found <b> {{count($elasticResults->results)}} result </b>. Benchmark: it took <b> {{$benchmarkTime}} microseconds </b> to get result</p>
							        <br>
							
							        @if(count($elasticResults->results) <= 0)
								        <h3> Nothing found </h3>
							        @endif
							
							
							        <p> Request ID:<b> {{ $elasticResults->meta->request_id }} </b></p> <!-- Elastic request ID (generated by Elastic -->  <!-- For single post(without loop) was =>  $elasticResults->meta->request_id -->
                            
							
							        @foreach($elasticResults->results as $res) <!-- $results ia an array -->
							        <!-- Display the data, to see what path/structure to use, decomment dd($elasticResults) in Controer -->
                                    <div class="col-sm-12 col-xs-12 list-group-item alert alert-success">
						                <p class="list-group-item"> Engine name:        <b> {{ $res->_meta->engine}}    </b></p>  <!-- What Elastic engine was used (created by you)-->     <!-- For single post(without loop) was =>  $elasticResults->results[0]->_meta->engine -->							   
							            <p class="list-group-item">Doc found:           <b> {{ $res->id->raw }}         </b></p> <!-- Elastic Document ID , i.e doc-619cc (generated by Elastic while indexing) --> <!-- For single post(without loop) was => $elasticResults->results[0]->id->raw -->
							            <p class="list-group-item"> SQL ID(for link):   <b> {{ $res->id->raw }}    </b></p> <!--SQL table column id to make a href -->                  <!-- For single post(without loop) was => $elasticResults->results[0]->shop_id->raw} -->	
							            <p class="list-group-item"> <a href="{{route('elas-one-product', ['id' => $res->id->raw])}}">View One</a> </p> <!-- Link to view this one result -->
								        <p class="list-group-item"> Product:            <b> {{ $res->elast_title->raw }} </b></p> <!--SQL table column shop_title  -->                        <!-- For single post(without loop) was => $elasticResults->results[0]->shop_title->raw} -->
							 
						            <?php //var_dump($elasticResults); ?> 
								    </div>
							        @endforeach
							    @endif 
                                <!-- end of else of if($elasticResults->ok == false) -->
							
							
							
							
							    <!-- If Elastic results contains ERROR. show the error -->
							    @if(!empty($elasticResults->error))
								    <h4 class="alert alert-danger"> 
							            <i class="fa fa-exclamation-triangle" style="font-size:38px;color:red"></i>
							            Elastic Search Api Error:  <b>{{ $elasticResults->error }} </b> 
								    </h4>
							    @endif
							
	                        @endif  
							<!-- end of else of if(empty($elasticResults->error)) -->
						    
                        @endif     
						<!-- end of else of if(empty($elasticResults)) -->
						
						
						
					</div>
					<!--------------- End Elastic Search Results  ------------------->
					
					
					
	



	
-----------------------------------
2.1 cURL example (access token is passed in URL String)
Example -> https://github.com/account931/MapBox_Store_Location_2019/blob/master/Classes/AddMarker.php

$url = "https://api.mapbox.com/datasets/v1/account931/cjub7lk3l12ce2wo27ccoopdl/features/" . $this->UUID . "?access_token=" . MAPBOX_API_KEY; //MAPBOX_API_KEY is in /Credentials/php_api_credentials/api_credentials.php';   //https://api.mapbox.com/datasets/v1/account931/DatasetID/features/FeatureID?access_token
      
	  //construct data to pass in cURL body (id in $url and in $data must be the same-> it is $this->UUID, a uniue generated number ) 
	  $dataX = '{"id":"' . $this->UUID . '" ,"type": "Feature","geometry": {"coordinates": [' . $myLng . ',' . $myLat . '],"type": "Point"}, "properties": {"title":"' . $myName . '", "description":"' . $myDescript.'"} }'; //MEGA FIX->mega Error was here, {$myName, $myDescript} must be in {""}

	  //cURL Start-> Version for localhost and 000webhost.com, cURL is not supported on zzz.com.ua hosting
	
	//$url = "https://api.mapbox.com/datasets/v1/account931/cjub7lk3l12ce2wo27ccoopdl/features/5cfa32707c902a3231b5258e3b93f24bcc?access_token=" . MAPBOX_API_KEY; //MAPBOX_API_KEY is in /Credentials/php_api_credentials/api_credentials.php';
    //$dataX = '{"id":"5cfa32707c902a3231b5258e3b93f24bcc","type": "Feature","geometry": {"coordinates": [28.652198, 50.267998],"type": "Point"}, "properties": {"title": "Nuhavn", "description": "School Nu Inserted with Php cURL"} }';

  $curl = curl_init();
  curl_setopt_array($curl, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "PUT",
      CURLOPT_POSTFIELDS => $dataX,//"{\n  \"customer\" : \"con\",\n  \"customerID\" : \"5108\",\n  \"customerEmail\" : \"jordi@correo.es\",\n  \"Phone\" : \"34600000000\",\n  \"Active\" : false,\n  \"AudioWelcome\" : \"https://audio.com/welcome-defecto-es.mp3\"\n\n}",
      CURLOPT_HTTPHEADER => array(
         "cache-control: no-cache",
         "content-type: application/json",
         "x-api-key: whateveriyouneedinyourheader"
      ),
  ));
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); //must option to Kill SSL, otherwise sets an error


  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);	
  
  
-----------------------------------------------


3.JS example (access token is passed in headers)

From -> https://github.com/account931/Laravel_Vue_Blog/blob/main/resources/assets/js/WpBlog_Vue/components/pages/loadnew.vue

 //Add Bearer token to headers
            $.ajaxSetup({
                headers: {
                    'Authorization': 'Bearer ' + this.$store.state.api_tokenY
                }
            }); 
      
		    $.ajax({
		        url: 'api/post/create_post_vue', 
                type: 'POST', //POST is to create a new user
                cache : false,
                dataType    : 'json',
                processData : false,
                contentType: false,
                //contentType:"application/json; charset=utf-8",						  
                //contentType: 'application/x-www-form-urlencoded; charset=utf-8',
                //contentType: 'multipart/form-data',
			    //crossDomain: true,
			    //headers: {'Content-Type': 'application/x-www-form-urlencoded', 'Authorization': 'Bearer ' + this.$store.state.api_tokenY},
                //headers: { 'Content-Type': 'application/json',  },
			    //contentType: false,
			    //dataType: 'json', //In Laravel causes crash!!!!!// without this it returned string(that can be alerted), now it returns object
           
			    //passing the data
                data: formData, //dataX//JSON.stringify(dataX)  ('#createNew').serialize()
		        //Not used below, reassigned to append
                /*{   
                    _token: this.tokenXX, //csrf token	
                    title:    this.title,	
                    body:     this.body,
                    myImages: imagesToSend,	//array of images
               
			    }, */
                success: function(data) {
                    console.log("success");            
                    console.log("success" + JSON.stringify(data, null, 4));
                    if(data.error == true ){ //if Rest API endpoint returns any predefined validation error
                        var text = data.data;
                        swal("Check", text, "error");
                    
                        //if any validation errors (i.e if REST Contoller returns json ['error': true, 'data': 'Good, but validation crashes', 'validateErrors': title['Validation err text'],  body['Validation err text']])
                        if(data.validateErrors){
                            var tempoArray = []; //temporary array
                            for (var key in data.validateErrors) { //Object iterate
                                var t = data.validateErrors[key][0]; //gets validation err message, e.g validateErrors.title[0]
                                tempoArray.push(t);
                            }
                       
                            that.errroList = tempoArray; //change state errroList //{this-that} fix
                        }
                  
                    //if load new is OK
                    } else if(data.error == false){
                        var tempoArray = []; 
                        that.errroList = tempoArray; //clears validationn errors if any. Simple that.errroList = [] won't work
                        swal("Good", "Bearer Token is OK", "success");
                        swal("Good",  data.data, "success");
                        
                        //clear the form fields after successfull saving
                        that.clearInputFieldsAndFiles();
                        
                        //re-new Vuex store!!!!!!!
                        
                    }
			        that.isCreatingPost = false; //change button text            
                },  //end success
            
			    error: function (errorZ) {
                    swal("Error happened",  "Crashed", "error");
                    swal("Error happened",  JSON.stringify(errorZ, null, 4), "error");                     
			        console.log("error" +  JSON.stringify(errorZ, null, 4));
                    console.log(errorZ.responseText);
                    console.log(errorZ);
                
                    /*
                    if (errorZ.status == 422) {
                        swal("Error", "Validation crashed", "error");  
                    }*/
                
                    if(errorZ.responseJSON != null){
                        if(errorZ.responseJSON.error == true || errorZ.responseJSON.error == "Unauthenticated."){ //if Rest endpoint returns any predefined error
                            swal("Error: Unauthenticated", "Check Bearer Token", "error");  
                            //alert("Unauthenticated");                  
                        } 
                    }
                    swal("Error", "Something crashed", "error");  
                
                    that.isCreatingPost = false; //change button text   
			    }	  
            });                             
            //END AJAXed  part 