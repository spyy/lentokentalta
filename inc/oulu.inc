<!DOCTYPE html>

<html lang="fi">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://getbootstrap.com/favicon.ico">

    <title>Kimppataksi</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="css/justified-nav.css" rel="stylesheet" type="text/css"/>

  </head>

  <body>

    <div class="container">

      <div class="masthead">
        <ul class="nav nav-justified">
        <li><a href="helsinki.php">Helsinki</a></li>
        <li class='active'><a href="#">Oulu</a></li>
        <li><a href="tampere.php">Tampere</a></li>
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
            $path = "flight_oulu.php?id=" . $hash;
            echo "<a class='list-group-item' href='" . $path . "'>";
            echo $properties["time"] . " ";
            if(!empty($properties["alt_time"])) {
                echo $properties["alt_time"];
            } else {
                echo $properties["time"];
            }
            echo " " . implode(",", $properties["route"]);
            echo " " . implode(";", $properties["flight_nrs"]);

            $flight_areas = $areas[$hash];
            if(!empty($flight_areas)) {
                $values = array_values($flight_areas);
                for($k=0; $k<count($values); $k++) {
                    echo "<span class='badge'>" . $values[$k] . "</span>";
                }
            }
            echo "</a>";                        
        } 
    }                        
    ?>        
    </div> <!-- list group -->

      <!-- Site footer -->
      <footer class="footer">
        <p>lentokentalta@gmail.com</p>
      </footer>

    </div> <!-- /container -->


    <script src="js/ie10-viewport-bug-workaround.js"></script>
  

</body></html>