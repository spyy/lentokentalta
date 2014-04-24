<?php
include("common.php");

$lennot = new Lennot;

$pathname = __FILE__;
$shm_key = ftok($pathname, "t");
$shm_id = shmop_open($shm_key, "a", 0666, 0);

if(!empty($shm_id)){
    $shm_size = shmop_size($shm_id);
    $shm_data = shmop_read($shm_id, 0, $shm_size);
    $lennot = unserialize($shm_data);    
}

// should we fetch data ?
if(time() > $lennot->expire){
    $json = file_get_contents("https://www.finavia.fi/stage-ajax/getTimetables/?stage-language=fi&airport=TMP&type=arr&q=&showPast=0");
    $decoded = json_decode($json);
    $properties = get_object_vars($decoded);
    
    $lennot->data = $properties["data"];
    $lennot->expire = time() + 33;
    
    $serialized = serialize($lennot);
    $len = strlen($serialized);

    $shm_id = shmop_open($shm_key, "c", 0666, $len);
    shmop_write($shm_id, $serialized, 0);
}

shmop_close($shm_id);

$data = $lennot->data;
$expire = $lennot->expire;
?>