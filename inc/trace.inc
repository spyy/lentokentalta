<?php

function meilaa($subject,$message){
    $message = wordwrap($message, 70, "\r\n");
    //mail('sami.pyy@gmail.com', $subject, $message);    
}
