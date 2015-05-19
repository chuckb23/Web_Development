
    

      <!-- Main component for a primary marketing message or call to action -->
      <div container>
      <div class="row" style="margin-top:5%; ">
      <div id="postcontainer" class="col-md-8 col-md-offset-1">
        <h1><?php echo 'Recent Posts'; ?></h1>
     
     
      <?php foreach($posts as $post) : ?> 
  <article>
      <h2><?php echo anchor("blog/fullPage/{$post->pid}", $post->name); ?></h2>
     
  <div class="row" style="">
    <div  class="col-md-4" style="">
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
     <p class="text-right">
        <a href="<?php echo base_url().'blog/fullpage/'.$post->pid;?>" class="text-right">
            continue reading...
        </a>
    </p>
 
    <hr>
  </article>
 <?php endforeach; ?>
     
    </div>
  </div>
      <div  class="col-md-2 col-md-offset-1">
          <a role="button" class="btn btn-success" id="getPosts" style = "margin-bottom:4px;">More Posts</a>
      </div>
      </div>
         

<style>
    .timeline{
        width:70%;
       
    }
</style>
 
  </body>
</html>
<script>$(document).ready(function () {
            
            ajax_home();     
    }); 
      function ajax_home(){
                var id = <?php echo $post->pid;?>;
                   $('#getPosts').click(function(){
                        $.ajax({
                            type: "POST",
                            url: "//localhost/CodeIgniter-2.2.1/Blog/ajaxPost",
                            data:{postid:id},
                            dataType: "json",
                            success: function(res) {
                                if(res.post=='done'){
                                    
                                    $("#getPosts").html('No More Posts');
                                    //alert($("#getPosts").val);
                                }
                                else{
                                  var string = '';
                                  for(var i =0;i<res.post.length;i++){
                                    
                                    string+='<article><h2><a href="http://localhost/CodeIgniter-2.2.1/blog/fullPage/'+res.post[i].pid+'">'+res.post[i].name+'</a></h2>'
                                    +'<div class="row" style=""><div class="col-md-4" style=""><a href="#" >Posted by:'+res.post[i].creatorname+'</a></div><div class="col-md-4 col-md-push-4 " style="">'
                                    +'<a href="#" class="text-right">Posted:'+res.post[i].cdate+'</a> </div></div> <hr><br /><p>'+res.post[i].summary+'</p><hr>'
                                    +'<p class="text-right"><a href="'+window.location.origin+'/CodeIgniter-2.2.1/blog/fullpage/'+res.post[i].pid+'" class="text-right">continue reading...</a></p><hr></article>';
                                    id = res.post[i].pid;
                                    }
                                    
                                   }
                                
                             //  alert(string);
                                //id--;
                                $("#postcontainer").append(string);
                                console.log(res);
                                //return (res.post.pid - 1);
                            }
                        });
                    });
                 }

        </script>
