<?php
try {
    libxml_use_internal_errors(true);
} catch(Exception $e) {
    print_r($e);
    exit("Excepție");
}
function genLink ( $phone) {
    return "<section class='news'><p>$phone </p></section>";
  }
try {
 $dom = new DOMDocument();
  $dom -> loadHTMLFile('https://www.gsmarena.com/?fbclid=IwAR0MNnEuFBdbUBYO7d7UQCNPJEegCVswmpRaHKnJm9Vqi-avE8tH4G0TjNc');
  $items=$dom->getElementsByTagName('body');
  $items= $items->item(0)->getElementsByTagName('table');
  $items= $items->item(0)->getElementsByTagName('nobr');
  foreach ($items as $phone) {
  	 echo genLink ($phone->nodeValue);
  }
}
catch (RuntimeException $e) { 
    echo $e->getMessage();                  
}
?>
</article>
</body>
</html>