<?php
class View_logs extends CI_Controller
{
	public function  __construct()
  {
     parent::__construct();
     $this->load->library('form_validation');
     $this->load->library('session');
     $this->load->database();
     $this->load->model('Common_model');
    $this->checkLogin();
     }

     public function checkLogin() {
     	if($this->session->userdata('role')=="") {
     		redirect('');
     	}

     }
	public function course_details()
	{
		$this->load->view('common/header');
		$this->load->view('common/sidebar');
		$this->load->view('pages/view_logs/course_details');
		$this->load->view('common/footer');
	}
	public function assessment_details()
	{
		$this->load->view('common/header');
		$this->load->view('common/sidebar');
		$this->load->view('pages/view_logs/assessment_details');
		$this->load->view('common/footer');
	}
}	

?>