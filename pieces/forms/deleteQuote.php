<?php
$id = $_POST['id'];

require_once('../config/db.php');

mysqli_query($con, "DELETE FROM quotes
          WHERE ID = '$id'");

          echo "<script>
                       alert('Quote deleted.');
                       window.location.href = '/status/pieces/dashboard.php';
               </script>";

?>
