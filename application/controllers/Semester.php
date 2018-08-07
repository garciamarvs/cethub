<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Semester extends CI_Controller {

	public function index()
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

		$data['tab'] = 'Semester';
		$data['IT'] = $this->semester_model->getSectionByName('IT');
		$data['CO'] = $this->semester_model->getSectionByName('CO');
		$data['EK'] = $this->semester_model->getSectionByName('EK');
		$semesters = $this->semester_model->getSemesters();
		$data['semesters'] = $semesters;

		$this->form_validation->set_rules('sy', 'School Year', 'required');

		if($this->form_validation->run() === FALSE){
			$data['sem'] = $semesters[0]['sem_id'];
		} else {
			$data['sem'] = $this->input->post('sy');
		}		
		$this->load->view('templates/header');
		$this->load->view('semester/index', $data);
		$this->load->view('templates/footer');
	}

	public function addSemester()
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

		$data['tab'] = 'Semester ';
		$this->form_validation->set_rules('sy1', 'sy1', 'required');
		$this->form_validation->set_rules('sy2', 'sy2', 'required');
		$this->form_validation->set_rules('sem', 'sem', 'required');

		if($this->form_validation->run() === FALSE){
			$this->load->view('templates/header');
			$this->load->view('semester/addSemester', $data);
			$this->load->view('templates/footer');
		} else {
			$sy1 = $this->input->post('sy1');
			$sy2 = $this->input->post('sy2');
			$sem = $this->input->post('sem');

			$full = 'SY'.$sy1.'-'.$sy2.' '.$sem;

			$last_id = $this->semester_model->addSemester($full);

			$sections = $this->semester_model->getSections();

			$ref_course_sem = substr($sem, 0, 3);
			$ref_course_sem = ($ref_course_sem == 'Sum' ? 'Summer' : $ref_course_sem);

			foreach ($sections as $s) {
				$course = substr($s['section_name'], 0, 2);						//course
				$year = substr($s['section_name'], 2, 1);							//year				

				$course_id = $this->semester_model->getCourseId($course, $year, $ref_course_sem);

				foreach ($course_id as $ci) {
					$this->semester_model->toCourse($ci['course_title'], $ci['course_code'], $ci['units'], $s['section_id'], $last_id);
				}
			}

			$this->session->set_flashdata('addSemester_success', true);
			redirect('semester');
		}
	}

	public function addSection()
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

		$data['tab'] = 'Semester ';
		$this->form_validation->set_rules('section', 'Section', 'required');

		if($this->form_validation->run() === FALSE){
			$this->load->view('templates/header');
			$this->load->view('semester/addSection', $data);
			$this->load->view('templates/footer');
			} else {
				$section = $this->input->post('section');

				$this->semester_model->addSection($section);

				$this->session->set_flashdata('addSection_success', true);
				redirect('semester/addSection');
			}
	}

	public function addCourse()
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

		$data['tab'] = 'Semester ';

		$title = $this->input->post('title');
		$code = $this->input->post('code');
		$course = $this->input->post('course');
		$unit = $this->input->post('unit');
		$year = $this->input->post('year');
		$sem = $this->input->post('sem');

		$this->load->view('templates/header');
		$this->load->view('semester/addCourse', $data);
		$this->load->view('templates/footer');

		if(isset($title) && isset($code) && isset($course) && isset($year)){
			$title = array_map('trim', $title);
			$code = array_map('trim', $code);
			$course = array_map('trim', $course);
			$year = array_map('trim', $year);
			$sem = array_map('trim', $sem);
			$j = count($title);

			for ($i=0,$j=count($title); $i<$j; $i++) {				
				if($title[$i] == ""){
					if($i == $j-1){
						$this->session->set_flashdata('addCourse_success', true);
						redirect('semester/addCourse');
					}
					continue;
				}
				$this->semester_model->addCourse($title[$i], $code[$i], $course[$i], $unit[$i], $year[$i], $sem[$i]);
				if($i == $j-1){
					$this->session->set_flashdata('addCourse_success', true);
					redirect('semester/addCourse');
				}
			}
		}
	}

	public function editCurriculum($course, $year, $sem)
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

		$data['tab'] = 'Semester ';

		$data['course'] = $course;
		$data['year'] = $year;
		$data['sem'] = $sem;

		$data['c'] = $this->semester_model->getCourseId($course, $year, $sem);

		$this->load->view('templates/header');
		$this->load->view('semester/editCurriculum', $data);
		$this->load->view('templates/footer');

	}

	public function manage()
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

		$data['tab'] = 'Semester ';
		
		$this->load->view('templates/header');
		$this->load->view('semester/manage', $data);
		$this->load->view('templates/footer');
	}

	public function editCourseInfo($section_id = NULL, $sem = NULL)
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
		
		$data['tab'] = 'Semester ';

		$id =  $this->input->post('id');
		$course_id = $this->input->post('course_id');
		$title =  $this->input->post('title');
		$code =  $this->input->post('code');
		$schedule =  $this->input->post('schedule');
		$room = $this->input->post('room');
		$instructor = $this->input->post('instructor');
		$unit = $this->input->post('unit');

		if(isset($title) && isset($code)){
			$title = array_map('trim', $title);
			$code = array_map('trim', $code);
			$schedule = array_map('trim', $schedule); 
			$room = array_map('trim', $room);
			$instructor = array_map('trim', $instructor);

			$j = count($id);

			for ($i=0; $i<$j; $i++) {				
				$this->semester_model->updateCourseInfo($id[$i], $schedule[$i], $room[$i], $instructor[$i]);
				$this->semester_model->updateRefCourse($id[$i], $title[$i], $code[$i], $unit[$i]);
				if($i == $j-1){
					$this->session->set_flashdata('editCourse_success', true);
					redirect('semester');
				}
			}
		}

		$data['s'] = $this->semester_model->getSectionById($section_id);
		$data['course'] = $this->semester_model->getCourseForSection($section_id, $sem);
		$data['teachers'] = $this->user_model->getTeachers();

		$this->load->view('templates/header');
		$this->load->view('semester/editCourseInfo', $data);
		$this->load->view('templates/footer');
	}

	public function enroll($id)
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
		
		$data['tab'] = 'Semester ';

		$data['course'] = $this->semester_model->getCourseById($id);

		$data['r'] = $this->semester_model->getRefCourseById($data['course']['course_id']);

		$data['s'] = $this->semester_model->getSemById($data['course']['sem_id']);

		$data['e'] = array();

		$data['enrolled'] = $this->user_model->getStudentsEnrolledAt($id);

		foreach ($data['enrolled'] as $key) {
			array_push($data['e'], $key['student']);
		}

		$data['students'] = $this->user_model->getStudents();

		$this->load->view('templates/header');
		$this->load->view('semester/enroll', $data);
		$this->load->view('templates/footer');
	}

	function saveEnroll(){
		$course = $this->input->post('course');
		$names = $this->input->post('names');
		
		$result = $this->semester_model->saveEnroll($course, $names);

		if($result){
			echo json_encode(array('status' => 'success'));
		}
				
	}

	function saveCurriculum(){
		$id = $this->input->post('id');
		$title = $this->input->post('title');
		$code = $this->input->post('code');
		$unit = $this->input->post('unit');

		$result = $this->semester_model->saveCurriculum($id, $title, $code, $unit);

		if($result){
			echo json_encode(array('status' => 'success'));
		}
	}

	function dlFromRefCourse(){
		$id = $this->input->post('id');

		$result = $this->semester_model->dlFromRefCourse($id);

		if($result){
			echo json_encode(array('status' => 'success'));
		}
	}
	function dlFromCourse(){
		$id = $this->input->post('id');

		$result = $this->semester_model->dlFromCourse($id);

		if($result){
			echo json_encode(array('status' => 'success'));
		}
	}
}
