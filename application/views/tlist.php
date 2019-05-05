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
        <li class="nav-item ">
          <a class="nav-link" href="<?php echo site_url('admin/teacher') ?>">
            <i class="	fa fa-users"></i>
            <span>Teachers</span>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="<?php echo site_url('admin/student') ?>">
            <i class="fa fa-child"></i>
            <span>Students</span></a>
        </li>
        <li class="nav-item dropdown active">
          <a class="nav-link dropwdown-toggle"  href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-table"></i>
            <span>Reports</span>
         </a>
          <div class="dropdown-menu " aria-labelledby="pagesDropdown">
            <a class="dropdown-item active" href="<?php echo site_url('admin/teacher_list') ?>">Teacher's List</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/student_list') ?>">Student's List</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item " href="<?php echo site_url('admin/transaction') ?>">Transaction Histories</a>
          </div>
        </li>
      </ul>
       <div id="content-wrapper">
        <form>
          <div class="container-fluid">
          	<div class="row">
          		<div class="col-md-12">
          			<div class="col-md-11 mx-auto">
          				<div class="card shadow mb-5">
                  <div class="card-header">
                    <br>
                  </div>
                  <div class="card-body">
                    <h5 class="text-center">Teacher's List</h5>
                    <div class="table-container">
                      <table class="table">
                        <thead>
                            <tr>
                              <th>
                                <h6>Id no.</h6>
                              </th>
                              <th>
                                <h6>Full Name</h6>
                              </th>
                              <th>
                                <h6>Age</h6>
                              </th>
                              <th>
                                <h6>Gender</h6>
                              </th>
                               <th>
                                <h6>Assigned Section</h6>
                              </th>
                               <th>
                                <h6>Assigned Subject</h6>
                              </th>
                               <th>
                                <h6>Date Added</h6>
                              </th>
                            </tr>
                          </thead>
                        <tbody id="myTable">
                          <?php
                          if ($all_teachers_section->num_rows() > 0) 
                          {
                              foreach ($all_teachers_section->result() as $row) 
                              {
                                $gender = $row->gender;

                                if ($gender == 'm') 
                                {
                                  $gender = 'Male';
                                }
                                else
                                {
                                  $gender = 'Female';
                                }
                                echo '<tr>
                                        <td>
                                            <p>'.$row->username.'</p>
                                        </td>
                                        <td>
                                            <p>'.$row->fname.' '.$row->lname.'</p>
                                        </td>
                                        <td>
                                          <p>'.$row->age.'</p>
                                        </td>
                                        <td>
                                           <p>'.$gender.'</p>
                                        </td>
                                        <td>
                                           <p>'.$row->section_name.'</p>
                                        </td>
                                        <td>
                                           <p>'.$row->subject_name.'</p>
                                        </td>
                                        <td>
                                           <p>'.$row->date.'</p>
                                        </td>
                                      </tr>';
                              }
                          }
                          ?>
                          
                        </tbody>
                      </table>
                      <?php
                      if ($all_teachers_section->num_rows() < 1) 
                      {
                        echo '<div class="alert alert-danger text-center" role="alert">
                                 No teacher records yet
                             </div>';
                      }
                      ?>
                      </div>
                    </div>
 
                  </div>		
          			</div>
          		</div>
          	</div>
          </div>
        </form>
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
    </div>
