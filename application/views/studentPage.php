<body id="page-top">

 
    <nav class="navbar navbar-expand navbar-dark bg-primary  static-top">

       <a class="navbar-brand" href="<?php echo site_url('teacher/teacher_page') ?>"><h4>GradeIT</h4></a>
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
      
       <div id="carouselExampleIndicators " class="carousel slide " data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item   active">
            <div class="overlay"></div>
            <img class="d-block w-100" src="<?php echo base_url()?>assets/images/student.jpg" alt="First slide" width="1100" height="500" >
              <div class="hero">
              <hgroup>
                  <h1>Students</h1>        
                  <h3>There is no substitute for hard work.</h3>
              </hgroup>
             
            </div>
          </div>
          <div class="carousel-item">
             <div class="overlay"></div>
            <img class="d-block w-100" src="<?php echo base_url()?>assets/images/student1.jpg" alt="Second slide" width="1100" height="500">
            <div class="hero">
              <hgroup>
                  <h1>Students</h1>        
                  <h3>Your future is created by what you Do Today.</h3>
              </hgroup>
             
            </div>
          </div>
          <div class="carousel-item">
             <div class="overlay"></div>
            <img class="d-block w-100" src="<?php echo base_url()?>assets/images/student2.jpg" alt="Third slide" width="1100" height="500">
            <div class="hero">
              <hgroup>
                  <h1>Students</h1>        
                  <h3>Education is a powerful weapon which you can use to Change the World.</h3>
              </hgroup>
             
            </div>
          </div>
        </div>
      
      </div>
  
          <div class="container-fluid">
            <div class="row mt-5 mb-5">
              <div class="col-md-12">
                <h3 class="text-center"></h3>
                <div class="row">
                <div class="col-md-6 mx-auto">
                  <?php if(!empty($sectionName)): ?>
                  <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                      <h5>Section <?=$sectionName;?></h5>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label>Subject: </label>
                        <b><?=$subjectname;?></b>
                      </div>
                      <div class="form-group">
                        <label>Grade: </label>
                        <b><?= (!empty($grade)?$grade:"Not Yet Graded"); ?></b>
                        <div class="form-group">
                          <label>Remarks: </label>
                          <span class="badge badge-<?=(empty($grade)?"info":($grade < 3.1?"success":"danger"))?>"><?=(empty($grade)?"Not yet Graded":($grade < 3.1?"Pass":"Fail"))?></span>
                      </div>
                      </div>
                    </div>
                    <div class="card-footer" style="height:63px">
                     
                    </div>
                  </div>

                <?php endif; ?>

              </div>
            </div>
       
            </div>
        </div>

        <!-- /.container-fluid -->

        
       
          <!-- Footer -->
       <footer class="page-footer font-small bg-secondary " style="height: 100px;bottom: 0;width: 100%;">
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
            <a class="btn btn-primary" href="<?php echo base_url('admin/logout') ?>">Logout</a>
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
          <?=form_open('student/changePassword');?>
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