<?php

include("inc/fb.inc");
include("inc/fb_tampere.inc");

$flights = array();
$expire = 0;
include("inc/tampere_flights.inc");

$code = $_GET["code"];

$uri = sprintf(ACCESS_TOKEN_URI, CLIENT_ID, CLIENT_SECRET, REDIRECT_URI, $code);
$json = file_get_contents($uri);
$decoded = json_decode($json);
$access_token = $decoded->{"access_token"};
    
$state = $_GET["state"];

$splitted = explode(".", $state);
$id = $splitted[0];
$area = $splitted[1];

$notification = array();
$notification["area"] = $area;
$notification["access_token"] = $access_token;

$areas = array();
$method = "write";
include("inc/tampere_areas.inc");

include("inc/tampere.inc");
