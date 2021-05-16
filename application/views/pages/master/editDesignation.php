<div class="wrapper">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Designation Master</h1>
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
                <h3 class="card-title">Edit Designation</h3>
              </div>

            <form method="post" action="">
            <div class="card-body">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputPassword1">Designation Name<span style="color: red;"> *</span></label>
                    <div class="input-group mb-3">
                   <input type="text" name="name" class="form-control" placeholder="Enter Designation Name" value="<?php echo $depInfo->name;?>">
                   <input type="hidden" name="des_id" class="form-control"  value="<?php echo $depInfo->id;?>">
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
