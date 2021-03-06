
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title> Welcome To Charlie's Blog Sign-in</title>

    <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url().'css/bootstrap-theme.min.css'; ?>"  rel="stylesheet"> 
    <link href="<?php echo base_url().'css/bootstrap.min.css'; ?>" id="bootstrap-css"  rel="stylesheet">   
    <link href="<?php echo base_url().'css/panel.css'; ?>" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="<?php echo base_url().'js/bootstrap.min.js'; ?>"></script>
     <link href="<?php echo base_url().'css/signin.css'; ?>" rel="stylesheet">
  
    
    <style type="text/css">
        body {
            min-height: 2000px;
             padding-top: 70px;
             background-color:#c9dbe9;
             
            }
            #myhead{
                font-size:36px;
                letter-spacing:1px;
                color: #778899;
                font-weight:bold;
                text-align:center;
            }
            
          
*{ margin: 0; padding: 0;}

body {
	/*To hide the horizontal scroller appearing during the animation*/
	overflow-x: hidden;
}

#clouds{
	padding: 100px 0;
	background: #c9dbe9;
	background: -webkit-linear-gradient(top, #c9dbe9 0%, #fff 100%);
	background: -linear-gradient(top, #c9dbe9 0%, #fff 100%);
	background: -moz-linear-gradient(top, #c9dbe9 0%, #fff 100%);
}

/*Time to finalise the cloud shape*/
.cloud {
	width: 200px; height: 60px;
	background: #fff;
	
	border-radius: 200px;
	-moz-border-radius: 200px;
	-webkit-border-radius: 200px;
	
	position: absolute; 
}

.cloud:before, .cloud:after {
	content: '';
	position: absolute; 
	background: #fff;
	width: 100px; height: 80px;
	position: absolute; top: -15px; left: 10px;
	
	border-radius: 100px;
	-moz-border-radius: 100px;
	-webkit-border-radius: 100px;
	
	-webkit-transform: rotate(30deg);
	transform: rotate(30deg);
	-moz-transform: rotate(30deg);
}

.cloud:after {
	width: 120px; height: 120px;
	top: -55px; left: auto; right: 15px;
}

/*Time to animate*/
.x1 {
	-webkit-animation: moveclouds 15s linear infinite;
	-moz-animation: moveclouds 15s linear infinite;
	-o-animation: moveclouds 15s linear infinite;
}

/*variable speed, opacity, and position of clouds for realistic effect*/
.x2 {
	left: 0px;top:40px;
	
	-webkit-transform: scale(0.6);
	-moz-transform: scale(0.6);
	transform: scale(0.6);
	opacity: 0.6; /*opacity proportional to the size*/
	
	/*Speed will also be proportional to the size and opacity*/
	/*More the speed. Less the time in 's' = seconds*/
	-webkit-animation: moveclouds 12s linear infinite;
	-moz-animation: moveclouds 12s linear infinite;
	-o-animation: moveclouds 12s linear infinite;
}

.x3 {
	left: 0px; top: 100px;
	
	-webkit-transform: scale(0.8);
	-moz-transform: scale(0.8);
	transform: scale(0.8);
	opacity: 0.8; /*opacity proportional to the size*/
	
	-webkit-animation: moveclouds 20s linear infinite;
	-moz-animation: moveclouds 20s linear infinite;
	-o-animation: moveclouds 20s linear infinite;
}

.x4 {
	 top: 450px;
	
	-webkit-transform: scale(0.75);
	-moz-transform: scale(0.75);
	transform: scale(0.75);
	opacity: 0.75; /*opacity proportional to the size*/
	
	-webkit-animation: moveclouds 18s linear infinite;
	-moz-animation: moveclouds 18s linear infinite;
	-o-animation: moveclouds 18s linear infinite;
}

.x5 {
	left: 0px; top: 530px;
	
	-webkit-transform: scale(0.8);
	-moz-transform: scale(0.8);
	transform: scale(0.8);
	opacity: 0.8; /*opacity proportional to the size*/
	
	-webkit-animation: moveclouds 20s linear infinite;
	-moz-animation: moveclouds 20s linear infinite;
	-o-animation: moveclouds 20s linear infinite;
}

@-webkit-keyframes moveclouds {
	0% {margin-left: 1000px;}
	100% {margin-left: -1000px;}
}
@-moz-keyframes moveclouds {
	0% {margin-left: 1000px;}
	100% {margin-left: -1000px;}
}
@-o-keyframes moveclouds {
	0% {margin-left: 1000px;}
	100% {margin-left: -1000px;}
}

               
   
    </style>
  </head>

  <body>
      <div style="fixed:top;"><h1 id='myhead' ">Charlie's Blog</h1></div>
      <div id="clouds">   
          <div class="cloud x1"></div>
           <div class="cloud x2"></div>
          <div class="cloud x3"></div>
          <div class="cloud x4"></div>
          <div class="cloud x5"></div>
            
       
   
      <?php $username = $this->session->userdata('logged_in')['username'];
if($username):
         redirect('userhome','refresh');
     endif;
     ?>
    <?php echo validation_errors(); ?>
      
     
     <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
          
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
              <li class="active"><?php echo anchor('login/register','Register User'); ?></li>
             
          </ul>
           
          
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    
   <div class="container"> 
       
       
       <form class="form-signin" accept-charset="utf-8" method="post" action="<?php echo base_url().'authenticate' ; ?>">
       
      
        <h2 align = "center" class="form-signin-heading">Please sign in</h2>
        <label for="username" class="sr-only">Username</label>
        <input type="text" name="username" id="username" class="form-control" placeholder="Username" required autofocus>
        <label for="password" class="sr-only">Password</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      
        </form>

    </div> <!-- /container -->
     
      </div>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 
  </body>
</html>



