<div class="col=lg-12 well">
<h1 class="navbar-left">Create your Blog here</h1><br>
<p class="navbar-right" style="margin:-5px 0 0 25px;">
    <a href="../user/logout">
    <button class="btn btn-danger">Logout&nbsp;&nbsp;<span class="glyphicon glyphicon-exclamation-sign"></span></button></p></h3>
    </a><br><br>
</div><br><br>
<div class="container">
<?php echo form_open('blog/create'); ?>
  
    <form role="form">
    <div class="form-group" style="margin:50px 200px;padding:10px; border:5px double #337aa5; border-radius:8px;">
      <input type="input" class="form-control" name="title" required="required" placeholder="title of your blog" style="height:7%;"/>	
      <textarea name="text"></textarea>
      <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit" style="margin-top:2%">Submit your Blog</button>
    </div>
  </form>
</form>
</div>
<script type="text/javascript">
CKEDITOR.replace( 'text' );
</script>