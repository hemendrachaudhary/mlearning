<?php
class Course extends CI_Controller
{
	public function  __construct()
     {
     parent::__construct();
     $this->load->library('form_validation');
     $this->load->library('session');
     $this->load->database();
     $this->load->model('Common_model');
     $this->load->helper('form');
     $this->checkLogin();
     }

     public function checkLogin() {
     	if($this->session->userdata('role')=="") {
     		redirect('');
     	}

     }

	public function course_master()
	{
		$this->load->view('common/header');
		$this->load->view('common/sidebar');
        $data['course_master'] = $this->Common_model->getAllResultWhereOrderBy('m_course',array('deleted'=>0),'id');
	    $this->form_validation->set_rules('course_category_id','Course category','required');
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('short_desc','short Desc','required');
		$this->form_validation->set_rules('long_desc','Long Desc','required');
	    if($this->form_validation->run()==false){
		$data['course_category_list'] = $this->Common_model->getAllResultWhereOrderBy('m_course_category',array('deleted'=>0),'id');
				    	
		$this->load->view('pages/course/course_master',$data);
		} else {
        $course_image_path =  "";
        $config['upload_path']          = './assest/images/course';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        // $config['max_size']             = 450;
        // $config['max_width']            = 2024;
        // $config['max_height']           = 1568;
        $this->load->library('upload', $config);
        $config['file_name'] = $this->upload->data('file_name');
        if ( ! $this->upload->do_upload('course_image_path')) //important!
				{
				    // something went really wrong show error page
				    $error = $this->upload->display_errors(); //associate view variable $error with upload errors

				   echo $error;
				}
        $course_image_path = $this->upload->data('file_name');
	    $data = array(
				'course_category_id' => $this->input->post('course_category_id'),
				'name'               => $this->input->post('name'),
				'short_desc'         => $this->input->post('short_desc'),
				'long_desc'          => $this->input->post('long_desc'),
				'course_image_path'  => $course_image_path,
				'created_by'         => $this->session->userdata('user_id'),
				'updated_by'         => $this->session->userdata('user_id'),
				'common_id'          => time(),
				'is_compliance'      => $this->input->post('is_compliance'),
				'created_date'       => date('Y-m-d H:i:s'),
				'updated_date'       => date('Y-m-d H:i:s'),
				);
			$insert_id = $this->Common_model->insertAll('m_course',$data);
			redirect('course');
		}
		$this->load->view('common/footer');
	}


	public function edit_course_master()
	{
		$this->load->view('common/header');
		$this->load->view('common/sidebar');
        $this->form_validation->set_rules('course_category_id','Course category','required');
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('short_desc','short Desc','required');
		$this->form_validation->set_rules('long_desc','Long Desc','required');
	    if($this->form_validation->run()==false){
	     $course_id = base64_decode($this->input->get('course_id'));
        if($course_id) {
        $data['cource_info'] = $this->Common_model->getRowResultArray('m_course',array('deleted'=>0,'id'=>$course_id));
        } else {
        $data['cource_info'] = $this->Common_model->getRowResultArray('m_course',array('deleted'=>0,'id'=>$this->input->post('course_id')));
        
        }	
		$data['course_category_list'] = $this->Common_model->getAllResultWhereOrderBy('m_course_category',array('deleted'=>0),'id');
				    	
		$this->load->view('pages/course/edit_course_master',$data);
		}else{
        $course_image_path =  "";
        $config['upload_path']          = './assest/images/course';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        // $config['max_size']             = 450;
        // $config['max_width']            = 2024;
        // $config['max_height']           = 1568;
        $this->load->library('upload', $config);
        $config['file_name'] = $this->upload->data('file_name');
        if ( ! $this->upload->do_upload('course_image_path')) //important!
				{
				    // something went really wrong show error page
				    $error = $this->upload->display_errors(); //associate view variable $error with upload errors

				   echo $error;
				}
        $course_image_path = $this->upload->data('file_name');
	    $data = array(
				'course_category_id' => $this->input->post('course_category_id'),
				'name'               => $this->input->post('name'),
				'short_desc'         => $this->input->post('short_desc'),
				'long_desc'          => $this->input->post('long_desc'),
				'course_image_path'  => $course_image_path,
				'created_by'         => $this->session->userdata('user_id'),
				'updated_by'         => $this->session->userdata('user_id'),
				'is_compliance'      => $this->input->post('is_compliance'),
				'updated_date'       => date('Y-m-d H:i:s'),
				);
			$insert_id = $this->Common_model->updateAllResultWhere('m_course',array('deleted'=>0,'id'=>$this->input->post('course_id')),$data);
			redirect('course');
		}
		$this->load->view('common/footer');
	}

    


