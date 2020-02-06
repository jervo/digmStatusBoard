<?php
require_once('../config/db.php');

$addRoom = $_POST['addRoom'];

mysqli_query($con, "CREATE TABLE IF NOT EXISTS `rooms`(  ID int AUTO_INCREMENT, room varchar(255), PRIMARY KEY (ID));");

mysqli_query($con, "INSERT INTO rooms (room) VALUES ('$addRoom')");

echo "<script>
             alert('Room added.');
             window.location.href = '/status/pieces/dashboard.php';
     </script>";

?>
