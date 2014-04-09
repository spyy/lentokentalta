







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
<div class="row clearfix">
<div class="col-md-12 column">
<div class="page-header">
<h1>Lentokentältä <small>Säästä taksi kuluissa</small></h1>
</div>
</div>
</div>
<div class="row clearfix">
<div class="col-md-12 column">
<ul class="nav nav-tabs">
    <li><a href="index.htm">Info</a></li>
    <li><a href="helsinki.php">Helsinki</a></li>
    <li class="active"><a href="#">Oulu</a></li>
    <li><a href="tampere.php">Tampere</a></li>
    <li class="dropdown pull-right">
    <a href="#" data-toggle="dropdown" class="dropdown-toggle">Ota yhteyttä<strong class="caret"></strong></a>
    <ul class="dropdown-menu">
    <li><a href="#">Face</a></li>
    <li><a href="#">Google</a></li>
    </ul>
    </li>
</ul>
</div>
</div>
  
    <p>    </p>
    
<div class="row clearfix">
<div class="col-md-12 column">
<div class="list-group">
<?php
    $json = file_get_contents("https://www.finavia.fi/stage-ajax/getTimetables/?stage-language=fi&airport=OUL&type=arr&q=&showPast=0");
    $decoded = json_decode($json);
    $properties = get_object_vars($decoded);       
    $data = $properties["data"];

    $datetime = "";
    $tr = "";
    for($i=0; $i<count($data); $i++ ) {
        $flight = $data[$i];
        $properties = get_object_vars($flight);
        if($properties["history"] == "future"){
            if($datetime != $properties["datetime"]){
                $datetime = $properties["datetime"];
                echo "<a href='#' class='list-group-item active'>";
                echo $properties["datetime"];
                echo "<span class='badge'>Arvio</span>";
                echo "</a>";
            }
            echo "<a href='#' class='list-group-item'>";
            echo $properties["time"];
            echo " " . implode(",", $properties["route"]);
            echo " " . implode(";", $properties["flightNumber"]);
            echo "<span class='badge'>" . $properties["alt_time"] . "</span>";
            echo "</a>";
        }
                        
    }                        
?>
</div>
</div>
</div>
    



<div class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

</div><!-- container -->
</body>
</html>


        

