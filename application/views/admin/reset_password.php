<!DOCTYPE html>
<html>

<style>
    ::placeholder {
        opacity: 0.6;
        /* Adjust the opacity value as needed */
    }

    input[type=email] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }
</style>

<head>
    <title>Dire News Portal | Reset Password</title>

    <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,700" rel="stylesheet">
    <a href="https://icons8.com/icon/BYnvGv84C52t/settings"></a>
    <!-- themify -->


    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/icon/simple-line-icons/css/simple-line-icons.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/main.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/responsive.css') ?>">

</head>

<body style="background-image: url('assets/images/dlogo.jpg');">
    <section class="login p-fixed d-flex text-center bg-primary common-img-bg">
        <!-- Container-fluid starts -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="login-card card-block">

                        <h3>Reset Password</h3>
                        <!-- error message -->
                        <?php if ($this->session->flashdata('reset_error')) { ?>
                            <p id="error-message" style="color:red"><?php echo $this->session->flashdata('reset_error'); ?></p>
                        <?php } ?>

                        <form action="<?php echo site_url('admin/ResetPassword/send_new_password'); ?>" method="post">

                            <div class="col-md-12">
                                <div class="md-input-wrapper">
                                    <label for="email">Email</label>
                                    </br>
                                    <style>

                                    </style>

                                    <input type="email" name="email" id="email" placeholder="enter your registered email address" class="md-form-control" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-10 offset-xs-1">
                                    <button type="submit" class="btn btn-danger">Reset</button>
                                </div>
                            </div>

                        </form>
                        <div class="text-center">
                            <a href="<?php echo base_url('admin/Login') ?>"><i class="mdi mdi-home"></i> Back to Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>

<script src="<?php echo base_url('assets/plugins/Jquery/dist/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/tether/dist/js/tether.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/main.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/menu.min.js'); ?>"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>