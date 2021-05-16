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
                <h3 class="card-title">Add Course Type</h3>
              </div>

            <form method="post" action="<?php echo base_url('course-category');?>">
            <div class="card-body">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputPassword1">Course Type<span style="color: red;"> *</span></label>
                    <div class="input-group mb-3">
                   <input type="text" name="course_type" class="form-control" placeholder="Enter Course Type">
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
              <!-- /.card-header -->
              <div class="card">
                <div class="card-header">
                <h3 class="card-title">Course Category List</h3>
              </div>
               <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr.No</th>
                    <th>Course Type</th>
                    <th>Action</th>
                  </tr>
                  </tr>
                  </thead>
                 <tbody>
                          <?php
                           $count = 1;
                           if($course_category){
                            foreach($course_category as $userData) { 
                           ?>
                           <tr>
                           <td><?php echo $count++;?></td>
                           <td><?php echo $userData->course_type;?></td>
                           <td><a href="<?php echo base_url('Master/edit_course_category/') ?><?php echo $userData->id;?>" class="btn-floating btn-sm blue-gradient" title="Edit">
                                  <i class="fa fa-edit"></i>            
                           </a>
                           <a href="<?php echo base_url('Master/deletecourse/') ?><?php echo $userData->id;?>" class="btn-floating btn-sm blue-gradient" onclick="return confirm('Do you want to delete the record?')" title="Delete">
                                <i class="fa fa-times-circle" style="font-size:17px;color:red"></i>     
                           </a>
                        </td>
                  </tr>
                  <?php } } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Sr.No</th>
                    <th>Course Type</th>
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

