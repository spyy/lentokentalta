<?php

class Ilmoitukset {
    public $expire = 0;
    public $data = array();
}

$ilmoitukset = new Ilmoitukset;

$shm_key = ftok($pathname, "t");
$shm_id = shmop_open($shm_key, "a", 0, 0);

if(empty($shm_id)) {    
    $serialized = serialize($ilmoitukset);
    $len = strlen($serialized);

    $shm_id = shmop_open($shm_key, "c", 0666, $len);
    shmop_write($shm_id, $serialized, 0);        
}
else {
    $shm_size = shmop_size($shm_id);
    $shm_data = shmop_read($shm_id, 0, $shm_size);
    $ilmoitukset = unserialize($shm_data);    
}

// clean expired data
if(time() > $ilmoitukset->expire && $ilmoitukset->expire){
    $ilmoitukset->data = array();
}

$areas = $ilmoitukset->data;

if($method == "write") {
    
    $areas[$id] = $notification;
    
    $ilmoitukset->data = $areas;
    $ilmoitukset->expire = time() + 36000;
    
    $serialized = serialize($ilmoitukset);
    $len = strlen($serialized);
    
    // resizing
    shmop_delete($shm_id); 
    shmop_close($shm_id);    
    $shm_id = shmop_open($shm_key, "c", 0666, $len);
    
    $written = shmop_write($shm_id, $serialized, 0);
}

shmop_close($shm_id);
