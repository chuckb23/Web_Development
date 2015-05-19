
    <div class="container">

    <!-- Page header -->
    <div class="page-header">
        <h2>Recent Users</h2>
    </div>
    <!-- /Page header -->

    <!-- Timeline -->
    <div class="timeline">
    
        <!-- Line component -->
        <div class="line text-muted"></div>

     
    <?php foreach($users as $user) : ?> 
      <article class="panel panel-primary">
            <!-- Heading -->
            <div class="panel-heading icon">
                <i class="glyphicon glyphicon-plus"></i>
            </div>
            <div class="panel-heading">
                <h2 class="panel-title"><?php echo 'UserName: '.$user->username;?></h2>
                <h2 class="panel-title"><small><?php echo 'Email:'.$user->email; ?></small></h2>
            </div>
            <div class="panel-footer" text-align = "right">
                <a role="button" <?php echo 'href="'.base_url().'authenticate/updateuser/'.$user->username.'"';?>
                   class="btn btn-success" >Approve</a> 
                <a role="button" <?php echo 'href="'.base_url().'authenticate/removeuser/'.$user->username.'"';?>
                   class="btn btn-danger" >Remove</a> 
                
            </div>
         
        </article>
         
    <?php endforeach; ?>
      
    
    </div>
   
</div>

  </body>
</html>


