<div class="col=lg-12 well">
	<h1 class="navbar-left" style="margin:5px 15px;color:green;" >Blog feed</h1>
	<h3 class="text-right"style="color:#8e0306;margin:5px 50px;">Welcome,<?php echo $result->first_name; ?>
    <p class="navbar-right" style="margin:-5px 0 0 25px;">
    <a href="../user/logout">
    <button class="btn btn-danger">Logout&nbsp;&nbsp;<span class="glyphicon glyphicon-exclamation-sign"></span></button></p></h3>
    </a>
</div>
<div class="container" style="margin:35px auto;">
	<div class="container">
	<div class="photo" style="width:200px;height:200px;margin-left:15px;padding:25px;background:#f5f5f5;float:left;">
		<img src="<?php echo base_url('asset/image/shriya.jpg');?>" style="width:150px;height:150px;"alt="neha" class="img-circle">
        </div>
        <h2 style="margin:50px 20px; "><?php echo ($result->first_name).' '.($result->last_name);?></h2>
        <a href="create">
        <button class="btn btn-primary">Write a blog&nbsp;&nbsp;
        	<span class="glyphicon glyphicon-pencil"></span></button></p>
        </div>
	    </a>
	  	<?php foreach($user as $users):?>
	  	<div class="panel panel-info">
	  <div class="panel-heading">
	    <h3 class="panel-title"><?php echo $users->title;?></h3>
	  </div>
	  <div class="panel-body">
	    <?php echo $users->text;?>
	    </div>
	</div>
	<?php endforeach;?>
	  
</div>
