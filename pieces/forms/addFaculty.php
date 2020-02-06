<?php

// ini_set('display_errors', 'On');
// error_reporting(E_ALL | E_STRICT);

$facultyName = $_POST['faculty-add-name'];
$facultyTitle = $_POST['faculty-add-title'];
$facultyOffice = $_POST['faculty-add-office'];
$facultyEmail = $_POST['faculty-add-email'];
$facultyPhone = $_POST['faculty-add-phone'];
$facultyHours = $_POST['faculty-add-hours'];
$facultyImg = $_POST['faculty-add-image'];

require_once('../config/db.php');

mysqli_query($con, "INSERT INTO facultyInfo (
			   		name,
			   		title,
			   		office,
			   		email,
			   		phone,
			   		officeHours,
			   		image)
				VALUES (
					  '$facultyName',
			   		'$facultyTitle',
			   		'$facultyOffice',
			   		'$facultyEmail',
			   		'$facultyPhone',
			   		'$facultyHours',
			   		'$facultyImg')"
			);


			echo "<script>
			             alert('Faculty added.');
			             window.location.href = '/status/pieces/dashboard.php';
			     </script>";

?>
