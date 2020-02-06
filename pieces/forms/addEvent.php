<?php
$course = $_POST['course'];
$courseTitle = $_POST['courseTitle'];
$building = $_POST['building'];
$room = $_POST['room'];
$startTime = $_POST['startTime'];
$endTime = $_POST['endTime'];
$day = $_POST['day'];
$instructor = $_POST['instructor'];

require_once('../config/db.php');

mysqli_query($con, "INSERT INTO schedule (
			   		course,
			   		courseTitle,
			   		building,
			   		room,
			   		startTime,
			   		endTime,
			   		day,
			   		instructor)
				VALUES (
					'$course',
			   		'$courseTitle',
			   		'$building',
			   		'$room',
			   		'$startTime',
			   		'$endTime',
			   		'$day',
			   		'$instructor')"
			);

			echo "<script>
			             alert('Event added.');
			             window.location.href = '/status/pieces/dashboard.php';
			     </script>";

?>
