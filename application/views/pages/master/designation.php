<div class="wrapper">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Designation Master</h1>
          </div>
          <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
              <a class="btn btn-block btn-info" id="flip"><b>+ Add Designation</b></a>
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
                <h3 class="card-title">Add Designation</h3>
              </div>

            <form method="post" action="<?php echo base_url('designation');?>">
            <div class="card-body">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputPassword1">Designation Name<span style="color: red;"> *</span></label>
                    <div class="input-group mb-3">
                   <input type="text" name="name" class="form-control" placeholder="Enter Designation Name">
                </div>
                <?php echo form_error('name');?>
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
                <h3 class="card-title">Designation Master List</h3>
              </div>
               <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr.No</th>
                    <th>Designation Name</th>
                    <th>Action</th>
                  </tr>
                  </tr>
                  </thead>
                   <tbody>
                          <?php
                           $count = 1;
                           if($designation){
                            foreach($designation as $userData) { 
                           ?>
                           <tr>
                           <td><?php echo $count++;?></td>
                           <td><?php echo $userData->name;?></td>
                            <td><a href="<?php echo base_url('Master/editDesignation/') ?><?php echo $userData->id;?>" class="btn-floating btn-sm blue-gradient" title="Edit">
                                  <i class="fa fa-edit"></i>            
                           </a>
                           <a href="<?php echo base_url('Master/deleteDesignation/') ?><?php echo $userData->id;?>" class="btn-floating btn-sm blue-gradient" onclick="return confirm('Do you want to delete the record?')" title="Delete">
                                <i class="fa fa-times-circle" style="font-size:17px;color:red"></i>     
                           </a>
                        </td>
                  </tr>
                  <?php } } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Sr.No</th>
                    <th>Designation Name</th>
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

