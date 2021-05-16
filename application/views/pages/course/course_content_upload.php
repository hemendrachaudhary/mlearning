<div class="wrapper">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Course Content Upload</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Course Content Upload</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Course Content Upload</h3>
              </div>
           <form method="post" action="<?php echo base_url('course-content-upload');?>" enctype="multipart/form-data">
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
              <span>Slide Video/Image</span><br>
              <input id="radioVedio" name="isImgOrVideo" type="radio" value="1">
              Video &nbsp;&nbsp;
              <input id="radioImage" name="isImgOrVideo" type="radio" value="0">
              Image
            </div>

             

             <div class="col-md-4">
                <div class="form-group">
                   <div class="form-group">
                    <label for="exampleInputFile">Slide Video/Image<span style="color: red;"> *</span></label>
                    <div class="input-group">
                      <div class="custom-file">
                         <input type="file" name="video" accept="video/*,image/*,pdf/*"  class="form-control" id="exampleInputFile">
                      </div>
                      
                    </div>
                  </div>
                  
                </div>
              </div>
              
              <div class="col-md-4">
                <div class="form-group">
                   <div class="form-group">
                    <label for="exampleInputFile">Slide Audio<span style="color: red;"> *</span></label>
                    <div class="input-group">
                      <div class="custom-file">
                         <input type="file" name="audio" accept="audio/*"  class="form-control">
                      </div>
                      
                    </div>
                  </div>
                  
                </div>
              </div>
                <!-- /.form-group -->
              </div>
                 <div class="">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
                  </div>
                </form>  
                 </div>
                <!-- /.card-body -->
             </form>
            </div>
          </div>
              <!-- /.card-header -->
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

