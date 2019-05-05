<body id="page-top">

 
    <nav class="navbar navbar-expand navbar-dark bg-primary  static-top">

       <a class="navbar-brand" href="<?php echo site_url('teacher/dashboard') ?>"><h4>GradeIT</h4></a>
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
            <i class="fas fa-user-circle fa-fw text-white"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#change">Change password</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </li>
      </ul>

    </nav>
      
          <div class="container-fluid">
            <div class="row mt-5 mb-5">
              <div class="col-md-12">
                  <div class="col-md-11 mx-auto">
                  <div class="card shadow mb-5">
                  <div class="card-header">

                    <br>
                  </div>
                  <div class="card-body">
                    <h5 class="text-center">Section <?=$sections;?></h5>
                    <div class="table-container">
                      <table class="table">
                        <thead>
                            <tr>
                              <th>
                                Profile Picture
                              </th>
                              <th>
                                <h6>Full Name</h6>
                              </th>
                              <th>
                                <h6>Gender</h6>
                              </th>
                              <th>
                                <h6>Age</h6>
                              </th>
                               <th>
                                <h6>Assigned Subject</h6>
                              </th>
                              <th>
                                <h6>Actions</h6>
                              </th>
                            </tr>
                          </thead>
                        <tbody id="myTable">
                          <?=$studentList;?>
                        </tbody>
                      </table>
                      
                      </div>
                    </div>
                  </div>    
                </div>
            </div>
       
            </div>
        </div>

        <!-- /.container-fluid -->

        
       
          <!-- Footer -->
      <footer class="page-footer font-small bg-secondary " style="height: 100px;width: 100%;">

        <!-- Copyright -->
        <div class="text-white text-center py-3">
          <h6>Online Grade Portal</h6>
        </div>
        <!-- Copyright -->

      </footer>
      <!-- Footer -->

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
            <a class="btn btn-primary" href="<?php echo site_url('admin/logout') ?>">Logout</a>
          </div>
        </div>
      </div>
    </div>
      <!-- Change Password Modal-->
    <div class="modal fade" id="change" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <?=form_open('teacher/changePassword');?>
          <div class="modal-body">
            <small class="text-info">Note: Your default password is your (teacherID)</small>
            <div class="form-group">
              <label>Current Password</label>
                <input class="form-control" type="text" name="current" placeholder="current password" required>
                 <div class="invalid-feedback">
                    Please input your current password
                </div>
            </div>
          <div class="input-group has-feedback">
            <input type="password" class="form-control" name="newpass" id="password" placeholder="New Password" required>
            <div class="input-group-prepend">
              <div class="input-group-text">
                 <i class="glyphicon fa fa-eye form-control-feedback"></i>
              </div>
               <div class="invalid-feedback">
                    Please input your new password
                </div>
            </div>
            
            </div>
           
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button class="btn btn-primary" type="submit">Change Password</button>
          </div>
        </form>
        </div>
      </div>
    </div>

         <!-- Add Grade Modal-->
    <div class="modal fade" id="addgrade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Input Grade</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Grade</label>
                <input class="form-control" type="text" name="grade" placeholder="e.g 1.5" required>
                 <div class="invalid-feedback">
                    Please input a grade
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button class="btn btn-primary" id="addGrade" type="submit">Submit</button>
          </div>
        </div>
      </div>
    </div>
             <!-- edit info Modal-->
    <div class="modal fade" id="editinfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Student's information</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <?php echo form_open_multipart("teacher/editStud") ?>
          <div class="modal-body scroll">
             <div class="form-group">
                <label for="exampleFormControlFile1">Update student's profile pic</label>
                <br>
                <input type="hidden" name="studid" value="">
                <img src="<?php echo base_url()?>assets/images/user.png" alt="..." class="rounded-circle mb-3" width="80px" height="80px">
                <input type="file" name="studimage" class="form-control-file">
             </div>
            <div class="form-group">
              <label>First Name:</label>
                <input class="form-control" type="text" name="studfn" value="" required>
                 <div class="invalid-feedback">
                    Please input student's first name.
                </div>
            </div>
            <div class="form-group">
              <label>Last Name:</label>
                <input class="form-control" type="text" name="studln" value="" required>
                 <div class="invalid-feedback">
                    Please input student's last name.
                </div>
            </div>
            <div class="form-group">
              <label>Age:</label>
                <input class="form-control" type="text" name="studage" value="21" required>
                 <div class="invalid-feedback">
                    Please input student's age.
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button class="btn btn-primary" type="submit">Submit</button>
          </div>
        </form>
        </div>
      </div>
    </div>


         <!-- Edit Grade Modal-->
    <div class="modal fade" id="editgrade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Grade</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Grade</label>
                <input class="form-control" type="text" name="editGrade" value= "1.5" required>
                 <div class="invalid-feedback">
                    Please input a grade
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button class="btn btn-primary" id="updateGrade" type="button">Update</button>
          </div>
        </div>
      </div>
    </div>