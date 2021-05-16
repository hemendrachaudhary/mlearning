<?php
class User extends CI_Controller
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
	public function create_user() {
		$this->load->view('common/header');
		$this->load->view('common/sidebar');
		$this->form_validation->set_rules('first_name','Name','required');
	    $this->form_validation->set_rules('email','Email','required|is_unique[user_new.email]');
	    $this->form_validation->set_rules('phone','Phone','required');
	    $this->form_validation->set_rules('password','Password','required');
	    $this->form_validation->set_rules('company_id','Company','required');
	    $this->form_validation->set_rules('office_id','Office','required');
	    $this->form_validation->set_rules('dept_id','Departmentt','required');
	    $this->form_validation->set_rules('division_id','Division','required');
	    $this->form_validation->set_rules('emp_id','Emp','required');
	    $this->form_validation->set_rules('role','Role','required');
	    if($this->form_validation->run()==false){
	    	$data['company_list'] = $this->Common_model->getAllResultWhereOrderBy('m_company',array('deleted'=>0,'user_id'=>$this->session->userdata('user_id')),'id');
	    	$data['designation_list'] = $this->Common_model->getAllResultWhereOrderBy('m_designation',array('deleted'=>0,'company_id'=>$this->session->userdata('company_id'),'user_id'=>$this->session->userdata('user_id')),'id');
        $data['manager_list'] = $this->Common_model->getAllResultWhereOrderBy('user_new',array('is_manager'=>1,'deleted'=>0,'company_id'=>$this->session->userdata('company_id')),
          'userId');
        $data['district_list'] = $this->Common_model->getAllResult('m_district');
        $data['getmax'] = $this->Common_model->getmax('user_new','userId');
	    	
	    $this->load->view('pages/user/create_user',$data);
		} else {
          
        $config['upload_path']          = './assest/images/user';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        // $config['max_size']             = 450;
        // $config['max_width']            = 2024;
        // $config['max_height']           = 1568;
        $this->load->library('upload', $config);
        $config['file_name'] = time().$this->upload->data('file_name');
        
        $this->upload->do_upload('userImg');
        $userImg= $config['file_name'];
	    $data = array(
	            'first_name' => $this->input->post('first_name'),
              'middle_name' => $this->input->post('middle_name'),
              'last_name' => $this->input->post('last_name'),
              'email'      => $this->input->post('email'),
              'phone'      => $this->input->post('phone'),
              'password'   => md5($this->input->post('password')),
              'company_id' => $this->input->post('company_id'),
              'office_id'  => $this->input->post('office_id'),
              'dept_id'    => $this->input->post('dept_id'),
              'division_id'=> $this->input->post('division_id'),
              'emp_id'     => $this->input->post('emp_id'),
              'role'       => $this->input->post('role'),
              'profile_image_path' => $userImg,
              'manager_id' => $this->input->post('manager'),
              'is_manager' => $this->input->post('is_manager'),
              'designation_id' => $this->input->post('designation_id'),
              'district_id' => $this->input->post('district_id')
             );
    $insert_id = $this->Common_model->insertAll('user_new',$data);
    redirect('user-list');
        }
  
		$this->load->view('common/footer');

	}
	public function userlist() {
		$this->load->view('common/header');
		$this->load->view('common/sidebar');
		$data['user'] = $this->Common_model->getAllResultWhereOrderBy('user_new',array('deleted'=>0),'userId');
    $this->load->view('pages/user/userlist',$data);  
		$this->load->view('common/footer');
	}

	/* Get office by company */

	public function getOfficeList () {
      $office_list = $this->Common_model->getAllResultWhereOrderBy('m_office',array('deleted'=>0,'company_id'=>$this->input->post('companyCommonId')),'id');
      if($office_list) {
        echo json_encode($office_list);
      } else {
      	 $office_list = array();
      }
		
	}

  /* Get department by office */

	public function getDeptList () {
      $department_list = $this->Common_model->getAllResultWhereOrderBy('m_department',array('deleted'=>0,'office_id'=>$this->input->post('officeCommonId')),'id');
      if($department_list) {
        echo json_encode($department_list);
      } else {
      	 $department_list = array();
      }
		
	}

	public function getDivisionList () {
      $division_list = $this->Common_model->getAllResultWhereOrderBy('m_division',array('deleted'=>0,'dept_id'=>$this->input->post('deptCommonId')),'id');
      if($division_list) {
        echo json_encode($division_list);
      } else {
      	 $division_list = array();
      }
		
	}
	public function getDesignationList () {
      $designation_list = $this->Common_model->getAllResultWhereOrderBy('m_designation',array('deleted'=>0,'division_id'=>$this->input->post('deptCommonId')),'id');
      if($designation_list) {
        echo json_encode($designation_list);
      } else {
      	 $designation_list = array();
      }
		
	}
	public function getManagerList () {
      $manager_list = $this->Common_model->getAllResultWhereOrderBy('user_new',array('deleted'=>0,'division_id'=>$this->input->post('deptCommonId')),'id');
      if($manager_list) {
        echo json_encode($manager_list);
      } else {
      	 $manager_list = array();
      }
		
	}

  public function deleteUser() 
  {
    $id= $this->uri->segment('3');
        $data['depInfo'] = $this->Common_model->updateAllResultWhere('user_new',array('userId' =>$id),array('deleted'=>1)); 
    redirect('user-list');
  }

  public function edit_user() {
    $this->load->view('common/header');
    $this->load->view('common/sidebar');

    $this->form_validation->set_rules('first_name','Name','required');
      $this->form_validation->set_rules('phone','Phone','required');
      $this->form_validation->set_rules('company_id','Company','required');
      $this->form_validation->set_rules('office_id','Office','required');
      $this->form_validation->set_rules('dept_id','Departmentt','required');
      $this->form_validation->set_rules('division_id','Division','required');
      
      $this->form_validation->set_rules('role','Role','required');
      
      if($this->form_validation->run()==false){
        
        $user_id = base64_decode($this->input->get('user_id'));
        if($user_id) {
        $data['user_info'] = $this->Common_model->getRowResultArray('user_new',array('deleted'=>0,'userId'=>$user_id));
        } else{
          $data['user_info'] = $this->Common_model->getRowResultArray('user_new',array('deleted'=>0,'userId'=>$this->input->post('userId')));
        }
        $data['company_list'] = $this->Common_model->getAllResultWhereOrderBy('m_company',array('deleted'=>0,'user_id'=>$this->session->userdata('user_id')),'id');
        $data['designation_list'] = $this->Common_model->getAllResultWhereOrderBy('m_designation',array('deleted'=>0,'company_id'=>$this->session->userdata('company_id'),'user_id'=>$this->session->userdata('user_id')),'id');
        $data['manager_list'] = $this->Common_model->getAllResultWhereOrderBy('user_new',array('is_manager'=>1,'deleted'=>0,'company_id'=>$this->session->userdata('company_id')),
          'userId');
        $data['district_list'] = $this->Common_model->getAllResult('m_district');
        
      $this->load->view('pages/user/edit_user',$data);
    } else {
        $data['user_info'] = $this->Common_model->getRowResultArray('user_new',array('deleted'=>0,'userId'=>$this->input->post('userId')));
         $userImg =  $data['user_info']->profile_image_path;
         if(isset($_FILES['userImg']['name'])){
        $config['upload_path']          = './assest/images/user';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        // $config['max_size']             = 450;
        // $config['max_width']            = 2024;
        // $config['max_height']           = 1568;
        $this->load->library('upload', $config);
        $config['file_name'] = time().$this->upload->data('file_name');
        
        $this->upload->do_upload('userImg');
        $userImg= $config['file_name'];
        }
       $updateData = array(
              'first_name' => $this->input->post('first_name'),
              'middle_name' => $this->input->post('middle_name'),
              'last_name'          => $this->input->post('last_name'),
              'phone'              => $this->input->post('phone'),
              'company_id'         => $this->input->post('company_id'),
              'office_id'          => $this->input->post('office_id'),
              'dept_id'            => $this->input->post('dept_id'),
              'division_id'        => $this->input->post('division_id'),
              'role'               => $this->input->post('role'),
              'profile_image_path' => $userImg,
              'manager_id' => $this->input->post('manager'),
              'is_manager' => $this->input->post('is_manager'),
              'designation_id' => $this->input->post('designation_id'),
              'district_id' => $this->input->post('district_id')
             );
    $insert_id = $this->Common_model->updateAllResultWhere('user_new',array('userId'=>$this->input->post('userId')),$updateData);
   
    redirect('user-list');
        }
  
    $this->load->view('common/footer');

  } 

}


