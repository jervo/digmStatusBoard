<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

require_once('../config/db.php');

//clear past data
//mysqli_query($con, "DROP TABLE facultyInfo");


// //create table if not there
// mysqli_query($con, "CREATE TABLE IF NOT EXISTS `facultyInfo`
//   (
//     ID int NOT NULL AUTO_INCREMENT,
//     name varchar(255),
//     title varchar(255),
//     office varchar(255),
//     email varchar(255),
//     phone varchar(255),
//     officeHours varchar(255),
//     image varchar(255),
//     featured varchar(255),
//     PRIMARY KEY (ID)
//   )");

mysqli_query($con, "ALTER TABLE facultyInfo ADD featured VARCHAR(255);");


$statementStart = 'UPDATE facultyInfo SET';

foreach ($_POST as $key => $value) {
    //do something
    //echo $key . ' has the value of ' . $value . " ";
    $ID = explode("-", $key);
    $ID = $ID[1];
    $key = substr($key, 0, strpos($key, '-'));
    //echo "Key: ".$key." ID: ".$ID." ";

    $statement = $statementStart." ".$key."='".$value."' WHERE ID=".$ID;

    mysqli_query($con, $statement);
}

//Display page to manage apartments
echo "<script>
             alert('Faculty and Staff updated.');
             window.location.href = '/status/pieces/dashboard.php';
     </script>";
?>
