<div class="body">
<div class="col=lg-12 well">
<h1 class="navbar-left">Blogbook</h1><br><br>
<div class="navbar-right">
       
    
    <?php echo form_open('user/login'); ?>
    <div class="form-group">
  	<div class="form-inline" style="margin-right:10px;">
    <label class="sr-only"  for="exampleInputEmail3">Email address</label>
    <input type="email" name="loginemail" class="form-control " id="exampleInputEmail3" required="required"placeholder="Email">
    <label class="sr-only" for="exampleInputPassword3">Password</label>
    <input type="password" name="loginpassword" class="form-control"  id="exampleInputPassword3" required="required"placeholder="Password">
    <button type="submit" class="btn btn-success" name="login">Login
    <span class="glyphicon glyphicon-circle-arrow-right"></span>&nbsp;&nbsp;
    </button>&nbsp;&nbsp;&nbsp;&nbsp;
</div>
   </div></form>
</div>
<br><br>
</div>
<?php if(!empty($message))
         { ?> 
             <div class="alert alert-danger" role="alert" style="float:right;width:20%;margin:-1.5% 12%;">
        <?php echo $message; ?>
              </div>
   <?php }?>

<?php echo form_open('user/index'); ?>
    <div class="form-group">
        
	<div class="col-lg-3" style="margin-left:55px;padding:40px 10px 20px;border:1px solid lightblue;border-radius:6px;">
    <?php if(!empty($message_signup))
         { ?> 
             <div class="alert alert-info" role="alert" style="width:23%;">
        <?php echo $message_signup; ?>
              </div>
   <?php }?>
    <input type="text" name="fname" class="form-control" placeholder="first Name" required="required"><br>
    <input type="text" name="lname" class="form-control" placeholder="Last Name" required="required"><br>
    <div class="input-group">
    <input type="email" name="email" class="form-control" placeholder="Your valid email Adress" required="required">
    <span class="input-group-addon">@</span></div><br>
    <input type="password" name="password" class="form-control" placeholder="password"required="required"><br>
	<input type="password" name="repassword" class="form-control" placeholder="re-type password"required="required"><br>
	<input type="date" name="dob" class="form-control" placeholder="Your Birthday"required="required"/><br>
	<input type="submit" value="signup" name="submit" class="btn btn-primary btn-lg btn-block"/><br>
	</div>
<div class="text-center">
<br><br><br><br><br><h1 style="font-size:60px;font-family:Courier, monospace;color:tomato;">Blog for Blogger</h1>
</div>
</div>
</div>
</form>
</div>