<div class="col=lg-12 well">
<h2 style="color:green;"><?php echo $title; ?></h2>
</div>
<div class="container">
<?php foreach ($blog as $blogs_item): ?>
     <div class="panel panel-success">
		  <div class="panel-heading">
		    <h3 class="panel-title"><?php echo strtoupper($blogs_item['title']); ?></h3>
		  </div>
	  <div class="panel-body">
          <?php echo substr($blogs_item['text'],0,201).'....'; ?> </div>
        <div class="panel-footer">  
          <h4><a href="<?php echo site_url('blog/show_blog/'.$blogs_item['slug']); ?>">View article</a></h4>
        </div>
     
    </div>
    <?php endforeach; ?>
</div>
