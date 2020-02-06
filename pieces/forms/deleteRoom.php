<?php
require_once('../config/db.php');
$id = $_POST['id'];

mysqli_query($con, "DELETE FROM rooms
          WHERE ID = '$id'");

          echo "<script>
                       alert('Room deleted.');
                       window.location.href = '/status/pieces/dashboard.php';
               </script>";

?>
