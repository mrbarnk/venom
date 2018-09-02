<?php

class InstallController extends CI_Controller{

public function __construct()
	{
		parent::__construct();

$this->load->database();
 
$this->load->dbutil();
 
}
	
public function run()
{

// page title on browser
$data['title'] = 'Venom Installation Wizard';

/* check if database name was provided in the config.php file*/

if ( $this->db->database == NULL ) :

$this->load->view('admin/head', $data);
 
$this->load->view('admin/installation/header');
 
$this->load->view('admin/installation/no-db-name');

$this->load->view('admin/installation/footer');
 
else :

// Attempt to generate the core venom tables
$generate_tables = $this->tables_model->generate();

/***

::::::::::::::::::::::::::::::::::
:::::::: IMPORTANT NOTICE ::::::::
::::::::::::::::::::::::::::::::::

@@@ This array is a check to see if generated tables are truly the ones required by Script Core. 

@@@ Ensure to add any table you create in the array to have it included in the tabulated list of generated tables during installation. This is important but not neccessary

***/

$tables['required_tables'] = array (

$this->db->dbprefix('venom_administrator'),

$this->db->dbprefix('venom_settings'),

$this->db->dbprefix('venom_themes'),

/*** your tables come here

$this->db->dbprefix('venom_your_table_name')

***/

);

/** get the generated tables ready to be passed to the installer-success view page **/

$tables['all_tables'] = ( $generate_tables == TRUE ) ? $this->db->list_tables() : '';

$this->load->view('admin/head', $data);
 
$this->load->view('admin/installation/header');
 
$this->load->view('admin/installation/installer-success', $tables);

$this->load->view('admin/installation/footer');
 
/* invoke the default portal settings and insert them into the  venom_settings table */

$this->tables_model->insert_default_values();

endif;
}

}

?>