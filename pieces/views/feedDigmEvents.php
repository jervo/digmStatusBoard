<?php
	$url = "http://digm.drexel.edu/research/category/news/feed/";
	$x=0;
	$rss = new DOMDocument();
	$rss->load($url);
	$feed = array();
	foreach ($rss->getElementsByTagName('item') as $node) {
		$item = array (
			'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
			'content' => $node->getElementsByTagName('description')->item(0)->nodeValue,
			'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
			'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
			);
		array_push($feed, $item);

	}
	$limit = 3;
	for($x=0;$x<$limit;$x++) {
		$title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
		$link = $feed[$x]['link'];
		$description = $feed[$x]['content'];
		$description = substr(strip_tags($description), 0, 220) . "...";
		$date = date('l F d, Y', strtotime($feed[$x]['date']));
		echo '<li id="news-event-'.$x.'" class="rss-item"><a href="'.$link.'"><p class="rss-item-title">'.$title.'</p>';
		echo '<p class="rss-date">Posted on '.$date.'</p>';
		echo '<p>'.$description.'</p></a></li>';
	}
?>
