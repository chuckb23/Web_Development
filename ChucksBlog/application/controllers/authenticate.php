<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Authenticate extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
   //echo 'authenticating ';
   $this->load->model('AuthenticateModel','user');
 }
 
 function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');
 
   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|md5|callback_check_database');
 
   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page
       echo 'Validation has failed';
     $this->load->view('user/loginhome');
   }
   else
   {
     //Go to private area
      // echo 'Validation has succeeded';
     redirect('userhome', 'refresh');
   }
 
 }
 
 function check_database($password)
 {
   //Field validation succeeded.  Validate against database
   $username = $this->input->post('username');
 
   //query the database
   $result = $this->user->checkUsers($username, $password);
 
   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'type' => $row->usertype,
         'username' => $row->username
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
 }
 public function registerUser(){
     
            //echo 'posting';
            $user = new AuthenticateModel();
            //$post->name = $this->input->post('title',TRUE);
            //echo $post->name;
             $this->load->library('form_validation');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[passwordconf]|md5');
            $this->form_validation->set_rules('passwordconf', 'Password Confirmation', 'trim|required');
            $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|xss_clean');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            if($this->form_validation->run()==FALSE){
                $this->form_validation->set_message('register user', "failed");
                $this->load->view('user/register');
            }
            else{
            $user->username = $this->input->post('username',TRUE);
            $user->password = $this->input->post('password',TRUE);
            $user->email = $this->input->post('email',TRUE);
            $user->usertype = 'pend';
     
            if($user->insertUser()){
                /*$sess_array = array(
                'type' => $user->usertype,
                'username' => $user->username
                   );
                 $this->session->set_userdata('logged_in', $sess_array);*/
               /* $msg = 'A new user named:'.$user->name.' and Email:'.$user->email.' has attempted to join the site\n'
                    .'please confirm or deny the user at '.  base_url().'authenticate/approveuser';
                  
// use wordwrap() if lines are longer than 70 characters
                $msg = wordwrap($msg,70);

// send email
                mail("charles.beaudoin@email.wsu.edu","New user",$msg);*/
                $data['user'] = $user; 
                $this->load->view('user/registersuccess',$data);
                
            }
            else{
                $this->form_validation->set_message('check_database', 'username/email is already in user');
               $this->load->view('user/register');
            } 
            }
        
        /*else{
            redirect('login/register','refresh');
        }*/
    }
    public function approveUser(){
        //create view listing users who are pend
        //in this view have + marks that allow for authentication
        //if plus checked admin is sent here where the users
        //type is updated from pend to user
        //reload view listing users pend 
        //authenticate 
        $data['users'] = $this->user->getPending();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/authenticateusers',$data);
    }
    public function updateuser($updatename){
        $user = new AuthenticateModel();
        $user->username = $updatename;
        $user->acceptPending();
        redirect('authenticate/approveUser','refresh');
        
    }
    public function removeuser($removename){
        $user = new AuthenticateModel();
        $user->username = $removename;
        $user->remove();
        //$this->load->view('admin/authenticateusers',$data);
        redirect('authenticate/approveUser','refresh');
    }
}
