<?php

class VenomAdminModel extends CI_Model {
	
//administrator login
public function admin_is_valid($email, $password){

/*check the existence of the submitted values in settings table */
$where = $this->db->where(array('admin_email' => $email, 'admin_password' => sha1($password)));

$query = $this->db->get('venom_administrator');

if ($query->num_rows() > 0) :

return $query->row_array();

else :

return FALSE;

endif;
}

## CREATE USER TARGETED MODEL METHODS HERE

}

?>