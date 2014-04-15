<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="fi">
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

<!-- UTF-8 -->	
<meta charset="UTF-8">

<!-- Title -->
<title>Lentokentältä</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="container">
<div class="row clearfix ">
<div class="col-md-12 column">
<div class="page-header">
    <h1>Lentokentältä <small>Säästä taksi kuluissa</small></h1>
</div>
</div>
</div>
    
<div class="row clearfix well">
<div class="col-md-12 column">
<ul class="nav nav-tabs">
    <li><a href="index.htm">Info</a></li>
    <li><a href="helsinki.php">Helsinki</a></li>
    <li><a href="oulu.php">Oulu</a></li>
    <li class="active"><a href="#">Tampere</a></li>
</ul>
    
    <p>      </p>


<table class="table table-hover">
<tbody>
    
    
<?php
    $json = file_get_contents("https://www.finavia.fi/stage-ajax/getTimetables/?stage-language=fi&airport=TMP&type=arr&q=&showPast=0");
    $decoded = json_decode($json);
    $properties = get_object_vars($decoded);       
    $data = $properties["data"];

    $datetime = "";
    $tr = "";
    for($i=0; $i<count($data); $i++ ) {
        $flight = $data[$i];
        $properties = get_object_vars($flight);

        if($datetime != $properties["datetime"]){
            $datetime = $properties["datetime"];
            echo "<tr class='active'>";
            echo "<td colspan='3'>" . $properties["datetime"] . "</td>";
            echo "<td>Arvio</td>";
            echo "</tr>";                
        }
        echo "<tr>";
        echo "<td>" . $properties["time"] . "</td>";
        echo "<td>" . implode(";", $properties["route"]) . "</td>";
        echo "<td>" . implode(";", $properties["flightNumber"]) . "</td>";
        echo "<td>" . $properties["alt_time"] . "</td>";
        echo "</tr>";
                        
    }                        

?>
    
</tbody>
</table>
    
</div>
</div>
</div>

</body>
</html>


        

