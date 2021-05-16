<div class="wrapper">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Course Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <a class="btn btn-block btn-info" id="flip"><b>+ Add Course Category</b></a>
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
                <h3 class="card-title">Edit Course Type</h3>
              </div>

            <form method="post" action="<?php echo base_url('Master/edit_course_category');?>">
            <div class="card-body">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputPassword1">Course Type<span style="color: red;"> *</span></label>
                    <div class="input-group mb-3">
                    	<input type="hidden" name="course_id" class="form-control" 
                   value="<?php echo $depInfo->id;?>">
                   <input type="text" name="course_type" class="form-control" placeholder="Enter Course Type" 
                   value="<?php echo $depInfo->course_type;?>">
                </div>
                <?php echo form_error('course_type');?>
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

