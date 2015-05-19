

<form role="form" accept-charset="utf-8" method="post" action="<?php echo base_url().'blog/create/'; ?>"
      style="width:80%">
  <div container style="width:70%;margin:auto;">
    <h2 align="center">Add Post</h2><br />
    <div class="form-group"> 
    <label for="title">Title</label><br />
    <input type ="text" id="title" name="title" 
         size="75" class="form-control" placeholder="Title of Post" required autofocus/>
    </div>
    <div class="form-group"  
    <label for="summary">Summary</label><br />
    <textarea class="form-control" rows="3" id="summary" name="summary" placeholder="Summary of your post"></textarea>
    </div>
    <div class="form-group" > 
    <label for="content">Text</label><br />
    <textarea class="form-control" rows="10" id="content" name = "content" placeholder="Write a post"></textarea>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top:20px;">Add</button>
  </div>
</form>
<style>
    .form-control{
        margin-bottom: 20px;
    }
    </style>