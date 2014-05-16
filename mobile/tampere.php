<?php

header("Access-Control-Allow-Origin: *");

$flights = array();
$expire = 0;
include("../inc/tampere_flights.inc");

$areas = array();
include("../inc/tampere_areas.inc");

include("inc/flights.inc");         
