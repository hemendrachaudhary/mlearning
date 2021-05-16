<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_dashboard extends CI_Controller {
     
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
	public function user_dashboard()
	    {
	    $this->load->view('common/header');
		$this->load->view('common/sidebar');
		$this->load->view('user/user_dashboard');
		$this->load->view('common/footer');
		}
}
?>