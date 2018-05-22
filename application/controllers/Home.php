<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		if(!$this->session->userdata('logged_in')){
			redirect('login');
		}

		$data['tab'] = 'Home';

		$this->load->view('templates/header');
		$this->load->view('home/home', $data);
		$this->load->view('templates/footer');
	}

	public function schedule()
	{
		if(!$this->session->userdata('logged_in')){
			redirect('login');
		}
		if($this->session->userdata('usertype') != 1){
			$this->load->view('403');
			// Force the CI engine to render the content generated until now    
			$this->CI =& get_instance(); 
			$this->CI->output->_display();
			die();
		}

		$data['tab'] = 'My Course';

		$user_id = $this->session->userdata('user_id');

		$sems = $this->semester_model->getSemInto($user_id);		

		if(count($sems) != 0){
			$listSem = "";
			for ($i=0,$j=count($sems); $i < $j; $i++) { 
				$listSem = $listSem.','.$sems[$i]['sem_id'];
			}
			$listSem = substr($listSem, 1);
			$semesters = $this->semester_model->selectSemInto($listSem);			
		} else {
			$semesters = array(array('sem_id'=> '','sem_name'=>''));
		}

		$data['semesters'] = $semesters;

		$this->form_validation->set_rules('sy', 'School Year', 'required');

		if($this->form_validation->run() === FALSE){
			$data['sem'] = $semesters[0]['sem_id'];

		} else {
		$data['sem'] = $this->input->post('sy');

		}		

		$data['course'] = $this->semester_model->getCourseForStudent($user_id, $data['sem']);

		$this->load->view('templates/header');
		$this->load->view('home/schedule', $data);
		$this->load->view('templates/footer');
	}

	public function grades()
	{
		if(!$this->session->userdata('logged_in')){
			redirect('login');
		}
		if($this->session->userdata('usertype') != 1){
			$this->load->view('403');
			// Force the CI engine to render the content generated until now    
			$this->CI =& get_instance(); 
			$this->CI->output->_display();
			die();
		}

		$data['tab'] = 'My Course';

		$semesters = $this->semester_model->getSemesters();
		$data['semesters'] = $semesters;

		$this->form_validation->set_rules('sy', 'School Year', 'required');

		if($this->form_validation->run() === FALSE){
			$data['sem'] = $semesters[0]['sem_id'];

		} else {
		$data['sem'] = $this->input->post('sy');

		}

		$user_id = $this->session->userdata('user_id');

		$data['grades'] = $this->semester_model->getCourseForStudent($user_id, $data['sem']);

		$this->load->view('templates/header');
		$this->load->view('home/grades', $data);
		$this->load->view('templates/footer');
	}

	public function chat(){
		if(!$this->session->userdata('logged_in')){
			redirect('login');
		}

		$data['tab'] = 'Chat';

		$this->load->view('home/chat', $data);
		$this->load->view('templates/footer');
	}

	public function logout(){
		// Unset user data
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('fname');
		$this->session->unset_userdata('lname');
		$this->session->unset_userdata('image');
		$this->session->unset_userdata('usertype');

		// Set message
		$this->session->set_flashdata('loggedout', true);

		redirect('login');
	}

	function start_chat(){
		if($this->input->post('type') == 'start_chat'){
			$chat = $this->chat_model->start_chat();

			echo json_encode(array('status' => 'success', 'chats' => $chat));
		}
		
	}

	function chat_log(){		
		if($this->input->post('type') == 'chat_log'){
			$chat = $this->chat_model->chat_log();

			echo json_encode(array('status' => 'success', 'chats' => $chat));
		}
	}

	function sendMsg(){
		if($this->input->post('type') == 'sendMsg'){
			$result = $this->chat_model->sendMsg();
			if($result){
				echo json_encode(array('status' => 'success'));
			}
		}
	}
}
