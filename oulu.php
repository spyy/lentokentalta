<!DOCTYPE html>
<html lang="fi">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">    

    <title>Oulu</title>

    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">    
    
  </head>
  <body>

    <div class="container">

      <!-- Static navbar -->
      <div class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">Lentokentältä</a>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="helsinkis.php">Helsinki</a></li>
                <li class="active"><a href="#">Oulu</a></li>
                <li><a href="tamperes.php">Tampere</a></li>              
            </ul>            
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </div>


    <div class="list-group">
    <?php
    for($i=0; $i<count($data); $i++ ) {
        $flight = $data[$i];
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

    </div> <!-- /container -->
    
    <div>
      <div class="container">
        <p class="text-muted text-center">lentokentalta@gmail.com</p>
      </div>
    </div>
    
    <div class="modal fade" id="myModal" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
    <div class="modal-content">
        ...
    </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    
    <div class="modal fade" id="mySubModal" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
    <div class="modal-content">
        ...
    </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    
    
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
  </body>
</html>

