<?php
/**
 * 
 */
class Genre_model extends CI_Model
{
	
	function __construct()
	{
		$this->load->database();
	}

	function get_genre()
	{
		return $this->db->get('genre');
	}

	function detail_genre($id)
	{
		$this->db->where('id_genre', $id);
		return $this->db->get('genre');
	}

	function add_genre($data)
	{
		return $this->db->insert('genre', $data);
	}

	function update_genre($id, $data)
	{
		$this->db->where('id_genre', $id);
		return $this->db->update('genre', $data);
	}

	function delete_genre($id)
	{
		$this->db->where('id_genre', $id);
		return $this->db->delete('genre');
	}
}