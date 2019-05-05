  <body class="bg-dark">

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">
        	<div class="row">	
        		<div class="col-md-6 text-center">	
        			<h6><a class="" href="<?php echo base_url('teacher/login') ?>"><u>Teacher</u></a></h6>
        		</div>	
        		<div class="col-md-6 text-center">	
        			<h6><a class="text-dark" href="<?php echo base_url('student/login') ?>">Student</a></h6>
        		</div>	
        	</div>	
        </div>
        <div class="card-body">
          <form id="loginTeacherForm" method="post" action="<?php echo base_url('teacher/loginAccount');?>">
          	<small class="text-secondary">Note: Your default username is your teacher ID and your password is [teacherID]</small>
            <div class="form-group mt-4">
              <div class="form-label-group">
                <input type="text" id="username" name="username" class="form-control" placeholder="Username" required="required" autofocus="autofocus">
                <label for="username">Username</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="required">
                <label for="password">Password</label>
              </div>
            </div>
            <button class="btn btn-primary btn-block" type="submit">Login as an Teacher</button>
            <a class="d-block small mt-3" href="<?php echo base_url('admin/login') ?>"><u>Login as an Admin</u></a>
          </form>
        </div>
      </div>
    </div>
