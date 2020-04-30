<?php 
/**
 * 
 */
class User_model extends CI_Model
{
	
	function __construct()
	{
		$this->load->database();
	}

	public function login($username, $password){
		
		$this->db->where('username', $username);
		$this->db->where('password', $password);

		$result = $this->db->get('admin');

		if($result->num_rows() == 1){
			return $result->row(0);
		} else {
			return false;
		}
	}

	function detail_user()
	{
		$id = $this->session->userdata('user_id');
		$this->db->where('id_admin', $id);
		$query = $this->db->get('admin');
		return $query->row(0);
	}
}