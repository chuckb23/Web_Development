<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class UserHome extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        //$this->load->library('RSSParser', array('url' => 'http://www.npr.org/rss/rss.php?id=1019', 'life' => 2));
        // Load models
        $this->load->model('BlogModel', 'post');
        $this->load->model('RSSModel', 'rss');
        }
    function index(){
        if($this->session->userdata('logged_in'))
        {
         $session_data = $this->session->userdata('logged_in');
         $data['username'] = $session_data['username'];
         $data['type'] = $session_data['type'];
         $data['posts'] = $this->post->getPagePosts(5);
         
         
        // redirect('blog', 'refresh');
      //   echo $data['usertype'];
         if($session_data['type'] == 'admin'){
             redirect('admin','refresh');
         }else{
            $this->load->view('user/header',$data);
            $this->load->view('user/home', $data);
         }
        }
       else
       {
         //If no session, redirect to login page
         redirect('login', 'refresh');
       }
    }
    public function asyncrss(){
      //  $this->load->library('RSSParser', array('url' => 'http://www.npr.org/rss/rss.php?id=1019', 'life' => 2));
        $rss = $this->rssparser->getfeed(30);
        /*<article class="panel panel-primary">
            <div class="panel-heading">
                <h2 class="panel-title"><a href="<?php echo $post['link'].'">'.$post['title']; ?></a></h2>
                <h3 class="panel-title"><small><?php echo $post['description']; ?></small></h3>
            </div>
            
            <div class="panel-body">
                <?php echo 'ty'; ?>
            </div>*/
        $rssstring=' ';
        foreach ($rss as $item) {
            $rssstring.= '<article class = "panel panel-primary">'
                    . ' <div class="panel-heading"><h2 class="panel-title"><a href="'
                    .$item['link'].'">'.$item['title'].'</a></h2></div>'
                    . '<div class="panel-body">'.$item['description'].'</div></article>';
            
        }
        echo $rssstring;
    }
   public function openRSS(){
       $this->load->helper('form');
       $url = $this->input->get('url');
       $data['feedname'] = $this->input->get('feedname');
       $this->load->library('RSSParser', array('url' => $url, 'life' => 2));
       //echo $url;
        // Initialize form
        //$data['action'] = 'blog/rss';
        //$data['rsspath'] = NULL;
        //$data['username'] = $this->session->userdata('logged_in')['username'];
        $data['rss'] = $this->rssparser->getfeed(10);
        $data['rssurl'] = $url;
        $this->load->view('user/header',$data);
        $this->load->view('user/rssfeeds',$data);
        
        //
      //$this->rssparser->set_feed_url('http://www.npr.org/rss/rss.php?id=1019');
     // $this->rssparser->set_cache_life(30);
     // $rss = $this->rssparser->getFeed(6);
       // return $rss;
   }
   public function addRSS($username){
       $this->load->helper('url');
       if($_POST){
            
            $post = new RSSModel();
            $post->rsspath = $this->input->post('rssfeed',TRUE);
            $post->feedname = $this->input->post('feedname',TRUE);
            $post->username = $username;
            $post->insert();
           // $this->load->view('user/header');
            //redirect('userhome','refresh');
            //$this->load->view('user/rsscontrols',$data);
            redirect('userhome/userRSS/'.$post->username.'/','refresh');
            
        }
        redirect('userhome/userRSS/'.$post->username.'/','refresh');
        //redirect('userhome','refresh');
    }
    public function userRSS($username){
        $urls = new RSSModel();
        $urls->username = $username;
        $data['username'] = $username;
        $data['urls'] = $urls->getUserRSS();
        $data['title'] = 'Choose/Add RSS';
        $this->load->view('user/header',$data);
        $this->load->view('user/rsscontrols',$data);
    }
     public function ajaxRSS($username){
         if($_POST){
            $this->load->helper('form');
            $url = $this->input->post('url');
            $data['feedname'] = $this->input->get('feedname');
             $this->load->library('RSSParser', array('url' => $url, 'life' => 2));
        //$this->load->view('user/header',$data);
        //$this->load->view('user/rsscontrols',$data);
         }
    }
   
   
   function logout()
    {
   $this->session->unset_userdata('logged_in');
   $this->session->sess_destroy();
   
   redirect('login', 'refresh');
    }
    
}
