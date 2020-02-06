<?php

	// ini_set('display_errors', 'On');
	// error_reporting(E_ALL | E_STRICT);

	$url = "http://digm.drexel.edu/acelab/category/Events/feed/";
	$rss = new DOMDocument();
	$rss->load($url);
	$feed = array();
	foreach ($rss->getElementsByTagName('item') as $node) {
		$item = array (
			'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
			'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
			'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
			'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
			);
		array_push($feed, $item);
	}

	for($i = 0; $i < 2; $i++){
		$description = $feed[$i]['desc'];
		$title = $feed[$i]['title'];
		$link = $feed[$i]['link'];
		$date = $feed[$i]['date'];


		//Generate Banner Image
		$doc = new DOMDocument();
	  $doc->loadHTML($description);
	  $imageTags = $doc->getElementsByTagName('img');
   	if ($imageTags->length > 0) {
        echo '<li class="ace-banner"><img src="' . $imageTags->item(0)->getAttribute('src') . '" /></li>';
   	}

		$title = str_replace(' & ', ' &amp; ', $title);
		$description = substr(strip_tags($description), 0, 220) . "...";
		$description = preg_replace("/&#?[a-z0-9]+;/i","",$description);;
		$date = date('l F d, Y', strtotime($date));
		echo '<li id="news-ace-'.$i.'" class="rss-item"><a href="'.$link.'"><p class="rss-item-title">'.$title.'</p>';
		// echo '<p class="rss-date">Posted on '.$date.'</p>';
		echo '<p>'.$description.'</p></a></li>';

	}




?>
