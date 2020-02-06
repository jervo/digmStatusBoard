<?php

// ini_set('display_errors', '1');
// error_reporting(E_ALL);

$scheduleKey_courseName = $_POST['course-name'];
$scheduleKey_courseTitle = $_POST['course-title'];
$scheduleKey_building = $_POST['building'];
$scheduleKey_room = $_POST['room'];
$scheduleKey_startTime = $_POST['start-time'];
$scheduleKey_endTime = $_POST['end-time'];
$scheduleKey_day = $_POST['day'];
$scheduleKey_instructor = $_POST['instructor'];


require_once('config/db.php');

//create table if not there
mysqli_query($con, "CREATE TABLE IF NOT EXISTS `schedule`(  ID int AUTO_INCREMENT, course varchar(255), courseTitle varchar(255), building varchar(255), room varchar(255), startTime varchar(255), endTime varchar(255), day varchar(255), instructor varchar(255), PRIMARY KEY (ID)
);");

//clear past data
mysqli_query($con, "TRUNCATE TABLE schedule");

$csv = array_map('str_getcsv', file('doc/currentSchedule.csv'));
array_walk($csv, function(&$a) use ($csv) {
  $a = array_combine($csv[0], $a);
});

//loop through csv and import data w/ key
foreach ($csv as $row) {
  $course = $row[$scheduleKey_courseName];
  $courseTitle = $row[$scheduleKey_courseTitle];
  $building = $row[$scheduleKey_building];
  $room = $row[$scheduleKey_room];
  $startTime = $row[$scheduleKey_startTime];
  $endTime = $row[$scheduleKey_endTime];
  $day = $row[$scheduleKey_day];
  $instructor = $row[$scheduleKey_instructor];

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
}

include('dashboard.php');


 ?>
