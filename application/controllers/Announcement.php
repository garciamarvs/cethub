<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Announcement extends CI_Controller {
	public function __construct()
	{
        parent:: __construct();
        $this->load->helper("url");
        $this->load->library("pagination");
  }

	public function index($offset = 0)
	{
		if(!$this->session->userdata('logged_in')){
			redirect('login');
		}
		// Pagination Config	
		$config['base_url'] = base_url() . 'announcement/index/';
		$config['total_rows'] = $this->db->count_all('announcement');
		$config['per_page'] = 9;
		$config['uri_segment'] = 3;
		$config['last_link'] = "<i class=\"fa fa-angle-double-right\"></i>";
		$config['first_link'] = "<i class=\"fa fa-angle-double-left\"></i>";
		$config['cur_tag_open'] = "<button class=\"btn btn-white active\">";
		$config['cur_tag_close'] = "</button>";
		$config['prev_link'] = "<i class=\"fa fa-chevron-left\"></i>";
		$config['next_link'] = "<i class=\"fa fa-chevron-right\"></i>";
		$config['attributes'] = array('class' => 'btn btn-white');
		$config['attributes']['rel'] = FALSE;

		// Init Pagination
		$this->pagination->initialize($config);

		$data['tab'] = 'Announcement';

		$data['posts'] = $this->announcement_model->get_posts(FALSE, FALSE, $config['per_page'], $offset);

		$this->load->view('templates/header');
		$this->load->view('announcement/announcement', $data);
		$this->load->view('templates/footer');
	}

	public function view($slug = NULL)
	{
		if(!$this->session->userdata('logged_in')){
			redirect('login');
		}

		$data['tab'] = 'Announcement ';

		$data['post'] = $this->announcement_model->get_posts($slug);

		if(empty($data['post'])){			
			
		}

		$this->load->view('templates/header');
		$this->load->view('announcement/view', $data);
		$this->load->view('templates/footer');
	}

	public function manage($offset = 0)
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
		// Pagination Config	
		$config['base_url'] = base_url() . 'announcement/index/';
		$config['total_rows'] = $this->db->count_all('announcement');
		$config['per_page'] = 9;
		$config['uri_segment'] = 3;
		$config['last_link'] = "<i class=\"fa fa-angle-double-right\"></i>";
		$config['first_link'] = "<i class=\"fa fa-angle-double-left\"></i>";
		$config['cur_tag_open'] = "<button class=\"btn btn-white active\">";
		$config['cur_tag_close'] = "</button>";
		$config['prev_link'] = "<i class=\"fa fa-chevron-left\"></i>";
		$config['next_link'] = "<i class=\"fa fa-chevron-right\"></i>";
		$config['attributes'] = array('class' => 'btn btn-white');
		$config['attributes']['rel'] = FALSE;

		// Init Pagination
		$this->pagination->initialize($config);

		$data['tab'] = 'Announcement ';

		$data['posts'] = $this->announcement_model->get_posts(FALSE, FALSE, $config['per_page'], $offset);

		$this->load->view('templates/header');
		$this->load->view('announcement/manage', $data);
		$this->load->view('templates/footer');
	}

	public function create()
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

		$data['tab'] = 'Announcement ';

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('body', 'Body', 'required');

		if($this->form_validation->run() === FALSE){
			$this->load->view('templates/header');
			$this->load->view('announcement/create', $data);
			$this->load->view('templates/footer');
		} else {
			// Upload Image
			$config['upload_path'] = './assets/img/posts';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '9999';
			$config['max_width'] = '9999';
			$config['max_height'] = '9999';

			$this->load->library('upload', $config);

			if(!$this->upload->do_upload()){
				$errors = array('error' => $this->upload->display_errors());
				$post_image = 'noimage.jpg';
			} else {
				$data = array('upload_data' => $this->upload->data());
				$post_image = str_replace(' ', '_', $_FILES['userfile']['name']);
			}
			$this->announcement_model->create_post($post_image);

			// Set message
			$this->session->set_flashdata('post_created', TRUE);

			redirect('announcement/manage');
		}
	}

	public function edit($slug = NULL, $id = NULL)
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

		$data['tab'] = 'Announcement ';

		//Security Check
		if($slug == NULL || $id == NULL){
			$this->load->view('404');
			// Force the CI engine to render the content generated until now    
			$this->CI =& get_instance(); 
			$this->CI->output->_display();
			die();
		}

		$data['post'] = $this->announcement_model->get_posts($slug, $id);
		
		if(empty($data['post'])){
			$this->load->view('404');
			// Force the CI engine to render the content generated until now    
			$this->CI =& get_instance(); 
			$this->CI->output->_display();
			die();
		}

		$this->load->view('templates/header');
		$this->load->view('announcement/edit', $data);
		$this->load->view('templates/footer');
	}

	public function update()
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

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('body', 'Body', 'required');

		if($this->form_validation->run() === FALSE){
			$this->load->view('templates/header');
			$this->load->view('announcement/edit', $data);
			$this->load->view('templates/footer');
		} else {
			$old_image = $this->input->post('old_image');
			$new_image = $_FILES['userfile']['name'];

			if($old_image != $new_image && $new_image != NULL){
				// Upload Image
				$config['upload_path'] = './assets/img/posts';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$config['max_width'] = '2000';
				$config['max_height'] = '2000';

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload()){
					$errors = array('error' => $this->upload->display_errors());
					$post_image = 'noimage.jpg';
				} else {
					$data = array('upload_data' => $this->upload->data());
					$post_image = $_FILES['userfile']['name'];
				}
			}
			
			$this->announcement_model->update_post($post_image);

			// Set message
			$this->session->set_flashdata('post_updated', TRUE);

			redirect('announcement/manage');
		}
	}
	
	public function delete($slug = NULL, $id = NULL)
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

		//Security Check
		if($slug == NULL || $id == NULL){
			$this->load->view('404');
			// Force the CI engine to render the content generated until now    
			$this->CI =& get_instance(); 
			$this->CI->output->_display();
			die();
		}

		$this->announcement_model->delete_post($id);

		// Set message
		$this->session->set_flashdata('post_deleted', TRUE);

		redirect('announcement/manage');
	}
}