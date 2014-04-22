<?php
$json = file_get_contents("https://www.finavia.fi/stage-ajax/getTimetables/?stage-language=fi&airport=TMP&type=arr&q=&showPast=0");
$decoded = json_decode($json);
$properties = get_object_vars($decoded);       
$data = $properties["data"];

include("lennot.php"); 
?>
