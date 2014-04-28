<?php

class Ilmoitukset {
    public $max = 0;
    public $index = 0;
    public $data = array();
}

$notifications = new Ilmoitukset;

$shm_key = ftok($pathname, "t");
$shm_id = shmop_open($shm_key, "a", 0, 0);

if(empty($shm_id)) {    
    $serialized = serialize($notifications);
    $len = strlen($serialized);

    $shm_id = shmop_open($shm_key, "c", 0666, $len);
    shmop_write($shm_id, $serialized, 0);        
}
else {
    $shm_size = shmop_size($shm_id);
    $shm_data = shmop_read($shm_id, 0, $shm_size);
    $notifications = unserialize($shm_data);    
}

$areas = $notifications->data;

if($method == "write") {    
    $flight_areas = array();
    if(!empty($areas[$id])){
        $flight_areas = $areas[$id];
    }    
    $flight_areas[$mobile] = $area; 
    $areas[$id] = $flight_areas;
    $notifications->data = $areas;
    
    $serialized = serialize($notifications);
    $len = strlen($serialized);
    
    if(shmop_size($shm_id) < $len) {
        shmop_delete($shm_id); // resizing
    }
    
    shmop_close($shm_id);    
    $shm_id = shmop_open($shm_key, "c", 0666, $len);
    $written = shmop_write($shm_id, $serialized, 0);
}

shmop_close($shm_id);
