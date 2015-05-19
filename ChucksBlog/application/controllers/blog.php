<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of blog
 *
 * @author chuckb23
 */
class Blog extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->database();
 
        // Load helpers
        $this->load->helper('url');
        $this->load->helper('form');
        // Load models
        $this->load->model('BlogModel', 'post');
        $this->load->model('CommentModel', 'comments');
    }
    public function index(){
        $data['posts'] = $this->post->getPagePosts(10);
        $this->load->view('user/homepage', $data);
    }
    public function create(){
        if($_POST){
            //echo 'posting';
            $post = new BlogModel();
            $post->name = $this->input->post('title',TRUE);
            //echo $post->name;
            $post->text = $this->input->post('content',TRUE);
            $post->summary = $this->input->post('summary',TRUE);
            $post->cdate = date("Y-m-d H:i:s");
            $post->creatorname = $this->session->userdata('logged_in')['username'];
            
            if($post->insertPost()){
                //echo 'saved';
                redirect('userhome','refresh');
            }
        }
        $this->load->helper('form');

        // Initialize form
        $data['action'] = 'blog/create';
        $data['title'] = NULL;
        $data['content'] = NULL;
        $data['summary'] = NULL;
        $this->load->view('user/header',$data);
        $this->load->view('createblog',$data);
    }
    public function fullPage($postID){
        $data['post']=$this->post->getPosts($postID);
        //$data['comments']=$this->comments->getComments($postID);
        $data['postID'] = $postID;
        //$data['pid'] = $postID;
        $data['action'] = 'comment/create/'.$postID;
        $data['content'] = NULL;
       // echo $data['comments']->username;
      //  echo $postID;
        $this->load->view('user/header');
        $this->load->view('fullpage',$data);
        //$this->load->view('commentbox',$data);
    }
    public function ajaxPost(){
        $postID = $this->input->post('postid',TRUE)-1;
        if($postID>1233){
        $data['post']=$this->post->getPrev($postID);
        $data['postID'] = $postID;
        echo json_encode($data);
        }else{ 
            $data['post'] = 'done';
            echo json_encode($data);
            
        }
        
    }
}
