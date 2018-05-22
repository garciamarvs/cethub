<?php
class Chat_model extends CI_Model{
	function start_chat()
	{
			$this->db->order_by('id', 'DESC');
			$this->db->limit(20);
			$query = $this->db->get('chat_log');
			return $query->result_array();
	}

	function chat_log()
	{
		$start = $this->input->post('start');
		$sql = "SELECT * FROM `chat_log` WHERE `id` > $start ORDER BY `id` DESC";

		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			return $query->result_array();
		} else {
			return false;
		}		
	}

	function sendMsg()
	{
		$data = array(
			'msg'  => $this->input->post('msg'),
			'img'  => $this->session->userdata('image'),
			'name' => $this->session->userdata('fname').' '.$this->session->userdata('lname')
		);

		return $this->db->insert('chat_log', $data);
	}
}