<?php
/**
 * 
 */
class Jadwal_model extends CI_Model
{
	
	function __construct()
	{
		$this->load->database();
	}

	function get_jadwal()
	{
		return $this->db->get('jadwal_penayangan');
	}

	function detail_jadwal($id)
	{
		$this->db->where('id_jadwal', $id);
		return $this->db->get('jadwal_penayangan');
	}

	function add_jadwal($data)
	{
		return $this->db->insert('jadwal_penayangan', $data);
	}

	function update_jadwal($id, $data)
	{
		$this->db->where('id_jadwal', $id);
		return $this->db->update('jadwal_penayangan', $data);
	}

	function delete_jadwal($id)
	{
		$this->db->where('id_jadwal', $id);
		return $this->db->delete('jadwal_penayangan');
	}
}