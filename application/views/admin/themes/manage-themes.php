<div class="row">
   <div class="col-md-12 text-success">
<h2>Manage Installed Themes</h2>
   </div>
</div>              
<!-- /. ROW  -->
<hr />                                  
    <div class="row" >
      <div class="col-md-12 col-sm-12 col-xs-12">
<?php foreach ($installed_themes as $theme) : ?>
<div class="panel panel-default">
  <div class="panel-heading text-dark">
<h3><?php echo 'Theme : '.ucwords ($theme['theme_name']); ?></h3>
<button class='btn btn-info btn-xs'>Author : <?php echo $theme['theme_author']; ?></button> <button class='btn btn-dark btn-xs'>Version : <?php echo $theme['theme_version']; ?></button>
</div>
<div class="panel-body">
	
<h4>Description</h4>

<p>
<?php echo $theme['theme_description']; ?>
</p>

<p><button class='btn btn-success btn-sm'>Activate Theme</button> <button class='btn btn-danger btn-sm'>Delete Theme</button> </p>
</div>
</div>
<?php endforeach; ?>
</div>
<!-- /. ROW  -->