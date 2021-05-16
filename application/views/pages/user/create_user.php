  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Use the below form to Register New User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Form</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

   <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
         <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">New User Registration</h3>
              </div>
              <!-- form start -->
         <form method="post" action="<?php echo base_url('User/create_user');?>" enctype="multipart/form-data">
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-4">
                 <div class="input-group">
                     <label for="inputEmail3">First Name<span style="color: red;"> *</span></label>
                     <div class="input-group mb-3">
                     <input type="text" name="first_name" class="form-control" placeholder="Name">
                     </div>
                    <?php echo form_error('first_name');?>
                </div>
            </div>
            <div class="col-md-4">
                 <div class="input-group">
                     <label for="inputEmail3">Middle Name<span style="color: red;"> *</span></label>
                     <div class="input-group mb-3">
                     <input type="text" name="middle_name" class="form-control" placeholder="Name">
                     </div>
                    
                </div>
            </div>
            <div class="col-md-4">
                 <div class="input-group">
                     <label for="inputEmail3">Last Name<span style="color: red;"> *</span></label>
                     <div class="input-group mb-3">
                     <input type="text" name="last_name" class="form-control" placeholder="Name">
                     </div>
                    
                </div>
            </div>
              <!-- /.col -->
              <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputPassword1">Email<span style="color: red;"> *</span></label>
                    <div class="input-group mb-3">
                   <input type="email" name="email" class="form-control" placeholder="Email">
                  </div>
                   <?php echo form_error('email');?>
                </div>
            </div>
              
            <div class="col-md-4">
               <div class="input-group">
                     <label for="inputEmail3">Password<span style="color: red;"> *</span></label>
                      <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                   <?php echo form_error('password');?>
                </div>
            </div>

             <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputPassword1">Mobile No<span style="color: red;"> *</span></label>
                   <div class="input-group mb-3">
                   <input type="number" name="phone" class="form-control" placeholder="Mobile No" maxlength="10">
                   </div>
                   <?php echo form_error('phone');?>
                   </div>
            </div>
            

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
                  <select name="office_id" class="form-control select2" id="officeId" onchange="getDeptList(this.value);" style="width: 100%;">
                    <option selected="selected" value="">Select Office</option>
                  </select>
                </div>
                <?php echo form_error('office_id');?>
            </div>
               
             <div class="col-md-4">
                 <div class="form-group">
                  <label>Department<span style="color: red;"> *</span></label>
                  <select name="dept_id" class="form-control select2" id="deptId" onchange="getDivisionList(this.value);" style="width: 100%;">
                    <option selected="selected" value="">Select Department</option>
                   
                  </select>
                </div>
                <?php echo form_error('dept_id');?>
              </div>

              <div class="col-md-4">
                 <div class="form-group">
                  <label>Division<span style="color: red;"> *</span></label>
                  <select name="division_id" class="form-control select2" id="divisionId" style="width: 100%;">
                     <option selected="selected" value="">Select Division</option>
                  </select>
                </div>
                <?php echo form_error('division_id');?>
              </div>
               
              <div class="col-md-4">
                <div class="form-group">
                  <label>Designation<span style="color: red;"> *</span></label>
                  <select name="designation_id" class="form-control select2" style="width: 100%;">
                    <option selected="selected" value="">Select Designation</option>
                    <?php
                        $count =1;
                        if($designation_list){
                          foreach($designation_list as $designationData){
                    ?>
                    <option value="<?php echo $designationData->id;?>"><?php echo ucfirst($designationData->name);?></option>
                  <?php } } ?>
                  </select>
                </div>
                <?php echo form_error('designation_id');?>
              </div>

               <div class="col-md-4">
                 <div class="form-group">
                  <label>Manager<span style="color: red;"> *</span></label>
                  <select name="manager" id="manager123" class="form-control select2" style="width: 100%;">
                    <option selected="selected">Select Manager</option>
                    <?php
                        $count =1;
                        if($manager_list){
                          foreach($manager_list as $managerData){
                    ?>
                    <option value="<?php echo $managerData->userId;?>"><?php echo ucfirst($managerData->first_name.' '.$managerData->middle_name.' '.$managerData->last_name);?></option>
                  <?php } } ?>
                  </select>
                </div>
              </div>
              
               <div class="col-md-4">
              <div class="form-group">
                    <label for="exampleInputPassword1">Employee Id<span style="color: red;"> *</span></label>
                    <div class="input-group mb-3">
                   <input type="text" name="emp_id" value="<?php echo $getmax->userId;?>" class="form-control" placeholder="Employee Id">
                </div>
              </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                  <label>District<span style="color: red;"> *</span></label>
                  <select id="district_id" name="district_id" class="form-control select2" style="width: 98%;">
                    <option  value="">Select District Category</option>
                    <?php
                        $count =1;
                        if($district_list){
                          foreach($district_list as $districtData){
                    ?>
                    <option  value="<?php echo ucfirst($districtData->id);?>"><?php echo ucfirst($districtData->name);?></option>
                     <?php } } ?>
                  </select>
                </div>
              </div>
               
               <div class="col-md-4">
                <div class="form-group">
                  <label>Role<span style="color: red;"> *</span></label>
                  <select name="role" class="form-control select2" style="width: 100%;">
                    <option selected="selected" value="">Select Role</option>
                    <option value="Admin">Admin</option>
                    <option value="SuperAdmin">Super Admin</option>
                    <option value="User">User</option>
                   </select>
                </div> 
              </div>
                
               <div class="col-md-4">
                <div class="form-group">
                   <div class="form-group">
                    <label for="exampleInputFile">Upload your image<span style="color: red;"> *</span></label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="userImg" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
                <!-- /.form-group -->
              </div>
               <div class="form-check">
                        <input type="checkbox" value="1" name="is_manager" class="form-check-input" id="exampleCheck2">
                        <label class="form-check-label" for="exampleCheck2">Is Manager</label>
                      </div>
                      <div class=""><br>
                  <input type="submit" class="btn btn-primary pull-right" value="Add">
                   </div>
                  </div>
                 </div>
                <!-- /.card-body -->
             </form>
            </div>
          </div>
         </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  

