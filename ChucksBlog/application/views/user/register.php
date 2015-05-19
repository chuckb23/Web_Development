
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

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url().'css/bootstrap.min.css'; ?>" rel="stylesheet">

    <!-- Custom styles for this template -->
     <link href="<?php echo base_url().'css/signin.css'; ?>" rel="stylesheet">
  
    <style type="text/css">
        body {
            min-height: 2000px;
             padding-top: 70px;
            }
   
    </style>
  </head>

  <body>
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
              <li class="active"><a <?php echo anchor('login','Sign In'); ?> </a></li>   
          </ul>
          
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    
   <div class="container"> 
       <form class="form-signin" accept-charset="utf-8" method="post" action=<?php echo base_url().'authenticate/registerUser'; ?>>
       
      
        <h2 align = "center" class="form-signin-heading">Please Register</h2>
        <label for="username" class="sr-only">Username</label>
        <input type="text" name="username" id="username" class="form-control" placeholder="Username" required autofocus>
        <label for="password" class="sr-only">Password</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
        <label for="confpassword" class="sr-only">Confirm Password</label>
        <input type="password" name="passwordconf" id="passwordconf" class="form-control" placeholder="Confirm Password" required>
        <label for="email" class="sr-only">Email</label>
        <input type="email" name="email" id="confpassword" class="form-control" placeholder="example@abc.com" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
      
        </form>

    </div> <!-- /container -->

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    
  </body>
</html>

