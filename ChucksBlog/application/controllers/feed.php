<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Feed extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('xml'));
        $this->load->model('BlogModel','post');
    }
    public function index(){
       $data['feed_name'] = 'CodIgniter-2.2.1.com';
       $data['encoding'] = 'utf-8';
       $data['feed_url'] = 'http://CodeIgniter-2.2.1.com/feed';
       $data['page_language'] = 'en-en';
       $data['page_description'] = 'Charlies RSS Feed';
       $data['creator_email'] = 'cmssb7@gmail.com';
       $data['posts'] = $this->post->getPagePosts(10);
       header("Content-Type: application/rss+xml");
       //$this->load->view('user/header');
       $this->load->view('user/myrss',$data);

    }
}
