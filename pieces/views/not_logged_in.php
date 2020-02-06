<?php

include 'views/pieceHeader.php';
// show potential errors / feedback (from login object)
?>

<!-- login form box -->
<section class="dashboard-login-wrap">
  <form class="dashboard-login" method="post" action="index.php" name="loginform">


      <img src="../a/imgs/westphal_logo.png" alt="">

      <h1>DIGM Status Board</h1>

      <p>
        <?php if (isset($login)) {
            if ($login->errors) {
                foreach ($login->errors as $error) {
                    echo $error;
                }
            }
            if ($login->messages) {
                foreach ($login->messages as $message) {
                    echo $message;
                }
            }
        } ?>
      </p>

      <input id="login_input_username" placeholder="Username" class="login_input" type="text" name="user_name" required />

      <input id="login_input_password" placeholder="Password" class="login_input" type="password" name="user_password" autocomplete="off" required />

      <input type="submit"  name="login" value="Log in" />

  </form>
</section>