	public function deleteCourse() 
  {
    $id= $this->uri->segment('3');
        $data['depInfo'] = $this->Common_model->updateAllResultWhere('m_course',array('id' =>$id),array('deleted'=>1)); 
    redirect('course');
  } 

	public function course_module()
	{
		$this->load->view('common/header');
		$this->load->view('common/sidebar');
		$data['course_module']   = $this->Common_model->getAllResultWhereOrderBy('m_course_module',array('deleted'=>0),'id');
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('course_id','Course','required');
		$this->form_validation->set_rules('short_desc','short Desc','required');
		$this->form_validation->set_rules('long_desc','Long Desc','required');
	    if($this->form_validation->run()==false){
		$data['course_category_list'] = $this->Common_model->getAllResultWhereOrderBy('m_course_category',array('deleted'=>0),'id');
		$this->load->view('pages/course/course_module',$data);
		}else{
			$insData = array(
				'name'               => $this->input->post('name'),
				'course_id'          => $this->input->post('course_id'),
				'short_desc'         => $this->input->post('short_desc'),
				'long_desc'          => $this->input->post('long_desc'),
				'created_by'         => $this->session->userdata('user_id'),
				'updated_by'         => $this->session->userdata('user_id'),
				'common_id'          => time(),
				'created_date'       => date('Y-m-d H:i:s'),
				'updated_date'       => date('Y-m-d H:i:s'),
				);
			$insert_id = $this->Common_model->insertAll('m_course_module',$insData);
			redirect('course-module');
		}
		$this->load->view('common/footer');
	}

	public function edit_course_module()
	{
		$this->load->view('common/header');
		$this->load->view('common/sidebar');
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('course_id','Course','required');
		$this->form_validation->set_rules('short_desc','short Desc','required');
		$this->form_validation->set_rules('long_desc','Long Desc','required');
	    if($this->form_validation->run()==false){
	    $course_module_id = base64_decode($this->input->get('course_module_id'));
        if($course_module_id) {
        $data['course_module_info'] = $this->Common_model->getRowResultArray('m_course_module',array('deleted'=>0,'id'=>$course_module_id));
        } else{
          $data['course_module_info'] = $this->Common_model->getRowResultArray('m_course_module',array('deleted'=>0,'id'=>$this->input->post('course_module_id')));
        }	
		$data['course_category_list'] = $this->Common_model->getAllResultWhereOrderBy('m_course_category',array('deleted'=>0),'id');
		$this->load->view('pages/course/edit_course_module',$data);
		}else{
			
			$insData = array(
				'name'               => $this->input->post('name'),
				'course_id'          => $this->input->post('course_id'),
				'short_desc'         => $this->input->post('short_desc'),
				'long_desc'          => $this->input->post('long_desc'),
				'created_by'         => $this->session->userdata('user_id'),
				'updated_by'         => $this->session->userdata('user_id'),
				'updated_date'       => date('Y-m-d H:i:s'),
				);
			$insert_id = $this->Common_model->updateAllResultWhere('m_course_module',array('deleted'=>0,'userId'=>$this->input->post('course_module_id')),$insData);
			redirect('course-module');
		}
		$this->load->view('common/footer');
	}

	public function deleteCourseModule() 
  {
    $id= $this->uri->segment('3');
        $data['depInfo'] = $this->Common_model->updateAllResultWhere('m_course_module',array('id' =>$id),array('deleted'=>1)); 

    redirect('course-module');
  }



