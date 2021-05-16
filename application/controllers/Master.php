<?php
class Master extends CI_Controller
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
  
	public function company()
	{
		$this->load->view('common/header');
		$this->load->view('common/sidebar');
		$data['company'] = $this->Common_model->getAllResultWhereOrderBy('m_company',array('deleted'=>0),'id');
        $this->form_validation->set_rules('company_id','Company','required|is_unique[m_company.company_id]');
	    $this->form_validation->set_rules('name','Name','required');
	    $this->form_validation->set_rules('address_id','Address','required');
	    $data['getmax'] = $this->Common_model->getmax('m_company','id');
	    if($this->form_validation->run()==false){
	    $this->load->view('pages/master/company',$data);
		}else{
        $logo_path =  "";
        $config['upload_path']          = './assest/images/company';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        // $config['max_size']             = 450;
        // $config['max_width']            = 2024;
        // $config['max_height']           = 1568;
        $this->load->library('upload', $config);
        $config['file_name'] = $this->upload->data('file_name');
        if ( ! $this->upload->do_upload('logo_path')) //important!
				{
				    // something went really wrong show error page
				    $error = $this->upload->display_errors(); //associate view variable $error with upload errors

				   echo $error;
				}
        $logo_path = $this->upload->data('file_name');
	    $data = array(
	          'company_id'  => $this->input->post('company_id'),
              'name'        => $this->input->post('name'),
              'address_id'  => $this->input->post('address_id'),
              'logo_path'   => $logo_path,
              'user_id'     => $this->session->userdata('user_id'),
              'common_id'   => time(),
			  'updated_date'=> date('Y-m-d H:i:s'),
			  'entry_date'  => date('Y-m-d H:i:s'),
			  );
	$insert_id = $this->Common_model->insertAll('m_company',$data);
    redirect('company');
        }
		$this->load->view('common/footer');
	}

	public function editCompany() 
	{
		$this->load->view('common/header');
		$this->load->view('common/sidebar');
		$this->form_validation->set_rules('company_id','Company','required');
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('address_id','Address','required');
	    if($this->form_validation->run()==false){
		$id = base64_decode($this->input->get('company_id'));
		if($id) {
        $data['depInfo'] = $this->Common_model->getRowResultArray('m_company',array('deleted'=>0,'id'=>$id));
        } else {
          $data['depInfo'] = $this->Common_model->getRowResultArray('m_company',array('deleted'=>0,'id'=>
          	$this->input->post('company_auto_id')));
        }
        $this->load->view('pages/master/editCompany',$data);
		} else {
		$data['depInfo'] = $this->Common_model->getRowResultArray('m_company',array('id' =>$this->input->post('company_auto_id'))); 
        $logo_path = $data['depInfo']->logo_path;
        if($_FILES['logo_path']['name']!="") {
        $config['upload_path']          = './assest/images/company';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
       
        $config['file_name'] = $this->upload->data('file_name');
        if ( ! $this->upload->do_upload('logo_path')) //important!
				{
				    // something went really wrong show error page
				    $error = $this->upload->display_errors(); //associate view variable $error with upload errors

				   echo $error;
				}
            $logo_path = $this->upload->data('file_name');
           } 
	    	$insData = array(
				'company_id'     => $this->input->post('company_id'),
				'name'           => $this->input->post('name'),
				'address_id'  => $this->input->post('address_id'),
                'logo_path'   => $logo_path,
              	'updated_date'   => date('Y-m-d H:i:s'),
				);

			$update = $this->Common_model->updateAllResultWhere('m_company',array('id'=> $this->input->post('company_auto_id')),$insData);
			
			redirect('company');
		}
		$this->load->view('common/footer');
	} 

	public function deleteCompany() 
	{
		$id= $this->uri->segment('3');
        $data['depInfo'] = $this->Common_model->updateAllResultWhere('m_company',array('id' =>$id),array('deleted'=>1)); 
		redirect('company');
	} 


	public function office()
	{
		$this->load->view('common/header');
		$this->load->view('common/sidebar');
		$data['office'] = $this->Common_model->getAllResultWhereOrderBy('m_office',array('deleted'=>0),'id');
	    $this->form_validation->set_rules('company_id','Company','required');
		$this->form_validation->set_rules('name','Name','required');
		// $result   = $this->Common_model->getRowResultArray('m_company',array('company_id' =>$company_id));
	    if($this->form_validation->run()==false){
		$data['company_list'] = $this->Common_model->getAllResultWhereOrderBy('m_company',array('deleted'=>0,'user_id'=>$this->session->userdata('user_id')),'id');
				    	
		$this->load->view('pages/master/office',$data);
		}else{
			$data = array(
				'company_id'     => $this->input->post('company_id'),
				'name'           => $this->input->post('name'),
				'created_by'     => $this->session->userdata('user_id'),
				'common_id'      => time(),
				'updated_date'   => date('Y-m-d H:i:s'),
				'entry_date'     => date('Y-m-d H:i:s'),
			);
			$insert_id = $this->Common_model->insertAll('m_office',$data);
			redirect('office');
		}
		$this->load->view('common/footer');
	}

	public function editOffice() 
	{
		$this->load->view('common/header');
		$this->load->view('common/sidebar');
		$this->form_validation->set_rules('company_id','Company','required');
		$this->form_validation->set_rules('name','Name','required');
		if($this->form_validation->run()==false){
		
		$id = base64_decode($this->input->get('office_id'));
		if($id) {
        $data['depInfo'] = $this->Common_model->getRowResultArray('m_office',array('deleted'=>0,'id'=>$id));
        } else {
          $data['depInfo'] = $this->Common_model->getRowResultArray('m_office',array('deleted'=>0,'id'=>
          	$this->input->post('office_id')));
        }
        $data['depInfo'] = $this->Common_model->getRowResultArray('m_office',array('id' =>$id)); 
		$data['company_list'] = $this->Common_model->getAllResultWhereOrderBy('m_company',array('deleted'=>0,'user_id'=>$this->session->userdata('user_id')),'id');
	    $this->load->view('pages/master/editOffice',$data);
		}else{
			$insData = array(
				'company_id'     => $this->input->post('company_id'),
				'name'           => $this->input->post('name'),
				'updated_date'   => date('Y-m-d H:i:s'),
				);
			
			$update = $this->Common_model->updateAllResultWhere('m_office',array('id'=> $this->input->post('office_id')),$insData);
			redirect('office');
		}
		$this->load->view('common/footer');
	} 

	public function deleteOffice() 
	{
		$id= $this->uri->segment('3');
        $data['depInfo'] = $this->Common_model->updateAllResultWhere('m_office',array('id' =>$id),array('deleted'=>1)); 
		redirect('office');
	} 


	public function department() 
	{
		$this->load->view('common/header');
		$this->load->view('common/sidebar');
		$data['department']   = $this->Common_model->getAllResultWhereOrderBy('m_department',array('deleted'=>0),'id');
		$this->form_validation->set_rules('dept_name','Department','required');
		$this->form_validation->set_rules('company_id','Company','required');
		$this->form_validation->set_rules('office_id','Office','required');
		if($this->form_validation->run()==false){
		$data['company_list'] = $this->Common_model->getAllResultWhereOrderBy('m_company',array('deleted'=>0,'user_id'=>$this->session->userdata('user_id')),'id');
	    $this->load->view('pages/master/department',$data);
		}else{
			$insData = array(
				'dept_name'      => $this->input->post('dept_name'),
				'company_id'     => $this->input->post('company_id'),
				'office_id'      => $this->input->post('office_id'),
				'user_id'        => $this->session->userdata('user_id'),
				'common_id'      => time(),
				'updated_date'   => date('Y-m-d H:i:s'),
				'entry_date'     => date('Y-m-d H:i:s'),
			);

			$insert_id = $this->Common_model->insertAll('m_department',$insData);
			redirect('department');
		}
		$this->load->view('common/footer');
	}

    public function editDepartment() 
	{
		$this->load->view('common/header');
		$this->load->view('common/sidebar');
		$this->form_validation->set_rules('dept_name','Department','required');
		$this->form_validation->set_rules('company_id','Company','required');
		$this->form_validation->set_rules('office_id','Office','required');
		if($this->form_validation->run()==false){
		$id= $this->uri->segment('3');
        $data['depInfo'] = $this->Common_model->getRowResultArray('m_department',array('id' =>$id)); 
		$data['company_list'] = $this->Common_model->getAllResultWhereOrderBy('m_company',array('deleted'=>0,'user_id'=>$this->session->userdata('user_id')),'id');
	    $this->load->view('pages/master/editDepartment',$data);
		}else{
			$insData = array(
				'dept_name'      => $this->input->post('dept_name'),
				'company_id'     => $this->input->post('company_id'),
				'office_id'      => $this->input->post('office_id'),
				'user_id'        => $this->session->userdata('user_id'),
				'updated_date'   => date('Y-m-d H:i:s'),
				);
			
			$update = $this->Common_model->updateAllResultWhere('m_department',array('id'=> $this->input->post('dept_id')),$insData);
			redirect('department');
		}
		$this->load->view('common/footer');
	} 

	public function deleteDepartment() 
	{
		$id= $this->uri->segment('3');
        $data['depInfo'] = $this->Common_model->updateAllResultWhere('m_department',array('id' =>$id),array('deleted'=>1)); 
		redirect('department');
	} 

  

	public function division()
	{
		$this->load->view('common/header');
		$this->load->view('common/sidebar');
		$data['division'] = $this->Common_model->getAllResultWhereOrderBy('m_division',array('deleted'=>0),'id');
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('company_id','Company','required');
		$this->form_validation->set_rules('office_id','Office','required');
		$this->form_validation->set_rules('dept_id','Department','required');
		if($this->form_validation->run()==false){
		$data['company_list'] = $this->Common_model->getAllResultWhereOrderBy('m_company',array('deleted'=>0,'user_id'=>$this->session->userdata('user_id')),'id');
	    $this->load->view('pages/master/division',$data);
		}else{
			$insData = array(
				'name'           => $this->input->post('name'),
				'company_id'     => $this->input->post('company_id'),
				'office_id'      => $this->input->post('office_id'),
				'dept_id'        => $this->input->post('dept_id'),
				'created_by'     => $this->session->userdata('user_id'),
				'common_id'      => time(),
				'updated_date'   => date('Y-m-d H:i:s'),
				'entry_date'     => date('Y-m-d H:i:s'),
			);
			$insert_id = $this->Common_model->insertAll('m_division',$insData);
			redirect('division');
		}
       $this->load->view('common/footer');
	}

	public function editDivision() 
	{
		$this->load->view('common/header');
		$this->load->view('common/sidebar');
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('company_id','Company','required');
		$this->form_validation->set_rules('office_id','Office','required');
		$this->form_validation->set_rules('dept_id','Department','required');
		if($this->form_validation->run()==false){
		$id= $this->uri->segment('3');
        $data['depInfo'] = $this->Common_model->getRowResultArray('m_division',array('id' =>$id)); 
		$data['company_list'] = $this->Common_model->getAllResultWhereOrderBy('m_company',array('deleted'=>0,'user_id'=>$this->session->userdata('user_id')),'id');
	    $this->load->view('pages/master/editDivision',$data);
		}else{
			$insData = array(
				'name'           => $this->input->post('name'),
				'company_id'     => $this->input->post('company_id'),
				'office_id'      => $this->input->post('office_id'),
				'dept_id'        => $this->input->post('dept_id'),
				'updated_date'   => date('Y-m-d H:i:s'),
				);
			
			$update = $this->Common_model->updateAllResultWhere('m_division',array('id'=> $this->input->post('division_id')),$insData);
			redirect('division');
		}
		$this->load->view('common/footer');
	} 

	public function deleteDivision() 
	{
		$id= $this->uri->segment('3');
        $data['depInfo'] = $this->Common_model->updateAllResultWhere('m_division',array('id' =>$id),array('deleted'=>1)); 
		redirect('division');
	} 

	public function designation()
	{
		$this->load->view('common/header');
		$this->load->view('common/sidebar');
		$data['designation'] = $this->Common_model->getAllResultWhereOrderBy('m_designation',array('deleted'=>0),'id');
		$this->form_validation->set_rules('name','Name','required');
		if($this->form_validation->run()==false){
		$data['company_list'] = $this->Common_model->getAllResultWhereOrderBy('m_company',array('deleted'=>0,'user_id'=>$this->session->userdata('user_id'),'company_id'=>$this->session->userdata('company_id')),'id');
	    $this->load->view('pages/master/designation',$data);
		}else{
			$insData = array(
				'name'           => $this->input->post('name'),
				'company_id'     => $this->session->userdata('company_id'),
				'user_id'        => $this->session->userdata('user_id'),
				'common_id'      => time(),
				'updated_date'   => date('Y-m-d H:i:s'),
				'entry_date'     => date('Y-m-d H:i:s'),
			);
			$insert_id = $this->Common_model->insertAll('m_designation',$insData);
            redirect('designation');
			
			
		}
		$this->load->view('common/footer');
	}

	public function editDesignation() 
	{
		$this->load->view('common/header');
		$this->load->view('common/sidebar');
		$this->form_validation->set_rules('name','Name','required');
		if($this->form_validation->run()==false){
		$id= $this->uri->segment('3');
        $data['depInfo'] = $this->Common_model->getRowResultArray('m_designation',array('id' =>$id)); 
		$this->load->view('pages/master/editDesignation',$data);
		}else{
			$insData = array(
				'name'           => $this->input->post('name'),
				'updated_date'   => date('Y-m-d H:i:s'),
				);
			
			$update = $this->Common_model->updateAllResultWhere('m_designation',array('id'=> $this->input->post('des_id')),$insData);
			redirect('designation');
		}
		$this->load->view('common/footer');
	} 

	public function deleteDesignation() 
	{
		$id= $this->uri->segment('3');
        $data['depInfo'] = $this->Common_model->updateAllResultWhere('m_designation',array('id' =>$id),array('deleted'=>1)); 
		redirect('designation');
	} 

	public function course_category()
	{
		$this->load->view('common/header');
		$this->load->view('common/sidebar');
		$data['course_category'] = $this->Common_model->getAllResultWhereOrderBy('m_course_category',array('deleted'=>0),'id');
		$this->form_validation->set_rules('course_type','Course type','required');
		if($this->form_validation->run()==false){
		$data['company_list'] = $this->Common_model->getAllResultWhereOrderBy('m_company',array('deleted'=>0,'user_id'=>$this->session->userdata('user_id'),'company_id'=>$this->session->userdata('company_id')),'id');
	    $this->load->view('pages/master/course_category',$data);
		}else{
			$insData = array(
				'course_type'    => $this->input->post('course_type'),
				'created_by'     => $this->session->userdata('user_id'),
				'updated_by'     => $this->session->userdata('user_id'),
				'common_id'      => time(),
				'updated_date'   => date('Y-m-d H:i:s'),
				'created_date'   => date('Y-m-d H:i:s'),
				);
			$insert_id = $this->Common_model->insertAll('m_course_category',$insData);
			redirect('course-category');
		}
		$this->load->view('common/footer');
	}

	public function edit_course_category()
	{
		$this->load->view('common/header');
		$this->load->view('common/sidebar');
		$this->form_validation->set_rules('course_type','Course type','required');
		if($this->form_validation->run()==false){
			$id= $this->uri->segment('3');
        $data['depInfo'] = $this->Common_model->getRowResultArray('m_course_category',array('id' =>$id)); 
		$data['company_list'] = $this->Common_model->getAllResultWhereOrderBy('m_company',array('deleted'=>0,'user_id'=>$this->session->userdata('user_id'),'company_id'=>$this->session->userdata('company_id')),'id');
	    $this->load->view('pages/master/edit_course_category',$data);
		} else {
			$insData = array(
				'course_type'    => $this->input->post('course_type'),
				'created_by'     => $this->session->userdata('user_id'),
				'updated_by'     => $this->session->userdata('user_id'),
				'updated_date'   => date('Y-m-d H:i:s'),
				);
		$insert_id = $this->Common_model->updateAllResultWhere('m_course_category',array('id'=>$this->input->post('course_id')),$insData);
		redirect('course-category');
		}
		$this->load->view('common/footer');
	}

	
	public function deletecourse() 
  {
    $id= $this->uri->segment('3');
        $data['depInfo'] = $this->Common_model->updateAllResultWhere('m_course_category',array('id' =>$id),array('deleted'=>1)); 
    redirect('course-category');
  } 


	public function getCourse () {
      $course_module_list = $this->Common_model->getAllResultWhereOrderBy('m_course_module',array('deleted'=>0,'course_id'=>$this->input->post('courseCategoryCommonId')),'id');
      if($course_module_list) {
        echo json_encode($course_module_list);
      } else {
      	 $course_module_list = array();
      }
		
	}
}
