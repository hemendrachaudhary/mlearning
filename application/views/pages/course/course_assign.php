<div class="wrapper">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Course Assign</h1>
          </div>
          <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
              <a class="btn btn-block btn-info" id="flip"><b>+ Add Course Assign</b></a>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12" id="panel">
           <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Course Assign</h3>
              </div>

            <form method="post" action="<?php echo base_url('course-assign');?>">
            <div class="card-body">
            <div class="row">
               <div class="col-md-4">
                <div class="form-group">
                  <label>Course Category<span style="color: red;"> *</span></label>
                  <select name="" required="" class="form-control select2" onchange="getCourse(this.value)" id="courseCategory" style="width: 100%;">
                    <option selected="selected" value="">Select Course Category</option>
                          <?php
                          $count = 1;
                         if($course_category_list){
                            foreach($course_category_list as $courseData) { 
                          ?>
                    <option value="<?php echo $courseData->id;?>"><?php echo ucfirst($courseData->course_type);?></option>
                    <?php } } ?>
                    </select>
               </div>
               <?php echo form_error('');?>
            </div>

              <div class="col-md-4">
               <div class="form-group">
                  <label>Course<span style="color: red;"> *</span></label>
                  <select name="course_id" required="" class="form-control select2" onchange="getCourseModule(this.value)" id="courseId" style="width: 100%;">
                    <option selected="selected" value="">Select Course</option>
                  </select>
                </div>
                <?php echo form_error('course_id');?>
            </div>
              <!-- /.col -->
              <div class="col-md-4">
                <div class="form-group">
                  <label>Company<span style="color: red;"> *</span></label>
                  <select name="company_id" class="form-control select2" id="companyId" onchange="getOfficeList(this.value);" style="width: 100%;">
                    <option selected="selected" value="">Select Company</option>
                          <?php
                          $count = 1;
                         if($company_list){
                            foreach($company_list as $companyData) { 
                          ?>
                    <option value="<?php echo $companyData->id;?>"><?php echo ucfirst($companyData->name);?></option>
                    <?php } } ?>
                    </select>
               </div>
               <?php echo form_error('company_id');?>
            </div>

             <div class="col-md-4">
               <div class="form-group">
                  <label>Office<span style="color: red;"> *</span></label>
                  <select name="office_id" class="form-control select2" id="officeId" onchange="getDeptList(this.value);" style="width: 100%;">
                    <option selected="selected" value="">Select Office</option>
                  </select>
                </div>
                <?php echo form_error('office_id');?>
            </div>

             <div class="col-md-4">
                 <div class="form-group">
                  <label>Department<span style="color: red;"> *</span></label>
                  <select name="dept_id" class="form-control select2" id="deptId" onchange="getDivisionList(this.value);" style="width: 100%;">
                    <option selected="selected" value="">Select Department</option>
                   
                  </select>
                </div>
                <?php echo form_error('dept_id');?>
              </div>

            <div class="col-md-4">
                 <div class="form-group">
                  <label>Division<span style="color: red;"> *</span></label>
                  <select name="division_id" class="form-control select2" id="divisionId" style="width: 100%;">
                     <option selected="selected" value="">Select Division</option>
                  </select>
                </div>
                <?php echo form_error('division_id');?>
              </div>
             
             <div class="col-md-4">
                 <div class="form-group">
                  <label>User <small>(Select single or multiple)</small><span style="color: red;"> *</span></label>
                  <select name="user_id[]" required="" class="select2" multiple="multiple"  style="width: 100%;">
                     <option selected="selected" value="">Select User</option>
                    <?php
                        $count =1;
                        if($manager_list){
                          foreach($manager_list as $managerData){
                    ?>
                    <option value="<?php echo $managerData->userId;?>"><?php echo ucfirst($managerData->first_name.' '.$managerData->middle_name.' '.$managerData->last_name);?></option>
                  <?php } } ?>
                  </select>
                </div>
                
              </div>
             
             <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputPassword1">Completion Date<span style="color: red;"> *</span></label>
                    <div class="input-group mb-3">
                   <input type="date" name="completion_date" class="form-control" placeholder="Choose a Date">
                </div>
              </div>
            </div>

             <!-- /.form-group -->
              </div>
                  <div class=""><br>
                  <input type="submit" class="btn btn-primary pull-right" value="Add">
                   </div>
                  </div>
                 </div>
                <!-- /.card-body -->
             </form>
            </div>
          </div>
              <!-- /.card-header -->
              <div class="card">
                <div class="card-header">
                <h3 class="card-title">Course Assign List</h3>
              </div>
               <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr.No</th>
                    <th>Company</th>
                    <th>Office</th>
                    <!-- <th>Department</th> -->
                    <th>Division</th>
                    <th>Course</th>
                    <th>Users</th>
                    <th>Completion Date</th>
                    <th>Action</th>
                  </tr>
                  </tr>
                  </thead>
                  <tbody>
                       <?php
                          $count = 1;
                         if($courseassign){
                            foreach($courseassign as $courseassignData) { 
                          $userArray = explode(',',$courseassignData->user_ids);
                          $companyData = $this->Common_model->getRowResultArray('m_company',array('id'=>$courseassignData->company_id));
                          $officeData = $this->Common_model->getRowResultArray('m_office',array('id'=>$courseassignData->office_id));
                          $departmentData = $this->Common_model->getRowResultArray('m_department',array('id'=>$courseassignData->dept_id));
                          $divisionData = $this->Common_model->getRowResultArray('m_division',array('id'=>$courseassignData->division_id));
                          $courseData = $this->Common_model->getRowResultArray('m_course',array('id'=>$courseassignData->course_id));
                          $userData = $this->Common_model->getDataWhereIn('user_new',$userArray,'userId');
                          $user_name = "";
                          if($userData){
                            foreach ($userData as  $userInfo) {
                             $user_name = $userInfo->first_name .','. $user_name;
                            }
                          }
                          ?>
                         <tr>
                           <td><?php echo $count++;?></td>
                           <td><?php echo ucfirst($companyData->name);?></td>
                           <td><?php echo ucfirst($officeData->name);?></td>
                           <!-- <td><?php echo ucfirst($departmentData->dept_name);?></td> -->
                           <td><?php echo ucfirst($divisionData->name);?></td>
                           <td><?php echo ucfirst($courseData->name);?></td>
                           <td><?php echo ucfirst(rtrim($user_name,','));?></td>
                           <td><?php echo date('d-m-Y',strtotime($courseassignData->completion_date));?></td>
                           <td>
                            <a href="<?php echo base_url('Course/edit_course_assign?course_assign_id=')?><?php echo base64_encode($courseassignData->id);?>" class="btn-floating btn-sm blue-gradient" title="Edit">
                            <i class="fa fa-edit"></i>            
                           </a>
                           <a href="<?php echo base_url('Course/deleteCourseAssign/') ?><?php echo $courseassignData->id;?>" class="btn-floating btn-sm blue-gradient" onclick="return confirm('Do you want to delete the record?')" title="Delete">
                           <i class="fa fa-times-circle" style="font-size:17px;color:red"></i>     
                           </a>
                        </td>
                  </tr>
                  <?php } } ?>
                
                </table>
              </div>
            </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  </div>
<!-- ./wrapper -->

