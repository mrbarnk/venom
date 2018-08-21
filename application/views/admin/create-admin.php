<div class="card mb-3">
  <div class="card-header bg-success text-white text-center">
  <h5>CREATE AUTHENTICATION DETAILS...</h5>
   </div>

<div class="card-body">
Feel in the details you'll always use to access your <i class='btn btn-sm btn-success'>Venom</i> admin panel
  <div class="table-responsive">

<?php
echo form_open('admin/create');
?>
<p>Email </td><td><input type='email' name='admin_email' value="<?php echo set_value('admin_email'); ?>">
</p>

<?php echo form_error('admin_email'); ?>
<p>Password<input type='text' name='admin_password' value="<?php echo set_value('admin_password'); ?>">
</p>
<?php echo form_error('admin_password'); ?>
<p>Confirm Password</td><td><input type='text' name='admin_password_conf' value="<?php echo set_value('admin_password_conf'); ?>">
</p>
<?php echo form_error('admin_password_conf'); ?>
	
</div>
</div>
<div class='text-right'><button class='badge badge-sm badge-warning btn-primary text-secondary'>Current Version: 1.0 Penza</button></div> 
<div class="card-footer text-left">Please keep this details safe and personal for security reasons <input type='submit' value="CREATE!" class='btn btn-success text-white'></div>
          </div>