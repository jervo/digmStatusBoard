<?php


	$rss = new DOMDocument();
	//$rss->load('digmDrexelFeatured.xml');
	$rss->load('http://digm.drexel.edu/acelab/category/Events/feed/');

	function just_text_in_quotes($str) {
		   preg_match('/"(.*?)"/', $str, $matches);
		   return isset($matches[1]) ? $matches[1] : FALSE;
		}

	function get_delimited($str, $delimiter='"') {
	    $escapedDelimiter = preg_quote($delimiter, '/');
	    if (preg_match_all('/' . $escapedDelimiter . '(.*?)' . $escapedDelimiter . '/s', $str, $matches)) {
	        return $matches[1];
	  }
	}

	$feed = array();
	foreach ($rss->getElementsByTagName('item') as $node) {
		$item = array (
			'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
			'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
			'content' => $node->getElementsByTagName('description')->item(0)->nodeValue,
			'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
			'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue
			);
		array_push($feed, $item);
	}
	$limit = 1;
	for($x=0;$x<$limit;$x++) {
		$title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
		$link = $feed[$x]['link'];
		$summary = $feed[$x]['desc'];
		$summary = substr(strip_tags($summary), 0, 220) . "...";
		$date = "Posted on ".date('l F d, Y', strtotime($feed[$x]['date']));

		$description = $feed[$x]['desc'];
		$doc = new DOMDocument();
    $doc->loadHTML($description);
    $imageTags = $doc->getElementsByTagName('img');


   	if ($imageTags == "") {
   		echo '<p>' . 'Visit www.digm.drexel.edu to see upcoming events.' . '</p>';
   	} else {
   		foreach($imageTags as $tag) {
        	echo '<img class="thumbnail" src="' . $tag->getAttribute('src') . '" />' . '<h3>'.$title.'</h3><p class="rss-date">'.$date.'</p><p>'.$summary.'</p><a href="'.$link.'"class="btn">Learn More</a>';
   		}
   	}


	}
?>
