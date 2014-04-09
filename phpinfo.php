<?php

echo phpinfo(INFO_ALL);

ob_end_flush();
flush();

ob_start();
sleep(5);

echo '<html><head></head><body><h1>hahaa</h1></body></html>';

?>
