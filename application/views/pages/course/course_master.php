<div class="wrapper">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Course Master</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <a class="btn btn-block btn-info" id="flip"><b>+ Add Course Master</b></a>
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
                <h3 class="card-title">Add Course</h3>
              </div>

           <form method="post" action="<?php echo base_url('course');?>" enctype="multipart/form-data">
           <div class="card-body">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Course Category<span style="color: red;"> *</span></label>
                  <select name="course_category_id" class="form-control select2" id="courseCategoryCommonId" style="width: 100%;">
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
               <?php echo form_error('course_category_id');?>
            </div>

              <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputPassword1">Name<span style="color: red;"> *</span></label>
                    <div class="input-group mb-3">
                   <input type="text" name="name" class="form-control" placeholder="Enter Name">
                </div>
                 <?php echo form_error('name');?>
              </div>
            </div>
              <!-- /.col -->
              <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputPassword1">Short Description<span style="color: red;"> *</span></label>
                    <div class="input-group mb-3">
                   <input type="text" name="short_desc" class="form-control" placeholder="Enter Short Description">
                </div>
                 <?php echo form_error('short_desc');?>
              </div>
            </div>

             <div class="col-md-12">
                <div class="form-group">
                    <label for="exampleInputPassword1">Long Description<span style="color: red;"> *</span></label>
                    <div class="input-group mb-3">
          <textarea name="long_desc" type="text" class="md-textarea form-control" rows="1" placeholder="Enter Long Description"></textarea>
                   </div>
                    <?php echo form_error('long_desc');?>
              </div>
            </div>
              
              <div class="col-md-4">
                <div class="form-group">
                   <div class="form-group">
                    <label for="exampleInputFile">Upload your image<span style="color: red;"> *</span></label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="course_image_path" class="form-control" >
                      </div>
                      
                    </div>
                  </div>
                  <?php echo form_error('course_image_path');?>
                </div>
              </div>
                <!-- /.form-group -->
              </div>
                 <div class="form-check">
                      <input type="checkbox" name="is_compliance" value="1" class="form-check-input" id="exampleCheck2">
                      <label class="form-check-label" for="exampleCheck2">Is Compliance</label>
                  </div>
                <div class="">
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
                <h3 class="card-title">Course List</h3>
              </div>
               <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr.No</th>
                    <th>Course Category</th>
                    <th>Course</th>
                    <th>Action</th>
                  </tr>
                  </tr>
                  </thead>
                 <tbody>
                        <?php
                          $count = 1;
                         if($course_master){
                            foreach($course_master as $course_category_Data) { 
                              $userData = $this->Common_model->getRowResultArray('m_course_category',array('id'=>$course_category_Data->course_category_id));
                              
                          ?>
                         <tr>
                           <td><?php echo $count++;?></td>
                           <td><?php echo ucfirst($userData->course_type);?></td>
                           <td><?php echo ucfirst($course_category_Data->name);?></td>
                           <td><a href="<?php echo base_url('Course/edit_course_master?course_id=') ?><?php echo base64_encode($course_category_Data->id);?>" class="btn-floating btn-sm blue-gradient" title="Edit">
                                  <i class="fa fa-edit"></i>            
                           </a>
                           <a href="<?php echo base_url('Course/deleteCourse/') ?><?php echo $course_category_Data->id;?>" class="btn-floating btn-sm blue-gradient" onclick="return confirm('Do you want to delete the record?')" title="Delete">
                                <i class="fa fa-times-circle" style="font-size:17px;color:red"></i>     
                           </a>
                        </td>
                  </tr>
                  <?php } } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Sr.No</th>
                    <th>Course Category</th>
                    <th>Course</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
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

