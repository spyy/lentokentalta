<!DOCTYPE html>
<html lang="fi">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">    

  <title>Lentokentältä</title>

  <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">    

</head>

<body>

<div class="container">
<div class="row clearfix">
<div class="col-md-12 column">
    
<?php
$json = file_get_contents("https://www.finavia.fi/stage-ajax/getTimetables/?stage-language=fi&airport=HEL&type=arr&q=&showPast=0");
$decoded = json_decode($json);
$properties = get_object_vars($decoded);       
$data = $properties["data"];
?>
    <p><?php var_dump($data[0]); ?></p>

<div class="list-group">
<?php
for($i=0; $i<count($data); $i++ ) {
    $flight = $data[$i];
    $properties = get_object_vars($flight);

    echo "<a href='#' class='list-group-item'>";
    echo $properties["time"];
    echo " " . implode(",", $properties["route"]);
    echo " " . implode(";", $properties["flightNumber"]);        
    echo "<span class='badge'>" . $properties["flight_id"] . "</span>";
    echo "<span class='badge'>" . hash("md5", $properties["flight_id"]) . "</span>";
    echo "<span class='badge'>" . hash("md5", $properties["flight_id"]) . "</span>";
    echo "</a>";        
}                        
?>  
</div>
    
</div>
</div>
</div>

    
    
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</body>
</html>
        