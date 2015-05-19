

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 <style>
     
 </style>
 */

<div class="container" style="padding-top:60px;width:60%;"> 
    <h2 align = "center" class="heading">Current Feeds</h2>
    <?php foreach($urls as $url) : ?> 
    
    <a <?php echo 'href="'.base_url().'userhome/openrss/?url='.$url->rsspath.'/&feedname='.$url->feedname.'"';?>
        role="button" class="btn btn-success" style = "margin-bottom:40px;">
        <?php echo $url->feedname?></a> 
    <?php endforeach; ?>
       <form class="form-signin"style="margin-right:auto;margin-left:auto;width:70%;"
             accept-charset="utf-8" method="post" action="<?php echo base_url().'userhome/addRSS/'.$username ; ?>">     
        <h2 align = "center" class="form-signin-heading">Add RSS Feed</h2>
        <label for="rssfeed" class="sr-only">Add RSS</label>
        <input type="text" name="rssfeed" id="rssfeed" class="form-control" placeholder="http://example.com/example.rss" required autofocus>
        <input type="text" name="feedname" id="feedname" class="form-control" placeholder="Name this feed">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Add</button>
      
        </form>
    
</div>
