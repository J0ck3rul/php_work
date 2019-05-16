<?php

$file = file_get_contents('https://www.reddit.com/');


// echo $file;

// echo $file;
// $matches = array();
// preg_match('<h2 class="s1ojus0h-0 iHepIF">.*?<\/h2>', $file, $matches);
preg_match_all('/<h2 class="s1ojus0h-0 iHepIF">.*?<\/h2>/', $file, $matches);
// echo $matches[1];
// print_r($matches);
// var_dump($matches);
// echo json_encode($matches);
// foreach ($matches as $item)
// {
//     echo $item;
// }
foreach ($matches as $items)
{
    foreach($items as $item)
        echo $item;
}

?>