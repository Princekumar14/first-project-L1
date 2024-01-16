<?php

// Important Functions 

// echo "hello";
if(!function_exists('pr')){
    function pr($arr){
        echo "<pre>";
        print_r($arr);
        echo "</pre>";
    
    }
}
if(!function_exists('prx')){
    function prx($arr){
        echo "<pre>";
        print_r($arr);
        echo "</pre>";
        die();
    
    }
}
if(!function_exists('get_formatted_date')){
    function get_formatted_date($date, $format){
        $formattedDate = date($format, strtotime($date));
        return $formattedDate;
    
    }
}








