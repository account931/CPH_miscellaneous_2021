<?php
//Model 
namespace Classes\My_Booking;


class BookingProcess 
{
	public $todayIs;  //assigning here will crash, use in constructor only, public $todayIs= self::getCurrentDay(); 
	public $sqlData = array(); //to hold emulated sql query results. Type: Array of objects
	
   
	
	
	function __construct(){
		
		$this->todayIs = self::getCurrentDay(); //e.g "27-03-2022"
		
		 //emulated sql query results, as we don't work here with real SQL, Type: Array of objects
	    $this->sqlData = array(
	        (object)array ('name' => 'name1', 'email' => 'email1@gmail.com', 'date' => $this->todayIs, 'slot' => '10.45'),
		    (object)array ('name' => 'name2', 'email' => 'email2@gmail.com', 'date' => $this->todayIs, 'slot' => '12.30'),
			(object)array ('name' => 'name3', 'email' => 'email3@gmail.com', 'date' => $this->todayIs, 'slot' => '14.30')
	    );
		
		
		
		
	}

    /**
    * Function to return today date, e.g "27-03-2022"
	* @param 
    * @return string $day, e.g "27-03-2022"
    */
	public function getCurrentDay(){
        $day = date("d-m-Y");
		return $day;
	}
	
	

	/**
    * Function to return emulated SQL query result 
	* @param string $day
    * @return Type: Array of objects $this->sqlData
    */
	public function getSQLDataForDate($day=''){
        if ($day=="") { 
		    $day = date("Y-m-d"); //if arg is not provided, take today
		}
		
		//in real app, when working with DB, make here SQL query to get data based on ->where('db_column_name', $day)..........
		//..........................
		
		return $this->sqlData;
	}
	
	/**
    * Function to build a schedule for 
	* @param array of objects $sql, $this->sqlData - emulated sql query results, as we don't work here with real SQL
    * @return string $schedule
    */
	public function createSchedule($sql){
		$WORK_HOUR_START = 9;
		$WORK_HOUR_END   = 18;
		$INTERVAL        = 15; //shedule slots are possible for every 15 minutes
		$schedule;  //result
		$takenSlots = array(); //e.g array("10.45", "12.30");
		
		//check for taken slots (push taken slots to array) //e.g array("10.45", "12.30");
		foreach($sql as $k){
		    array_push($takenSlots, $k->slot);
		}
		//var_dump($takenSlots);

        //Build schedule with taken/free time slots		
		for($i = $WORK_HOUR_START; $i < $WORK_HOUR_END; $i++){ //hours
		
		    $schedule.= "<div class='col-sm-12 col-xs-12'>"; //wrap each our hour slots in one horiz div
			
			for($j = 0; $j < 60; $j += $INTERVAL){             //minutes
			
			    $hour    = ($i < 10 ) ? "0" . $i  : $i;       //gets the hour, if hour <10, i.e if 9, returns 09
				$minutes = ($j == 0 ) ? "0" . $j  : $j;        //gets the minutes, if minutes <10, i.e if 9, returns 09
				
				$item_toSearch = $hour .".". $minutes; //e.g 10.45
				
			    if( in_array($item_toSearch, $takenSlots) == true){ //if $item_toSearch is found in array  $takenSlots. If used array_search() 1st element was never found
					
				    $schedule.= "<div class='col-sm-2 col-xs-2 slot taken-slot not-selected shadowX'>" . $hour . ":"  . $minutes  . "</div>";

				} else {
				
			        $schedule.= "<div class='col-sm-2 col-xs-2 slot free-slot not-selected shadowX'>" . $hour . ":"  . $minutes  . "</div>";
				}
			}
			$schedule.= "</div>";
		}
		return $schedule;
	}
	
	/**
    * Function to to save new booking 
	* @param 
    * @return 
    */
	public function saveNewBooking(){
		//check here if booking with the same time slot and date exist, if TRUE, return false
		//check if date valid
		//check if date is not Saturday, Sunday
	}
	
}
