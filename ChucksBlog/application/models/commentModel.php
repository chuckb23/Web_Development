<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of commentModel
 *
 * @author chuckb23
 */
class CommentModel extends CI_Model {
    public $articlepid;
    public $username;
    public $commenttext;
    public $cdate;
    public $cid;
    public function __constructor(){
        parent::__construct();
        }
        public function getComments($articleID){
            $query = $this->db->order_by('cdate','ASC')->get_where('comments', array('articlepid' => $articleID,'status'=>'approved'));
            return $query->result();
        }
         public function getPageComments(){
            $query = $this->db->order_by('cdate','ASC')->where(array('status'=>'pending'))->or_where(array('status'=>NULL))->get('comments');
            return $query->result();
        }
        public function insertComment(){
            return $this->db->insert('comments', $this);
        }
        public function removeComment(){
            $this->db->where('cid',$this->cid);
            return $this->db->delete('comments');
        }
        public function acceptComment(){
            $this->db->where('cid',$this->cid)->update('comments',array('status'=>'approved'));
            
        }
    
}
