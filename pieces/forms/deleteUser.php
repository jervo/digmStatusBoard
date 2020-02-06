<?php
$id = $_POST['id'];

require_once('../config/db.php');

mysqli_query($con, "DELETE FROM users
          WHERE user_name = '$id'");

          echo "<script>
                       alert('User deleted.');
                       window.location.href = '/status/pieces/dashboard.php';
               </script>";

?>
