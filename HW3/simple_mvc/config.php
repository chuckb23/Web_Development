<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
// Show debug messages 
define ('DEBUG', true); 
// Database connection 

define('DB_NAME', 'dbname');
define('DB_USER', 'dbuser');
define('DB_PASSWORD', 'dbpass');
define('DB_HOST', 'localhost');
define('ROOT', DS.'HW3'.DS.'simple_mvc'.DS);
// Website URL and path 
define('PATH', 'http://www.charlie.com/');
define('WEBSITE_TITLE', 'charlie.com'); 
// Default controller to load — homepage requests are sent to this controller 
define('DEFAULT_CONTROLLER', 'home');

