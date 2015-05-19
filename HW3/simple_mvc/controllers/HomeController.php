<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class HomeController implements IController
{
    
    public function indexAction($params)
    {
        //echo '   HomeController! has been entered   .n';
        $repo = new MovieRepository();
        
        $result = $repo->getMovies();
      // echo "\n  Query returns     .n";
       // $result = "home";
        return new View($result);
    }
    
    public function getName()
    {
        return "Home";
    }
}