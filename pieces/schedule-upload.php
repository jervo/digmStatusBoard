<?php include 'views/pieceHeader.php'; ?>


<div class="dashboard-slim">

  <div class="dashboard-layout-1-3">
    <div class="col">
    <?php

      // ini_set('display_errors', '1');
    	// error_reporting(E_ALL);

    	use SimpleExcel\SimpleExcel;

    	require_once('lib/SimpleExcel/SimpleExcel.php'); // load the main class file (if you're not using autoloader)
    	require_once('config/db.php');

    	$uploaddir = 'doc/';
    	$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
    	$uploadname = $_FILES['userfile']['name'];
    	$ext = pathinfo($uploadfile, PATHINFO_EXTENSION);

    	if ((move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) && ($ext == "csv") ) {
        rename($uploadfile, $uploaddir . 'currentSchedule.csv');

        echo '<h2 class="success">Success!</h2>';
        echo "<p>File is valid, and was successfully uploaded.</p>";

        $csv = array_map('str_getcsv', file($uploaddir . 'currentSchedule.csv'));
        array_walk($csv, function(&$a) use ($csv) {
          $a = array_combine($csv[0], $a);
        });

        ?>

          <h2>Please assign the following to their corresponding rows:</h2>

          <form action="schedule-picker.php" method="post" class="dashboard-schedule-picker">
            <label>Course name (ex. WBDV-220):</label>
            <select name="course-name" id="course-name">
            <?php
              $courseKey = array_search('Course', $csv[0]);
              foreach ($csv[0] as $key => $value) {
                if( $key == $courseKey){
                  echo '<option selected value="'.$key.'"';
                  foreach($csv as $i => $row){
                    echo 'data-val-'.$i.'="'.$row[$key].'"';
                  }
                  echo '>*Suggested: '.$value.'</option>';
                } else {
                  echo '<option value="'.$key.'"';
                  foreach($csv as $i => $row){
                    echo 'data-val-'.$i.'="'.$row[$key].'"';
                  }
                  echo '>'.$value.'</option>';
                }
              }
            ?>
            </select>

        <label>Course title (ex. Web Authoring):</label>
        <select name="course-title" id="course-title">
        <?php
          $courseTitleKey = array_search('Course Title', $csv[0]);
          foreach ($csv[0] as $key => $value) {
            if( $key == $courseTitleKey){
              echo '<option selected value="'.$key.'"';
              foreach($csv as $i => $row){
                echo 'data-val-'.$i.'="'.$row[$key].'"';
              }
              echo '>*Suggested: '.$value.'</option>';
            } else {
              echo '<option value="'.$key.'"';
              foreach($csv as $i => $row){
                echo 'data-val-'.$i.'="'.$row[$key].'"';
              }
              echo '>'.$value.'</option>';
            }
          }
        ?>
        </select>

        <label>Building (ex. URBN):</label>
        <select name="building" id="building">
        <?php
          $buildingKey = array_search('Bldg Code', $csv[0]);
          foreach ($csv[0] as $key => $value) {
            if( $key == $buildingKey){
              echo '<option selected value="'.$key.'"';
              foreach($csv as $i => $row){
                echo 'data-val-'.$i.'="'.$row[$key].'"';
              }
              echo '>*Suggested: '.$value.'</option>';
            } else {
              echo '<option value="'.$key.'"';
              foreach($csv as $i => $row){
                echo 'data-val-'.$i.'="'.$row[$key].'"';
              }
              echo '>'.$value.'</option>';
            }
          }
        ?>
        </select>

        <label>Room (ex. 252):</label>
        <select name="room" id="room">
        <?php
          $roomKey = array_search('Room Code', $csv[0]);
          foreach ($csv[0] as $key => $value) {
            if( $key == $roomKey){
              echo '<option selected value="'.$key.'"';
              foreach($csv as $i => $row){
                echo 'data-val-'.$i.'="'.$row[$key].'"';
              }
              echo '>*Suggested: '.$value.'</option>';
            } else {
              echo '<option value="'.$key.'"';
              foreach($csv as $i => $row){
                echo 'data-val-'.$i.'="'.$row[$key].'"';
              }
              echo '>'.$value.'</option>';
            }
          }
        ?>
        </select>

        <label>Start time (ex. 1500):</label>
        <select name="start-time" id="start-time">
        <?php
          $suggestedKey = array_search('Begin Time', $csv[0]);
          foreach ($csv[0] as $key => $value) {
            if( $key == $suggestedKey){
              echo '<option selected value="'.$key.'"';
              foreach($csv as $i => $row){
                echo 'data-val-'.$i.'="'.$row[$key].'"';
              }
              echo '>*Suggested: '.$value.'</option>';
            } else {
              echo '<option value="'.$key.'"';
              foreach($csv as $i => $row){
                echo 'data-val-'.$i.'="'.$row[$key].'"';
              }
              echo '>'.$value.'</option>';
            }
          }
        ?>
        </select>

        <label>End time (ex. 1850):</label>
        <select name="end-time" id="end-time">
        <?php
          $suggestedKey = array_search('End Time', $csv[0]);
          foreach ($csv[0] as $key => $value) {
            if( $key == $suggestedKey){
              echo '<option selected value="'.$key.'"';
              foreach($csv as $i => $row){
                echo 'data-val-'.$i.'="'.$row[$key].'"';
              }
              echo '>*Suggested: '.$value.'</option>';
            } else {
              echo '<option value="'.$key.'"';
              foreach($csv as $i => $row){
                echo 'data-val-'.$i.'="'.$row[$key].'"';
              }
              echo '>'.$value.'</option>';
            }
          }
        ?>
        </select>

        <label>Day (ex. M):</label>
        <select name="day" id="day">
        <?php
          $suggestedKey = array_search('Day', $csv[0]);
          foreach ($csv[0] as $key => $value) {
            if( $key == $suggestedKey){
              echo '<option selected value="'.$key.'"';
              foreach($csv as $i => $row){
                echo 'data-val-'.$i.'="'.$row[$key].'"';
              }
              echo '>*Suggested: '.$value.'</option>';
            } else {
              echo '<option value="'.$key.'"';
              foreach($csv as $i => $row){
                echo 'data-val-'.$i.'="'.$row[$key].'"';
              }
              echo '>'.$value.'</option>';
            }
          }
        ?>
        </select>

        <label>Instructors (ex. John Smith):</label>
        <select name="instructor" id="instructor">
        <?php
          $suggestedKey = array_search('Primary Instructor', $csv[0]);
          foreach ($csv[0] as $key => $value) {
            if( $key == $suggestedKey){
              echo '<option selected value="'.$key.'"';
              foreach($csv as $i => $row){
                echo 'data-val-'.$i.'="'.$row[$key].'"';
              }
              echo '>*Suggested: '.$value.'</option>';
            } else {
              echo '<option value="'.$key.'"';
              foreach($csv as $i => $row){
                echo 'data-val-'.$i.'="'.$row[$key].'"';
              }
              echo '>'.$value.'</option>';
            }
          }
        ?>
        </select>

        <input type="submit" value="Submit">
      </form>
    </div>

    <div class="col">
      <h3>Example Table</h3>

      <div class="table-container">
        <table class="schedule-example">
          <?php foreach($csv as $i => $row){ ?>
            <tr>
              <td class="course"></td>
              <td class="course-title"></td>
              <td><span class="building"></span>-<span class="classroom"></span></td>
              <td><span class="start-time"></span>-<span class="end-time"></span></td>
              <td class="day"></td>
              <td class="instructor"></td>
            </tr>
          <?php } ?>
        </table>
      </div>
    </div>

    <?php

	} else if ($ext != "csv") {
		echo '<h2 class="error">Error</h2>';
		echo "<p>Please upload the correct file type. Your file type was ".$ext.".</p>";
	} else {
		echo '<h2 class="error">Error</h2>';
    echo "<p>Possible file upload attack!</p>";
    echo '<p>Here is some more info about the file:</p><p>';
    print_r($_FILES);
    echo "</p>";
	}



?>

  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script>


  function populateTable(){
    var course = $("#course-name").find(":selected");
    var courseTitle = $("#course-title").find(":selected");
    var building = $("#building").find(":selected");
    var room = $("#room").find(":selected");
    var startTime = $("#start-time").find(":selected");
    var endTime = $("#end-time").find(":selected");
    var day = $("#day").find(":selected");
    var instructor = $("#instructor").find(":selected");
    var rows = $('.schedule-example tr');

    rows.each(function(i){
       var select = 'data-val-' + i;
       //console.log();

       $(this).find('.course').html(course.attr(select));
       $(this).find('.course-title').html(courseTitle.attr(select));
       $(this).find('.building').html(building.attr(select));
       $(this).find('.classroom').html(room.attr(select));
       $(this).find('.start-time').html(startTime.attr(select));
       $(this).find('.end-time').html(endTime.attr(select));
       $(this).find('.day').html(day.attr(select));
       $(this).find('.instructor').html(instructor.attr(select));
    });
  }

  populateTable();


  $(".dashboard-schedule-picker select").change(function() {
      populateTable();
      console.log('change');
  });

</script>
