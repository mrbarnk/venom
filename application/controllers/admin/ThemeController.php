<?php
class ThemeController extends CI_Controller {


//themes display page
public function manage_themes(){

$data['title'] = 'Venom Administrator - Manage Themes';

$data['installed_themes'] = $this->general_model->ven_select_data('venom_themes');

$this->load->view('admin/head', $data);

$this->load->view('admin/header');

$this->load->view('admin/themes/manage-themes', $data);

$this->load->view('admin/footer');

}


//theme activation page
public function activate_theme($theme_name){

$data['title'] = 'Venom Administrator - Activate Theme';

$this->load->view('admin/head', $data);

$this->load->view('admin/header');

$this->load->view('admin/activate_theme');

$this->load->view('admin/footer');

}


//theme deactivation page
public function deactivate_theme($theme_name){

$data['title'] = 'Venom Administrator - Deactivate Theme';

$this->load->view('admin/head', $data);

$this->load->view('admin/header');

$this->load->view('admin/deactivate_theme');

$this->load->view('admin/footer');

}


//theme activation page
public function delete_theme($theme_name){

$data['title'] = 'Venom Administrator - Delete Theme';

$this->load->view('admin/head', $data);

$this->load->view('admin/header');

$this->load->view('admin/activate_theme');

$this->load->view('admin/footer');

}
/***

::::::::::::::::::::::::::::::::::
:::::: CREATE OTHER METHODS ::::::
::::::::::::::::::::::::::::::::::

***/

}
?>