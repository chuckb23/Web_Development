<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class RSSModel extends CI_Model{
    public $username;
    public $rsspath;
    public $feedname;
    
    
    public function __construct() {
        parent::__construct();
    }
    public function getRSS(){
       $this->db->get_where('rss',  ['username'=>$this->username,'rsspath'=>$this->rsspath]);
       $this->load->library('RSSParser', array('url' => 'http://www.npr.org/rss/rss.php?id=1019', 'life' => 2));
       return $this->rssparser->getfeed(6);
    }
    public function getAll(){
        $this->db->distinct();
        $this->db->select('rsspath');
        $this->db->select('feedname');
        $this->db->from('rss');
        return $this->db->get();
    }
    public function insert(){
        $this->db->insert('rss',$this);
    }
    public function getUserRSS(){
      //  $this->db->distinct();
        //$this->db->select('rsspath');
        $this->db->select('rsspath');
        $this->db->select('feedname');
        $this->db->from('rss');
        $this->db->where(array('username'=>$this->username));
        $this->db->where('feedname is not null');
        return $this->db->get()->result();
        //return $this->db->get();
    }
    public function deleteRss(){
        $this->db->where($this);
        return $this->db->delete('rss');
    }
}
