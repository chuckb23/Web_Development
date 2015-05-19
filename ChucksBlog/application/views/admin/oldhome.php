
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin Home</title>
    <!-- Bootstrap core CSS -->
    <link href="/CodeIgniter-2.2.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">   
    <link href="/CodeIgniter-2.2.1/css/panel.css" rel="stylesheet">
    <script type="text/javascript">
        window.alert = function(){};
        var defaultCSS = document.getElementById('bootstrap-css');
        function changeCSS(css){
            if(css) $('head > link').filter(':first').replaceWith('<link rel="stylesheet" href="'+ css +'" type="text/css" />'); 
            else $('head > link').filter(':first').replaceWith(defaultCSS); 
        }
        $( document ).ready(function() {
          var iframe_height = parseInt($('html').height()); 
          window.parent.postMessage( iframe_height, 'http://bootsnipp.com');
        });
    </script>
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
          <a class="navbar-brand" href="#"><?php echo $this->session->userdata('logged_in')['type']; ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
              <li class="active"><a <?php echo anchor('userhome','Home'); ?> </a></li>
            <li><?php echo anchor('blog/create','Add Content'); ?></li>
            <li><a <?php echo anchor('comment','Comments'); ?></a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Admin Tools <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a <?php echo anchor('comment','Moderate Comments'); ?></a></li>
                <li><a <?php echo anchor('authenticate/approveuser','Authenticate Users'); ?></a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a <?php echo anchor('login','Logout'); ?><span class="sr-only">(current)</span></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="container">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/InGvFoAGCwY" frameborder="0" allowfullscreen></iframe>
    <!-- Page header -->
    <div class="page-header">
        <h2>Recent Blogs</h2>
    </div>
    <!-- /Page header -->

    <!-- Timeline -->
    <div class="timeline">
    
        <!-- Line component -->
        <div class="line text-muted"></div>

        <!-- Separator -->
        <div class="separator text-muted">
            <time>26. 3. 2015</time>
        </div>
     
    <?php foreach($posts as $post) : ?>  
        <article class="panel panel-primary">
    
            <!-- Icon -->
            <div class="panel-heading icon">
                <i class="glyphicon glyphicon-plus"></i>
            </div>
            <!-- /Icon -->
    
            <!-- Heading -->
            <div class="panel-heading">
                <h2 class="panel-title"><?php echo anchor("blog/fullPage/{$post->pid}", $post->name); ?></h2>
                <h3 class="panel-title"><small><?php echo $post->cdate; ?></small></h3>
            </div>
            <!-- /Heading -->
    
            <!-- Body -->
            <div class="panel-body">
                <?php echo $post->text; ?>
            </div>
            <!-- /Body -->
    
            <!-- Footer -->
            <div class="panel-footer">
                <small>Footer is also supported!</small>
            </div>
            <!-- /Footer -->
    
        </article>
    <?php endforeach; ?>
      
    
    </div>
   
</div>


  

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="/CodeIgniter-2.2.1/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

