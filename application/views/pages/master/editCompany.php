<div class="wrapper">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Company Master</h1>
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
                <h3 class="card-title">Edit Company</h3>
              </div>
              <form method="post"  action="<?php echo base_url('Master/editCompany');?>" enctype="multipart/form-data">
              <div class="card-body">
            <div class="row">
              <div class="col-md-4">
                 <div class="input-group">
                     <label for="inputEmail3">Company Id<span style="color: red;"> *</span></label>
                     <div class="input-group mb-3">
                     <input type="text" name="company_id" class="form-control" placeholder="Company Id" value="<?php echo $depInfo->company_id;?>">
                     <input type="hidden" name="company_id" class="form-control" placeholder="Enter Company Name" value="<?php echo $depInfo->id;?>">
                </div>
                <?php echo form_error('company_id');?>
              </div>
            </div>

              <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputPassword1">Company Name<span style="color: red;"> *</span></label>
                    <div class="input-group mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Company Name" value="<?php echo $depInfo->name;?>">
                    <input type="hidden" name="company_auto_id" class="form-control" placeholder="Enter Company Name" value="<?php echo $depInfo->id;?>">
                   </div>
                <?php echo form_error('name');?>
              </div>
            </div>
              
            <div class="col-md-4">
              <div class="form-group">
                    <label for="exampleInputPassword1">Company Address<span style="color: red;"> *</span></label>
                    <div class="input-group mb-3">
                    <input type="text" name="address_id" class="form-control" placeholder="Company Address" 
                    value="<?php echo $depInfo->address_id;?>">
                    
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
