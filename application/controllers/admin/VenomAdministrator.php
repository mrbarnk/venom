<?php
class VenomAdministrator extends CI_Controller {


//admin index page
public function index(){

$data['title'] = 'Venom Administrator - Welcome';

$this->load->view('admin/head', $data);

$this->load->view('admin/header');

$this->load->view('admin/index');

$this->load->view('admin/footer');

}

/***

::::::::::::::::::::::::::::::::::
:::::: CREATE OTHER METHODS ::::::
::::::::::::::::::::::::::::::::::

***/

}
?>