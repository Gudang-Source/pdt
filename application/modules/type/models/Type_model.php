<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Type_model extends CI_Model {

	public function get($arr=null, $limit=null, $offset=null){
		return $this->db->get_where('type_letter', $arr, $limit, $offset);
	}

	public function insert($data){
		$this->db->insert('type_letter', $data);
		$id = $this->db->insert_id();
		$status = $this->db->affected_rows();
		return ($status == 0) ? FALSE : $id; 
	}

	public function update($data, $condition){
		return $this->db->update('type_letter', $data, $condition);
	}

	

}

/* End of file Type_model.php */
/* Location: ./application/modules/grade/models/Type_model.php */