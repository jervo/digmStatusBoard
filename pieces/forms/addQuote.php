<?php
$quoteText = $_POST['quoteText'];
$quoteText = htmlspecialchars($quoteText, ENT_QUOTES);
$author = htmlspecialchars($_POST['author']);

require_once('../config/db.php');

mysqli_query($con, "INSERT INTO quotes (quoteText, author)
VALUES ('$quoteText', '$author')");

echo "<script>
             alert('Quote added.'); 
             window.location.href = '/status/pieces/dashboard.php';
     </script>";

?>
