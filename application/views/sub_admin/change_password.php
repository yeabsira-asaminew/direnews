<!DOCTYPE html>
<html lang="en">

<head>
   <title>News Portal | Change Password</title>

   <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,700" rel="stylesheet">
   <a href="https://icons8.com/icon/BYnvGv84C52t/settings"></a>
   <!-- themify -->


   <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/icon/simple-line-icons/css/simple-line-icons.css') ?>">

   <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.min.css') ?>">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/main.css') ?>">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/responsive.css') ?>">

</head>

<body class="sidebar-mini fixed">

   <div class="wrapper">
      <!-- Navbar-->
      <?php include APPPATH . 'views/sub_admin/include/header.php'; ?>
      <!-- Side-Nav-->
      <?php include APPPATH . 'views/sub_admin/include/subadmin_sidebar.php'; ?>
      <div class="content-wrapper">
         <!-- Container-fluid starts -->
         <!-- Main content starts -->
         <div class="container-fluid">
            <div class="row">
               <div class="main-header">
                  <h4>Change Password</h4>
               </div>
               <!--success message -->
               <?php if ($this->session->flashdata('changepass_success')) { ?>
                  <p style="color:green"><?php echo $this->session->flashdata('changepass_success'); ?></p>
               <?php } ?>

               <!--error message -->
               <?php if ($this->session->flashdata('changepass_error')) { ?>
                  <p style="color:red"><?php echo $this->session->flashdata('changepass_error'); ?></p>
               <?php } ?>
            </div>
            <!-- 4-blocks row start -->
            <div class="row">
               <!--Inline Form starts-->
               <div class="col-lg-6 inline-forms">
                  <div class="card">
                     <div class="card-block">
                        <?php echo form_open('sub_admin/Changepassword', ['name' => 'signup']); ?>
                        <div class="row">
                           <div class="col-sm-12 form-group">
                              <label>Old Password</label>
                              <?php echo form_password(['name' => 'currentpassword', 'id' => 'currentpassword', 'class' => 'form-control', 'placeholder' => '********', 'value' => set_value('currentpassword')]); ?>
                              <span class="toggle-password" onclick="togglePassword('currentpassword')" style="color:blue;"><?php echo form_error('currentpassword') ?><i class="fas fa-eye"></i></span>
                           </div>

                           <div class="col-sm-12 form-group">
                              <label>New Password</label>
                              <?php echo form_password(['name' => 'newpassword', 'id' => 'newpassword', 'class' => 'form-control', 'placeholder' => '********', 'value' => set_value('newpassword')]); ?>
                              <span class="toggle-password" onclick="togglePassword('newpassword')" style="color:blue;"><?php echo form_error('newpassword') ?><i class="fas fa-eye"></i></span>
                           </div>

                           <div class="col-sm-12 form-group">
                              <label>Confirm Password</label>
                              <?php echo form_password(['name' => 'confirmpassword', 'id' => 'confirmpassword', 'class' => 'form-control', 'placeholder' => '********', 'value' => set_value('confirmpassword')]); ?>
                              <span class="toggle-password" onclick="togglePassword('confirmpassword')" style="color:blue;"><?php echo form_error('confirmpassword') ?><i class="fas fa-eye"></i></span>
                           </div>
                           <div class="col-sm-4 form-group">
                              <?php echo form_submit(['name' => 'submit', 'id' => 'submit', 'class' => 'btn btn-primary', 'value' => 'Change']); ?>

                           </div>
                           <?php echo form_close(); ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

         </div>
      </div>



      <!-- Required Jqurey -->
      <script src="<?php echo base_url('assets/plugins/Jquery/dist/jquery.min.js'); ?>"></script>
      <script src="<?php echo base_url('assets/plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>
      <script src="<?php echo base_url('assets/plugins/tether/dist/js/tether.min.js'); ?>"></script>
      <script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>
      <script type="text/javascript" src="<?php echo base_url('assets/js/main.min.js'); ?>"></script>
      <script src="<?php echo base_url('assets/js/menu.min.js'); ?>"></script>
</body>

</html>

<script>
   function togglePassword(inputId) {
      var passwordInput = document.getElementById(inputId);
      var eyeIcon = document.querySelector(`span.toggle-password[onclick="togglePassword('${inputId}')"] i`);

      if (passwordInput.type === "password") {
         passwordInput.type = "text";
         eyeIcon.classList.remove("fa-eye");
         eyeIcon.classList.add("fa-eye-slash");
      } else {
         passwordInput.type = "password";
         eyeIcon.classList.remove("fa-eye-slash");
         eyeIcon.classList.add("fa-eye");
      }
   }
</script>