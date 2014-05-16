<?php

header("Access-Control-Allow-Origin: *");

$flights = array();
$expire = 0;
include("../inc/oulu_flights.inc");

$areas = array();
include("../inc/oulu_areas.inc");

include("inc/flights.inc");
