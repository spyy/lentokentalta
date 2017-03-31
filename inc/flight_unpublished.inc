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
    
    <script>
    function doSubmit() {
        var area = document.getElementById("area").value;
        document.getElementById("state").value += "." + area;
        return true;
    }
    </script>
    
  </head>

  <body>

    <div class="container">

      <div class="masthead">
        <ul class="nav nav-justified"><?php echo NAV_LIST; ?></ul>
      </div>

      <p>   </p>

    <div class="list-group">
    <?php
    for($i=0; $i<count($flights); $i++) {
        $flight = $flights[$i];
        $properties = get_object_vars($flight);

        if($properties["history"] == "future"){
            $hash = md5($properties["datetime"] . $properties["flightId"]);
            $path = "flight_" . $town . ".php?id=" . $hash;
            echo "<a class='list-group-item' href='" . $path . "'>";
            echo $properties["time"] . " ";
            if(!empty($properties["altTime"])) {
                echo $properties["altTime"];
            } else {
                echo $properties["time"];
            }                
            echo " " . implode(",", $properties["route"]);
            echo " " . implode(";", $properties["flightNrs"]);

            if(isset($areas[$hash])) {
                $notification = $areas[$hash];
                echo "<span class='badge'>" . $notification["area"] . "</span>";
            }
            echo "</a>";                        
        } 
    }                        
    ?>        
    </div> <!-- list group -->

      <!-- Site footer -->
      <footer class="footer">
        <p>sami.pyy@gmail.com</p>
      </footer>

    </div> <!-- /container -->
    
    
    <div class="modal fade" id="dialog" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
    <div class="modal-content">

    <form method="get" action="https://www.facebook.com/dialog/oauth">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Saavun lennolla <?php echo $modalTitle; ?> ja jatkan alueelle</h4>
        </div>

        <div class="modal-body">
            <input name="area" type="text" id="area" class="form-control" placeholder="Esim. <?php echo $reference_area; ?> (ei numeroita)" pattern="[a-öA-Ö]{2,18}" required />
        </div>

        <input type="hidden" name="redirect_uri" value="<?php echo REDIRECT_URI; ?>" />
        <input type="hidden" name="client_id" value="<?php echo CLIENT_ID; ?>" />
        <input type="hidden" name="state" id="state" value="<?php echo $id; ?>" />

        <div class="modal-footer">       
            <button class="btn btn-primary btn-block btn-lg" type="submit" onclick="doSubmit();">Ilmoita</button>
        </div>

    </form>

    </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    
    
    <script>$(window).load(function(){$("#dialog").modal("show");});</script>


</body></html>