<div class="wrapper">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Course Master</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <a href="<?php echo base_url('course');?>"class="btn btn-block btn-info" id="flip"><b>+ Add Course Master</b></a>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12" id="panel" style="display: block;">
           <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Course</h3>
              </div>

           <form method="post" action="<?php echo base_url('Course/edit_course_master');?>" enctype="multipart/form-data">
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
                    <option value="<?php echo $courseData->id;?>" <?php if($courseData->id == $cource_info->course_category_id){ echo "selected";}?>><?php echo ucfirst($courseData->course_type);?></option>
                    <?php } } ?>
                    </select>
               </div>
               <?php echo form_error('course_category_id');?>
            </div>

              <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputPassword1">Name<span style="color: red;"> *</span></label>
                    <div class="input-group mb-3">
                   <input type="hidden" name="course_id" class="form-control" value="<?php echo $cource_info->id;?>">
                   <input type="text" name="name" class="form-control" placeholder="Enter Name" value="<?php echo $cource_info->name;?>">
                </div>
                 <?php echo form_error('name');?>
              </div>
            </div>
              <!-- /.col -->
              <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputPassword1">Short Description<span style="color: red;"> *</span></label>
                    <div class="input-group mb-3">
                   <input type="text" name="short_desc" class="form-control" placeholder="Enter Short Description" value="<?php echo $cource_info->short_desc;?>">
                </div>
                 <?php echo form_error('short_desc');?>
              </div>
            </div>

             <div class="col-md-12">
                <div class="form-group">
                    <label for="exampleInputPassword1">Long Description<span style="color: red;"> *</span></label>
                    <div class="input-group mb-3">
                   <textarea name="long_desc" type="text" class="md-textarea form-control" rows="1" placeholder="Enter Long Description">
                   	<?php echo $cource_info->long_desc;?>
                   </textarea>
                   </div>
                    <?php echo form_error('long_desc');?>
              </div>
            </div>
              
              <div class="col-md-4">
                
                   <div class="form-group">
                    <label for="exampleInputFile">Upload your image<span style="color: red;"> *</span></label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="course_image_path" class="form-control" >
                      </div>
                      
                    </div>
                
                  <?php echo form_error('course_image_path');?>
                </div>
              </div>
                <!-- /.form-group -->

              </div>
              <div class="col-md-4">
                
                <div class="form-check">
                      <input type="checkbox" name="is_compliance" <?php if($cource_info->is_compliance==1) {echo "checked";}?> class="form-check-input" id="exampleCheck2">
                      <label class="form-check-label" for="exampleCheck2">Is Compliance</label>
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

