<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class AuthenticateModel extends CI_Model{
    public $username;
    public $email;
    public $password;
    public $usertype;
    public function __construct(){
        parent::__construct();
        }
    public function checkUsers($user,$password)
{
        //echo $user.$password;
        $this->db->select('username');
        $this->db->select('password');
        $this->db->select('usertype');
        $this->db->from('users');
        $this->db->where('username',$user);
        $this->db->where('password',$password);
        $this->db->where('usertype !=','pend');
        $query = $this->db->get();
        if($query->num_rows == 1){
            return $query->result();
        }
        else{
            return false;
        }
        if ($user === FALSE)
        {
                $query = $this->db->get('users');
                return $query->result_array();
        }


    }
     public function getPending(){
     
       $query = $this->db->get_where('users', array('usertype' => 'pend'));
        if($query){
            return $query->result();
        }
        else{
            return false;
        }
        /*if ($user === FALSE)
        {
                $query = $this->db->get('users');
                return $query->result_array();
        }*/

       } 
    public function insertUser(){
        $query = $this->db->get_where('users',array('username'=>$this->username));
        if($query->num_rows >= 1){
            return false;
        }
        else{
            $this->password = $this->password;
            $this->db->insert('users',$this);
            return true;
        }
    }
    public function acceptPending(){
        $this->db->where(array('username'=>$this->username));
        return($this->db->update('users',array('usertype'=>'user')));
    }
    public function remove(){
        $this->db->where(array('username'=>$this->username));
        return($this->db->delete('users'));
    }
}


