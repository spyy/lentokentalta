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
    <li><a href='helsinki.php'>Helsinki</a></li>
    <li><a href='oulu.php'>Oulu</a></li>
    <li class="active"><a href='#'>Tampere</a></li>
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
        $path = "flight_tampere.php?id=" . $hash;
        echo "<a class='list-group-item' href='" . $path . "'>";
        echo $properties["time"] . " ";
        if(!empty($properties["alt_time"]))
            echo $properties["alt_time"];
        else
            echo $properties["time"];
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
<div class="footer">
  <p>lentokentalta@gmail.com</p>
</div>

</div> <!-- /container -->

<div class="modal fade" id="dialog" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-sm">
<div class="modal-content">

    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title"><?php echo $modalTitle; ?></h4>
    </div>

    <div class="modal-body">   
    <p>Soita numeroon: <strong>
    <?php echo $callToNumber; ?>
    </strong></p>
    </div>

</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="subdialog" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-sm">
<div class="modal-content">
    
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Saavun lennolla <?php echo $title; ?> ja jatkan alueelle</h4>
    </div>

    <div class="modal-body">
    <?php echo "<form method='post' action='area_tampere.php?id=" . $id . "'>"; ?>
    <div class="form-group">
    <label for="area">Alue (ei numeroita)</label>
    <input name="area" type="text" class="form-control" placeholder="Esim. Hervanta"  pattern="[a-öA-Ö]{2,18}" required>
    </div>

    <div class="form-group">
    <label for="mobile">Matkapuhelin</label>
    <input name="mobile" type="text" class="form-control" placeholder="Matkapuhelin numero" pattern="[\+0-9]{8,13}" required>
    </div>
        
    <button class="btn btn-primary btn-block btn-lg" type="submit">Tee ilmoitus</button>
    </form> 
    </div>

</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

<script>$(window).load(function(){$('<?php echo $dialog; ?>').modal('show');});</script>

</body>
</html>

