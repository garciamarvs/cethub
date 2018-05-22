<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function index()
	{
		if($this->session->userdata('logged_in')){
			redirect('home');
		}

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() === FALSE){
			$this->load->view('login');
			$this->session->set_flashdata('dump', $this->input->post('username'));
		} else {
			// Get username
			$username = $this->input->post('username');
			// Get and encrypt the password
			$password = $this->input->post('password');

			// Login user
			$user_id = $this->login_model->login($username, $password);
			$usertype = $this->login_model->getusertype($username, $password);
			$fname = $this->login_model->getfname($user_id);
			$lname = $this->login_model->getlname($user_id);
			$image = $this->login_model->getImage($user_id);

			if($user_id){
				// Create session
				$user_data = array(
					'user_id'   => $user_id,
					'username'  => $username,
					'fname' 	  => $fname,
					'lname' 	  => $lname,
					'image' 	  => $image,
					'usertype'  => $usertype,
					'logged_in' => true
				);

				$this->session->set_userdata($user_data);

				// Set message
				$this->session->set_flashdata('login_success', true);

				redirect('home');
			} else {
				$this->session->set_flashdata('dump', $this->input->post('username'));
				// Set message
				$this->session->set_flashdata('login_failed', 'Login is invalid');

				redirect('login');
			}
		}
	}

}