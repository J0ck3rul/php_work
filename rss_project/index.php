<?php
$url = "http://rss.slashdot.org/Slashdot/slashdotMain";


$rss = new DOMDocument();
$rss->load($url);




$feed = array();
foreach ($rss->getElementsByTagName('item') as $node) {
    $item = array ( 
        'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
        'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
        'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
        );
    array_push($feed, $item);
    echo $item['title'];
    echo "<br>";
    echo $item['link']; 
}
$limit = 5;
for($x=0;$x<$limit;$x++)
{
   
}
// echo $rss;
?>


