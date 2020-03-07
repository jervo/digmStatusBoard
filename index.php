<?php


	// ini_set('display_errors', 'On');
	// error_reporting(E_ALL | E_STRICT);

	require_once('pieces/config/db.php');

    //bring in faculty info
    $sql = mysqli_query($con,"SELECT * from facultyInfo ORDER BY name");
    $faculty = mysqli_num_rows($sql);

    $datesql=mysqli_query($con, "SELECT * from boardDates");
    while($data[]=mysqli_fetch_row($datesql));

    $setRooms_select=mysqli_query($con, "SELECT * FROM rooms
                        ORDER BY ID");
    $setRooms = array();
    while($setRoom = mysqli_fetch_array($setRooms_select)) {
    	$setRooms[] = $setRoom;
		$setRoomsInt[] = (int)$setRoom;

		$infosql=mysqli_query($con, "SELECT * from statusBoardInfo");
    while($info[]=mysqli_fetch_row($infosql));
	}

	//bring in quotes
    $quotesql=mysqli_query($con, "SELECT * FROM quotes ORDER BY ID");

    $jd = date("w");

	switch ($jd) {
	    case 0:
	        $jd = "S";
	        break;
	    case 1:
	        $jd = "M";
	        break;
	    case 2:
	        $jd = "T";
	        break;
	    case 3:
	        $jd = "W";
	        break;
	    case 4:
	        $jd = "R";
	        break;
	    case 5:
	        $jd = "F";
	        break;
	    case 6:
	        $jd = "Sa";
	        break;
	}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>DIGM Status</title>

	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<meta HTTP-EQUIV="refresh" CONTENT="3600">

	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">


	<!-- Icons -->
	<link rel="apple-touch-icon" href="a/icons/icon-57.png">
	<link rel="apple-touch-icon" sizes="76x76" href="a/icons/icon-76.png">
	<link rel="apple-touch-icon" sizes="120x120" href="a/icons/icon-120.png">
	<link rel="apple-touch-icon" sizes="152x152" href="a/icons/icon-152.png">

	<!-- Fonts "futura-pt-condensed" & "futura-pt" -->
	<script src="//use.typekit.net/gwn4yfg.js"></script>
	<script>try{Typekit.load();}catch(e){}</script>


	<link rel="stylesheet" href="a/css/app.css">




</head>
<body class="not-loaded">
	<div class="overlay"></div>
	<div class="wrapper">
		<header>
			<div id="title">
				<h1>DIGM Status</h1>
			</div>
			<div id="info">
				<a href="#" class="menu-btn"><span></span></a>
				<p id="cur-week">Week <span id="week-num">8</span></p>
				<p><span id="days-left-1">37</span> days til finals</p>
			</div>
			<div class="clock"><span id="time"></span><span id="time-of-day"></span></div>
			<div class="date">May 10th, 2014</div>
			<div id="weather">

			</div>
			<ul class="mobile-menu">
				<li><a href="#labs">Lab Schedule</a></li>
				<li class="video-link"><a href="#video">DIGM Demo Reel</a></li>
				<li><a href="#faculty">Faculty Information</a></li>
				<li><a href="#featured">Featured Event</a></li>
				<li><a href="#news">DIGM News</a></li>
				<li><a href="#jobs">DIGM Jobs</a></li>
				<li><a href="#ace-labs">ACE Lab</a></li>
				<li><a href="#links">Quick Links</a></li>
			</ul>
		</header>

		<div class="container">
			<?php include "pieces/schedule-parse.php" ?>
			<section id="labs" >
				<div class="help-info">
					<h5>Need Help?</h5>
					<ul>
						<li><a href="mailto:support.westphal@drexel.edu">support.westphal@drexel.edu</a></li>
						<li><a href="mailto:web.westphal@drexel.edu">web.westphal@drexel.edu</a></li>
						<li><a href="tel:+1-215-895-2906">215-895-2906</a></li>
					</ul>
				</div>
				<?php
					foreach ($allEvents as $event) {

						if(in_array($jd, $event[10])) {
							createModal($event[0], $event[3], $event[5], $event[6], $event[11], $event[7], $event[9]);
						}

					}
				?>


				<h2 class="section-header open">Lab Schedule</h2>
				<ul id="day-selector" class="<?php curDay(); ?>">
					<li class="M">M</li>
					<li class="T">T</li>
					<li class="W">W</li>
					<li class="R">R</li>
					<li class="F">F</li>
				</ul>
				<div class="section-content schedule">
					<ul class="zebra-lines">
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
					</ul>
					<ul class="times">
						<li class="current-time--small"></li>
						<li class="am">8</li>
						<li>9</li>
						<li>10</li>
						<li>11</li>
						<li class="pm">12</li>
						<li>1</li>
						<li>2</li>
						<li>3</li>
						<li>4</li>
						<li>5</li>
						<li>6</li>
						<li>7</li>
						<li>8</li>
						<li>9</li>
						<li>10</li>
					</ul>

					<div class="row-container">
						<div class="current-time--large"></div>
						<?php
							//Monday
							foreach ($setRooms as $setRoom) {
								echo '<div class="row schedule-M">';
								echo '<h3 class="row-label">';
								echo $setRoom[1];
								echo '</h3>';
								echo '<ul class="schedule-events">';
								foreach ($allEvents as $event) {
									if ($event[5] == $setRoom[1] && in_array("M", $event[10])) {
										createEventsHTML($event[0],$event[1],$event[2],$event[3],$event[4],$event[5],$event[6],$event[7],$event[8],$event[9]);
									}
								}
								echo "</ul>";
								echo "</div>";
							}


							//Tuesday
							foreach ($setRooms as $setRoom) {
								echo '<div class="row schedule-T">';
								echo '<h3 class="row-label">';
								echo $setRoom[1];
								echo '</h3>';
								echo '<ul class="schedule-events">';
								foreach ($allEvents as $event) {
									if ($event[5] == $setRoom[1] && in_array("T", $event[10]))
										createEventsHTML($event[0],$event[1],$event[2],$event[3],$event[4],$event[5],$event[6],$event[7],$event[8],$event[9]);
								}
								echo "</ul>";
								echo "</div>";
							}



							//Wednesday
							foreach ($setRooms as $setRoom) {
								echo '<div class="row schedule-W">';
								echo '<h3 class="row-label">';
								echo $setRoom[1];
								echo '</h3>';
								echo '<ul class="schedule-events">';
								foreach ($allEvents as $event) {
									if ($event[5] == $setRoom[1] && in_array("W", $event[10]))
										createEventsHTML($event[0],$event[1],$event[2],$event[3],$event[4],$event[5],$event[6],$event[7],$event[8],$event[9]);
								}
								echo "</ul>";
								echo "</div>";
							}


							//Thursday

							foreach ($setRooms as $setRoom) {
								echo '<div class="row schedule-R">';
								echo '<h3 class="row-label">';
								echo $setRoom[1];
								echo '</h3>';
								echo '<ul class="schedule-events">';
								foreach ($allEvents as $event) {
									if ($event[5] == $setRoom[1] && in_array("R", $event[10]))
										createEventsHTML($event[0],$event[1],$event[2],$event[3],$event[4],$event[5],$event[6],$event[7],$event[8],$event[9]);
								}
								echo "</ul>";
								echo "</div>";
							}


							//Friday
							foreach ($setRooms as $setRoom) {
								echo '<div class="row schedule-F">';
								echo '<h3 class="row-label">';
								echo $setRoom[1];
								echo '</h3>';
								echo '<ul class="schedule-events">';
								foreach ($allEvents as $event) {
									if ($event[5] == $setRoom[1] && in_array("F", $event[10]))
										createEventsHTML($event[0],$event[1],$event[2],$event[3],$event[4],$event[5],$event[6],$event[7],$event[8],$event[9]);
								}
								echo "</ul>";
								echo "</div>";
							}

						?>
					</div>
				</div>
			</section>

			<section id="video">
				<h2 class="section-header">DIGM Demo Reel</h2>
				<div id="vimeo-player"></div>
			</section>


			<section id="faculty">
				<h2 class="section-header">Faculty Information</h2>
				<div class="section-content">

				<div class="faculty-table <?php if($faculty >= 24) echo 'scroll-table';?>">
					<table style="top:0px;">
						<thead>
							<tr>
								<td>Name</td>
								<td>Title</td>
								<td>Office</td>
								<td>Email</td>
								<td>Phone</td>
							</tr>
						</thead>
						<tbody>
						<?php
						while ($row = mysqli_fetch_row($sql)) {?>
							<tr <?php if($row[8] ==  "Yes") echo 'class="featured"';?>>
								<td><?php echo $row[1]?></td>
								<td><?php echo $row[2]?></td>
								<td><?php echo $row[3]?></td>
								<td><?php echo $row[4]?></td>
								<td><?php echo $row[5]?></td>
							</tr>
						<?php }?>
						</tbody>
					</table>
					</div>
				</div>
			</section>

			<section id="featured" class="news-card">
				<h2  class="section-header">Featured Events</h2>
				<div class="section-content digm-drexel digm-jobs">
					<?php include "pieces/views/feedAceFeatured.php" ?>
				</div>
			</section>


			<section id="news" class="t-half news-card">
				<h2 class="section-header">DIGM News</h2>
				<div class="section-content digm-drexel digm-news">
					<ul class="rss-items">
						<?php include 'pieces/views/feedAceLabsNews.php' ?>
					</ul>
				</div>
			</section>


			<section id="jobs" class="t-half news-card">
				<h2 class="section-header">DIGM Jobs</h2>
				<div class="section-content digm-drexel digm-jobs">
					<ul class="rss-items">
						<?php include 'pieces/views/feedDigmJobs.php' ?>
					</ul>
				</div>
			</section>

			<section id="ace-labs" class="t-half news-card">
				<h2 class="section-header">ACE Lab</h2>
				<div class="section-content digm-drexel digm-jobs">
					<ul class="rss-items">
						<?php include 'pieces/views/feedAceLabs.php' ?>
					</ul>
				</div>
			</section>


			<section id="links" class="t-half">
				<h2 class="section-header">Quick Links</h2>
				<div class="section-content">
					<p>For more DIGM Drexel resources, check out the links below.</p>
					<ul>
						<li><a href="http://www.drexel.edu/westphal/"> Drexel's Westphal Website</a></li>
						<li><a href="http://www.drexel.edu/westphal/resources/technology/">Westphal IT Department Information</a></li>
						<li><a href="http://cinetv.westphal.drexel.edu/base/workflow/awexpress/">Connecting to Digm Share on and off campus</a></li>
					</ul>
				</div>
			</section>

			<section id="advertisment" class="t-half news-card">
				<h2 class="section-header">Download DIGM Status App!</h2>
				<div class="section-content">
					<img src="a/imgs/app-ad.png" alt="Download DIGM Status">
				</div>
			</section>

			<div id="term-info">
				<div class="info--days-left">
					<p>days left until finals</p>
					<p id="days-left-2">37</p>
					<canvas id="myChart" width="165" height="165"></canvas>
					<p class="weeks">Week <span id="info--week">8</span></p>
				</div>
				<div class="info--quote">
						<!-- Chelsea.. Quote goes here + author -->
						<p id="faculty-quote">“Why aren't you rendering? You should always be rendering.”</p>
						<p id="quote-author">-Jeremy Fernsler</p>
				</div>
			</div>


			<footer>
				<p>DIGM Status &copy; Drexel University 2015</p>
			</footer>

			<div id="timeline">
				<div id="fall-term">
					<p>Fall Quarter</p>
				</div>

				<div id="winter-break">
				</div>

				<div id="winter-term">
					<p>Winter Quarter</p>
				</div>

				<div id="spring-break">
				</div>


				<div id="spring-term">
					<p>Spring Quarter</p>
					<p class="senior-show">Senior Show</p>
				</div>

				<div id="summer-break">
				</div>

				<div id="summer-term">
					<p>Summer Quarter</p>
				</div>

				<div id="term-overlay"></div>

			</div>
		</div> <!--container-->
	</div> <!--wrapper-->

	<?php //include 'pieces/views/feedModals.php' ?>

	<script src="a/js/vendor/jquery.js"></script>
	<script type="text/javascript" src="a/js/vendor/Chart.js"></script>
	<script type="text/javascript" src="a/js/vendor/vimeowrap.js"></script>
	<script src="//f.vimeocdn.com/js/froogaloop2.min.js"></script>
	<script type="text/javascript" src="a/js/date.js"></script>
	<script type="text/javascript" src="a/js/app.js"></script>
	<script>


    // Provide dates for JS
		var fallStartDate = <?php print('"'.$data[0][2].'"')?>;
		var summerEndDate = <?php print('"'.$data[1][2].'"')?>;
		var termStartDate = <?php print('"'.$data[3][2].'"')?>;
		var termEndDate = <?php print('"'.$data[4][2].'"')?>;
		var finalsStart = <?php print('"'.$data[2][2].'"')?>;

		termTimeline(fallStartDate, summerEndDate);
		currentWeek(termStartDate, termEndDate);
		daysLeftFinals(termStartDate, finalsStart);

		//First part is the quotes and second the author
		//Populate JS array w/ quotes
		var facultyQuotes = [
			<?php
				$i = 0;
				while($quotes[]=mysqli_fetch_row($quotesql));
				$len = 0;
				foreach ($quotes as $quote) {
					$len++;
				}
				foreach ($quotes as $quote) {
					$facultyQuote = $quote[1];
					$facultyAuthor = $quote[2];

					$facultyQuote = preg_replace('/[^(\x20-\x7F)]*/', '', $facultyQuote);
					$facultyAuthor = preg_replace('/[^(\x20-\x7F)]*/', '', $facultyAuthor);

					$facultyQuote = trim($facultyQuote);
					$facultyAuthor = trim($facultyAuthor);

					if ($i == $len - 1 && $facultyQuote && $facultyAuthor) {
				      	echo '["'.$facultyQuote.'",';
					   	echo '"'.$facultyAuthor.'"]';
				    }
				    else if ($facultyQuote && $facultyAuthor) {
				    	echo '["'.$facultyQuote.'",';
					   	echo '"'.$facultyAuthor.'"],';
				    }
			    	$i++;
				}
			?>
		];

		randomQuote(facultyQuotes);


		//VIMEO LUWES
		vimeowrap('vimeo-player').setup({
        urls: [
            '<?php echo $info[5][1]; ?>'
        ],
				autoplay: "true",
				repeat: "always",
				width: "100%",
				height: "0"
    });

		$(window).on('load', function() {
    	$('body').removeClass('not-loaded');
		});








	</script>
	<script type="text/javascript" src="a/js/vendor/jquery.simpleWeather.js"></script>


</body>
</html>
