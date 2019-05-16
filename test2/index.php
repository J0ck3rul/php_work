<?php
try {
    libxml_use_internal_errors(true);
} catch(Exception $e) {
    print_r($e);
    exit("Excepție");
}
function genLink ( $phone) {
    return "<section class='news'><p>$phone </p></section><br>";
  }
try {
 $dom = new DOMDocument();
  $dom -> loadHTMLFile('https://distrowatch.com/');
  $items=$dom->getElementsByTagName('body');
  $items= $items->item(0)->getElementsByTagName('table');
  $items = $items->item(5)->getElementsByTagName('table');
  $items = $items->item(13)->getElementsByTagName('table');


$i=1;
        $j=1;
        foreach ($items as $element) {
            if($i > 1)
            {
                $element->getElementsByTagName('td');
                echo genLink ($element->nodeValue);
            }
            $i++;   
        }
}
catch (RuntimeException $e) { 
    echo $e->getMessage();     
}
?>
</article>
</body>
</html>