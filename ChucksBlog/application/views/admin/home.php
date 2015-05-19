   <div class="container">
    
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