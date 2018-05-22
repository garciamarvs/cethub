<?php
class Login_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}

	public function login($username, $password){
		// Validate
		$this->db->where('username', $username);
		$this->db->where('password', $password);

		$result = $this->db->get('users');

		if($result->num_rows() == 1){
			return $result->row(0)->user_id;
		} else {
			return false;
		}
	}

	public function getfname($user_id){
		$this->db->select('fname');
		$query = $this->db->get_where('users', array('user_id' => $user_id));
		$result = $query->row_array();
		return $result['fname'];
	}

	public function getlname($user_id){
		$this->db->select('lname');
		$query = $this->db->get_where('users', array('user_id' => $user_id));
		$result = $query->row_array();
		return $result['lname'];
	}

	public function getImage($user_id){
		$this->db->select('user_image');
		$query = $this->db->get_where('users', array('user_id' => $user_id));
		$result = $query->row_array();
		return $result['user_image'];
	}
		
	public function getusertype($username, $password){
		// Validate
		$this->db->where('username', $username);
		$this->db->where('password', $password);

		$result = $this->db->get('users');

		if($result->num_rows() == 1){
			return $result->row(0)->usertype;
		} else {
			return false;
		}
	}	
}