<?php
for($i=0; $i<count($flights); $i++ ) {
    $flight = $flights[$i];
    $properties = get_object_vars($flight);

    echo "<li data-icon='false'><a href='#'>";
    echo $properties["time"];
    echo " " . implode(",", $properties["route"]);
    echo " " . implode(";", $properties["flightNumber"]);
    echo "<span class='ui-li-count'>" . $properties["alt_time"] . "</span>";
    echo "</a></li>";                        
}    
?>

    