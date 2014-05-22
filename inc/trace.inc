<?php

function meilaa($subject,$message){
    $message = wordwrap($message, 70, "\r\n");
    //mail('lentokentalta@gmail.com', $subject, $message);    
}
