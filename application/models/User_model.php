<?php
class User_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}

	public function addUser($fname, $mname, $lname, $username, $id, $usertype){

		$data = array(
			'username'	 		=> $username,
			'fname' 			 	=> $fname,
			'mname' 			 	=> $mname,
			'lname' 			 	=> $lname,
			'id/student_no' => $id,
			'password'	 		=> 'cethub',
			'usertype'	 		=> $usertype,
		);
		switch ($usertype) {
			case 2:case '2': $data["course"] = "faculty"; break;
			case 3:case '3': $data["course"] = "admin"; break;
		}
		return $this->db->insert('users', $data);
	}

	public function getStudents(){
						 $this->db->order_by('lname', 'ASC');
		$query = $this->db->get_where('users', array('usertype' => 1));
		return $query->result_array();
	}

	public function getStudentsEnrolledAt($course){
		$query = $this->db->get_where('course_log', array('course' => $course));
		return $query->result_array();
	}

	public function getStudentsEnrolledAt2($course){
		$sql = "SELECT course_log.grade, users.user_id, users.fname, users.mname, users.lname, `users`.`id/student_no`, course_log.npe, course_log.ope, course_log.le, course_log.remarks FROM course_log INNER JOIN users ON course_log.student=users.user_id WHERE course_log.course = '$course' ORDER BY users.lname";

		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getTeachers(){
		$query = $this->db->get_where('users', array('usertype' => 2));
		return $query->result_array();
	}

	public function getUserById($id){
		$query = $this->db->get_where('users', array('user_id' => $id));
		return $query->row_array();
	}

	public function updateProfile($user_image){
		$data = array(
			'fname' 	 			=> $this->input->post('fname'),
			'mname'		 	 		=> $this->input->post('mname'),
			'lname' 				=> $this->input->post('lname'),
			'id/student_no' => $this->input->post('id'),
			'address' 			=> $this->input->post('address'),
			'birthday' 			=> $this->input->post('birthday'),
			'email' 				=> $this->input->post('email'),
			'phone' 				=> $this->input->post('phone'),
		);
		
		if($user_image != NULL){
			$data['user_image'] = $user_image;
			$this->session->set_userdata('image', $user_image);
		}

		$this->db->where('user_id', $this->session->userdata('user_id'));
		$result = $this->db->update('users', $data);

		if($this->session->userdata('usertype') == 1){
			$this->db->where('user_id', $this->session->userdata('user_id'));
			$this->db->update('users', array('course' => $this->input->post('course')));
		}
		$this->session->set_userdata('fname', $this->input->post('fname'));
		$this->session->set_userdata('lname', $this->input->post('lname'));

		return $result;
	}

	public function getProfileDetails(){
		$query = $this->db->get_where('users', array('user_id' => $this->session->userdata('user_id')));
		return $query->row_array();
	}

	public function updatePassword(){
		$data = array(
			'password' => $this->input->post('password')
		);
		$this->db->where('user_id', $this->session->userdata('user_id'));
		return $this->db->update('users', $data);
	}
}