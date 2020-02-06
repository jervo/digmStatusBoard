<?php
include 'views/pieceHeader.php';
// ini_set('display_errors', 'On');
// error_reporting(E_ALL | E_STRICT);

// include the configs / constants for the database connection
require_once("config/db.php");

// load the login class
require_once("classes/Login.php");
$login = new Login();

// ... ask if we are logged in here:
if ($login->isUserLoggedIn() == true) {
require_once('config/db.php');

?>

<!-- register form -->
<div class="dashboard-slim  dashboard-users">
  <div class="dashboard-inner">

    <h1>Manage Users</h1>

    <table class="dashboard-table">
    <?php

      $query_select=mysqli_query($con, "SELECT * FROM users");


      $users = array();
      while($user = mysqli_fetch_array($query_select))
      $users[] = $user;

      if(count($users) == 1) {
        echo "<p><strong>No registered users currently.</strong></p>";
      }

      foreach ($users as $user) :
        if($user['user_name'] != "admin") {
      ?>

      <tr>
        <td><?php echo $user['user_name']; ?></td>
        <td><?php echo $user['user_email']; ?></td>
        <td><form action="forms/deleteUser.php" method="post"
                  id="delete_user_form">
            <input type="hidden" name="id"
                   value="<?php echo $user['user_name']; ?>" />
            <input type="submit" value="Delete" />
        </form></td>
     </tr>

    <?php }


    endforeach; ?>
    </table>
  </div>

</div>


<form class="dashboard-register dashboard-slim" method="post" action="register.php" name="registerform">

  <div class="dashboard-inner">
      <h1>Register New User</h1>


      <!-- the user name input field uses a HTML5 pattern check -->
      <label for="login_input_username">Username (only letters and numbers, 2 to 64 characters)</label>
      <input id="login_input_username" class="login_input" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_name" required />

      <!-- the email input field uses a HTML5 email type check -->
      <label for="login_input_email">User's email</label>
      <input id="login_input_email" class="login_input" type="email" name="user_email" required />

      <label for="login_input_password_new">Password (min. 6 characters)</label>
      <input id="login_input_password_new" class="login_input" type="password" name="user_password_new" pattern=".{6,}" required autocomplete="off" />

      <label for="login_input_password_repeat">Repeat password</label>
      <input id="login_input_password_repeat" class="login_input" type="password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" />

      <p>
        <b>
        <?php
          // show potential errors / feedback (from registration object)
          if (isset($registration)) {
              if ($registration->errors) {
                  foreach ($registration->errors as $error) {
                      echo $error;
                  }
              }
              if ($registration->messages) {
                  foreach ($registration->messages as $message) {
                      echo $message;
                  }
              }
          }
        ?>
        </b>
      </p>

      <input type="submit"  name="register" value="Register" />

      <!-- backlink -->
      <a href="dashboard.php">Back to Login Page</a>
    </div>
</form>

<?php } ?>
