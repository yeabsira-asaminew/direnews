<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dire News Portal | Manage Authorities</title>

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
                        <h4>Manage Users</h4>
                    </div>
                </div>
                <!-- 4-blocks row start -->
                <div class="row">
                    <div class="col-sm-12">


                        <div class="card">

                            <div class="card-block">
                                <div class="row">
                                    <div class="col-sm-12 table-responsive">
                                        <?php if ($this->session->flashdata('deleteuser_success')) { ?>
                                            <p id="success-message" style="color:green"><?php echo $this->session->flashdata('deleteuser_success'); ?></p>
                                        <?php } ?>
                                        <?php if ($this->session->flashdata('updateuser_success')) { ?>
                                            <p id="success-message" style="color:green"><?php echo $this->session->flashdata('updateuser_success'); ?></p>
                                        <?php } ?>

                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>User's ID</th>
                                                    <th>First Name</th>
                                                    <th>Middle Name</th>
                                                    <th>Last Name</th>
                                                    <th>Email</th>
                                                    <th>Role</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            if (count($viewdetails)) :
                                                $cnt = 1;
                                                foreach ($viewdetails as $row) :
                                            ?>
                                                    <tbody>
                                                        <tr>
                                                            <td><?php echo $cnt; ?></td>
                                                            <td><?php echo $row->id; ?></td>
                                                            <td><?php echo $row->first_name; ?></td>
                                                            <td><?php echo $row->middle_name; ?></td>
                                                            <td><?php echo $row->last_name; ?></td>
                                                            <td><?php echo $row->email; ?></td>
                                                            <td><?php echo $row->role; ?></td>
                                                            <td><?php echo anchor("admin/ManageUser/delete/{$row->id}", 'Delete'); ?>
                                                                | <?php echo anchor("admin/ManageUser/edit/{$row->id}", 'Edit'); ?>

                                                            </td>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                    $cnt = $cnt + 1;
                                                endforeach;
                                            else :
                                                    ?>
                                                    <tr>
                                                        <td colspan="5" style="color:red; text-align:center">No Record found</td>
                                                    </tr>
                                                <?php endif; ?>
                                        </table>
                                    </div>
                                </div>
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
</script>
<script type="text/javascript">
    //$(".modal-dialog").hide();
    function load_marks(id) {
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('admin/ManageUser/getmarks'); ?>",
            data: "id=" + id,
            success: function(response) {
                // alert(response);
                $(".displaycontent").html(response);

            }
        });
    }
</script>