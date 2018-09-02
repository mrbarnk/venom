<div class="panel">
<div class="panel-heading header-green">
                            <h5>ADMINISTRATOR LOGIN!</h5>
                        </div>
                   <div class="panel-body">

<?php
echo form_open('admin/login');
?>

<?php echo isset($invalid_credentials) ? "<p class='alert alert-warning'>".$invalid_credentials."</p>" : '' ?>

<label>
Email </label><input type='email' name='admin_email' value="<?php echo set_value('admin_email'); ?>" class='w3-input w3-border'>

<?php echo form_error('admin_email');?>

<label>
Password </label>
<input type='password' name='admin_password' value="<?php echo set_value('admin_password'); ?>" class='w3-input w3-border'>

<?php echo form_error('admin_password');?>


</div>
<div class='text-right'><button class='btn btn-sm btn-danger'>Current Version: 1.0 Penza</button></div> 
<div class="panel-footer text-left">Fill in your authentication details and hit login... <input type='submit' value='LOGIN!' class='btn btn-sm btn-success'></div>

</form>
          </div>