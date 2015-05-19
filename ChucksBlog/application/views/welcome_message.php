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
    