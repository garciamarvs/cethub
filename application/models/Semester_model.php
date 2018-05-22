<?php
class Semester_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}

	public function addSemester($sem){
		$data = array(
			'sem_name' => $sem
		);

		$this->db->insert('semester', $data);
		$last_id = $this->db->insert_id();
		return $last_id;
	}

	public function getSemesters(){
		$this->db->order_by('sem_name', 'DESC');
		$query = $this->db->get('semester');
		return $query->result_array();
	}

	public function selectSemInto($sems){
		$sql = "SELECT * FROM `semester` WHERE `sem_id` IN ($sems) ORDER BY `sem_name` DESC";

		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getSemInto($user_id){
		$sql = "SELECT `course`.`sem_id` FROM `course_log` INNER JOIN `course` ON `course_log`.`course`=`course`.`id` WHERE `course_log`.`student` = '$user_id' GROUP BY `course`.`sem_id`";

		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getSemInto2($user_id){
		$sql = "SELECT `sem_id` FROM `course` WHERE `instructor` = '$user_id' GROUP BY `sem_id`";

		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getSemById($id){
		$query = $this->db->get_where('semester', array('sem_id' => $id));
		return $query->row_array();
	}

	public function getCourseById($id){
		$query = $this->db->get_where('course', array('id' => $id));
		return $query->row_array();
	}

	public function getRefCourseById($id){
		$query = $this->db->get_where('ref_course', array('id' => $id));
		return $query->row_array();
	}

	public function getCourseId($course, $year, $sem){
		$query = $this->db->get_where('ref_course', array('course' => $course, 'year_level' => $year, 'sem' => $sem));
		return $query->result_array();
	}

	public function addSection($section){
		$data = array(
			'section_name' => $section
		);

		return $this->db->insert('section', $data);
	}

	public function getSections(){
		$this->db->order_by('section_name', 'ASC');
		$query = $this->db->get('section');
		return $query->result_array();
	}
	public function getSectionByName($name){
		$sql = "SELECT * FROM section WHERE section_name LIKE '$name%'";

		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getSectionById($section_id){
		$query = $this->db->get_where('section', array('section_id' => $section_id));
		return $query->result_array();
	}

	public function getCourseForSection($section_id, $sem_id){
		$sql = 'SELECT id, course_title, course_code, schedule, room, instructor, units FROM course WHERE section_id = '.$section_id.' AND sem_id = '.$sem_id;

		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getCourseForTeacher($user_id, $sem_id){
		$sql = "SELECT course.id, course.schedule, course.room, course.course_title, course.course_code, section.section_name FROM course INNER JOIN section ON course.section_id=section.section_id WHERE instructor = '$user_id' AND sem_id = '$sem_id'";

		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function updateCourseInfo($id, $schedule, $room, $instructor){
		$data = array(
			'schedule' 	 => $schedule,
			'room'		   => $room,
			'instructor' => $instructor
		);
		$this->db->where('id', $id);
		return $this->db->update('course', $data);
	}
	
	public function updateRefCourse($id, $title, $code, $units){
		$data = array(
			'course_title'=> $title,
			'course_code' => $code,
			'units' 			=> $units
		);
		$this->db->where('id', $id);
		return $this->db->update('course', $data);
	}

	public function addCourse($title, $code, $course, $unit, $year, $sem){
		$data = array(
			'course_title' => $this->semester_model->escapeString($title),
			'course_code'  => $code,
			'course'   	   => $course,
			'units'				 => $unit,
			'year_level'   => $year,
			'sem'					 => $sem
		);

		return $this->db->insert('ref_course', $data);
	}

	public function toCourse($course_title, $course_code, $units, $section_id, $sem_id){
		$data2 = array(
						'course_title'=> $course_title,
						'course_code' => $course_code,
						'units' 			=> $units,
						'section_id'  => $section_id,
						'sem_id'		  => $sem_id
					);
					$this->db->insert('course', $data2);
	}

	public function getCourseForStudent($id, $sem){
		$sql = "SELECT course.course_code, course.course_title, course.units, course.schedule, course.room, course.instructor, course_log.grade, course_log.npe, course_log.ope, course_log.le, course_log.remarks FROM course_log INNER JOIN course ON course_log.course=course.id WHERE course_log.student = '$id' AND course.sem_id = '$sem'";

		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getCC($course, $year, $sem){
		$query = $this->db->get_where('ref_course', array('course' => $course, 'year_level' => $year, 'sem' => $sem));
		return $query->result_array();
	}
	
	function saveEnroll($course, $names){
		$e = $this->user_model->getStudentsEnrolledAt($course);
		$s = array();

		foreach ($e as $key) {
			array_push($s, $key['student']);
		}

		for($i=0,$j=count($names);$i<$j;$i++){
			if(in_array($names[$i], $s)){
				
			} else {
				$data = array(
					'course'  => $course,
					'student' => $names[$i]
				);
				$this->db->insert('course_log', $data);
			}			
		}

		for ($i=0,$j=count($s); $i < $j; $i++) { 
			if(in_array($s[$i], $names)){
				
			} else {
				$this->db->delete('course_log', array('course'  => $course, 'student' => $s[$i]));
			}
		}
		return true;
	}

	function saveGrades($course, $names, $grades, $npe, $ope, $le, $remarks){
		for($i=0,$j=count($names);$i<$j;$i++){
			$data = array(
				'grade' 	=> $grades[$i],
				'npe' 		=> $npe[$i],
				'ope' 		=> $ope[$i],
				'le'			=> $le[$i],
				'remarks' => $remarks[$i]
			);
			$this->db->where('student', $names[$i]);
			$this->db->where('course', $course);
			$this->db->update('course_log', $data);
		}

		return true;
	}

	function saveCurriculum($id, $title, $code, $unit){		
		for ($i=0,$j=count($code); $i < $j; $i++) { 
			$data = array(
				'course_title' => $title[$i],
				'course_code'	 => $code[$i],
				'units' 			 => $unit[$i]
			);
			$this->db->where('id', $id[$i]);
			$this->db->update('ref_course', $data);
		}
		return true;
	}

	function dlFromRefCourse($id){
		$this->db->where('id', $id);
		$this->db->delete('ref_course');

		return true;
	}

	function dlFromCourse($id){
		$this->db->where('id', $id);
		$this->db->delete('course');

		return true;
	}

	function escapeString($val) {
    $db = get_instance()->db->conn_id;
    $val = mysqli_real_escape_string($db, $val);
    return $val;
	}
}
