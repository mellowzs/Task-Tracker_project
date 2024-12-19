<?php
require 'authentication.php'; // admin authentication check 

// auth check
if(isset($_SESSION['admin_id'])){
  $user_id = $_SESSION['admin_id'];
  $user_name = $_SESSION['admin_name'];
  $security_key = $_SESSION['security_key'];
  if ($user_id != NULL && $security_key != NULL) {
    header('Location: task-info.php');
  }
}

if(isset($_POST['login_btn'])){
 $info = $obj_admin->admin_login_check($_POST);
 	if (isset($_GET['status']) || isset($_GET['pass'])) {
		if(!empty($_GET['status']) || !empty($_GET['pass']))
			header('Location: index.php?loginfail=failed');
	}
}

$page_name="Login";
include("include/login_header.php");

?>

<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<div class="well well-center" style="position:relative;top:20vh;">
		<center><h2 style="margin-top:1px; font-weight: bold;">Employee Task Management System</h2></center>
			<form class="form-horizontal form-custom-login" action="" method="POST">
			  <div class="form-heading" style="border-radius: 10px;">
			    <h2 class="text-center">Login Panel</h2>
			  </div>
			  
			  <!-- <div class="login-gap"></div> -->

			  <?php if(isset($info) || !empty($_GET['loginfail'])){ ?>
			  <h5 class="alert alert-danger"><?php echo 'Invalid user name or Password'; ?></h5>
			  <?php }
			  elseif(empty($info) && !empty($_GET['loginfail'])) { ?>
				<h5 class="alert alert-danger"><?php echo 'Invalid user name or Password'; ?></h5>
			  <?php }?>

			<?php 
				if(!empty($_GET['status'])){ ?>
					<h5 class="alert alert-success"><?php echo '<div>You have been logged out successfully</div>';?></h5>
			<?php } ?>

				

			  <div class="form-group">
			    <input type="text" class="form-control" placeholder="Username" name="username" required style="border-radius: 10px;"/>
			  </div>
			  <div class="form-group" ng-class="{'has-error': loginForm.password.$invalid && loginForm.password.$dirty, 'has-success': loginForm.password.$valid}">
			    <input type="password" class="form-control" placeholder="Password" name="admin_password" required style="border-radius: 10px;"/>
			  </div>
			  <a href="index.php?pass=forgot" style="font-size: 13px; margin-left: 16px" name="forgot_pass">Forgot Password</a>
			  <?php if(!empty($_GET['pass'])) { ?>
				<h5 class="alert alert-success" style="font-size: 11px"><?php echo 'Contact your Project Leader/Admin to change/recover your password.';?></h5>
			  <?php } ?>

			  <button type="submit" name="login_btn" class="btn btn-info pull-right" style="border-radius: 10px;">Login</button>
			</form>
		</div>
	</div>
</div>


<?php

include("include/footer.php");

?>
