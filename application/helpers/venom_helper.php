<?php

/*
:::::::::::::::::::::::::::::::::
:::::: CREATE HELPERS HERE ::::::
:::::::::::::::::::::::::::::::::
*/


function ven_page_title($page_name = '')
{

/*
* @author => Etom Usang (Laive)
* @param $page_name is an optional page title name that should appear on the browser bar.
*

@Description :

Use this helper function to easily generate page titles within your controllers. Alternatively add a page title and Venom will prepend that page title with the name of the site. E.g. "SiteName - Register" or "SiteName - Login"
*/

//instantiate core CodeIgniter class in order to use core methods

$CI =&get_instance();

//query table settings to get the name of the site that should be prepended to $page_name

if ($CI->db->table_exists('venom_settings')) :

$query = $CI->db->get('venom_settings');

//fetch settings data as an array
$site_settings = $query->result_array();

//return settings data for use in the views
return $site_settings[0]['site_name'].' - '.$page_name;

else :

return $page_name;

endif;
	
}


function ven_load_theme_asset($file_path = '')
{

/*
* @author => Etom Usang (Laive)
* @param $file_path is an optional path where Venom should load the theme's asset file .
*

@Description :

Use this helper function to easily include JS files, CSS files and other files that a theme depends on. This will be used within the head section of themes. Example: 

<link href="<?php ven_load_theme_asset('css/stye.css'); ?>" rel="stylesheet" >

<script src="<?php ven_load_theme_asset('js/script.js'); ?>"></script>
*/

echo base_url().'/'.APPPATH.'views/themes/assets'.$file_path;

}


function ven_create_breadcrumbs($array)
{
	
/**
* @author => Etom Usang (Laive)
* @param $array is an array of key value pairs. Keys are links while values are anchor text

Description :

The UI of this helper is rendered using BOOTSTRAP framework. Use this helper to easily generate breadcrumbs within your views

**/

foreach($array as $key => $value) :

$breadcrumbs[] = ($value != end($array)) ? "<li class='breadcrumb-item'>".anchor($key, $value)."</li>" : "<li class='breadcrumb-item active'>$value</li>";

endforeach;

return implode($breadcrumbs);

}

/**
:::::::::::::::::::::::::::::::::
::::::::: Example Usage :::::::::
:::::::::::::::::::::::::::::::::
$array = array(

'anchorlink1' => 'Anchor Text1',

'anchorlink2' => 'Anchor Text2',

'anchorlink3' => 'Anchor Text3',

'anchorlink4' => 'Anchor Text4',

'anchorlink5' => 'Anchor Text5',
);

echo ven_create_breadcrumbs($array);

**/

function ven_active_theme()
{


/**
* @author => Etom Usang (Laive)
* @param none

Description :

Use this method to get the currently activated theme so as to load views based on that theme's base files. E.g. 

$this->load->view(ven_active_theme().'/page_name');

**/

//instantiate core CodeIgniter class in order to use core methods

$CI =&get_instance();

//query table themes to get the active theme that admin activated

if ($CI->db->table_exists('venom_themes')) :

$query = $CI->db->get_where('venom_themes',array('theme_status', 'active'));

//fetch theme data as an array
$active_theme = $query->result_array();

//return theme data for use in the views
return $active_theme[0]['theme_name'];

else :

return 'venom-default-2018';

endif;
	
}


function ven_site_name($site_name = 'Venom')
{
	
/**
* @author => Etom Usang (Laive)
* @param $site_name is the alternative site name that should be used in case theme developers want to by pass original site name.

Description :

Use this method to get the site name of the currently installed Venom Site. 

*/

//instantiate core CodeIgniter class in order to use core methods

$CI =&get_instance();

//query table settings to get the name of the site

if ($CI->db->table_exists('venom_settings')) :

$query = $CI->db->get('venom_settings');

//fetch settings data as an array
$site_settings = $query->result_array();

//return settings data for use in the views
return $site_settings[0]['site_name'];

else :

return $site_name;

endif;
	
}


function ven_register_theme($array)
{
	
/**
* @author => Etom Usang (Laive)
* @param $array is an array containing details about the newly created theme such as name, author, description, image, etc.

Description :

Use this method to register themes that can be later activated within the admin panel. Note that this helper function does not activate themes, it ONLY makes themes available in the admin for activation. 

*/

/*instantiate core CodeIgniter class in order to use core methods*/

$CI =&get_instance();

//query table themes to get the name of the site

if ($CI->db->table_exists('venom_themes')) :

//prepare theme data from the provided array. This will be used to perform a data insert operation

$new_theme_data = array 
(

'theme_name' => url_title($array['name']),

'theme_author' => $array['author'],

/*'theme_website' => (!isset ($array['website']) || $array['website'] == '') ? 'N/A' : $array['website'],*/

'theme_description' => (!isset ($array['description']) || $array['description'] == '') ? 'N/A' : $array['description'],

'theme_version' => (!isset($array['version']) || $array['version'] == '') ? 'N/A' : $array['version'],

);


//query to see if specified theme name already exists in the themes table to avoid duplicate entries.

$query = $CI->db->get_where('venom_themes',array('theme_name' => $array['name']));

//get result as array to enable counting

$result = $query->result_array();

//if theme name already exists, then avoid inserting again

if (count($result) <= 0) :

$CI->db->insert('venom_themes', $new_theme_data);

else :

echo '';

endif; // if theme already exists

else :

return;

endif; // if table exists
	
}


function ven_admin_message($message = 'Changes Saved Successfully!')
{

/*
* @author => Etom Usang (Laive)
* @param $message is an optional notification message that will appear on the admin interface when any changes are effected.
*

@Description :

Use this helper function to easily generate notification messages within your admin controllers. E.g. "The Blog Post Was Created Successfully" or "Site Settings Were Modified Successfully!"
*/

return isset($message) ? "<div class='row'><div class='col-md-12 col-sm-12 col-xs-12'>".$message."</div></div>" : '';

}


function ven_load_assets_head()
{
	
/*
* @author => Etom Usang (Laive)
* @param $message is an optional notification message that will appear on the admin interface when any changes are effected.
*

@Description :

Use this helper function to easily generate notification messages within your admin controllers. E.g. "The Blog Post Was Created Successfully" or "Site Settings Were Modified Successfully!"
*/

include(FCPATH.'ven_assets/ven_assets_head.php');
}


function ven_load_assets_footer()
{
	
include(FCPATH.'ven_assets/ven_assets_footer.php');
}



?>