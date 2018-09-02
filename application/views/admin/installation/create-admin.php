<div class="panel">
<div class="panel-heading header-green">
                            <h5>CREATE ADMINISTRATOR DETAILS!</h5>
                        </div>
                   <div class="panel-body">

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

<div class="panel-footer text-left">Fill in the fields and click on proceed. <input type='submit' name='submit' value='PROCEED' class='btn btn-success'></div>

</form>
</div>
