<body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="<?php echo site_url('admin/dashboard') ?>">Admin</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group" style="display: none">
          <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">

      
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
         
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </li>
      </ul>

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item ">
          <a class="nav-link" href="<?php echo site_url('admin/dashboard') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
         <li class="nav-item ">
          <a class="nav-link" href="<?php echo site_url('admin/section') ?>">
            <i class="fa fa-building"></i>
            <span>Sections</span></a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('admin/subject') ?>">
            <i class="fa fa-book"></i>
            <span>Subjects</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo site_url('admin/teacher') ?>">
            <i class="	fa fa-users"></i>
            <span>Teachers</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('admin/student') ?>">
            <i class="fa fa-child"></i>
            <span>Students</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropwdown-toggle"  href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-table"></i>
            <span>Reports</span>
         </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/teacher_list') ?>">Teacher's List</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/student_list') ?>">Student's List</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo site_url('admin/transaction') ?>">Transaction Histories</a>
          </div>
        </li>
      </ul>
       <div id="content-wrapper">

        <div class="container-fluid">
        	<div class="row">
        		<div class="col-md-12">
        			<div class="col-md-6 mx-auto">
        				<div class="card shadow">
        					<div class="card-header">
        						<h5> Teacher's Registration</h5>
        					</div>
        			
	        				<div class="card-body">

	        					<form id="addTeacher" method="post" action="<?php echo base_url('admin/addTeacher');?>" class="needs-validation" novalidate>
                    <div class="form-group">
                      <label for="idNo">Teacher's ID</label>
                      <input type="text" class="form-control" id="idNo" name="idNo" readonly value="<?=$teacher_id?>" required>
                       <div class="invalid-feedback">
                          Please input teacher's six digit ID.
                      </div>
                    </div>
  								  <div class="form-group">
  								      <label for="firstname">First name</label>
  								      <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First name" required>
  								       <div class="invalid-feedback">
  							            Please input teacher's first name.
  							        </div>
  								  </div>
                    <div class="form-group">
                        <label for="lastname">Last name</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last name" required>
                         <div class="invalid-feedback">
                            Please input teacher's Last name.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="number" class="form-control" id="age" name="age" placeholder="age" required>
                         <div class="invalid-feedback">
                            Please input teacher's age.
                        </div>
                    </div>
                     <div class="form-group">
                      <label>Gender</label>
                      <select class="form-control selectedGender">
                        <option value="f">Female</option>
                        <option value="m">Male</option>
                      </select>
                      <div class="invalid-feedback">
                            Please select teacher's gender.
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Assigned Section</label>
                      <select class="form-control selectedSection">
                        <?PHP
                        foreach ($all_sections->result() as $row) 
                        {
                          echo '<option value="'.$row->section_id.'">'.$row->section_name.'</option>';
                        }
                        ?>
                      </select>
                      <div class="invalid-feedback">
                            Please assigned a section.
                      </div>
                    </div>
                    <div class="form-group selectedSubject">
                      <label>Assigned Subject</label>
                      <select class="form-control" >
                        <?PHP
                        foreach ($all_subjects->result() as $row) 
                        {
                          echo '<option value="'.$row->subject_id.'">'.$row->subject_name.'</option>';
                        }
                        ?>
                      </select>
                       <div class="invalid-feedback">
                            Please assigned a subject.
                      </div>
                    </div>
                    <button class="btn btn-primary float-right" type="submit">Register</button>
  								  <button class="btn btn-danger" id="reset" type="reset">Reset</button>
  								</form>
	        				</div>	
        				</div>		
        			</div>
        		</div>
        	</div>
        </div>
        <br>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span><b>Online Grade Portal</b></span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="<?php echo base_url('admin/logout') ?>">Logout</a>
          </div>
        </div>
      </div>