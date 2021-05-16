<div class="wrapper">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Department Master</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <a class="btn btn-block btn-info" id="flip"><b>+ Add Department</b></a>
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
                <h3 class="card-title">Add Department</h3>
              </div>
          <form method="post" action="<?php echo base_url('department');?>">
          <div class="card-body">
            <div class="row">
               <div class="col-md-4">
                <div class="form-group">
                  <label>Company<span style="color: red;"> *</span></label>
                  <select name="company_id" class="form-control select2" id="companyId" onchange="getOfficeList(this.value);" style="width: 100%;">
                    <option selected="selected" value="">Select Company</option>
                          <?php
                          $count = 1;
                         if($company_list){
                            foreach($company_list as $companyData) { 
                          ?>
                    <option value="<?php echo $companyData->id;?>"><?php echo ucfirst($companyData->name);?></option>
                    <?php } } ?>
                    </select>
               </div>
               <?php echo form_error('company_id');?>
            </div>

            <div class="col-md-4">
               <div class="form-group">
                  <label>Office<span style="color: red;"> *</span></label>
                  <select name="office_id" class="form-control select2" id="officeId"  style="width: 100%;">
                    <option selected="selected" value="">Select Office</option>
                  </select>
                </div>
                <?php echo form_error('office_id');?>
            </div>
              <!-- /.col -->
              <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputPassword1">Department Name<span style="color: red;"> *</span></label>
                    <div class="input-group mb-3">
                   <input type="text" name="dept_name" class="form-control" placeholder="Enter Department Name">
                </div>
                 <?php echo form_error('dept_name');?>
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
                <h3 class="card-title">Department Master List</h3>
              </div>
               <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr.No</th>
                    <th>Company</th>
                    <th>Office</th>
                    <th>Department</th>
                    <th>Action</th>
                  </tr>
                  </tr>
                  </thead>
                   <tbody>
                       <?php
                          $count = 1;
                         if($department){
                            foreach($department as $departmentData) { 
                              $companyData = $this->Common_model->getRowResultArray('m_company',array('id'=>$departmentData->company_id));
                              $officeData = $this->Common_model->getRowResultArray('m_office',array('id'=>$departmentData->office_id));
                          ?>
                         <tr>
                           <td><?php echo $count++;?></td>
                           <td><?php echo ucfirst($companyData->name);?></td>
                           <td><?php echo ucfirst($officeData->name);?></td>
                           <td><?php echo ucfirst($departmentData->dept_name);?></td>
                           <td><a href="<?php echo base_url('Master/editDepartment/') ?><?php echo $departmentData->id;?>" class="btn-floating btn-sm blue-gradient" title="Edit">
                                  <i class="fa fa-edit"></i>            
                           </a>
                           <a href="<?php echo base_url('Master/deleteDepartment/') ?><?php echo $departmentData->id;?>" class="btn-floating btn-sm blue-gradient" onclick="return confirm('Do you want to delete the record?')" title="Delete">
                                <i class="fa fa-times-circle" style="font-size:17px;color:red"></i>     
                           </a>
                        </td>
                  </tr>
                  <?php } } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Sr.No</th>
                    <th>Company</th>
                    <th>Office</th>
                    <th>Department Name</th>
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

