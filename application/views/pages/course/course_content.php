<div class="wrapper">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Course Content</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <a class="btn btn-block btn-info" id="flip"><b>+ Add Course Content</b></a>
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
                <h3 class="card-title">Add Course Content</h3>
              </div>

             <form method="post" action="<?php echo base_url('course-content');?>">
            <div class="card-body">
            <div class="row">
               <div class="col-md-4">
                <div class="form-group">
                  <label>Course Category<span style="color: red;"> *</span></label>
                  <select name="" required="" class="form-control select2" required="" onchange="getCourse(this.value)" id="courseCategory" style="width: 100%;">
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

              <div class="col-md-4">
               <div class="form-group">
                  <label>Course Module<span style="color: red;"> *</span></label>
                  <select name="course_module_id" class="form-control select2" id="courseModuleId" style="width: 100%;">
                    <option selected="selected" value="">Select Course Module</option>
                  </select>
                </div>
                <?php echo form_error('course_module_id');?>
            </div>


              <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputPassword1">Total Slides<span style="color: red;"> *</span></label>
                    <div class="input-group mb-3">
                   <input type="text" name="total_slide" class="form-control quantity" placeholder="5">
                </div>
              </div>
              <?php echo form_error('total_slide');?>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputPassword1">Total Allotted Time<span style="color: red;"> *</span></label>
                    <div class="input-group mb-3">
                   <input type="time" name="total_allotted_time" class="form-control" placeholder="09:00">
                </div>
              </div>
              <?php echo form_error('total_allotted_time');?>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputPassword1">Total Assessment Question<span style="color: red;"> *</span></label>
                    <div class="input-group mb-3">
                   <input type="text" name="total_assessment_question" class="form-control quantity" placeholder="1">
                </div>
              </div>
              <?php echo form_error('total_assessment_question');?>
            </div>
              <!-- /.col -->
              <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputPassword1">Minimum Passing Question<span style="color: red;"> *</span></label>
                    <div class="input-group mb-3">
                   <input type="text" name="min_pass_no" class="form-control" placeholder="Enter Minimum Passing Question">
                </div>
              </div>
              <?php echo form_error('min_pass_no');?>
            </div>

             </div>
                 <div class="">
                  <button type="submit" class="btn btn-primary">Save</button>
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
                <h3 class="card-title">Course List</h3>
              </div>
               <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr.No</th>
                    <th>Subject</th>
                    <th>Total Slides</th>
                    <th>Total Allotted Time</th>
                    <th>Total Assessment Question</th>
                    <th>Minimum Passing Question</th>
                    <th>Action</th>
                  </tr>
                  </tr>
                  </thead>
                   <tbody>
                       <?php
                          $count = 1;
                         if($course_contents){
                            foreach($course_contents as $coursecontentsData) { 
                              $course_module = $this->Common_model->getRowResultArray('m_course_module',array('id'=>$coursecontentsData->course_module_id));
                             ?>
                         <tr>
                           <td><?php echo $count++;?></td>
                           <td><?php echo ucfirst($course_module->name);?></td>
                           <td><?php echo ucfirst($coursecontentsData->total_slide);?></td>
                           <td><?php echo ucfirst($coursecontentsData->total_allotted_time);?></td>
                           <td><?php echo ucfirst($coursecontentsData->total_assessment_question);?></td>
                           <td><?php echo ucfirst($coursecontentsData->min_pass_no);?></td>
                           <td>
                 <a href="<?php echo base_url('Course/edit_course_content?course_content_id=') ?><?php echo base64_encode($coursecontentsData->id);?>" class="btn-floating btn-sm blue-gradient" title="Edit">
                                  <i class="fa fa-edit"></i>            
                           </a>
                           <a href="<?php echo base_url('Course/deletecourseContents/') ?><?php echo $coursecontentsData->id;?>" class="btn-floating btn-sm blue-gradient" onclick="return confirm('Do you want to delete the record?')" title="Delete">
                                <i class="fa fa-times-circle" style="font-size:17px;color:red"></i>     
                           </a>
                        </td>
                  </tr>
                  <?php } } ?>
                  </tbody>
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

