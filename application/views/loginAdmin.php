  <body class="bg-dark">

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">
        	<div class="row">	
        		<div class="col-md-6 text-center">	
        			<h6><a class="text-dark" href="<?php echo base_url('teacher/login') ?>">Teacher</a></h6>
        		</div>	
        		<div class="col-md-6 text-center">	
        			<h6><a  class="text-dark" href="<?php echo base_url('student/login') ?>">Student</a></h6>
        		</div>	
        	</div>	
        </div>
        <div class="card-body">
          <form id="loginAdminForm" method="post" action="<?php echo base_url('admin/loginAccount');?>">
            <a href=" "><h6 class="text-center"><u>Admin</u></h6></a>
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
            <button class="btn btn-primary btn-block" type="submit">Login as an Admin</button>
          </form>
        </div>
      </div>
    </div>