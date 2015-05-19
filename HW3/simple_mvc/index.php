<?php

 /*** error reporting on ***/
 //error_reporting(E_ALL);

 /*** define the site path ***/
 $site_path = realpath(dirname(__FILE__));
 define ('SITE_PATH', $site_path);
//echo SITE_PATH;
 /*** include the init.php file ***/
define('DS', DIRECTORY_SEPARATOR);

//echo "Path:".$_SERVER['PATH_INFO'];

//$url = $_GET['url'];
//$url = $_SERVER["ORIG_PATH_INFO"];
//echo ROOT .DS. 'core'.DS. 'bootstrap.php' ;
////$_route = isset($_GET['_route']) ? preg_replace('/^_route=(.*)/','$1',$_SERVER['QUERY_STRING']) : '';
//echo $_route."Hey there";
//require_once(ROOT.DS. 'core'.DS.'bootstrap.php'); 
/*** load the router ***/
// $registry->router = new router($registry);

 /*** set the controller path ***/
 //$registry->router->setPath (__SITE_PATH . '/controllers');

 /*** load up the template ***/
 //$registry->template = new template($registry);

 /*** load the controller ***/
// $registry->router->loader();
require_once('config.php');
require_once('core'.DS.'functions.php');
// Autoload classes 
spl_autoload_register('myautoload');
//echo "\r\nBootstrap!";
//echo ROOT;
 function myautoload($className){
     echo $className;
     //$path = ROOT.DS.'controllers/';
     if (file_exists('core'.DS.strtolower($className).'.php')){
         //echo "Core Loading!\r\n";
         require_once('core' .DS.strtolower($className).'.php');
         }
    else if (file_exists('controllers'  .DS. $className . '.php')) {
            //echo " \r\n Conrtollers Loading!";
            require_once('controllers'  .DS. $className . '.php');
            } 
    else if (file_exists('models' .DS. $className . '.php')) { 
              //  echo " \r\n Models Loading!".$className;
                require_once('models' .DS . $className . '.php');               
            }
    else if (file_exists('models' .DS.'queries'.DS. $className . '.php')) { 
               // echo " \r\n Models Loading!".$className;
                require_once('models' .DS.'queries'.DS . $className . '.php');               
            }
    else if (file_exists('core'  .DS. 'sql.php')) { 
                //echo " \r\n CoreSQL LOading!";
                require_once('core'  .DS. 'sql.php');
                } 
 }
 
    
$url = $_SERVER['PATH_INFO'];
Router::route($url); 
class Router { 
    public function route($url) { 
// Split the URL into parts 
        $url_array = $url;
        $url_array = explode("/",$url); 
        array_shift($url_array);
        //array_shift($url_array);
        //array_shift($url_array);
      //  array_shift($url_array);
       // echo "URL is ".$url[0];
// The first part of the URL is the controller name 
        $controller = isset($url_array[0]) ? $url_array[0] : '';
        array_shift($url_array);
        //echo "Router";
        // The second part is the method name 
        $action = isset($url_array[0]) ? $url_array[0] : '';
        array_shift($url_array);
        // The third part are the parameters 
        $query_string = $url_array;
        // if controller is empty, redirect to default controller 
        //echo empty($controller);
        if(empty($controller)) {
      //      echo "Empty!!".DEFAULT_CONTROLLER;
            $controller = DEFAULT_CONTROLLER;            
        }
        // if action is empty, redirect to index page 
        if(empty($action)) { $action = 'index'; } 
        //$controller_name = 'HomeController';
       // $controller = ucwords($controller);
        
        $controller_name = ucwords($controller)."Controller";
        $actionName=$action.'Action';
        //echo $controller_name.':'.$action;
       // $actionName = 'indexAction';
   //     echo "Contoller::::::".$controller_name.':'.$actionName.'          NOTHING';
        $dispatch = new $controller_name($controller_name, $actionName);
        //echo $dispatch."Dispatch";
     //   echo $controller.':'.$action      ;
        if ((int)method_exists($controller_name, $actionName)) { 
          //  $view = new View();
    //        echo "Finished";
            $view = call_user_func_array(array($dispatch,$actionName),$query_string);
    //        echo "Finished";
            $view->render($controller,$action);
     //       echo "Finished";
            //$view->
            // echo "Finished";
        } else { /* Error Generation Code Here */ } 
       } 
     } 


