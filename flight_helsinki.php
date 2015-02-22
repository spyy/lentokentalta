<?php

$flights = array();
include("inc/helsinki_flights.inc");

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

if(empty($flight)){
    include 'inc/flight_error.inc';    
    exit(0);
}

$modalTitle = implode(",", $flight["flightNumber"]) . " " .implode(",", $flight["route"]);

$areas = array();
$method = "read";
include("inc/helsinki_areas.inc");

$dialog = "#dialog";
$found_areas = $areas[$id];

if(empty($found_areas)){
    $dialog = "#subdialog";
} else {
    $modalTitle = current($found_areas);
    $callToNumber = key($found_areas);
}

include 'inc/flight_helsinki.inc';

