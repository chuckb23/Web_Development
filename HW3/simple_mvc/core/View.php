<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of View
 *
 * @author chuckb23
 */
class View {
    protected $view_bag = array();
    protected $viewName;
    function View($a,$name=""){
        
        $this->view_bag = $a;
        $this->viewName = $name;
        $this->render();
       /* foreach($this->view_bag as $movies){
        echo $movies->description;
        }*/
       // $this->render($name);
       // return $this->view_bag;
    }
    function set($name,$value) { 
        $this->variables[$name] = $value;
    } 
    function render($controller,$action) { 
       // echo extract($this->view_bag);
      //  ob_start();
        $view_bag = $this->view_bag;
        /*$this->_bodyContent = ob_get_contents();
        if( file_exists(SITE_PATH.DS.'views' . DS . $controller .DS. 'layout.php') ) { 
            //ob_start();
            $mvc_body = $this->_bodyContent;
            include (SITE_PATH.DS.'views' . DS . $controller .DS. 'layout.php'); 
            
        } 
        else if(file_exists(SITE_PATH.DS.'views' .DS. 'layout.php')){ 
           // ob_start();
           // echo "View layout";
           // ob_end_flush();
            $mvc_body = $this->_bodyContent;
            include (SITE_PATH.DS.'views' .DS. 'layout.php');
            }
         else{
           //  ob_end_flush();
             echo $this->_bodyContent;
         }*/
       // ob_end_flush();
        ob_start();
        //echo ROOT.DS.'views'.DS.$action;
         if(empty($this->viewName)){ 
        //     echo ROOT.DS.'views'.DS.$action;
            include (SITE_PATH.DS.'views'.DS.$controller.DS.$action.'.php');
        }else{
       //     echo ROOT.DS.'views'.DS.$controller.DS.$this->viewName;
            include (SITE_PATH.DS.'views'.DS.$controller.DS.$this->viewName.'.php');
        }
        $this->_bodyContent = ob_get_contents();
        ob_end_clean();
        if( file_exists(SITE_PATH.DS.'views' . DS . $controller .DS. 'layout.php') ) { 
            ob_start();
            $mvc_body = $this->_bodyContent;
            include (SITE_PATH.DS.'views' . DS . $controller .DS. 'layout.php'); 
            
        } 
        else if(file_exists(SITE_PATH.DS.'views' .DS. 'layout.php')){ 
            ob_start();
           // echo "View layout";
           // ob_end_flush();
            $mvc_body = $this->_bodyContent;
            include (SITE_PATH.DS.'views' .DS. 'layout.php');
            }
         else{
           //  ob_end_flush();
             echo $this->_bodyContent;
         }
         ob_end_flush();
        
        // echo $this->_bodyContent;
        
        }
    //put your code here
}
