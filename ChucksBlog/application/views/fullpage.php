
    

      <!-- Main component for a primary marketing message or call to action -->
      <div class="row" style="margin-top:5%; ">
      <div class="col-md-8 col-md-offset-1">
        <h1><?php echo $post->name; ?></h1>
        <h2><?php echo 'Posted by:'.$post->creatorname; ?></h2>
        <h3><?php echo 'Posted:'.$post->cdate; ?></h3>
        <p><?php echo $post->text; ?></p>
     
      
      
      
   
     <div id="myComments" class="media-list">
        <?php if(!empty($comments)): ?>
         <h2 style=padding:5px;"><strong>Recent Comments</strong></h2>
            
      <?php foreach($comments as $comment) : ?> 
  
  <div class="media" style="margin:20px;">
    <a href="#" class="pull-left" style="width:10%;">
        <img src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="media-object" alt="Sample Image" style="width:80%;" >
    </a>
    <div class="media-body">
        <h4 class="media-heading"><?php echo '<strong>'.$comment->username.'</strong><small> commented on </small>'.$comment->cdate;?></h4>
        <p><?php echo $comment->commenttext;?></p>
    </div>
      </div>
    <?php endforeach; ?>
        <?php else: ?>
        <a role="button" class="btn btn-success" id="showComments" style = "margin-bottom:8px;margin-top:8px;">Show Comments</a>
        <?php endif; ?>
     </div>
      <form class="form" accept-charset="utf-8" method="post" style="width:60%;"
            action=<?php echo '"'.base_url().$action.'"'; ?> >
 
    <p>
        <label for="content">Add New Comment</label><br />
        <textarea id="content" class="form-control" name="content" rows="3"
            ><?php echo $content; ?></textarea>  
    </p>
 
    <p>
        
        <input type="submit" value="Post" />
    </p>
      </form>
   
  </div>
      </div>

<style>
    
    .thumbnail {
    padding:0px;
}

</style>
<script>$(document).ready(function () {
           ajax_rssurl();     
    }); 
      function ajax_rssurl(){
                   $('#showComments').click(function(){
                        $.ajax({
                            type: "POST",
                            url: "//localhost/CodeIgniter-2.2.1/Comment/getcomments",
                            data:{articleid:<?php echo $postID;?>},
                            dataType: "json",
                            success: function(res) {
                                if(res){
                                  //  alert(res.comments[0].cdate);
                                    var string = '<h2 style=padding:5px;"><strong>Recent Comments</strong></h2>';
                                    for(var i=0;i<res.comments.length;i++){
                                    string+='<div class="media" style="margin:20px;">'
                                       +'<a href="#" class="pull-left" style="width:10%;">'
                                        +'<img src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png" '
                                        +'class="media-object" alt="Sample Image" style="width:80%;" >'
                                       + '</a> <div class="media-body"> <h4 class="media-heading">'
                                       + '<strong>'+res.comments[i].username+'</strong><small> commented on </small>'+res.comments[i].cdate
                                        +'</h4><p>'+res.comments[i].commenttext+'</p></div></div>';
                                    }
                                }
                               // alert(string);
                                $("#myComments").html(string);
                                console.log(res);
                            }
                        });
                    });
                 }

        </script>
  </body>
</html>

      
