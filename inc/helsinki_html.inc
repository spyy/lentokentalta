<!DOCTYPE html>
<!-- saved from url=(0048)http://getbootstrap.com/examples/justified-nav/# -->
<html lang="fi">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="http://getbootstrap.com/assets/ico/favicon.ico">

<title>Lentokentältä</title>

<link rel="shortcut icon" href="http://getbootstrap.com/assets/ico/favicon.ico">
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">    
<link href="css/justified-nav.css" rel="stylesheet">

</head>
    
<body>

<div class="container">

<div class="masthead">
  <ul class="nav nav-justified">
    <li><a href="index.html">lentokentalta.net</a></li>
    <li class='active'><a href='#'>Helsinki</a></li>
    <li><a href='oulu.php'>Oulu</a></li>
    <li><a href='tampere.php'>Tampere</a></li>
  </ul>
</div>

<p>   </p>

<div class="list-group">
<?php
for($i=0; $i<count($flights); $i++) {
    $flight = $flights[$i];
    $properties = get_object_vars($flight);

    if($properties["history"] == "future"){
        $hash = md5($properties["datetime"] . $properties["flight_id"]);
        $path = "flight_helsinki.php?id=" . $hash;
        echo "<a class='list-group-item' href='" . $path . "'>";     
        echo $properties["time"];
        echo " " . implode(",", $properties["route"]);
        echo " " . implode(";", $properties["flightNumber"]);
        
        $flight_areas = $areas[$hash];
        if(!empty($flight_areas)) {
            $values = array_values($flight_areas);
            for($k=0; $k<count($values); $k++) {
                echo "<span class='badge'>" . $values[$k] . "</span>";
            }
        }
        if(!empty($properties["alt_time"])){
            echo "<span class='badge'>" . $properties["alt_time"] . "</span>";
        }
        echo "</a>";                        
    } 
}                        
?>        
</div> <!-- list group -->

<!-- Site footer -->
<div class="footer">
  <p>lentokentalta@gmail.com</p>
</div>

</div> <!-- /container -->


</body>
</html>
