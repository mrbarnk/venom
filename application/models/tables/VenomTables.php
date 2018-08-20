<?php

class VenomTables extends CI_Model
{

public function generate() {
	
$this->load->dbforge();

/*
::::::::::::::::::::::::::::::::
::::::: IMPORTANT NOTICE :::::::
::::::::::::::::::::::::::::::::

Add the name of the table you intend creating before declaring it parameters below. This is to minimize chances of duplicate tables names. Also, all table names should be prefixed with the word "venom_"

The following tables are currently available.

1.  venom_administrator
2.  venom_settings
3.  
4.
5.
6.
7.


*/

/*** This is a table declaration that will store all information pertaining to the administrator(s) such as email, password, display name, etc.
***/

$admin_table_fields = array 
(
 'admin_id'
     => array
     (
 'type' => 'INT',
 'constraint' => 5,
 'auto_increment' => TRUE,
 'unsigned' => TRUE
     ),

// preferred admin site wide display name
 'display_name'
     => array
  (
  'type' => 'VARCHAR',
  'constraint' => '200',
  'default' => 'Admin',
  'unique' => TRUE
   ),

// administrator password
  'admin_password'
     => array
  (
  'type' => 'VARCHAR',
  'constraint' => '200',
  'unique' => TRUE
   ),

// administrator email
  'admin_email'
     => array
     (
     'type' => 'VARCHAR',
     'constraint' => '200',
     'unique' => TRUE
     ),

// administrator photo 
  'photo'
     => array
     (
     'type' => 'VARCHAR',
     'constraint' => '200',
     'default' => '/images/default.png',
     ),
     
);

		
$this->dbforge->add_field($admin_table_fields);

$this->dbforge->add_key('admin_id', TRUE);

$query =  $this->dbforge->create_table('venom_administrator', TRUE);


//fields for the settings table
$settings_fields = array 
(
 'settings_id'
     => array
     (
 'type' => 'INT',
 'constraint' => 5,
 'auto_increment' => TRUE,
 'unsigned' => TRUE
     ),

// the text title of the frontend 
 'site_name'
     => array
  (
  'type' => 'VARCHAR',
  'constraint' => '200',
  'default' => 'My Venom Site',
  'unique' => TRUE
   ),

// some text to describe the website.
   'site_description'
     => array
  (
  'type' => 'TEXT'
   ),

// frontend header image 
  'site_header_logo'
     => array
  (
  'type' => 'VARCHAR',
  'constraint' => '200',
  'default' => 'N/A',
  'unique' => TRUE
   ),

// number of articles to show on the front page
  'home_num_items'
     => array
  (
  'type' => 'INT',
  'constraint' => '200',
  'default' => '10',
   ),

// whether to show warning text to user when they want to publish articles
  'show_warning_text'
     => array
  (
  'type' => 'VARCHAR',
  'constraint' => '100',
  'default' => 'yes'
   ),

// whether to show the site description below the site header
  'show_site_description'
     => array
  (
  'type' => 'VARCHAR',
  'constraint' => '100',
  'default' => 'yes'
   ),

// whether to show the header as text or as an image
  'header_display_type'
     => array
  (
  'type' => 'VARCHAR',
  'constraint' => '100',
  'default' => 'text'
   ),
   
// should users verify their emails when they've signup
  'verify_emails'
     => array
  (
  'type' => 'VARCHAR',
  'constraint' => '100',
  'default' => 'no'
   ),

// show users have the priviledge of deleting their articles
  'users_can_delete_ads'
     => array
  (
  'type' => 'VARCHAR',
  'constraint' => '100',
  'default' => 'no'
   ),

// should users be allowed to upload profile pictures 
  'allow_profile_pics'
     => array
  (
  'type' => 'VARCHAR',
  'constraint' => '100',
  'default' => 'no'
   ),

// should guests be allowed to publish articles
  'allow_guest_posts'
     => array
  (
  'type' => 'VARCHAR',
  'constraint' => '100',
  'default' => 'no'
   ),
  
//facebook page link
  'facebook'
    => array
    (
     'type' => 'VARCHAR',
     'constraint' => '255',
     'default' => 'N/A'
     ),

//twitter handle link
   'twitter'
     => array
     (
      'type' => 'VARCHAR',
      'constraint' => '255',
      'default' => 'N/A'
     ),

//youtube channel link
   'youtube'
     => array
     (
      'type' => 'VARCHAR',
      'constraint' => '255',
      'default' => 'N/A'
     ),

//instagram account link
   'instagram'
     => array
     (
      'type' => 'VARCHAR',
      'constraint' => '255',
      'default' => 'N/A'
     )

);

$this->dbforge->add_field($settings_fields);

$this->dbforge->add_key('settings_id', TRUE);

$query .=  $this->dbforge->create_table('venom_settings', TRUE);

return $query;
	}

/*

:::::::::::::::::::::::::::::::::
:: INSERT DEFAULT TABLE VALUES ::
:::::::::::::::::::::::::::::::::

@@@ Since there has to be some initial default settings, we need to insert them when the script installs successfully. These settings can later be modified by the admin.

@@@ IF some default values such as the dummy email and password are seen when the admin logs in, then the installation process went wrongly.

*/

public function insert_default_values()
{

$default_admin_data = array
(

/* PASSWORD and EMAIL values are just placeholders. Under normal circumstances, they should be updated during installation */

// preferred admin site wide display name
'display_name' => 'Admin',

// administrator password
'admin_password' => 'XYZ114551xyz',

// administrator email
'admin_email' => 'admin@example.com',

// administrator photo 
'photo' => '/images/default.png'

);

/*** ONLY insert default admin data if it has not been previously inserted. This is necessary in order to avoid run time error in case the administrator reruns the script installer ***/

// query administrator table to see if any values are present. If table contains values, it means script was previously installed
$result = $this->general_model->select_db_data('venom_administrator');

(count($result) <= 0) ?
$this->general_model->replace_db_data('venom_administrator', $default_admin_data) : "";


/* If some of these default setting values are seen when admin logs in, then the installation process went wrongly */

$default_settings = array
(
// the text title of the frontend
   'site_name' => "My Venom Site",

// some text to describe the website.
   'site_description' => "This is my super Venom website",

// frontend header image 
  'site_header_logo' => 'N/A',

// number of articles to show on the front page
  'home_num_items' => '10',
   
// whether to show warning text to user when they want to publish articles
  'show_warning_text' => 'yes',

// whether to show the site description below the site header
'show_site_description' => 'yes',

// whether to show the header as text or as an image
'header_display_type' => 'text',
   
// should users verify their emails when theyve signup

'verify_emails' => 'no',

// show users have the priviledge of deleting their articles
'users_can_delete_ads' => 'no',

// should users be allowed to upload profile pictures 
'allow_profile_pics' => 'no',

// should guests be allowed to publish articles
'allow_guest_posts' => 'no'
 
);

/* ONLY insert default settings if they have not been previously inserted. This is necessary in order to avoid run time error in case the administrator reruns the script installer */

/*
query settings table to see if any values are present. If table contains values, it means script was previously installed
*/ 

$result = $this->general_model->select_db_data('venom_settings');

(count($result) <= 0) ?
$this->general_model->replace_db_data('venom_settings', $default_settings) : "";

}


/* After script installation where admin provides email and password, we need to update the administrator table with the newly supplied values */

public function update_admin_auth($data) {

/* @param is the new admin authentication details that were supplied after installation completed */

$this->general_model->update_db_data('venom_administrator', $data);

}
	
}
?>