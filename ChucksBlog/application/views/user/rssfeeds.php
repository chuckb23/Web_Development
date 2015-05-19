
<div class="container"> 
       <form class="form-signin" style="position:fixed;right:0" accept-charset="utf-8" method="post" action="<?php echo base_url().'authenticate' ; ?>">     
        <h2 align = "center" class="form-signin-heading">Add RSS Feed</h2>
        <label for="rssfeed" class="sr-only">Add RSS</label>
        <input type="text" name="rssfeed" id="rssfeed" class="form-control" placeholder="http://example.com/exampl.rss" required autofocus>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Add</button>
      
        </form>
   


             
                   
    <!-- /container -->
    <div class="timeline">
      <div id = "myRSS" class="container" style="padding-top:30px;margin-right:60%;margin-left:auto;width:90%;"> 
        <!-- Line component -->
        <div class="line text-muted"></div>
        <div class="separator text-muted">
            
        </div>  
        <h2 align="center" class="header" style="padding:30px;"><?php echo $feedname;?></h2>
    <?php foreach($rss as $post) : ?>  
        <article class="panel panel-primary" style="">
            <div class="panel-heading">
                <h2 class="panel-title"><a <?php echo 'href="'.$post['link'].'">'.$post['title']; ?></a></h2>          
            </div>   
            <div class="panel-body">
                <?php echo $post['description']; ?>
            </div>
            </article>    
    <?php endforeach; ?>
            </div>     
        </div>
    </div>
<style type="text/css">
        .form-signin{
            padding-top: 50px;
            float:right; 
            }
            .container{
                width:80%;
            }
        
	    #more{
		background: none repeat scroll 0 0 #EEEEEE;
    border: 1px solid #CFCFCF;
    color: #000000;
    display: none;
    font-weight: bold;
    left: 1100px;
    padding: 5px;
    position: fixed;
    top: 100px;

	    }
	    #no-more{
		background: none repeat scroll 0 0 #EEEEEE;
    border: 1px solid #CFCFCF;
    color: #000000;
    display: none;
    font-weight: bold;
    left: 1100px;
    padding: 5px;
    position: fixed;
    top: 100px;

	    }
	  
   
    </style>
     
    
       

     
                    </body>
</html>