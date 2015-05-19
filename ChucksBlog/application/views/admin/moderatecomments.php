<div class="container">
    <div class="page-header">
        <h2>Recent Comments</h2>
    </div>
    <div class="timeline">
    
     <?php foreach($comments as $comment) : ?> 
        <div class="media-list">
            <div class="media" style="margin:20px;">
                <a href="#" class="pull-left" style="width:10%;">
                    <img src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="media-object" alt="Sample Image" style="width:80%;" >
                </a>
                <div class="media-body">
                    <h4 class="media-heading"><?php echo '<strong>'.$comment->username.'</strong><small> commented on </small>'.$comment->cdate;?></h4>
                    <p><?php echo $comment->commenttext;?></p>
                    <a role="button" <?php echo 'href="'.base_url.'comment/approve/'.$comment->cid.'"';?>
                     class="btn btn-success" >Approve</a> 
                    <a role="button" <?php echo 'href="'.base_url().'comment/delete/'.$comment->cid.'"';?>
                    class="btn btn-danger" >Remove</a> 
                </div>
            </div>
        </div>
   <?php endforeach; ?>
    </div>
  </body>
</html>

