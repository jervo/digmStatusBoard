<?php

require_once('config/db.php');
$events_select=mysqli_query($con, "SELECT * FROM schedule
                    ORDER BY ID");
$events = array();

while($event = mysqli_fetch_array($events_select))
$events[] = $event;

$allEvents = array();
$allModals = array();
$i = 0;

foreach ($events as $event) {
  // print_r($event);
	$course = $event[1]; //5
	$courseTitle = $event[2];  //7
	$building = $event[3]; //19
	$room = $event[4]; //20
	$start = $event[5]; //21
	$end = $event[6]; //22
	$day = $event[7]; //23
	$instructor = $event[8]; //27

	//split up class days if more than 1
	$classDayUnfiltered = str_split(trim($day));

	//clean up spaces or other characters
	$classDay = array_filter($classDayUnfiltered, function($var){
	    return preg_match('/^[a-z-]+$/i', $var);
	});


	$rmNum = (int)$room;
	$className = trim($courseTitle);
	$name = $instructor;

	$startMinutes = substr($start, -2);
	$startHour = substr($start, 0, -2);

	$endMinutes = substr($end, -2);
	$endHour = substr($end, 0, -2);

	$totalEndMin = ($endHour * 60) + $endMinutes;
	$totalStartMin = ($startHour * 60) + $startMinutes;
	$totalLength = ($totalEndMin - $totalStartMin);
	$totalMins = $totalLength / 60;
	$totalHeight = $totalMins * 6.36042;
	$classNameShort = $className;
	if( strlen($className) > 15 ) {
		$classNameShort = substr($className, 0, 15) . "...";
	}

	$instructorName = explode(",", $name);


	$allEvents[$i] = array($i, $totalLength, $totalStartMin, $course, $totalMins, $rmNum, $start, $className, $classNameShort, $instructorName[0], $classDay, $end, $instructorName);

	$i++;


	}

	function createEventsHTML($eventID, $totalLength, $totalStartMin, $course, $totalMins, $rmNum, $start, $className, $classNameShort, $instructorName ){
		if ($totalMins >= 2.8){
			echo '<li id="event-'.$eventID.'" class="event l'.$totalLength .' s'.$totalStartMin. " rm". $rmNum . " " . "tm". $start  . " " . '"> <p class="className">'  . $classNameShort . '</p>' . '<p class="instructorName">' . $instructorName . '</p><p class="course">'. $course . '</p>';
	    } elseif ($totalMins >= 1.30){
	     	echo '<li id="event-'.$eventID.'" class=" event-md event l'.$totalLength .' s'.$totalStartMin. " rm". $rmNum . " " . "tm". $start  . " " . '"><p class="className">' . $classNameShort. '</p>';
	     } else {
	     	echo '<li id="event-'.$eventID.'" class="event l'.$totalLength .' s'.$totalStartMin. " rm". $rmNum . " " . "tm". $start  . " " . '">';
	    }
	}

	function createModal($eventID, $course, $rmNum, $start, $end, $className, $instructorName){
		echo '<div id="modal-'.$eventID.'" class="modal"><p class="close">X</p><h3>'.$className.'</h3><ul><li><b>Course:</b> ' . $course . '</li><li><b>Room:</b> '. $rmNum . '</li><li><b>Instructor:</b> ' . $instructorName . '</li><li><b>Time:</b> ' . $start . "-" . $end . "</li></ul></div>";
	}

	function printArray($elementArray) {
		foreach($elementArray as $val) {
			echo $val;
		}
	}

	function curDay() {
		$jd = date("w");
		switch ($jd) {
		    case 0:
		        $jd = "S";
		        break;
		    case 1:
		        $jd = "M";
		        break;
		    case 2:
		        $jd = "T";
		        break;
		    case 3:
		        $jd = "W";
		        break;
		    case 4:
		        $jd = "R";
		        break;
		    case 5:
		        $jd = "F";
		        break;
		    case 6:
		        $jd = "Sa";
		        break;
		}
		echo $jd;
	}


?>
