<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Submit extends CI_Controller {
	public function index()
	{
		if(!$this->session->userdata('logged_in')){
			redirect('login');
		}
		if($this->session->userdata('usertype') != 2){
			$this->load->view('403');
			// Force the CI engine to render the content generated until now    
			$this->CI =& get_instance(); 
			$this->CI->output->_display();
			die();
		}

		$data['tab'] = 'Submit Grades';

		$user_id = $this->session->userdata('user_id');

		$sems = $this->semester_model->getSemInto2($user_id);		

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

		// $semesters = $this->semester_model->getSemesters();
		$data['semesters'] = $semesters;

		$user_id = $this->session->userdata('user_id');

		$this->form_validation->set_rules('sy', 'School Year', 'required');

		if($this->form_validation->run() === FALSE){
			$data['sem'] = $semesters[0]['sem_id'];			
		} else {
			$data['sem'] = $this->input->post('sy');			
		}
		
		$data['c'] = $this->semester_model->getCourseForTeacher($user_id, $data['sem']);
		
		$this->load->view('templates/header');
		$this->load->view('submit/index', $data);
		$this->load->view('templates/footer');
	}

	public function grade($id)
	{
		if(!$this->session->userdata('logged_in')){
			redirect('login');
		}
		if($this->session->userdata('usertype') != 2){
			$this->load->view('403');
			// Force the CI engine to render the content generated until now    
			$this->CI =& get_instance(); 
			$this->CI->output->_display();
			die();
		}

		$data['tab'] = 'Submit Grades';

		$data['course'] = $id;

		$c = $this->semester_model->getCourseById($id);

		$data['st'] = $this->user_model->getStudentsEnrolledAt2($id);

		$data['r'] = $c;

		$data['s'] = $this->semester_model->getSemById($c['sem_id']);

		$this->load->view('templates/header');
		$this->load->view('submit/grade', $data);
		$this->load->view('templates/footer');
	}

	function saveGrades(){
		$course = $this->input->post('course');
		$names = $this->input->post('names');
		$grades = $this->input->post('grades');
		$npe = $this->input->post('npe');
		$ope = $this->input->post('ope');
		$le = $this->input->post('le');
		$remarks = $this->input->post('remarks');

		$result = $this->semester_model->saveGrades($course, $names, $grades, $npe, $ope, $le, $remarks);
		
		if($result){
			echo json_encode(array('status' => 'success'));
		}
	}
}