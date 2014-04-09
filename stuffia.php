<?php
echo '<p>flightNumber: ' . $rows . '</p>';
        $array = get_object_vars($data[0]);
        while ( list ($key, $value) = each ($array) ) {
            if($key == 'route'){
                $array1 = array_values($value);
                echo '<p>route</p>';
                echo '<p>' . implode(' ', $value). '</p>';
                while ( list ($value1) = each ($array1) ) {
                    echo '<p>value: ' . $value1 . '</p>';
                }
            }
            elseif($key == 'flightNumber'){
                $array2 = array_values($value);
                echo '<p>flightNumber</p>';
                echo '<p>' . implode(' ', $value). '</p>';
                while ( list ($value2) = each ($array2) ) {
                    echo '<p>value: ' . $value2 . '</p>';
                }
            }
            else {
                echo '<p>key: ' . $key . '</p>';
                echo '<p>value: ' . $value . '</p>';
            }
?>
        