	public function question()
	{
		$this->load->view('common/header');
		$this->load->view('common/sidebar');
		$data['question']   = $this->Common_model->getAllResultWhereOrderBy('module_questions',array('deleted'=>0),'id');
		$this->form_validation->set_rules('question','question','required');
		$this->form_validation->set_rules('option1','option1','required');
		if($this->form_validation->run()==false){
		$data['course_category_list'] = $this->Common_model->getAllResultWhereOrderBy('m_course_category',array('deleted'=>0),'id');
		$this->load->view('pages/course/question',$data);
		}else{
			$insData = array(
				'question'         => $this->input->post('question'),
				'course_module_id' => $this->input->post('course_module_id'),
				'option1'          => $this->input->post('option1'),
				'option2'          => $this->input->post('option2'),
				'option3'          => $this->input->post('option3'),
				'option4'          => $this->input->post('option4'),
				'answer'           => $this->input->post('answer'),
				'description'      => $this->input->post('description'),
				'created_by'       => $this->session->userdata('user_id'),
				'updated_by'       => $this->session->userdata('user_id'),
				'common_id'        => time(),
				'created_date'     => date('Y-m-d H:i:s'),
				'updated_date'     => date('Y-m-d H:i:s'),
				);
			$insert_id = $this->Common_model->insertAll('module_questions',$insData);
			redirect('question');
		}
		$this->load->view('common/footer');
	}
	public function edit_question()
	{
		$this->load->view('common/header');
		$this->load->view('common/sidebar');
		$data['question']   = $this->Common_model->getAllResult('module_questions');
		$this->form_validation->set_rules('question','question','required');
		$this->form_validation->set_rules('option1','option1','required');
		if($this->form_validation->run()==false){
		$data['course_category_list'] = $this->Common_model->getAllResultWhereOrderBy('m_course_category',array('deleted'=>0),'id');
		$question_id = base64_decode($this->input->get('question_id'));
        if($question_id) {
		 $data['question_info'] = $this->Common_model->getRowResultArray('module_questions',array('deleted'=>0,'id'=>$question_id));
        } else{
          $data['question_info'] = $this->Common_model->getRowResultArray('module_questions',array('deleted'=>0,'id'=>$this->input->post('question_id')));
        }

		$this->load->view('pages/course/edit_question',$data);
		}else{
			$insData = array(
				'question'         => $this->input->post('question'),
				'course_module_id' => $this->input->post('course_module_id'),
				'option1'          => $this->input->post('option1'),
				'option2'          => $this->input->post('option2'),
				'option3'          => $this->input->post('option3'),
				'option4'          => $this->input->post('option4'),
				'answer'           => $this->input->post('answer'),
				'description'      => $this->input->post('description'),
				'created_by'       => $this->session->userdata('user_id'),
				'updated_by'       => $this->session->userdata('user_id'),
				'common_id'        => time(),
				'updated_date'     => date('Y-m-d H:i:s'),
				);
			$insert_id = $this->Common_model->updateAllResultWhere('module_questions',array('id'=>$this->input->post('question_id')),
				$insData);
			redirect('question');
		}
		$this->load->view('common/footer');
	}

    

	public function deletequestion() 
  {
    $id= $this->uri->segment('3');
        $data['depInfo'] = $this->Common_model->updateAllResultWhere('module_questions',array('id' =>$id),array('deleted'=>1)); 
    redirect('question');
  } 

	public function course_content()
	{
		$this->load->view('common/header');
		$this->load->view('common/sidebar');
		$data['course_contents']   = $this->Common_model->getAllResultWhereOrderBy('course_content',array('deleted'=>0),'id');
		$this->form_validation->set_rules('course_module_id','Course Module','required');
		$this->form_validation->set_rules('total_slide','Total Slides','required');
		$this->form_validation->set_rules('total_allotted_time','Total Allotted Time','required');
		$this->form_validation->set_rules('total_assessment_question','Total Assessment Question','required');
		$this->form_validation->set_rules('min_pass_no','Minimum Passing Question','required');
		if($this->form_validation->run()==false){
		$data['course_category_list'] = $this->Common_model->getAllResultWhereOrderBy('m_course_category',array('deleted'=>0),'id');
		$this->load->view('pages/course/course_content',$data);
		}else{
			$insData = array(
				'course_module_id'    => $this->input->post('course_module_id'),
				'total_slide'         => $this->input->post('total_slide'),
				'total_allotted_time' => date('H:i',strtotime($this->input->post('total_allotted_time'))),
				'total_assessment_question' => $this->input->post('total_assessment_question'),
				'min_pass_no'         => $this->input->post('min_pass_no'),
				'created_by'          => $this->session->userdata('user_id'),
				'updated_by'          => $this->session->userdata('user_id'),
				'created_date'        => date('Y-m-d H:i:s'),
				'updated_date'        => date('Y-m-d H:i:s'),
				);
			$insert_id = $this->Common_model->insertAll('course_content',$insData);
			redirect('course-content');
		}
		$this->load->view('common/footer');
	}

