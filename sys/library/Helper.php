<?php

class Helper{

public static function AddressServer($path = null)
{
    $address = '://'.$_SERVER['SERVER_NAME'];
    
    if ($_SERVER['HTTPS']) {
        $address = 'https'.$address;
    } else {
        $address = 'http'.$address;
    }
 
    if (isset($path)) 
    {
        $address .= $path;

    }

    return $address;

} 
 
}

