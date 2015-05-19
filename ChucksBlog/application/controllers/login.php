<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Login extends CI_Controller{
    function __construct(){
        //echo APPPATH.'views/login/'.$page.'.php';
        parent::__construct();
        $this->load->helper(array('form'));
    }
    function index($page = "loginhome"){
       // echo APPPATH.'views/login/'.$page.'.php';
        
        if(!file_exists(APPPATH.'views/user/'.$page.'.php')){
            //404 Error
            show_404();
        }
        $data['title'] = ucfirst($page);
        
        //redirect('blog');
       // $this->session->unset_userdata('logged_in');
       // echo $this->session->userdata('logged_in')['username'];
        $this->load->view('user/loginhome');
        
    }
    public function register(){
       $this->load->view('user/register','',FALSE);
   }
}
