<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class BlogModel extends CI_Model{
    public $pid;
    public $name;
    public $text;
    public $cdate;
    public $creatorname;
    public $summary;
    public function __construct(){
        parent::__construct();
        }
    public function getPosts($tag){
        $query = $this->db->get_where('posts', array('pid' => $tag));
        return $query->row();
    }
    public function getPrev($tag){
        $query = $this->db->order_by('pid','DESC')->get_where('posts', array('pid <=' => $tag, 'pid >'=>($tag-2)),2);
        return $query->result();
    }
    public function getAllPosts() {
        return $this->db->order_by('cdate','DESC')->get('posts')->result();
    }
    public function getPagePosts($limit) {
        return $this->db->order_by('cdate','DESC')->get('posts',$limit)->result();
    }
    public function insertPost(){
        return $this->db->insert('posts', $this);
    }
}