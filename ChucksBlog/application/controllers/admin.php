<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of admin
 *
 * @author chuckb23
 */
class Admin extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
             
        // Load models
        $this->load->model('BlogModel', 'post');
        }
        public function index(){
            $data['posts'] = $this->post->getPagePosts(5);
            $this->load->view('admin/header',$data);
            $this->load->view('user/home',$data);
        }
}
