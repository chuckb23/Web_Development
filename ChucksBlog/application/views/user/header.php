<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $this->session->userdata('logged_in')['username']; ?></title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url().'css/bootstrap-theme.min.css'; ?>"  rel="stylesheet"> 
    <link href="<?php echo base_url().'css/bootstrap.min.css'; ?>" id="bootstrap-css"  rel="stylesheet">   
    <link href="<?php echo base_url().'css/panel.css'; ?>" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="<?php echo base_url().'js/bootstrap.min.js'; ?>"></script>
    
    <!-- Custom styles for this template -->
    <style type="text/css">
        body {
            min-height: 2000px;
             
            }
   
    </style>
 
    

  </head>

  <body>
   <?php $username = $this->session->userdata('logged_in')['username'];
           $usertype =$this->session->userdata('logged_in')['type'];
     if(!$this->session->userdata('logged_in')):
         echo '<script type="text/javascript">alert("Login to access content");</script>';
         redirect('login','refresh');
         
     endif;
   ?>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><?php echo $usertype.':'.$username; ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
              <li class="active"><?php echo anchor('userhome','Home'); ?></li>
            <li><?php echo anchor('blog/create','Add Content'); ?></li>
            <li><a href="<?php echo base_url().'userhome/userrss/'.$username;?>">My Feeds</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">More <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><?php echo anchor('userhome/userrss/'.$username,'My Feeds');?></li>
                <li><?php echo anchor('feed','RSS');?></li>
                <li><?php echo anchor('blog/create','Add Content');?></li>
                <li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
              <li class="active"><?php echo anchor('feed','Our RSS Feed'); ?></li>
            <li class="active"><a <?php echo anchor('userhome/logout','Logout'); ?><span class="sr-only">(current)</span></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
       
 