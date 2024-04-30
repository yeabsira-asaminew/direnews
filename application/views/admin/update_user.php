<!DOCTYPE html>
<html lang="en">

<head>
    <title>News Portal | Update User</title>

    <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/icon/simple-line-icons/css/simple-line-icons.css') ?>">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/main.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/responsive.css') ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
                        <h4> Update Authority's Information</h4>
                    </div>
                </div>
                <!-- 4-blocks row start -->
                <div class="row">
                    <!--Inline Form starts-->
                    <div class="col-lg-12 inline-forms">
                        <div class="card">

                            <!-- error message -->
                            <?php if ($this->session->flashdata('updateuser_error')) { ?>
                                <p id="error-message" style="color:red"><?php echo $this->session->flashdata('updateuser_error'); ?></p>
                            <?php } ?>
                            <?php if ($this->session->flashdata('formuser_error')) { ?>
                                <p id="error-message" style="color:red"><?php echo $this->session->flashdata('formuser_error'); ?></p>
                            <?php } ?>

                            <div class="card-block">

                                <form action="<?php echo base_url('admin/ManageUser/update/' . $viewdetails->id) ?> " method="POST">


                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label for="">First Name</label>
                                            <input class="form-control" type="text" name="first_name" id="first_name" value="<?php echo $viewdetails->first_name; ?>" />

                                        </div>

                                        <div class="col-sm-6 form-group">
                                            <label>Middle Name</label>
                                            <input class="form-control" type="text" name="middle_name" id="middle_name" value="<?php echo $viewdetails->middle_name; ?>" />

                                        </div>


                                        <div class="col-sm-6 form-group">
                                            <label>Last Name</label>
                                            <input class="form-control" type="text" name="last_name" id="last_name" value="<?php echo $viewdetails->last_name; ?>" />

                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label>Email</label>
                                            <input class="form-control" type="text" name="email" id="email" value="<?php echo $viewdetails->email; ?>" />

                                        </div>


                                        <div class="col-sm-6 form-group">
                                            <label>Role</label>
                                            <select class="form-control" name="role" id="role">
                                                <option value="">--select--</option>
                                                <?php
                                                $roles = array();
                                                foreach ($viewrole as $row) {
                                                    if (!in_array($row->role, $roles)) { // Check if the role value is not already in the array
                                                        $selected = ($row->role == $existingData->role) ? 'selected' : ''; // Check if the role value matches the existing data
                                                        echo '<option value="' . $row->role . '" ' . $selected . '>' . $row->role . '</option>';
                                                        $roles[] = $row->role; // Add the role value to the array
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-sm-4 form-group">
                                        <?php echo form_submit(['name' => 'submit', 'id' => 'submit', 'class' => 'btn btn-primary', 'value' => 'update']); ?>

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