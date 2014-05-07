<?php
include("flights.inc");
include("trace.inc");

$lennot = new Lennot;

$pathname = __FILE__;
$shm_key = ftok($pathname, "t");
$shm_id = shmop_open($shm_key, "a", 0666, 0);

if(!empty($shm_id)){
    $shm_size = shmop_size($shm_id);
    $shm_data = shmop_read($shm_id, 0, $shm_size);
    $lennot = unserialize($shm_data);
}

$fetch = FALSE;

if(empty($lennot)){    
    $fetch = TRUE;
    meilaa($pathname, "unserialize failed");
}
elseif (time() > $lennot->expire) {
    $fetch = TRUE;    
}

if($fetch){
    meilaa($pathname, "fetching");
    $json = file_get_contents("http://www.finavia.fi/stage-ajax/getTimetables/?stage-language=fi&airport=OUL&type=arr&showPast=0");
    $decoded = json_decode($json);    
    
    $lennot->data = $decoded->data;
    $lennot->expire = time() + 99;
    
    $serialized = serialize($lennot);
    $len = strlen($serialized);

    // resize
    shmop_delete($shm_id);    
    shmop_close($shm_id);    
    $shm_id = shmop_open($shm_key, "c", 0666, $len);
    
    shmop_write($shm_id, $serialized, 0);
}

shmop_close($shm_id);

$flights = $lennot->data;
$expire = $lennot->expire;

