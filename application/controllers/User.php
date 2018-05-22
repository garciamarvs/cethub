<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function addUser()
	{
		if(!$this->session->userdata('logged_in')){
			redirect('login');
		}
		if($this->session->userdata('usertype') != 3){
			$this->load->view('403');
			// Force the CI engine to render the content generated until now    
			$this->CI =& get_instance(); 
			$this->CI->output->_display();
			die();
		}

		$data['tab'] = 'Users';

		$fname = $this->input->post('fname');
		$mname = $this->input->post('mname');
		$lname = $this->input->post('lname');
	  $username = $this->input->post('username');
	  $id = $this->input->post('id');
	  $usertype = $this->input->post('usertype');

		$this->load->view('templates/header');
		$this->load->view('user/addUser', $data);
		$this->load->view('templates/footer');

		if(isset($fname) && isset($username)){
			$fname = array_map('trim', $fname);
			$mname = array_map('trim', $mname);
			$lname = array_map('trim', $lname);
			$username = array_map('trim', $username);
			$id = array_map('trim', $id);			

			for ($i=0,$j = count($fname); $i<$j; $i++) {
				if($fname[$i] == ""){
					if($i == $j-1){
					$this->session->set_flashdata('addUser_success', true);
					redirect('user/addUser');
					}
					continue;					
				}
				$this->user_model->addUser($fname[$i], $mname[$i], $lname[$i], $username[$i], $id[$i], $usertype[$i]);				
				if($i == $j-1){
					$this->session->set_flashdata('addUser_success', true);
					redirect('user/addUser');
				}
			}
		}
	}

	public function profile()
	{
		if(!$this->session->userdata('logged_in')){
			redirect('login');
		}

		$data['tab'] = 'Profile';

		$data['info'] = $this->user_model->getProfileDetails();

		$this->load->view('templates/header');
		$this->load->view('user/profile', $data);
		$this->load->view('templates/footer');
	}

	public function editProfile()
	{
		if(!$this->session->userdata('logged_in')){
			redirect('login');
		}

		$data['tab'] = 'Profile';

		$data['info'] = $this->user_model->getProfileDetails();

		$this->load->view('templates/header');
		$this->load->view('user/editProfile', $data);
		$this->load->view('templates/footer');
	}

	public function updateProfile()
	{
		if(!$this->session->userdata('logged_in')){
			redirect('login');
		}

		$this->form_validation->set_rules('fname', 'First Name', 'required|trim');
		$this->form_validation->set_rules('lname', 'Last Name', 'required|trim');
		$this->form_validation->set_rules('id', 'ID/Student No.', 'required|trim');

		if($this->form_validation->run() === FALSE){
			redirect('user/editProfile');
		} else {
			$old_image = $this->input->post('old_image');
			$new_image = $_FILES['userfile']['name'];
			$new_image = trim($new_image);

			if($old_image != $new_image && $new_image != NULL){
				// Upload Image
				$config['upload_path'] = './assets/img/users';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$config['max_width'] = '2000';
				$config['max_height'] = '2000';

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload()){
					$errors = array('error' => $this->upload->display_errors());
					$user_image = 'noimage.jpg';
				} else {
					$data = array('upload_data' => $this->upload->data());
					$user_image = $_FILES['userfile']['name'];
				}
			}
			$this->user_model->updateProfile($user_image);
			$this->session->set_flashdata('updateProfile_success', true);
			redirect('user/profile');
		}		
	}

	public function updateSetting()
	{
		if(!$this->session->userdata('logged_in')){
			redirect('login');
		}

		$this->form_validation->set_rules('old_password', 'Old Password', 'required|trim|callback_checkOldPassword');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|trim|matches[password]');

		if($this->form_validation->run() === FALSE){
			$this->session->set_flashdata('activeTabProfile', 'Setting');
			redirect('user/editProfile');
		} else {
			$this->user_model->updatePassword();
			$this->session->set_flashdata('updateProfile_success', true);
			$this->session->set_flashdata('activeTabProfile', 'Setting');
			redirect('user/profile');
		}
		
			
	}
	public function checkOldPassword()
	{
		if(!$this->session->userdata('logged_in')){
			redirect('login');
		}

		$info = $this->user_model->getUserById($this->session->userdata('user_id'));
		if($info['password'] == $this->input->post('old_password')){
			return TRUE;
		} else {
			$this->session->set_flashdata('updateProfile_failed', 'Invalid Old Password');
			return FALSE;
		}
	}

}