<?php 

	class Amazonhack extends CI_Controller 
	{

		function __construct() 
		{
			
			parent::__construct();
			/*if (!$this->User_model->logged_in()) 
			{
				$this->session->set_flashdata('current_url', uri_string());
				redirect('Login');	
			}*/
		}

		// Main Page
		
		function index()
		{				
			$this->load->view('assets/header');
			$this->load->view('main');
			$this->load->view('assets/footer');
		}
		
		function video()
		{				
			$this->load->view('assets/header');
			$this->load->view('video');
			$this->load->view('assets/footer');
		}
		function audio()
		{				
			$this->load->view('assets/header');
			$this->load->view('audio');
			$this->load->view('assets/footer');
		}
		function text()
		{				
			$this->load->view('assets/header');
			$this->load->view('text');
			$this->load->view('assets/footer');
		}
		
	}
	
/* End of file Namepending.php */
/* Location: ../application/controllers */