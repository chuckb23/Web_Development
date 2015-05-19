
    

      <!-- Main component for a primary marketing message or call to action -->
      <div container>
      <div class="row" style="margin-top:5%; ">
      <div class="col-md-8 col-md-offset-1">
        <h1><?php echo 'Recent Posts'; ?></h1>
     
      
      <?php foreach($posts as $post) : ?> 
  <article>
      <h2><?php echo anchor("blog/fullPage/{$post->pid}", $post->name); ?></h2>
     
  <div class="row" style="">
    <div class="col-md-4" style="">
        <a href="#" ><?php echo 'Posted by:'.$post->creatorname; ?></a>
                     
        </div>
      <div class="col-md-4 col-md-push-4 " style="">
                     <a href="#" class="text-right"><?php echo 'Posted:'.$post->cdate; ?></a> 
      </div>
  </div> 
      <hr>
     <br />
 
    <p><?php echo $post->summary; ?></p>
    <hr>
  </article>
 
    <p class="text-right">
        <a href="singlepost.html" class="text-right">
            continue reading...
        </a>
    </p>
 
    <hr>
    <?php endforeach; ?>
    </div>
  </div>
      </div>
         
  
<style>
    
    .thumbnail {
    padding:0px;
}

</style>
  </body>
</html>

      
