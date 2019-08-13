<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

	
	public function __construct(){

		parent::__construct();
		
		$this->load->database();


	}

	public function get_user_data($user_login){

		$this->db
		-> select("users_id, password_hash, user_full_name, user_email, user_color")
		->from("tbl_users")
		->where("user_login", $user_login);

		$result = $this->db->get();

		if($result->num_rows() > 0){
			return $result->row();
		}else{
			return NULL;
		}
}
	
	public function get_data($id, $select = NULL) {
		if (!empty($select)) {
			$this->db->select($select);
		}
		$this->db->from("tbl_users");
		$this->db->where("users_id", $id);
		return $this->db->get();
	}
	public function insert($data){
		
			$this->db->insert("tbl_users", $data);

		}
		
	
	public function update($id, $data) {
		$this->db->where("users_id", $id);
		$this->db->update("tbl_users", $data);

	}
	public function delete($id) {
		$this->db->where("users_id", $id);
		$this->db->delete("tbl_users");
	}

	public function is_duplicated($field, $value, $id = NULL) {
		if (!empty($id)) {
			$this->db->where("users_id <>", $id);
		}
		$this->db->from("tbl_users");
		$this->db->where($field, $value);
		return $this->db->get()->num_rows() > 0;
	}

   var $column_search = array("user_login", "user_full_name","user_email"); 
 	var $column_order = array("user_login", "user_full_name","user_email"); 

 	private function _get_datable(){
 		$search = NULL;
 		$search = NULL;
		if ($this->input->post("search")) {
			$search = $this->input->post("search")["value"];
		}

 		$order_column = NULL;
		$order_dir = NULL;
		$order = $this->input->post("order");
		if (isset($order)) {
			$order_column = $order[0]["column"];
			$order_dir = $order[0]["dir"];
		}

 		$this->db->from("tbl_users");
		if (isset($search)) {
			$first = TRUE;
			foreach ($this->column_search as $field) {
				if ($first) {
					$this->db->group_start();
					$this->db->like($field, $search);
					$first = FALSE;
				} else {
					$this->db->or_like($field, $search);
				}
			}
			if (!$first) {
				$this->db->group_end();
			}
		}

		if (isset($order)) {
			$this->db->order_by($this->column_order[$order_column], $order_dir);
		}
	}

 	public function get_datable(){
 		$length = $this->input->post("length");
 		$start= $this->input->post("start");
 		$this->_get_datable();
 		if(isset($length) && $length != -1){
 			$this->db->limit($length, $start);

 		}
 		return $this->db->get()->result();
 	}

 	public function records_filtered(){
 		$this->_get_datable();
 		return $this->db->get()->num_rows();
 	}

 		public function records_total(){
 		$this->db->from("tbl_users");
 		return $this->db->count_all_results(); //função do codeignaiter
 	}

}


