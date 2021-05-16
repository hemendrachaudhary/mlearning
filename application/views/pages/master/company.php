<div class="wrapper">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Company Master</h1>
          </div>
          <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
              <a class="btn btn-block btn-info" id="flip"><b>+ Add Company</b></a>
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
                <h3 class="card-title">Add Company</h3>
              </div>
              <form method="post" action="<?php echo base_url('company');?>" enctype="multipart/form-data">
              <div class="card-body">
            <div class="row">
              <div class="col-md-4">
                 <div class="input-group">
                     <label for="inputEmail3">Company Id<span style="color: red;"> *</span></label>
                     <div class="input-group mb-3">
                     <input type="text" name="company_id" class="form-control" placeholder="Company Id" value="<?php echo $getmax->id;?>">
                </div>
                <?php echo form_error('company_id');?>
              </div>
            </div>

              <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputPassword1">Company Name<span style="color: red;"> *</span></label>
                    <div class="input-group mb-3">
                   <input type="text" name="name" class="form-control" placeholder="Company Name">
                </div>
                <?php echo form_error('name');?>
              </div>
            </div>
              
            <div class="col-md-4">
              <div class="form-group">
                    <label for="exampleInputPassword1">Company Address<span style="color: red;"> *</span></label>
                    <div class="input-group mb-3">
                   <input type="text" name="address_id" class="form-control" placeholder="Company Address">
                </div>
                <?php echo form_error('address_id');?>
              </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                   <div class="form-group">
                    <label for="exampleInputFile">Upload your image<span style="color: red;"> *</span></label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="logo_path" class="form-control" >
                      </div>
                      
                    </div>
                  </div>
                  <?php echo form_error('logo_path');?>
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
                <h3 class="card-title">Company Master List</h3>
              </div>
               <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr.No</th>
                    <th>Company Id</th>
                    <th>Company Name</th>
                    <th>Company Address</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                  </tr>
                  </thead>
                   <tbody>
                               <?php
                          $count = 1;
                         if($company){
                            foreach($company as $companyData) { 
                          ?>
                         <tr>
                           <td><?php echo $count++;?></td>
                           <td><?php echo $companyData->company_id;?></td>
                           <td><?php echo $companyData->name;?></td>
                           <td><?php echo $companyData->address_id;?></td>
                           <td><img src="<?php echo base_url('assest/images/company/');?><?php echo $companyData->logo_path;?>" width="100" heigh="100" /></td>
                            <td><a href="<?php echo base_url('Master/editCompany?company_id=') ?><?php echo base64_encode($companyData->id);?>" class="btn-floating btn-sm blue-gradient" title="Edit">
                                  <i class="fa fa-edit"></i>            
                           </a>
                           <a href="<?php echo base_url('Master/deleteCompany/') ?><?php echo $companyData->id;?>" class="btn-floating btn-sm blue-gradient" onclick="return confirm('Do you want to delete the record?')" title="Delete">
                           <i class="fa fa-times-circle" style="font-size:17px;color:red"></i>     
                           </a>
                        </td>
                  </tr>
                  <?php } } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Sr.No</th>
                    <th>Company Id</th>
                    <th>Company Name</th>
                    <th>Company Address</th>
                    <th>Image</th>
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