	public function edit_course_content()
	{
		$this->load->view('common/header');
		$this->load->view('common/sidebar');
		$data['course_contents']   = $this->Common_model->getAllResultWhereOrderBy('course_content',array('deleted'=>0),'id');
		$this->form_validation->set_rules('course_module_id','Course Module','required');
		$this->form_validation->set_rules('total_slide','Total Slides','required');
		$this->form_validation->set_rules('total_allotted_time','Total Allotted Time','required');
		$this->form_validation->set_rules('total_assessment_question','Total Assessment Question','required');
		$this->form_validation->set_rules('min_pass_no','Minimum Passing Question','required');
		if($this->form_validation->run()==false){
		$data['course_category_list'] = $this->Common_model->getAllResultWhereOrderBy('m_course_category',array('deleted'=>0),'id');
		$course_content_id = base64_decode($this->input->get('course_content_id'));
        if($course_content_id) {
		 $data['course_content_info'] = $this->Common_model->getRowResultArray('course_content',array('deleted'=>0,'id'=>$course_content_id));
        } else{
          $data['course_content_info'] = $this->Common_model->getRowResultArray('course_content',array('deleted'=>0,'id'=>$this->input->post('course_content_id')));
        }
		$this->load->view('pages/course/edit_course_content',$data);
		}else{
			$insData = array(
				'course_module_id'    => $this->input->post('course_module_id'),
				'total_slide'         => $this->input->post('total_slide'),
				'total_allotted_time' => date('H:i',strtotime($this->input->post('total_allotted_time'))),
				'total_assessment_question' => $this->input->post('total_assessment_question'),
				'min_pass_no'         => $this->input->post('min_pass_no'),
				'created_by'          => $this->session->userdata('user_id'),
				'updated_by'          => $this->session->userdata('user_id'),
				'updated_date'        => date('Y-m-d H:i:s'),
				);
			$insert_id = $this->Common_model->updateAllResultWhere('course_content',array('id'=>$this->input->post('course_content_id')),$insData);
			redirect('course-content');
		}
		$this->load->view('common/footer');
	}

	public function deletecourseContents() 
  {
    $id= $this->uri->segment('3');
        $data['depInfo'] = $this->Common_model->updateAllResultWhere('course_content',array('id' =>$id),array('deleted'=>1)); 

    redirect('course-module');
  } 

  
	public function course_content_upload()
	{
		$this->load->view('common/header');
		$this->load->view('common/sidebar');
		$data['course_category_list'] = $this->Common_model->getAllResultWhereOrderBy('m_course_category',array('deleted'=>0),'id');
		$this->form_validation->set_rules('course_module_id','Course Module','required');
		$this->form_validation->set_rules('isImgOrVideo','is Img Or Video','required');
		if($this->form_validation->run()==false){
		$data['course_category_list'] = $this->Common_model->getAllResultWhereOrderBy('m_course_category',array('deleted'=>0),'id');
				    	
		$this->load->view('pages/course/course_content_upload',$data);
		} else {
        $video =  "";
        $config['upload_path']          = './assest/images/course_upload/video';
        $config['allowed_types']        = '*';
        // $config['max_size']             = 450;
        // $config['max_width']            = 2024;
        // $config['max_height']           = 1568;
        $this->load->library('upload', $config);
        $config['file_name'] = $this->upload->data('file_name');
        if ( ! $this->upload->do_upload('video')) //important!
				{
				    // something went really wrong show error page
				    $error = $this->upload->display_errors(); //associate view variable $error with upload errors

				   echo $error;
				}
        $video = $this->upload->data('file_name');

        $audio =  "";
        $config['upload_path']          = './assest/images/course_upload/audio';
        $config['allowed_types']        = '*';
        // $config['max_size']             = 450;
        // $config['max_width']            = 2024;
        // $config['max_height']           = 1568;
        $this->load->library('upload', $config);
        $config['file_name'] = $this->upload->data('file_name');
        if ( ! $this->upload->do_upload('audio')) //important!
				{
				    // something went really wrong show error page
				    $error = $this->upload->display_errors(); //associate view variable $error with upload errors

				   echo $error;
				}
        $audio = $this->upload->data('file_name');


	    $data = array(
				'course_module_id'   => $this->input->post('course_module_id'),
				'slide_path'         => $video,
				'audio_path'         => $audio,
				'is_img_or_video'    => $this->input->post('isImgOrVideo'),
				'created_by'         => $this->session->userdata('user_id'),
				'updated_by'         => $this->session->userdata('user_id'),
				'created_date'       => date('Y-m-d H:i:s'),
				'updated_date'       => date('Y-m-d H:i:s'),
				);
			$insert_id = $this->Common_model->insertAll('course_slide_upload',$data);
			
			redirect('view-content');
		}
		$this->load->view('pages/course/course_content_upload',$data);
		$this->load->view('common/footer');
	}

