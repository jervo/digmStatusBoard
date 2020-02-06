<?php
    // ini_set('display_errors', 'On');
    // error_reporting(E_ALL | E_STRICT);

    // checking for minimum PHP version
    if (version_compare(PHP_VERSION, '5.3.7', '<')) {
        exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
    } else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
        // if you are using PHP 5.3 or PHP 5.4 you have to include the password_api_compatibility_library.php
        // (this library adds the PHP 5.5 password hashing functions to older versions of PHP)
        require_once("libraries/password_compatibility_library.php");
    }

    // include the configs / constants for the database connection
    require_once("config/db.php");

    // load the login class
    require_once("classes/Login.php");
    $login = new Login();

    // ... ask if we are logged in here:
    if ($login->isUserLoggedIn() == true) {
?>
<?php include 'views/pieceHeader.php'; ?>

  <div class="dashboard-controls">

       <?php
          if( $_SESSION['user_name'] == "admin") {
            echo '<p><a href="register.php">Manage Users</a></p>';
          }
      ?>
      <p class="control-logout"><a href="index.php?logout">Logout</a></p>

      <ul class="dashboard-nav">
         <li><a href="#titles">Titles &amp; URL</a></li>
         <li><a href="#dates">Term Dates</a></li>
         <li><a href="#faculty-manager">Faculty Information</a></li>
         <li><a href="#quotes">Faculty Quotes</a></li>
         <li><a href="#csv">Manage Schedule</a></li>
         <li><a href="#rooms">Rooms</a></li>
     </ul>

    </div>

        <div id="add-form">
            <h1 class="page-title">Dashboard <span>DIGM Status Board</span></h1>

            <form action="dashboard-upload.php" method="post"
                  id="add_board_form">

                    <section id="titles">
                      <h3 class="active" data-toggle-trigger="titles">Titles &amp; URL</h3>
                      <div data-toggle-content="titles">
                        <?php include 'titles-feeds-manager.php'; ?>
                      </div>
                    </section>

                    <section id="dates">
                      <h3 class="active" data-toggle-trigger="dates">Academic Year Dates</h3>
                      <div data-toggle-content="dates">
                        <?php include 'dates-manager.php'; ?>
                      </div>
                    </section>
            </form>

            <section id="faculty-manager">
              <h3 class="active" data-toggle-trigger="faculty">Faculty Information</h3>
              <div data-toggle-content="faculty">
                <?php include 'faculty-manager.php'; ?>
              </div>
            </section>



            <section id="quotes">
              <h3 class="active" data-toggle-trigger="quotes">Faculty Quotes</h3>
              <div data-toggle-content="quotes">
                <?php include 'quotes-manager.php'; ?>
              </div>
            </section>

            <section id="csv">
              <h3 class="active" data-toggle-trigger="csv">Manage Schedule</h3>
              <div data-toggle-content="csv">
                <?php include 'schedule-manager.php'; ?>
              </div>
            </section>

        </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script>

        $(document).ready(function(){

          var area = document.getElementById("quote-content");
          var message = document.getElementById("quote-message");
          var maxLength = 130;
          var checkLength = function() {
              if(area.value.length < maxLength) {
                  message.innerHTML = (maxLength-area.value.length) + " characters remaining";
              }
          }

          setInterval(checkLength, 300);

          var accordion = {
            titles: "active",
            dates: "active",
            faculty: "active",
            quotes: "active",
            csv: "active"
          };


          if(localStorage.length > 0){
            accordion = JSON.parse(localStorage.getItem("accordion"));

            $('[data-toggle-trigger]').removeClass();

            $('[data-toggle-trigger="titles"]').addClass(accordion.titles);
            $('[data-toggle-trigger="dates"]').addClass(accordion.dates);
            $('[data-toggle-trigger="faculty"]').addClass(accordion.faculty);
            $('[data-toggle-trigger="quotes"]').addClass(accordion.quotes);
            $('[data-toggle-trigger="csv"]').addClass(accordion.csv);

            for (item in accordion) {
              if(accordion[item] == "inactive") {
                var itemName = '[data-toggle-content="' + item +'"]';
                $(itemName).hide();
              }
            }
          }

          $('[data-toggle-trigger]').click(function(){
            var key = $(this).data('toggle-trigger');
            var selector = '[data-toggle-content="'+ key +'"]';
            $(selector).slideToggle();
            $(this).toggleClass('active').toggleClass('inactive');

            accordion[key] = $(this).attr("class");

            localStorage.setItem('accordion', JSON.stringify(accordion));

          });

        });


    </script>
    </body>
</html>
<?php } //end login if ?>
