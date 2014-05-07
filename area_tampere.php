<?php

$flights = array();
$expire = 0;
include("inc/tampere_flights.inc");

$id = $_GET["id"];
$area = $_POST["area"];
$mobile = $_POST["mobile"];

$areas = array();
$method = "write";
include("inc/tampere_areas.inc");

include("inc/tampere_html.inc");

meilaa(__FILE__, $mobile . ": " . $area);
