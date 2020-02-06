<?php
$id = $_POST['id'];

require_once('../config/db.php');

mysqli_query($con, "DELETE FROM schedule
          WHERE ID = '$id'");

          echo "<script>
                       alert('Event deleted.');
                       window.location.href = '/status/pieces/dashboard.php';
               </script>";

?>