    public function edit_course_content_upload()
	{
		$this->load->view('common/header');
		$this->load->view('common/sidebar');
		$data['course_category_list'] = $this->Common_model->getAllResultWhereOrderBy('m_course_category',array('deleted'=>0),'id');
		$this->form_validation->set_rules('course_module_id','Course Module','required');
		$this->form_validation->set_rules('isImgOrVideo','is Img Or Video','required');
		if($this->form_validation->run()==false){
		$course_content_upload_id = base64_decode($this->input->get('course_content_upload_id'));
        if($course_content_upload_id) {
        $data['course_content_upload_info'] = $this->Common_model->getRowResultArray('course_slide_upload',array('deleted'=>0,'id'=>$course_content_upload_id));
        } else{
        $data['course_content_upload_info'] = $this->Common_model->getRowResultArray('course_slide_upload',array('deleted'=>0,'id'=>$this->input->post('course_content_upload_id')));
        }	
		$data['course_category_list'] = $this->Common_model->getAllResultWhereOrderBy('m_course_category',array('deleted'=>0),'id');
				    	
		$this->load->view('pages/course/edit_course_content_upload',$data);
		} else {
        $video =  "";
        $config['upload_path']          = './assest/images/course_upload/video';
        $config['allowed_types']        = '*';
        // $config['max_size']             = 450;
        // $config['max_width']            = 2024;
        // $config['max_height']           = 1568;
        $this->load->library('upload', $config);
        $config['file_name'] = $this->upload->data('file_name');
        if ( ! $this->upload->do_upload('video')) //important!
				{
				    // something went really wrong show error page
				    $error = $this->upload->display_errors(); //associate view variable $error with upload errors

				   echo $error;
				}
        $video = $this->upload->data('file_name');

        $audio =  "";
        $config['upload_path']          = './assest/images/course_upload/audio';
        $config['allowed_types']        = '*';
        // $config['max_size']             = 450;
        // $config['max_width']            = 2024;
        // $config['max_height']           = 1568;
        $this->load->library('upload', $config);
        $config['file_name'] = $this->upload->data('file_name');
        if ( ! $this->upload->do_upload('audio')) //important!
				{
				    // something went really wrong show error page
				    $error = $this->upload->display_errors(); //associate view variable $error with upload errors

				   echo $error;
				}
        $audio = $this->upload->data('file_name');


	    $data = array(
				'course_module_id'   => $this->input->post('course_module_id'),
				'slide_path'         => $video,
				'audio_path'         => $audio,
				'is_img_or_video'    => $this->input->post('isImgOrVideo'),
				'created_by'         => $this->session->userdata('user_id'),
				'updated_by'         => $this->session->userdata('user_id'),
				'created_date'       => date('Y-m-d H:i:s'),
				'updated_date'       => date('Y-m-d H:i:s'),
				);
			$insert_id = $this->Common_model->updateAllResultWhere('course_slide_upload',array('id'=>$this->input->post('course_content_upload_id')),$data);
			
			redirect('view-content');
		}
		$this->load->view('pages/course/course_content_upload',$data);
		$this->load->view('common/footer');
	}
   

    public function deletecourseContentUpload() 
   {
    $id= $this->uri->segment('3');
        $data['depInfo'] = $this->Common_model->updateAllResultWhere('course_slide_upload',array('id' =>$id),array('deleted'=>1)); 

    redirect('view-content');
   } 


	public function view_content()
	{
		$this->load->view('common/header');
		$this->load->view('common/sidebar');
		$data['course_slide_upload'] = $this->Common_model->getAllResultWhereOrderBy('course_slide_upload',array('deleted'=>0),'id');
		$this->load->view('pages/course/view_content',$data);
		$this->load->view('common/footer');
	}


