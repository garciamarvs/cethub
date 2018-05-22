<?php
class Announcement_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}

	public function get_posts($slug = FALSE, $id = FALSE, $limit = FALSE, $offset = FALSE)
	{
		if($limit){
			$this->db->limit($limit, $offset);
		}			
		if($slug === FALSE){
			$this->db->order_by('id', 'DESC');			
			$query = $this->db->get('announcement');
			return $query->result_array();
		}
		if($id != FALSE){
			$query = $this->db->get_where('announcement', array('slug' => $slug, 'id' => $id));
			return $query->row_array();
		}

		$query = $this->db->get_where('announcement', array('slug' => $slug));
		return $query->row_array();
	}

	public function create_post($post_image)
	{
		$slug = url_title($this->input->post('title'));

		$data = array(
			'title' => $this->input->post('title'),
			'slug' => $slug,
			'body' => $this->input->post('body'),
			'post_image' => $post_image
		);

		return $this->db->insert('announcement', $data);
	}

	public function update_post($post_image)
	{
		$slug = url_title($this->input->post('title'));

		if($post_image == NULL){
			$data = array(
			'title' => $this->input->post('title'),
			'slug' => $slug,
			'body' => $this->input->post('body')
			);
		}
		else {
			$data = array(
			'title' => $this->input->post('title'),
			'slug' => $slug,
			'body' => $this->input->post('body'),
			'post_image' => $post_image
			);
		}		
		
		$this->db->where('id', $this->input->post('id'));
		return $this->db->update('announcement', $data);
	}

	public function delete_post($id){
		$image_file_name = $this->db->select('post_image')->get_where('announcement', array('id' => $id))->row()->post_image;
		$cwd = getcwd(); // save the current working directory
		$image_file_path = $cwd."\\assets\\img\\posts\\";
		chdir($image_file_path);
		unlink($image_file_name);
		chdir($cwd); // Restore the previous working directory
		$this->db->where('id', $id);
		$this->db->delete('announcement');
		return true;
	}
}