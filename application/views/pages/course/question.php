<div class="wrapper">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Question</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <a class="btn btn-block btn-info" id="flip"><b>+ Add Question</b></a>
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
                <h3 class="card-title">Add Question</h3>
              </div>

            <form method="post" action="<?php echo base_url('question');?>">
            <div class="card-body">
            <div class="row">
               <div class="col-md-4">
                <div class="form-group">
                  <label>Course Category<span style="color: red;"> *</span></label>
                  <select name="" class="form-control select2" onchange="getCourse(this.value)" id="courseCategory" style="width: 100%;">
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
                  <select name="course_id" class="form-control select2" onchange="getCourseModule(this.value)" id="courseId" style="width: 100%;">
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
                    <label for="exampleInputPassword1">Question<span style="color: red;"> *</span></label>
                    <div class="input-group mb-3">
                   <input type="text" name="question" class="form-control" placeholder="Enter question">
                </div>
              </div>
            </div>
              <!-- /.col -->
              <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputPassword1">Option1<span style="color: red;"> *</span></label>
                    <div class="input-group mb-3">
                   <input type="text" name="option1" class="form-control" placeholder="Enter Option1">
                </div>
              </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputPassword1">Option2<span style="color: red;"> *</span></label>
                    <div class="input-group mb-3">
                   <input type="text" name="option2" class="form-control" placeholder="Enter Option2">
                </div>
              </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputPassword1">Option3<span style="color: red;"> *</span></label>
                    <div class="input-group mb-3">
                   <input type="text" name="option3" class="form-control" placeholder="Enter Option3">
                </div>
              </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputPassword1">Option4<span style="color: red;"> *</span></label>
                    <div class="input-group mb-3">
                   <input type="text" name="option4" class="form-control" placeholder="Enter Option4">
                </div>
              </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                  <label>Answer<span style="color: red;"> *</span></label>
                  <select name="answer" class="form-control select2" style="width: 100%;">
                    <option selected="selected" value="">Select Answer</option>
                    <option value="option1">Option 1</option>
                    <option value="option2">Option 2</ption>
                    <option value="option3">Option 3</option>
                    <option value="option4">Option 4</option>
                   </select>
                </div> 
              </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputPassword1">Description<span style="color: red;"> *</span></label>
                    <div class="input-group mb-3">
                   <input type="text" name="description" class="form-control" placeholder="Enter Description">
                </div>
              </div>
            </div>

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
                <h3 class="card-title">Question List</h3>
              </div>
               <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr.No</th>
                    <th>Subject</th>
                    <th>Question</th>
                    <th>Action</th>
                  </tr>
                  </tr>
                  </thead>
                  <tbody>
                       <?php
                          $count = 1;
                         if($question){
                            foreach($question as $questionData) { 
                              $course_module = $this->Common_model->getRowResultArray('m_course_module',array('id'=>$questionData->course_module_id));
                             ?>
                         <tr>
                           <td><?php echo $count++;?></td>
                           <td><?php echo ucfirst($course_module->name);?></td>
                           <td><?php echo ucfirst($questionData->question);?></td>
                           <td><a href="<?php echo base_url('Course/edit_question?question_id=') ?><?php echo base64_encode($questionData->id);?>" class="btn-floating btn-sm blue-gradient" title="Edit">
                                  <i class="fa fa-edit"></i>            
                           </a>
                           <a href="<?php echo base_url('Course/deletequestion/') ?><?php echo $questionData->id;?>" class="btn-floating btn-sm blue-gradient" onclick="return confirm('Do you want to delete the record?')" title="Delete">
                                <i class="fa fa-times-circle" style="font-size:17px;color:red"></i>     
                           </a>
                        </td>
                  </tr>
                  <?php } } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Sr.No</th>
                    <th>Subject</th>
                    <th>Question</th>
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

