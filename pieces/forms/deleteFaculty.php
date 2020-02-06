<?php
$id = $_POST['id'];

require_once('../config/db.php');

mysqli_query($con, "DELETE FROM facultyInfo
          WHERE ID = '$id'");

echo "<script>
             alert('Faculty deleted.');
             window.location.href = '/status/pieces/dashboard.php';
     </script>";

?>
