<?php

define("REDIRECT_URI", "http://lentokentalta.local.net/publish_oulu.php");
define("ACCESS_TOKEN_URI", "https://graph.facebook.com/v2.3/oauth/access_token?client_id=1509963705991122&client_secret=9a960f8778fcd4b04a71e20882214d73&redirect_uri=%s&code=%s");

$flights = array();
$expire = 0;
include("inc/oulu_flights.inc");

$code = $_GET["code"];

$uri = sprintf(ACCESS_TOKEN_URI, REDIRECT_URI, $code);
$json = file_get_contents($uri);
$decoded = json_decode($json);
$access_token = $decoded->{"access_token"};
    
$state = $_GET["state"];

$splitted = explode(".", $state);
$id = $splitted[0];
$area = $splitted[1];

$areas = array();
$method = "write";
include("inc/oulu_areas.inc");

include("inc/oulu.inc");
