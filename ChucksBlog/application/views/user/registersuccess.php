<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $this->session->userdata('logged_in')['username']."'s".' homepage'; ?></title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url().'css/bootstrap.min.css'; ?>" id="bootstrap-css">   
    <link href="<?php echo base_url().'css/panel.css'; ?>" rel="stylesheet">
   
    <!-- Custom styles for this template -->
    <style type="text/css">
        body {
            min-height: 2000px;
             padding-top: 70px;
            }
   
    </style>


  </head>

  <body>

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
          <a class="navbar-brand" href="#"><?php echo 'user:'.$this->session->userdata('logged_in')['username']; ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a <?php echo 'href="'.base_url().'login"'; ?>>Sign In</a></li>
            
          </ul>
         
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="container">

    <!-- Page header -->
    <div class="jumbotron" >
        <h2><?php echo 'Thank you for registering:'.$user->username; ?></h2>
        <h2><?php echo 'Email:'.$user->email; ?></h2>
        <h2>You will be able to login once you are approved as a member</h2>
    </div>
    <!-- /Page header -->

    <!-- Timeline -->
   
    
    </div>
   

  </body>
</html>