<?php

define("REDIRECT_URI", "http://lentokentalta.net/publish_tampere.php");
define("ACCESS_TOKEN_URI", "https://graph.facebook.com/v2.3/oauth/access_token?client_id=1509772519343574&client_secret=7cf2f1318d395c6ad754833777ba770f&redirect_uri=%s&code=%s");


$flights = array();
$expire = 0;
include("inc/tampere_flights.inc");

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
include("inc/tampere_areas.inc");

include("inc/tampere.inc");
