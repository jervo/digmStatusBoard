<?php

	$url = "https://digmjobs.wordpress.com/feed/";
	$xml = simplexml_load_file($url);
	for($i = 0; $i < 3; $i++){
		$title = $xml->channel->item[$i]->title;
		$link = $xml->channel->item[$i]->link;
		$description = $xml->channel->item[$i]->description;
		$date = $xml->channel->item[$i]->pubDate;

		$title = str_replace(' & ', ' &amp; ', $title);
		$description = substr(strip_tags($description), 0, 220) . "...";
		$date = date('l F d, Y', strtotime($date));
		echo '<li id="jobs-'.$i.'" class="rss-item"><a href="'.$link.'"><p class="rss-item-title">'.$title.'</p>';
		echo '<p class="rss-date">Posted on '.$date.'</p>';
		echo '<p>'.$description.'</p></a></li>';
	}


?>
