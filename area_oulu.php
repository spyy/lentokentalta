<?php

$flights = array();
$expire = 0;
include("inc/oulu_flights.inc");

$id = $_GET["id"];
$area = $_POST["area"];
$mobile = $_POST["mobile"];

$areas = array();
$method = "write";
include("inc/oulu_areas.inc");

include("inc/oulu_html.inc");
