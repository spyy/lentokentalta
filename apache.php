<!DOCTYPE html>
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
	
  </head>
  <body>

  <div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="page-header">			
				<h1>
					Lentokentältä <small>Perustettu Huhtikuussa 2014</small>
				</h1>
			</div>
			<ul class="nav nav-tabs">
				<li>
					<a href="index.htm">Info</a>
				</li>
				<li>
                                    <a href="oulu.htm">Oulu</a>
				</li>
                                <li class="active">
					<a href="apache.php">Apache</a>
				</li>
				<li class="disabled">
					<a href="#">Helsinki</a>
				</li>
				<li class="dropdown pull-right">
					 <a href="#" data-toggle="dropdown" class="dropdown-toggle">Dropdown<strong class="caret"></strong></a>
					<ul class="dropdown-menu">
						<li>
							<a href="#">Action</a>
						</li>
						<li>
							<a href="#">Another action</a>
						</li>
						<li>
							<a href="#">Something else here</a>
						</li>
						<li class="divider">
						</li>
						<li>
							<a href="#">Separated link</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	
    <div class="row clearfix">
        <div class="col-md-12 column">
            <div class="jumbotron">
                <p><img src="images/mobile.jpg" class="img-circle img-responsive center-block"/></p>
                <ul class="list-group">
<?php
$modules=apache_get_modules();
$arrlength=count($modules);

for($x=0;$x<$arrlength;$x++)
  {
  echo "<li class='list-group-item'>";
  echo $modules[$x];
  echo "</li>";
  }
?>

                </ul>
            </div>
        </div>
    </div>
</div>
  </body>
</html>


