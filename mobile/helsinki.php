<?php

header("Access-Control-Allow-Origin: *");

$flights = array();
$expire = 0;
include("../inc/helsinki_flights.inc");

$areas = array();
include("../inc/helsinki_areas.inc");

include("inc/flights.inc"); 
