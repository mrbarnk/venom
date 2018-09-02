<?php
echo isset($notification) ? "<div class='w3-green w3-animate-right w3-center w3-padding'>".'The settings were updated successfully. Changes made may, however take a while to reflect'."</div>" : '';
?>

<?php
/* Date display format */

$date_style = array
        (
        'D jS M, Y' => date('D jS M, Y'),
        'Y - m - d' => date('Y - m - d'),
        'd - M - Y' => date('d - M - Y'),
        'd - m - Y' => date('d - m - Y'),
        'dS - m - Y' => date('dS - m - Y'),
        'D d M, Y' => date('D d M, Y')
        );

?>

<!-- SITE SETTINGS -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-gear"></i><h3>Modify Settings</h3></div>
            <div class="card-body">
	
<?php
echo form_open_multipart('settings/modify');
?>

<h4 class='w3-blue'>Admin Details</h4>
<hr>

<label for='displayName'>Display Name</label>
<p>
<input type='text' id='displayName' name='admin_public_name' value="<?php echo $settings['admin_name'];?>" class='w3-input' class='form-control'>
</p>

<?php echo form_error('admin_public_name'); ?>

<label for='adminEmail'>Email Address</label>
<p>
<input type='email' id='adminEmail' name='admin_email' value="<?php echo  $settings['admin_email'];; ?>" class='w3-input'>
</p>

<?php echo form_error('admin_email'); ?>


<h3 class='w3-blue'>Site Settings</h3>
<hr>
<label>Site Name</label>
<p>
<input type='text' name='site_name' value="<?php echo  $settings['site_name']; ?>" class='w3-input'>
</p>

<?php echo form_error('site_name'); ?>

<label>Currency symbol</label>
<p>
<input type='text' name='currency_symbol' value="<?php echo $settings['currency_symbol']; ?>" class='w3-input'>
</p>

<?php echo form_error('currency_symbol'); ?>


<label> Brief Site Description</label>
<p>
<textarea name='site_description' cols='32' rows='4' class='w3-input'>
<?php echo preg_replace('{{MY_SITE_NAME}}', $settings['site_name'], $settings['site_description']); ?>
</textarea>
</p>

<?php echo form_error('site_description'); ?>

<label>Logo or Header Image</label>
<p>
<input type='file' name='userfile' class='w3-input'>
</p>

<?php echo isset($upload_error) ? $upload_error : ''; ?>

<label>Site-wide Warning Text</label> 
<p>
<textarea name='site_warning_text' cols='32' rows='4' class='w3-input'>
<?php echo preg_replace('{{MY_SITE_NAME}}', $settings['site_name'], $settings['site_warning_text']); ?>
</textarea>
</p>

<?php echo form_error('site_warning_text'); ?>


<h3 class='w3-blue'>Site Display Settings</h3>
<hr>

<label>
Items On Home Page</label>
<p>
<input type='text' name='home_num_items' value="<?php echo $settings['home_num_items']; ?>" class='w3-input'>
</p>

<?php echo form_error('home_num_items'); ?>

<label>
Items On Category Page</label>
<p>
<input type='text' name='category_num_items' value="<?php echo $settings['category_num_items']; ?>" class='w3-input'>
</p>

<?php echo form_error('category_num_items'); ?>

<p>
Date Display Format

<?php
echo form_dropdown('date_format', $date_style, "{$settings['date_format']}");
?>
</p>

<?php echo form_error('date_format'); ?>


<label>Special Items Label
</label>
<p>
<input type='text' name='premium_label' value="<?php echo $settings['premium_label']; ?>" class='w3-input'>
</p>

<?php echo form_error('premium_label'); ?>

<label>
Home Page Columns</label>
<p>
<input type='text' name='home_num_grids' value="<?php echo $settings['home_num_grids']; ?>" class='w3-input'>
</p>

<?php echo form_error('home_num_grids'); ?>

<label>
Category Page Columns</label>
<p>
<input type='text' name='category_num_grids' value="<?php echo $settings['category_num_grids']; ?>" class='w3-input'>
</p>

<?php echo form_error('category_num_grids'); ?>

<label>
Do Not Show Category Icons
</label>
<input type='checkbox' name='show_category_icons' value='no' <?php echo ($settings['show_category_icons'] == 'no') ? set_checkbox('show_category_icons', 'no', TRUE) : '' ?> />


<label>
Show Site Description
</label>
<input type='checkbox' name='show_site_description' value='yes' <?php echo ($settings['show_site_description'] == 'yes') ? set_checkbox('show_site_description', 'yes', TRUE) : '' ?> />

<label>
Allow Comments</label>
<input type='checkbox' name='allow_comments' value='yes' <?php echo ($settings['allow_comments'] == 'yes') ? set_checkbox('allow_comments', 'yes', TRUE) : '' ?> />

<label>
Remove Warning Text</label>
<input type='checkbox' name='show_warning_text' value='no' <?php echo ($settings['show_warning_text'] == 'no') ? set_checkbox('show_warning_text', 'no', TRUE) : '' ?> />

<label>
Warning Text Location
</label>
<p>
<input type='text' name='warning_location' value="<?php echo $settings['warning_text_location']; ?>" class='w3-input'>
</p>

<p class='w3-gray'>
<em>Possible Options: top, bottom, both</em>
</p>

<label>
Don't Show Captcher To Guests</label>
<p>
<input type='checkbox' name='show_captcher' value='no' <?php echo ($settings['show_captcher'] == 'no') ? set_checkbox('show_captcher', 'no', TRUE) : '' ?> />
</p>

<p>
Use Image As Header
<input type='checkbox' name='header_display_type' value='image' <?php echo ($settings['header_display_type'] == 'image') ? set_checkbox('header_display_type', 'image', TRUE) : '' ?> />
</p>


<h3 class='w3-blue'>User Settings</h3>
<hr>

<label>
Always Verify New User Emails</label>
<input type='checkbox' name='verify_emails' value='yes' <?php echo ($settings['verify_emails'] == 'yes') ? set_checkbox('verify_emails', 'yes', TRUE) : '' ?> >

<label>
Users May Delete Their Ads</label>
<input type='checkbox' name='users_can_delete_ads' value='yes' <?php echo ($settings['users_can_delete_ads'] == 'yes') ? set_checkbox('users_can_delete_ads', 'yes', TRUE) : '' ?> />

<label>
Show A Publisher's Contact Form</label>
<input type='checkbox' name='show_contact_form' value='yes' <?php echo ($settings['show_contact_form'] == 'yes') ? set_checkbox('show_contact_form', 'yes', TRUE) : '' ?> />

<label>
Allow Profile Pictures</label>
<input type='checkbox' name='allow_profile_pics' value='yes' <?php echo ($settings['allow_profile_pics'] == 'yes') ? set_checkbox('allow_profile_pics', 'yes', TRUE) : '' ?> />

<label>
Allow Guest Publication</label>
<input type='checkbox' name='allow_guest_posts' value='yes' <?php echo ($settings['allow_guest_posts'] == 'yes') ? set_checkbox('allow_guest_posts', 'yes', TRUE) : '' ?> />

<label>
Enable Automatic Registration
</label>
<input type='checkbox' name='auto_signup' value='yes' <?php echo ($settings['auto_signup'] == 'yes') ? set_checkbox('auto_signup', 'yes', TRUE) : '' ?> />

<p>
<input type='submit' name='Submit' value='Save Settings'>
</p>

</form>

</div>

<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>

</div>
<!-- / close card -->