<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of comment
 *
 * @author chuckb23
 */
class Comment extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->database();
 
        // Load helpers
        $this->load->helper('url');
             
        // Load models
        $this->load->model('CommentModel', 'post');
        }
    public function index(){
        $data['comments'] = $this->post->getPageComments();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/moderatecomments',$data);
        
    }
    public function loadPageComments(){
        $data['comments'] = $this->post->getPageComments();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/moderatecomments',$data);
        //getComments
      //  return get
    }
    public function loadArticleComments($articleid){
        $data['comments'] = $this->post->getComments($articleid);
        $this->load->view('admin/header',$data);
        $this->load->view('admin/moderatecomments',$data);
        //getComments
      //  return get
    }
    public function getcomments(){
        $this->load->model('CommentModel', 'post');
         $articleid= $this->input->post('articleid', TRUE);
         $data['articleid'] = $articleid;
        $data['comments']=$this->post->getComments($articleid);
        echo json_encode($data);
    }
    public function approve($cid){
        $post = new CommentModel();
        $post->cid = $cid;
        $post->acceptComment();
        redirect('comment','refresh');
        
    }
    public function create($postID){
        if($_POST){
            //echo 'posting';
            $post = new CommentModel();
            //$post->name = $this->input->post('title',TRUE);
            //echo $post->name;
            $post->commenttext = $this->input->post('content',TRUE);
            $post->articlepid = $postID;
            $post->cdate = date("Y-m-d H:i:s");
            $post->status = 'pending';
            $post->username = $this->session->userdata('logged_in')['username'];
            if($post->insertComment()){
                //echo 'saved';
                redirect('blog/fullPage/'.$post->articlepid,'refresh');
            }
        }
      /*  $this->load->helper('form');

        // Initialize form
        $data['action'] = 'comment/create';
        $data['title'] = NULL;
        $data['content'] = NULL;
        $this->load->view('commentbox',$data);*/
    }
    public function delete(){
        $post = new CommentModel();
        $post->cid = $this->uri->segment(3);
        if($post->removeComment()){
            redirect('comment','refresh');
        }
    }
}
