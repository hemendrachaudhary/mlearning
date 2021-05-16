<div class="wrapper">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Show Upload Course Content</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <a class="btn btn-block btn-info" id="flip"><b>+ Show Upload Course Content</b></a>
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
                <h3 class="card-title">Show Upload Course</h3>
              </div>

              <div class="card-body">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Course Category<span style="color: red;"> *</span></label>
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">Select Course Category</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
               </div>
             </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label>Course <span style="color: red;"> *</span></label>
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">Select Course</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
               </div>
             </div>
              <!-- /.col -->
              <div class="col-md-4">
                <div class="form-group">
                  <label>Course Module<span style="color: red;"> *</span></label>
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">Select Course Module</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
               </div>
             </div>

                <!-- /.form-group -->
              </div>
                 <div class="">
                  <button type="submit" class="btn btn-primary">Show Upload</button>
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
                <h3 class="card-title">Show Upload Course Content List</h3>
              </div>
               <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr.No</th>
                    <th>Is Video/Image</th>
                    <th>Slide Video/Image</th>
                    <th>Slide Audio</th>
                    <th>Action</th>
                  </tr>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $i=1;
                      if($course_slide_upload) {
                         foreach ($course_slide_upload as $course_slide_upload_data) {
                     ?>
                  <tr>
                    <td><?php echo $i++;?></td>
                    <td>
                      <?php if($course_slide_upload_data->is_img_or_video == 1) { echo "Vedio"; } else { echo "Image"; }?></td>
                    <td>
                      <?php if($course_slide_upload_data->is_img_or_video == 1) { ?>
                      <video width="300" height="220" controls>
                      <source src="<?php echo base_url('assest/images/course_upload/video/');?><?php echo $course_slide_upload_data->slide_path; ?>" type="video/mp4">
                      <source src="<?php echo base_url('assest/images/course_upload/video/');?><?php echo $course_slide_upload_data->slide_path; ?>" type="video/ogg">
                    </video>
                  <?php } else { ?>
                    <img src="<?php echo base_url('assest/images/course_upload/video/');?><?php echo $course_slide_upload_data->slide_path; ?>"  width="300" height="220">
                  <?php } ?> 
                 </td>
                 <td> 
                  <audio controls>
                  <source src="<?php echo base_url('assest/images/course_upload/audio/');?><?php echo $course_slide_upload_data->audio_path; ?>" type="audio/ogg">
                  <source src="<?php echo base_url('assest/images/course_upload/audio/');?><?php echo $course_slide_upload_data->audio_path; ?>" type="audio/mpeg">
                </audio>
                 </td>
                    <td>
                    <a href="<?php echo base_url('Course/edit_course_content_upload?') ?>course_content_upload_id=
                      <?php echo base64_encode($course_slide_upload_data->id);?>" class="btn-floating btn-sm blue-gradient" title="Edit">
                        <i class="fa fa-edit"></i>            
                    </a>
                    <a href="<?php echo base_url('Course/deletecourseContentUpload/') ?><?php echo $course_slide_upload_data->id;?>" class="btn-floating btn-sm blue-gradient" onclick="return confirm('Do you want to delete the record?')" title="Delete">
                        <i class="fa fa-times-circle" style="font-size:17px;color:red"></i>     
                      </a>
                        
                    </td>
                  </tr>
                <?php } }?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Sr.No</th>
                    <th>Is Video/Image</th>
                    <th>Slide Video/Image</th>
                    <th>Slide Audio</th>
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

