<?php
	
	//$url = 'digmDrexelEvent.xml';
	$eventsURL = "http://digm.drexel.edu/news/events/feed/";
	$jobsURL = "http://digm.drexel.edu/news/jobs/feed/";
	$aceURL = "http://digm.drexel.edu/acelab/category/status-board/feed/";

	createNewsModal($eventsURL, 3, 'modal-event');
	createNewsModal($jobsURL, 3, 'modal-jobs');
	createNewsModal($aceURL, 2, 'modal-ace');

	function createNewsModal($url, $limit, $key){
		$x=0;
		$rss = new DOMDocument();
		$rss->load($url);
		$feed = array();
		if ($limit > 2) {
			foreach ($rss->getElementsByTagName('item') as $node) {
				$item = array ( 
					'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
					'content' => $node->getElementsByTagName('encoded')->item(0)->nodeValue,
					'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
					'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
					);
				array_push($feed, $item);
			}
			for($x=0;$x<$limit;$x++) {
				$title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
				$link = $feed[$x]['link'];
				$description = $feed[$x]['content'];
				$date = date('l F d, Y', strtotime($feed[$x]['date']));
				echo '<div id="'.$key.'-'.$x.'" class="news-modal"><div class="news-modal--close">X</div>';
				echo '<h1>'.$title.'</h1>';
				echo '<p class="rss-date">Posted on '.$date.'</p>';
				echo '<div class="news-modal--inner">';
				echo $description;
				echo '</div>';
				echo '</div>';
			}
		} else {
			$xml = simplexml_load_file($url);
			for($i = 0; $i < $limit; $i++){
				$title = $xml->channel->item[$i]->title;
				$link = $xml->channel->item[$i]->link;
				$description = $xml->channel->item[$i]->description;
				$date = $xml->channel->item[$i]->pubDate;

				$title = str_replace(' & ', ' &amp; ', $title);
				$date = date('l F d, Y', strtotime($date));
				echo '<div id="'.$key.'-'.$i.'" class="news-modal"><div class="news-modal--close">X</div>';
				echo '<h1>'.$title.'</h1>';
				echo '<p class="rss-date">Posted on '.$date.'</p>';
				echo '<div class="news-modal--inner">';
				echo $description;
				echo '</div>';
				echo '</div>';
			}
		}

	} 
?>