<!DOCTYPE html>
<html lang="en">

<head>
	<title>Dire News | Login</title>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/icon/icofont/css/icofont.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/main.css'); ?>">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<!-- Responsive.css-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/responsive.css'); ?>">

</head>

<body style="background-image: url('assets/images/dlogo.jpg');">

	<section class="login p-fixed d-flex text-center bg-primary common-img-bg">
		<!-- Container-fluid starts -->
		<div class="container-fluid">
			<div class="row">

				<div class="col-sm-12">
					<div class="login-card card-block">
						<?php echo form_open('admin/Login', ['name' => 'adminsignup', 'class' => 'md-float-material']); ?>
						<div class="text-center">
							<h3> Dire News</h3>
						</div>
						<h3 class="text-center txt-primary">
							Sign In to your account
						</h3>
						<?php if ($this->session->flashdata('reset_success')) { ?>
							<p id="success-message" style="color:green"><?php echo $this->session->flashdata('reset_success'); ?></p>
						<?php } ?>

						<!-- error message for invalid role-->
						<?php if ($this->session->flashdata('loginrole_error')) { ?>
							<p id="error-message" style="color:red"><?php echo $this->session->flashdata('loginrole_error'); ?></p>
						<?php } ?>

						<!-- error message for invalid login details-->
						<?php if ($this->session->flashdata('login_error')) { ?>
							<p id="error-message" style="color:red"><?php echo $this->session->flashdata('login_error'); ?></p>
						<?php } ?>


						<div class="row">
							<div class="col-md-12">
								<div class="md-input-wrapper">
									<input type="email" name="email" id="email" class="md-form-control" required="required" />
									<label>Email</label>
								</div>
							</div>
							<div class="col-md-12">
								<div class="md-input-wrapper">
									<input type="password" name="password" id="password" class="md-form-control" required="required" />
									<label>Password</label>
									<span class="toggle-password" onclick="togglePassword()" style="color:blue;"><i class="fas fa-eye"></i></span>
								</div>

								<div class="text-right mb-2"><a href="<?php echo base_url('admin/ResetPassword/index'); ?>"><i class="mdi mdi-lock"></i><u> Forgot your password?</u></a></div>
							</div>

						</div>
						<div class="row">
							<div class="col-xs-10 offset-xs-1">

								<input type="submit" id="submit" name="submit" class="btn btn-primary" value="Log In">
							</div>
						</div>
						</form>
						<div class="text-center">
							<a href="../index.php"><i class="mdi mdi-home"></i>Read News</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>

<script src="assets/plugins/jquery/dist/jquery.min.js"></script>
<script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

</html>

<script>
	// Delay in milliseconds (3 seconds)
	var delay = 3000;

	// Hide the success message after the delay
	setTimeout(function() {
		document.getElementById('success-message').style.display = 'none';
	}, delay);

	// Hide the error message after the delay
	setTimeout(function() {
		document.getElementById('error-message').style.display = 'none';
	}, delay);
</script>

<script>
	function togglePassword() {
		var passwordInput = document.getElementById("password");
		if (passwordInput.type === "password") {
			passwordInput.type = "text";
		} else {
			passwordInput.type = "password";
		}
	}
</script>