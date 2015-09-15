<div class="col=lg-12 well" style="color:#ff3232;">
<h2 class="navbar-left"><?php echo $blog_data['title'];?></h2><br>
<p class="navbar-right" style="margin:-5px 0 0 25px;">
  <?php if(!empty($uid))
  {?>
<a href="../../user/logout">
<button class="btn btn-danger">Logout&nbsp;&nbsp;<span class="glyphicon glyphicon-exclamation-sign"></span></button></p>
  </a><?php }
  else{?>
    <a href="../../user/index" style="color:red;font-size:22px;"> Login for comment</a>
   <?php }?>
</p><br>

</div>
  <div class="container" >
<div class="panel panel-info">
		  <div class="panel-heading">
		    <h3 class="panel-title"><?php echo strtoupper($blog_data['title']); ?></h3>
		    </div>
		    <div class="panel-body">
              <?php echo $blog_data['text'];?>
		    </div>
		</div>
		  
     <?php  foreach($result as $results):?>
     <div class="panel panel-danger">
      <div class="panel-heading"style="color:black;height:35px;background:#f4b4b4">
      <p text-left><?php echo $fname.' '.$lname;?> </p>

          
      </div>
     	<div class="panel-body">
         <?php echo $results->text; ?>
         
     </div>
    </div>
    <?php endforeach; 
      if($uid): ?>
      <?php echo form_open('blog/set_comment/'.$blog_data['slug']); ?>
      <input type="hidden" name="post_id" value="<?php echo $blog_data['id'];?>"/>
      <input type="text" name="comment" style="width:850px;height:45px;border-radius:2px;" />
      <input type="button" value="comment" id="comment"  style="width:100px;height:45px;background:green;color:#ffffff;"/>
      <?php endif; ?>
    </form>
</div>
<script type="text/javascript">
  $('#comment').click(function(){
    var url = $(this).parent().attr('action');
    var data = $(this).parent().find('input[name=comment]').val();
    var user = $(this).parent().find('input[name=post_id]').val();
    alert(user);

    $.ajax({
      url: url,
      data: {'post_id':user,'comment':data},
      success: function(data){
        alert(data);
      }
    })
    
  });
</script> 