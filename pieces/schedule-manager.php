 <?php
    $events_select=mysqli_query($con, "SELECT * FROM schedule
                        ORDER BY ID");
    $events = array();
    while($event = mysqli_fetch_array($events_select))
    $events[] = $event;

	$rooms_select=mysqli_query($con, "SELECT * FROM rooms
                        ORDER BY ID");
    $rooms = array();
    while($room = mysqli_fetch_array($rooms_select))
    $rooms[] = $room;


?>

	<form enctype="multipart/form-data" action="schedule-upload.php" method="POST">
	    <input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
	    Upload CSV File: <input name="userfile" type="file" />
	    <input type="submit" value="Upload CSV" />
	    <p class="small">Upload the CSV for the lab class schedule. It will be converted into XML and uploaded to pieces/docs. </p>
	</form>

	<hr>

	<div class="table-container">
	<table>
	 <?php foreach ($events as $event) : ?>

	    <tr>
	    <td><?php echo $event[1]; ?></td>
	    <td><?php echo $event[2]; ?></td>
	    <td><?php echo $event[3]."-".$event[4]; ?></td>
	    <td><?php echo $event[5]."-".$event[6]; ?></td>
	    <td><?php echo $event[7]; ?></td>
	    <td><?php echo $event[8]; ?></td>
	    <td><form action="forms/deleteEvent.php" method="post"
	              id="delete_event_form">
	        <input type="hidden" name="id"
	               value="<?php echo $event[0]; ?>" />
	        <input type="submit" value="Delete" />
	    </form></td>
	</tr>
	<?php endforeach; ?>
	</table>
	</div>

	<form action="forms/addEvent.php" method="post" id="add_event_form">
	    <h4>Add a Course</h4>
	    <label>Course (ex. WBDV 240 001)</label>
	    <input type="input" name="course"/>

	    <label>Course Title (ex. Web Authoring I)</label>
        <input type="input" name="courseTitle"/>

        <label>Building Code (ex. URBN)</label>
        <input type="input" name="building"/>

        <label>Room Code (ex. 252)</label>
        <input type="input" name="room"/>

        <label>Start Military Time (ex. 1830)</label>
        <input type="input" name="startTime"/>

        <label>End Military Time (ex. 2120)</label>
        <input type="input" name="endTime"/>

        <label>Day (Letters only, ex. M for Monday, R for Thursday)</label>
        <input type="input" name="day"/>

        <label>Instructor (ex. Smith, John)</label>
        <input type="input" name="instructor"/>

        <input type="submit" value="Add Course" />
	</form>

	<hr>

	<h4 id="rooms">Rooms to Show</h4>
	<ul>
		<?php foreach ($rooms as $room) : ?>
			<li><?php echo $room[1] ?><form action="forms/deleteRoom.php" method="post"
	              id="delete_room_form">
	        <input type="hidden" name="id"
	               value="<?php echo $room[0]; ?>" />
	        <input type="submit" value="[X]" /></form></li>
		<?php endforeach; ?>
	</ul>

	<form action="forms/addRoom.php" method="post" id="add_room_form">
	    <label>Add a Room</label>
	    <input type="input" name="addRoom"/>
        <input type="submit" value="Add Room" />
	</form>