	public function course_assign()
	{
		$this->load->view('common/header');
		$this->load->view('common/sidebar');
		$data['courseassign'] = $this->Common_model->getAllResultWhereOrderBy('m_course_assign',array('deleted'=>0),'id');
		$this->form_validation->set_rules('dept_id','Department','required');
		$this->form_validation->set_rules('company_id','Company','required');
		$this->form_validation->set_rules('office_id','Office','required');
		$this->form_validation->set_rules('division_id','Division','required');
		$this->form_validation->set_rules('course_id','course','required');
		if($this->form_validation->run()==false){
		$data['manager_list'] = $this->Common_model->getAllResultWhereOrderBy('user_new',array('is_manager'=>1,'deleted'=>0,'company_id'=>$this->session->userdata('company_id'),'role'=>'User'),
          'userId');
		$data['company_list'] = $this->Common_model->getAllResultWhereOrderBy('m_company',array('deleted'=>0,'user_id'=>$this->session->userdata('user_id')),'id');
		$data['course_category_list'] = $this->Common_model->getAllResultWhereOrderBy('m_course_category',array('deleted'=>0),'id');
	    $this->load->view('pages/course/course_assign',$data);
		} else{
			  
               $userarray = $this->input->post('user_id');
               $user_ids = implode(',',$userarray);
               $completion_date = $this->input->post('completion_date');
        		$insData = array(
				'dept_id '        => $this->input->post('dept_id'),
				'company_id'      => $this->input->post('company_id'),
				'office_id'       => $this->input->post('office_id'),
				'division_id'     => $this->input->post('division_id'),
				'course_id'       => $this->input->post('course_id'),
				'completion_date' => $completion_date,
				'user_ids'        => $user_ids,
				'created_by'      => $this->session->userdata('user_id'),
				'updated_by'      => $this->session->userdata('user_id'),
				'common_id'       => time(),
				'updated_date'    => date('Y-m-d H:i:s'),
				'created_date'    => date('Y-m-d H:i:s'),
				);
			$insert_id = $this->Common_model->insertAll('m_course_assign',$insData);
			if($insert_id) {
			$courseInfo = $this->Common_model->getRowResultArray('m_course',array('deleted'=>0,'id'=>$this->input->post('course_id')));
            $companyInfo = $this->Common_model->getRowResultArray('m_company',array('deleted'=>0,'id'=>$this->input->post('company_id')));
            $departmentInfo = $this->Common_model->getRowResultArray('m_department',array('deleted'=>0,'id'=>$this->input->post('dept_id')));
            $officeInfo = $this->Common_model->getRowResultArray('m_office',array('deleted'=>0,'id'=>$this->input->post('office_id')));
           $divisionInfo = $this->Common_model->getRowResultArray('m_division',array('deleted'=>0,'id'=>$this->input->post('division_id')));
            
				for ($i=0; $i < count($userarray); $i++) {

                    
                    $userInfo = $this->Common_model->getRowResultArray('user_new',array('deleted'=>0,'userId'=>$userarray[$i]));
					$userEmail = $userInfo->email;
					$name = $userInfo->first_name;

					$msg = "Hello $name,<br> Comapny :- $companyInfo->name <br>Office :- $officeInfo->name <br> Departmrnt :- 
					$departmentInfo->dept_name <br> Division :- $divisionInfo->name <br> Office :- $officeInfo->name <br> course :- 
					$courseInfo->name <br> Completion Date :- $completion_date";
					$this->Common_model->send_email($userEmail,'Assign course',$msg);
				}
			}
			redirect('course-assign');
		}
       $this->load->view('common/footer');
	}
    
