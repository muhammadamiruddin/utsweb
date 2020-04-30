<?php
/**
 * 
 */
class Film_model extends CI_Model
{
	
	function __construct()
	{
		$this->load->database();
	}

	function get_film()
	{
		$this->db->join('genre', 'genre.id_genre = film.genre');
		return $this->db->get('film');
	}

	function detail_film($id)
	{
		$this->db->where('id_film', $id);
		return $this->db->get('film');
	}

	function add_film($data)
	{
		return $this->db->insert('film', $data);
	}

	function update_film($id, $data)
	{
		$this->db->where('id_film', $id);
		return $this->db->update('film', $data);
	}

	function delete_film($id)
	{
		$this->db->where('id_film', $id);
		return $this->db->delete('film');
	}
}