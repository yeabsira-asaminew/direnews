<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dire News Portal | Add User</title>

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
        <?php include APPPATH . 'views/admin/include/header.php'; ?>
        <!-- Side-Nav-->
        <?php include APPPATH . 'views/admin/include/sidebar.php'; ?>
        <div class="content-wrapper">
            <!-- Container-fluid starts -->
            <!-- Main content starts -->
            <div class="container-fluid">
                <div class="row">
                    <div class="main-header">
                        <h4>Add Authorities</h4>
                    </div>
                </div>
                <!-- 4-blocks row start -->
                <div class="row">
                    <!--Inline Form starts-->
                    <div class="col-lg-12 inline-forms">
                        <div class="card">
                            <?php if ($this->session->flashdata('adduser_success')) { ?>
                                <p id="success-message" style="color:green"><?php echo $this->session->flashdata('adduser_success'); ?></p>
                            <?php } ?>

                            <!-- error message -->
                            <?php if ($this->session->flashdata('adduser_error')) { ?>
                                <p id="error-message" style="color:red"><?php echo $this->session->flashdata('adduser_error'); ?></p>
                            <?php } ?>
                            <div class="card-block">


                                <?php echo form_open('admin/RegisterUser/add'); ?>


                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label for="first_name">First Name</label>
                                        <input class="form-control" type="text" name="first_name" id="first_name" placeholder="First Name" value="<?php echo set_value('first_name'); ?>"><br>

                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="middle_name">Middle Name</label>
                                        <input class="form-control" type="text" name="middle_name" id="middle_name" placeholder="Middle Name" value="<?php echo set_value('middle_name'); ?>"><br>

                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="last_name">Last Name</label>
                                        <input class="form-control" type="text" name="last_name" id="last_name" placeholder="Last Name" value="<?php echo set_value('last_name'); ?>"><br>

                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="name">User Name</label>
                                        <input class="form-control" type="text" name="name" id="name" placeholder="User Name" value="<?php echo set_value('name'); ?>"><br>

                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="email">Email</label>
                                        <input class="form-control" type="text" name="email" id="email" placeholder="Email" value="<?php echo set_value('email'); ?>"><br>

                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="role">Role</label>
                                        <select class="form-control" name="role" id="role">
                                            <option value="--select--">--select--</option>
                                            <?php
                                            $roles = array(); // Create an empty array to store unique role values
                                            foreach ($viewrole as $row) {
                                                if (!in_array($row->role, $roles)) { // Check if the role value is not already in the array
                                                    echo '<option value="' . $row->role . '">' . $row->role . '</option>';
                                                    $roles[] = $row->role; // Add the role value to the array
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>


                                    <div class="col-sm-4 form-group">
                                        <button class="btn btn-default" type="submit">Submit</button>
                                        <?php echo form_close(); ?>
                                    </div>
                                    </form>
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>

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


</html>