    public function edit_course_assign()
	{
		$this->load->view('common/header');
		$this->load->view('common/sidebar');
		$data['courseassign'] = $this->Common_model->getAllResultWhereOrderBy('m_course_assign',array('deleted'=>0),'id');
		$this->form_validation->set_rules('dept_id','Department','required');
		$this->form_validation->set_rules('company_id','Company','required');
		$this->form_validation->set_rules('office_id','Office','required');
		$this->form_validation->set_rules('division_id','Division','required');
		$this->form_validation->set_rules('course_id','course','required');
		if($this->form_validation->run()==false){
        
        $course_assign_id = base64_decode($this->input->get('course_assign_id'));

        if($course_assign_id) {
        $data['course_assign_info'] = $this->Common_model->getRowResultArray('m_course_assign',array('deleted'=>0,'id'=>
        	$course_assign_id));
        } else {
        $data['course_assign_info'] = $this->Common_model->getRowResultArray('m_course_assign',array('deleted'=>0,'id'=>$this->input->post('course_assign_id')));
        }	
		

		$data['manager_list'] = $this->Common_model->getAllResultWhereOrderBy('user_new',array('is_manager'=>1,'deleted'=>0,'company_id'=>$this->session->userdata('company_id'),'role'=>'User'),
          'userId');
		$data['company_list'] = $this->Common_model->getAllResultWhereOrderBy('m_company',array('deleted'=>0,'user_id'=>$this->session->userdata('user_id')),'id');
		$data['course_category_list'] = $this->Common_model->getAllResultWhereOrderBy('m_course_category',array('deleted'=>0),'id');
	    $this->load->view('pages/course/edit_course_assign',$data);

		} else{
			  
               $userarray = $this->input->post('user_id');
               $user_ids = implode(',',$userarray);
               $completion_date = $this->input->post('completion_date');
        		$insData = array(
				'dept_id '        => $this->input->post('dept_id'),
				'company_id'      => $this->input->post('company_id'),
				'office_id'       => $this->input->post('office_id'),
				'division_id'     => $this->input->post('division_id'),
				'course_id'       => $this->input->post('course_id'),
				'completion_date' => $completion_date,
				'user_ids'        => $user_ids,
				'created_by'      => $this->session->userdata('user_id'),
				'updated_by'      => $this->session->userdata('user_id'),
				'common_id'       => time(),
				'updated_date'    => date('Y-m-d H:i:s'),
				'created_date'    => date('Y-m-d H:i:s'),
				);
			$insert_id = $this->Common_model->updateAllResultWhere('m_course_assign',array('id'=>$this->input->post('course_assign_id')),
				$insData);
			if($insert_id) {
			$courseInfo = $this->Common_model->getRowResultArray('m_course',array('deleted'=>0,'id'=>$this->input->post('course_id')));
            $companyInfo = $this->Common_model->getRowResultArray('m_company',array('deleted'=>0,'id'=>$this->input->post('company_id')));
            $departmentInfo = $this->Common_model->getRowResultArray('m_department',array('deleted'=>0,'id'=>$this->input->post('dept_id')));
            $officeInfo = $this->Common_model->getRowResultArray('m_office',array('deleted'=>0,'id'=>$this->input->post('office_id')));
            $divisionInfo = $this->Common_model->getRowResultArray('m_division',array('deleted'=>0,'id'=>$this->input->post('division_id')));
            
				for ($i=0; $i < count($userarray); $i++) {

                    
                    $userInfo = $this->Common_model->getRowResultArray('user_new',array('deleted'=>0,'userId'=>$userarray[$i]));

					$userEmail = $userInfo->email;
					$name = $userInfo->first_name;

					$msg = "Hello $name,<br> Comapny :- $companyInfo->name <br>Office :- $officeInfo->name <br> Departmrnt :- 
					$departmentInfo->dept_name <br> Division :- $divisionInfo->name <br> Office :- $officeInfo->name <br> course :- 
					$courseInfo->name <br> Completion Date :- $completion_date";
					$this->Common_model->send_email($userEmail,'Assign course',$msg);
				}
			}
			redirect('course-assign');
		}
       $this->load->view('common/footer');
	}

	public function deleteCourseAssign() 
    {
    $id= $this->uri->segment('3');
        $data['depInfo'] = $this->Common_model->updateAllResultWhere('m_course_assign',array('id' =>$id),array('deleted'=>1)); 
    redirect('course-assign');
    } 


	  public function getCourse () {
      $course_list = $this->Common_model->getAllResultWhereOrderBy('m_course',array('deleted'=>0,'course_category_id'=>$this->input->post('courseCategoryCommonId')),'id');
      if($course_list) {
        echo json_encode($course_list);
      } else {
      	 $course_list = array();
      }
		
	}
	public function getCourseModule () {
    $coursemodule_list = $this->Common_model->getAllResultWhereOrderBy('m_course_module',array('deleted'=>0,'course_id'=>$this->input->post('courseCommonId')),'id');
      if($coursemodule_list) {
        echo json_encode($coursemodule_list);
      } else {
      	 $coursemodule_list = array();
      }
		
	}

	
}	