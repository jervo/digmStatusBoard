<?php

// ini_set('display_errors', 'On');
// error_reporting(E_ALL | E_STRICT);

	$url = "http://digm.drexel.edu/acelab/category/status-board/feed/";
	$xml = simplexml_load_file($url);
	$rss = new DOMDocument();
	$rss->load($url);
	$feed = array();
	foreach ($rss->getElementsByTagName('item') as $node) {
		$item = array (
			'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue
			);
		array_push($feed, $item);
	}

	for($i = 0; $i < 1; $i++){
		$description = $feed[$i]['desc'];

		$doc = new DOMDocument();
			if($description){
		    $doc->loadHTML($description);
		    $imageTags = $doc->getElementsByTagName('img');
		    //print_r($description);
		   	if ($imageTags->length > 0) {
		        echo '<li class="ace-banner"><img src="' . $imageTags->item(0)->getAttribute('src') . '" /></li>';
		   	}
			}

	}

	for($i = 0; $i < 5; $i++){
		if (!isset($xml->channel->item[$i])) {
        	break;
    	}
		$title = $xml->channel->item[$i]->title;
		$link = $xml->channel->item[$i]->link;
		$description = $xml->channel->item[$i]->description;
		$date = $xml->channel->item[$i]->pubDate;

		$title = str_replace(' & ', ' &amp; ', $title);

		$description = substr(strip_tags($description), 0, 220) . "...";
		$description = preg_replace("/&#?[a-z0-9]+;/i","",$description);;
		$date = date('l F d, Y', strtotime($date));
		echo '<li id="news-ace-'.$i.'" class="rss-item"><a href="'.$link.'"><p class="rss-item-title">'.$title.'</p>';
		// echo '<p class="rss-date">Posted on '.$date.'</p>';
		echo '<p>'.$description.'</p></a></li>';
	}




?>
