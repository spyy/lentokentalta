<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $json = file_get_contents('https://www.finavia.fi/stage-ajax/getTimetables/?stage-language=fi&airport=OUL&type=arr&q=&showPast=0');
        echo $json;
        ?>
    </body>
</html>
