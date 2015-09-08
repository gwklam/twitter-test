<!DOCTYPE html>
<html lang="en">
<head>
<title>Twitter Test</title>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<?php
  	$account_id			=	'284098684793262080';  //Twitter Account ID for user
  
  	// Get Json Contents from Twitter widget and insert into variable
	$twittercontents	=	file_get_contents('https://cdn.syndication.twimg.com/widgets/timelines/'.$account_id);
	$twitter_array		=	json_decode($twittercontents, true);
	$twitterbody		=	$twitter_array['body'];
	
	
	$twitter_array	=	array();
	
	// Use Dom Object from PHP to find all OL within the twitter variable
	$dom = new DOMDocument();
	libxml_use_internal_errors(true);
    	$dom->loadHTML($twitterbody);
	libxml_use_internal_errors(false);
    	$twitter_feed = $dom->getElementsByTagName('ol');
	foreach ($twitter_feed as $ol) {
		$nodes = $ol->childNodes;
		foreach ($nodes as $node) {
			if(!empty(trim($node->nodeValue)))$twitter_array[]	= $node->nodeValue;
    	}
	}
	
	//limit Twitter feed to 10
	$counter	=	count($twitter_array);
	if($counter>10)	$counter	=	10; 
	$output = array_slice($twitter_array, 0, $counter);
	?>
</head>

<body>
<h1>Tweets from @nyevancouver</h1>
<?php

// output twitter feed
$count=0;
foreach($output as $okey) {
	$count++;
	echo "$count: ".$okey.'<p>&nbsp;</p>';
}
?>
</body>
</html>
