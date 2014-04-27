<?php
include("areas.inc");

$notifications = new Ilmoitukset;

$pathname = __FILE__;
$shm_key = ftok($pathname, "t");
$shm_id = shmop_open($shm_key, "a", 0666, 0);

if(empty($shm_id)) {    
    $notifications->max = 5;
    
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

shmop_close($shm_id);

$areas = $notifications->data;
