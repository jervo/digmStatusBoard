<?php
// ini_set('display_errors', 'On');
// error_reporting(E_ALL | E_STRICT);

//Grab apartment information
$reelKey = 1;
$reelTitle = $_POST['reelTitle'];

$digmJobKey = 2;
$digmJobTitle = $_POST['digmJobTitle'];
$digmJobURL = $_POST['digmJobURL'];

$digmEventKey = 3;
$digmEventTitle = $_POST['digmEventTitle'];
$digmEventURL = $_POST['digmEventURL'];

$feautredKey = 4;
$featuredTitle = $_POST['featuredTitle'];
$featuredURL = $_POST['featuredURL'];

$labKey = 5;
$labTitle = $_POST['labTitle'];

$videoAlbumKey = 6;
$videoAlbumURL = $_POST['videoAlbumURL'];

//Term dates
$yearStartKey = 1;
$yearStart = $_POST['yearStart'];

$yearEndKey = 2;
$yearEnd = $_POST['yearEnd'];

$finalStartKey = 3;
$finalStart = $_POST['finalStart'];

$termStartKey = 3;
$termStart = $_POST['termStart'];

$termEndKey = 3;
$termEnd = $_POST['termEnd'];




//Make sure fields are not empty
if (empty($reelTitle) || empty($digmJobTitle) || empty($digmEventTitle) || empty($videoAlbumURL)) {
    echo "<p>Error</p>";
} else {

    // Add information into database
    require_once('config/db.php');

    mysqli_query($con, "INSERT INTO statusBoardInfo
    SET section=1, sectionTitle='$reelTitle'
    ON DUPLICATE KEY UPDATE sectionTitle='$reelTitle'");

    mysqli_query($con, "INSERT INTO statusBoardInfo
    SET section=2, sectionTitle='$digmJobTitle', url='$digmJobURL'
    ON DUPLICATE KEY UPDATE sectionTitle='$digmJobTitle', url='$digmJobURL'");

    mysqli_query($con, "INSERT INTO statusBoardInfo
    SET section=3, sectionTitle='$digmEventTitle', url='$digmEventURL'
    ON DUPLICATE KEY UPDATE sectionTitle='$digmEventTitle', url='$digmEventURL'");

    mysqli_query($con, "INSERT INTO statusBoardInfo
    SET section=4, sectionTitle='$featuredTitle', url='$featuredURL'
    ON DUPLICATE KEY UPDATE sectionTitle='$featuredTitle', url='$featuredURL'");

    mysqli_query($con, "INSERT INTO statusBoardInfo
    SET section=5, sectionTitle='$labTitle'
    ON DUPLICATE KEY UPDATE sectionTitle='$labTitle'");

    mysqli_query($con, "INSERT INTO statusBoardInfo
    SET section=6, sectionTitle='$videoAlbumURL'
    ON DUPLICATE KEY UPDATE sectionTitle='$videoAlbumURL'");

    // Term Dates
    mysqli_query($con, "INSERT INTO boardDates
    SET termID=1, dateName='yearStart', dateValue='$yearStart'
    ON DUPLICATE KEY UPDATE dateValue='$yearStart'");

    mysqli_query($con, "INSERT INTO boardDates
    SET termID=2, dateName='yearEnd', dateValue='$yearEnd'
    ON DUPLICATE KEY UPDATE dateValue='$yearEnd'");

    mysqli_query($con, "INSERT INTO boardDates
    SET termID=3, dateName='finalStart', dateValue='$finalStart'
    ON DUPLICATE KEY UPDATE dateValue='$finalStart'");

    mysqli_query($con, "INSERT INTO boardDates
    SET termID=4, dateName='termStart', dateValue='$termStart'
    ON DUPLICATE KEY UPDATE dateValue='$termStart'");

    mysqli_query($con, "INSERT INTO boardDates
    SET termID=5, dateName='termEnd', dateValue='$termEnd'
    ON DUPLICATE KEY UPDATE dateValue='$termEnd'");



}


?>
