<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function mvc_build_style_url($CSS){
    $url = ROOT.'content'.DS.'style'.DS.$CSS;
    //echo $url;
    return $url;
}
function mvc_build_script_url($SCRIPT){
    $url = ROOT.'content'.DS.'scripts'.DS.$SCRIPT;
    //echo $url;
    return $url;
}
function mvc_redirect($CONTROLLER, $ACTION, $PARAMS){
    header("Location:http://localhost/HW3/simple_mvc/home/index");
    //Router::route(mvc_build_url($CONTROLLER, $ACTION, $PARAMS));
    //return 0;
}
function mvc_build_url($controller, $actions, $params){
    $lcontroller = strtolower($controller);
    $lactions = strtolower($actions);
    
    $url = ROOT.'index.php'.DS.$lcontroller.DS.$lactions.DS.$params;
    //echo $url;
   /* foreach ($params as $inp){
        $url = $url.DS.$inp;
        echo $url;
    }*/
    return $url;
    
}

