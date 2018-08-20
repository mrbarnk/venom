<?php

class VenomAuth extends CI_Controller {


/* Method for creating administrator credentials */

public function create_admin(){

// Page title on browser
$data['title'] = 'Create Administrator Credentials';

/* create some validation rules */

$rules = array
(

array
(
'field' => 'admin_email',
'label' => 'Administrator Email',
'rules' => 'trim|required|valid_email',
'errors' => array('required' => 'Enter a valid e-Mail address that will be used for authentication', 'valid_email' => 'The format of the e-Mail address is invalid!')
),

array
(
'field' => 'admin_password',
'label' => 'Administrator Password',
'rules' => 'trim|required|min_length[12]',
'errors' => array('required' => 'Provide a STRONG password that will be used for authentication', 'min_length' => 'The password you provided is TOO weak! Use any combination of at least 12 characters that you can easily remember.')
),

array
(
'field' => 'admin_password_conf',
'label' => 'Administrator Password Confirm',
'rules' => 'trim|required|matches[admin_password]',
'errors' => array('required' => 'Please TYPE your password again', 'matches' => 'The passwords you entered do not match.')
)

);

// initialize validation rules
$this->form_validation->set_rules($rules);

if ($this->form_validation->run() == FALSE ) :

$this->load->view('admin/head', $data);

$this->load->view('installation/header');

$this->load->view('admin/create-admin', $data);

$this->load->view('installation/footer');

else :

//Admin provided the required data, so prepare data to be inserted into the venom_settings DB Table

$data = array
(

'admin_email' => $this->input->post('admin_email'),

'admin_password' => sha1($this->input->post('admin_password'))

);

//insert now
$this->tables_model->update_admin_auth($data);

/* This page assures the person installing the script that everything went well and points them to the login link */

$this->load->view('admin/head', $data);

$this->load->view('installation/header');

$this->load->view('installation/congratulations');

$this->load->view('installation/footer');

endif;
}

/* Method for logging into the Venom administrator panel */

public function admin_login()
{

$data['title'] = 'Administrator Login';
	
// login validation rules

$rules = array
(

array
(
'field' => 'admin_email',
'label' => 'Administrator Email',
'rules' => 'trim|required|valid_email',
'errors' => array('required' => 'Enter your e-Mail address.', 'valid_email' => 'The format of the e-Mail address is invalid!')
),

array
(
'field' => 'admin_password',
'label' => 'Administrator Password',
'rules' => 'trim|required',
'errors' => array('required' => 'Provide your password')
)
);

/* initialize validation rules */
$this->form_validation->set_rules($rules);

if ( $this->form_validation->run() == FALSE ) :

$this->load->view('admin/head', $data);

$this->load->view('installation/header');

$this->load->view('admin/admin-login');

$this->load->view('installation/footer');

else :

//Check if submitted credentials exist in database
$admin_email = $this->input->post('admin_email');

$admin_password = $this->input->post('admin_password');

if (!$this->admin_model->admin_is_valid($admin_email, $admin_password)) :

$data['invalid_credentials'] = 'Invalid Login Email Address Or Password! Try Again...';

$this->load->view('admin/head', $data);

$this->load->view('installation/header');

$this->load->view('admin/admin-login', $data);

$this->load->view('installation/footer');

else :

/**

:::::::::::::::::::::::::::::::::
:::::::: IMPORTANT NOTICE :::::::
:::::::::::::::::::::::::::::::::

@@@ This admin login feature is NOT complete. It should be completed for the following security and ethical reasons :

@@@ Fetch default setting values from the venom_settings table along with admin data and store them in a SESSION for Site-Wide usage.

@@@ The format below was from my previous project. Here, it needs to be modified to suit our current purpose.

$settings = $this->VenomGeneralModel->select_db_row('venom_settings');

//prepare the admin credentials
$admin_data = array
(
'admin_email' => $settings['admin_email'],

'admin_name' => $settings['admin_name'],

'header_type' => $settings['header_type'],

'header_image' => $settings['header_image'],

'site_name' => $settings['portal_name'],

'is_admin' => TRUE,

'is_logged_in' => TRUE

);

$this->session->set_userdata($admin_data);

**/

//user passed the login test, so direct them to the Admin index screen

redirect('venom/index', 'redirect');

endif;

endif;
}

/***
::::::: TO BE IMPLEMENTED :::::::
:::::::::::::::::::::::::::::::::
public function admin_logout(){

	
}

***/

}
?>