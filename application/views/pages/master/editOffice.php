<div class="wrapper">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Office Master</h1>
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
                <h3 class="card-title">Add Office</h3>
              </div>

          <form method="post" action="">
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
                   <option value="<?php echo $companyData->id;?>" <?php if($depInfo->company_id = $companyData->id){echo "selected"; } ?>><?php echo ucfirst($companyData->name);?></option>
                    <?php } } ?>
                    </select>
               </div>
               <?php echo form_error('company_id');?>
            </div>
              <!-- /.col -->
              <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputPassword1">Office Name<span style="color: red;"> *</span></label>
                    <div class="input-group mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Enter Office Name" value="<?php echo $depInfo->name;?>">
                   <input type="hidden" name="office_id" class="form-control" placeholder="Enter Office Name" value="<?php echo $depInfo->id;?>">
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
