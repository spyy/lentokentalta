<?php

class Ilmoitukset {
    public $expire = 0;
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

// clean expired data
if(time() > $notifications->expire && $notifications->expire){
    $notifications->data = array();
    meilaa(__FILE__, "areas expired: " . $notifications->expire);
}

$areas = $notifications->data;

if($method == "write") {    
    $flight_areas = array();
    if(!empty($areas[$id])){
        $flight_areas = $areas[$id];
    }    
    $flight_areas[$access_token] = $area; 
    $areas[$id] = $flight_areas;
    
    $notifications->data = $areas;
    $notifications->expire = time() + 36000;
    
    $serialized = serialize($notifications);
    $len = strlen($serialized);
    
    // resizing
    shmop_delete($shm_id); 
    shmop_close($shm_id);    
    $shm_id = shmop_open($shm_key, "c", 0666, $len);
    
    $written = shmop_write($shm_id, $serialized, 0);
}

shmop_close($shm_id);
