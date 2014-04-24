
<?php
$data = array();
$pathname = __DIR__ . "/mobile/tampere.php";
$shm_key = ftok($pathname, "t");
$shm_id = shmop_open($shm_key, "a", 0666, 0);

if(empty($shm_id)){        
    $json = file_get_contents("https://www.finavia.fi/stage-ajax/getTimetables/?stage-language=fi&airport=TMP&type=arr&q=&showPast=0");
    $decoded = json_decode($json);
    $properties = get_object_vars($decoded);       
    $data = $properties["data"];

    $serialized = serialize($data);
    $len = strlen($serialized);

    $shm_id = shmop_open($shm_key, "c", 0666, $len);
    $shm_bytes_written = shmop_write($shm_id, $serialized, 0);
}
else {
    $shm_size = shmop_size($shm_id);
    $shm_data = shmop_read($shm_id, 0, $shm_size);
    $data = unserialize($shm_data);
}

shmop_close($shm_id);


$helsinki = "<li><a href='helsinkis.php'>Helsinki</a></li>";
$oulu = "<li><a href='oulus.php'>Oulu</a></li>";
$tampere = "<li class='active'><a href='#'>Tampere</a></li>";
include("kaupunki.php"); 
?>