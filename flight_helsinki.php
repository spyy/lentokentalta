<?php

$town = "helsinki";
$reference_area = "Herttoniemi";

define("REDIRECT_URI", "http://lentokentalta.net/publish_" . $town . ".php");
define("PICTURE_URI", "https://graph.facebook.com/me/picture?access_token=%s");
define("ME_URI", "https://graph.facebook.com/me?access_token=%s");
define("FB_ADDRESS", "http://facebook.com/%s");
define("NAV_LIST", "<li class='active'><a href='#'>Helsinki</a></li><li><a href='oulu.php'>Oulu</a></li><li><a href='tampere.php'>Tampere</a></li>");


$flights = array();
include("inc/" . $town . "_flights.inc");

$id = $_GET["id"];
$selected = array();

foreach ($flights as $flight) {
    $properties = get_object_vars($flight);
    $hash = md5($properties["datetime"] . $properties["flight_id"]);
    
    if($id == $hash){
        $selected = $properties;        
    }
}

if(empty($selected)){
    include 'inc/flight_error.inc';    
    exit(0);
}

$areas = array();
$method = "read";
include("inc/" . $town . "_areas.inc");

$found_areas = $areas[$id];

if(empty($found_areas)){
    $modalTitle = implode(",", $selected["flightNumber"]) . " " .implode(",", $selected["route"]);
    include 'inc/flight_unpublished.inc';
} else {
    $modalTitle = current($found_areas);
    $access_token = key($found_areas);
    $picture_uri = sprintf(PICTURE_URI, $access_token);
    $me_uri = sprintf(ME_URI, $access_token);
    $json = file_get_contents($me_uri);
    $decoded = json_decode($json);
    $fb_id = $decoded->{"id"};
    $fb_name = $decoded->{"name"};
    $fb_address = sprintf(FB_ADDRESS, $fb_id);  
    include 'inc/flight_published.inc';
}
