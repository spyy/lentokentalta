<?php

$flights = array();
include("inc/tampere_flights.inc");

$id = $_GET["id"];
$flight = array();

for($i=0; $i<count($flights); $i++) {
    $temp = $flights[$i];
    $properties = get_object_vars($temp);
    $hash = md5($properties["datetime"] . $properties["flight_id"]);
    
    if($id == $hash){
        $flight = $properties;        
    }   
}

$title = "Lentoa ei löytynyt";

if(empty($flight)){
    include 'inc/flight_oulu_error.inc';    
    exit(0);
}

$title = implode(",", $flight["flightNumber"]) . " " .implode(",", $flight["route"]);

$areas = array();
$method = "read";
include("inc/tampere_areas.inc");

$dialog = "#dialog";
$tampere_areas = $areas[$id];

if(empty($tampere_areas)){
    $dialog = "#subdialog";
}

include 'inc/flight_tampere.inc';

