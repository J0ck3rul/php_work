<?php
$url = "https://api.ipify.org?format=json";
$response = file_get_contents($url);
echo $response;
?>