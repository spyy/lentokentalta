<?php

$flights = array();
$expire = 0;
include("inc/helsinki_flights.inc");

$id = $_GET["id"];
$area = $_POST["area"];
$mobile = $_POST["mobile"];

$areas = array();
$method = "write";
include("inc/helsinki_areas.inc");

include("inc/helsinki_html.inc");
