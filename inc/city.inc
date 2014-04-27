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
<link href="justified-nav.css" rel="stylesheet">

</head>
    
<body>

<div class="container">

<div class="masthead">
  <ul class="nav nav-justified">
    <li><a href="index.html">Lentokentältä</a></li>
    <?php echo $helsinki; ?>
    <?php echo $oulu; ?>
    <?php echo $tampere; ?>
  </ul>
</div>

<p>   </p>

<div class="list-group">
<?php
for($i=0; $i<count($flights); $i++ ) {
    $flight = $flights[$i];
    $properties = get_object_vars($flight);

    echo "<a href='#' class='list-group-item'>";
    echo $properties["time"];
    echo " " . implode(",", $properties["route"]);
    echo " " . implode(";", $properties["flightNumber"]);
    echo "<span class='badge'>" . $properties["alt_time"] . "</span>";
    echo "</a>";                        
}                        
?>        
</div> <!-- list group -->

<!-- Site footer -->
<div class="footer">
  <p>© Company 2014</p>
</div>

</div> <!-- /container -->

<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

</body>
</html>