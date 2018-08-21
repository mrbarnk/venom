<?php

class GeneralModel extends CI_Model {

public function __construct(){
	
parent::__construct();

$this->load->database();

}


//this is a general method that counts total table records
public function count_table_records($table_name){

return $this->db->count_all($table_name);
}

//DB INSERT OPERATIONS

## this is a general method for ALL data insert operations ##
public function insert_db_data( $table_name, $data ){
	
/* @param $table_name = name of table where insert operation should be carried out. @param $data = the information that should be inserted */

$this->db->insert($table_name, $data);

}


//DB REPLACE OPERATIONS

## this is a general method for ALL data UPDATE operations ##
public function replace_db_data( $table_name, $data ){
	
/* @param $table_name = name of table where UPDATE operation should be carried out. @param $data = the information that should be inserted */

$this->db->replace($table_name, $data);

}


//DB UPDATE OPERATIONS

## this is a general method for ALL data UPDATE operations ##
public function update_db_data( $table_name, $data ){
	
/* @param $table_name = name of table where update operation should be carried out. @param $data = the information that should be updated */

$this->db->update($table_name, $data);

}


## this is a general method for ALL SPECIFIC data UPDATE operations ##
public function update_db_data_where( $table_name, $data, $condition){
	
/* @param $table_name = name of table where update operation should be carried out. @param $data = the SPECIFIC information that should be updated. @condition = the condition for updating*/

$this->db->where($condition);
$this->db->update($table_name, $data);

}

## this is a general method for ALL data DELETION operations ##
public function delete_db_data( $table_name, $where ){

$this->db->where($where);
$this->db->delete($table_name);

}


//DB SELECT OPERATIONS

## this is a general method for ALL data selection operations and pagination ##
public function select_db_data_paginate($table_name, $array_attributes){

//pagination configuration
//configuration details for pagination
$config['base_url'] = base_url().$array_attributes['base_url'];

$config['total_rows'] = $this->db->count_all($table_name);

$config['per_page'] = $array_attributes['per_page'];

$config['display_pages'] = $array_attributes['display_pages'];

//PAGINATION STYLING
$config['prev_link'] = $array_attributes['prev_link'];

$config['next_link'] = $array_attributes['next_link'];

$config['attributes'] = $array_attributes['attributes'];

//initialize pagination
$this->pagination->initialize($config);


//where to start fetching DB records
$start_from =  ($this->uri->segment($array_attributes['uri_segment'])) ? $this->uri->segment($array_attributes['uri_segment']) : 0;

//fetch the records
$query = $this->db->get($table_name, $config['per_page'], $start_from);

//$query = $this->db->db_select( $table_name);

$result = $query->result_array();

return $result;

}


## this is a general method for ALL data selection operations without pagination##
public function select_db_data($table_name){
	
$query = $this->db->get($table_name);

$result = $query->result_array();

return $result;

}



## this is a general method for ALL row data selection operations ##
public function select_db_row($table_name){
	
$query = $this->db->get($table_name);

$result = $query->row_array();

return $result;

}


## this is a general method for BASIC SPECIFIC data selection operations ##

public function select_db_data_where($table_name, $where){

$this->db->where($where);

$query = $this->db->get($table_name);

$result = $query->result_array();

return $result;

}


## this is a general method for BASIC SPECIFIC ROW data selection operations ##

public function select_db_row_where($table_name, $where){

$this->db->where($where);

$query = $this->db->get($table_name);

$result = $query->row_array();

return $result;

}


}

?>