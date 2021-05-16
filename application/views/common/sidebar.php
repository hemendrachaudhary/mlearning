<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url('dashboard'); ?>" class="brand-link" style="
    border-bottom: 3px solid #fff;
    margin-top: 67px;">
      <img src="<?php echo base_url();?>assest/dist/img/logo_dashboard.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="/* opacity: .8; */max-height: 71px;margin-left: 76px;margin-top: -67px;">
     </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="<?php echo base_url('dashboard'); ?>" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
               </p>
            </a>
          </li><br>
          <!-- User manage ment menu -->
          <?php 
            if($this->session->userdata('role') !="User") {
          ?>
        <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>
                 User Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a><br>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('create-user');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('user-list'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User List</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- -->
          <!-- Cource manage ment menu -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                   Course Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a><br>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('course');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Course</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('course-module'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Module</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('question'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Question & Answer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('course-content'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Course Content Details</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('course-content-upload'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Course Upload</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('view-content'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Content</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('course-assign'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Course Assign</p>
                </a>
              </li>
            </ul>
         </li>
          <!-- Master manage ment menu -->
          <?php 
            if($this->session->userdata('role') =="Admin") {
          ?>
         <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-database"></i>
              <p>
                  Master Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a><br>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('company');?>" class="nav-link"> 
                  <i class="far fa-circle nav-icon"></i>
                  <p>Company</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('office'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Office</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('department'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Department</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('division'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Division</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('designation'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Designation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('course-category'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Course Category</p>
                </a>
              </li>
            </ul>
         </li>
         <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-history"></i>
              <p>
                   View Logs
                <i class="fas fa-angle-left right"></i>
              </p>
            </a><br>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('course-details');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Course Log Details</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('assessment-details'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Assessment Log Details</p>
                </a>
              </li>
            </ul>
         </li> 
         <?php } } ?>
         <!-- -->
          
           
          </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
