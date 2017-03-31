<?php

include("inc/fb.inc");
include("inc/fb_oulu.inc");

define("PICTURE_URI", "https://graph.facebook.com/me/picture?access_token=%s");
define("ME_URI", "https://graph.facebook.com/me?access_token=%s");
define("FB_ADDRESS", "http://facebook.com/%s");
define("NAV_LIST", "<li><a href='helsinki.php'>Helsinki</a></li><li class='active'><a href='#'>Oulu</a></li><li><a href='tampere.php'>Tampere</a></li>");


$flights = array();
include("inc/oulu_flights.inc");

$id = $_GET["id"];
$selected = array();
$flightId = "";
$route = "";

foreach ($flights as $flight) {
    $properties = get_object_vars($flight);
    $hash = md5($properties["datetime"] . $properties["flightId"]);
    
    if($id == $hash){
        $flightId = $properties["flightId"];
        $route = $properties["route"];
    }
}

$areas = array();
$method = "read";
include("inc/oulu_areas.inc");

$town = "oulu";

if(isset($areas[$id])){
    $notification = $areas[$id];
    $area = $notification["area"];
    $access_token = $notification["access_token"];
    $modalTitle = $area;
    $picture_uri = sprintf(PICTURE_URI, $access_token);
    $me_uri = sprintf(ME_URI, $access_token);
    $json = file_get_contents($me_uri);
    $decoded = json_decode($json);
    $fb_id = $decoded->{"id"};
    $fb_name = $decoded->{"name"};
    $fb_address = sprintf(FB_ADDRESS, $fb_id);  
    include 'inc/flight_published.inc';
} else {
    $modalTitle = implode(",", $route);
    $reference_area = "Pateniemi";
    include 'inc/flight_unpublished.inc';
}
