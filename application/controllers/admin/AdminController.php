<?php
class AdminController extends CI_Controller {
	
public function __construct(){
parent::__construct();

/*
This construct method basically pulls themes from the themes folder and loads them from their loader files then stores them to the DB through the help of the ven_register_theme() helper.
*/

//map the themes directory to pull up newly added themes
$map = directory_map(APPPATH.'views/themes');

/*
Since the helper function above returns a multi-dimensional array with folder names as keys, we need to get only the array keys which are actually the theme folder names.
*/
$themes = array_keys($map);

//loop through to automatically add themes to the venom themes table.

foreach($themes as $key => $value) :

// Note that $key will return a numerical index while $value will return the theme folder name appended with a forward slash. E.g. my-theme/


/* does loader file exist in the specified theme folder name. If yes,then autoload it so that theme data can be stored in venom_themes */
if (file_exists(APPPATH.'views/themes/'.$value.'loader.php')) :

$this->load->view('themes/'.$value.'loader');

else :

//loader file does not exist. Return
echo '';

endif;

endforeach;

}


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