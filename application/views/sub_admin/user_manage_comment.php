<!DOCTYPE html>
<html lang="en">

<head>
   <title>News Portal | Manage User Comment</title>

   <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,700" rel="stylesheet">
   <a href="https://icons8.com/icon/BYnvGv84C52t/settings">Settings icon by Icons8</a>
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
                  <h4>Manage User Comment</h4>
               </div>
            </div>
            <!-- 4-blocks row start -->
            <div class="row">
               <div class="col-sm-12">
                  <div class="card">

                     <div class="card-block">
                        <div class="row">
                           <!--success message -->
                           <?php if ($this->session->flashdata('commentapprove_success')) { ?>
                              <p id="success-message" style="color:green"><?php echo $this->session->flashdata('commentapprove_success'); ?></p>
                           <?php } ?>

                           <!-- error message -->
                           <?php if ($this->session->flashdata('commentapprove_error')) { ?>
                              <p id="error-message" style="color:red"><?php echo $this->session->flashdata('commentapprove_error'); ?></p>
                           <?php } ?>

                           <div class="col-sm-12 table-responsive">
                              <table class="table">
                                 <thead>
                                    <tr>
                                       <th>#</th>
                                       <th>CommentID</th>
                                       <th>PostID</th>
                                       <th>Name</th>
                                       <th>Email</th>
                                       <th>UserComment</th>
                                       <th>Create Date</th>
                                       <th>Approved By</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <?php
                                 if (count($managecomment)) :
                                    $cnt = 1;
                                    foreach ($managecomment as $row) :
                                 ?>
                                       <?php $dd = $row->id; ?>
                                       <tbody>
                                          <tr>
                                             <td><?php echo $cnt; ?></td>
                                             <td><?php echo $row->id; ?></td>
                                             <td><?php echo $row->postid; ?></td>
                                             <td><?php echo $row->name; ?></td>
                                             <td><?php echo $row->emailid; ?></td>
                                             <td><?php echo $row->comment; ?></td>
                                             <td><?php echo $row->create_date; ?></td>
                                             <td><?php echo $row->approved_by; ?></td>

                                             <td>
                                                <?php
                                                $status = $row->status;
                                                if ($status == '1') {
                                                   echo '<button type="button" class="btn btn-success btn-sm">Approved</button>';
                                                } else {
                                                   echo '<button type="button " class="btn btn-danger btn-sm">UnApproved</button>';
                                                }

                                                ?>

                                             </td>
                                             <td>
                                                <!-- <button class="btn btn-primary>View</button> -->
                                                <!-- <li><a  data-toggle="modal" data-target="#myModahref="javascript:void(0)"><i class="fa fa-edit"></i> Edit</a></li> -->
                                                <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->
                                             <td><?php $dd = $row->id; ?></td>
                                             <td><a data-toggle="modal" data-target="#myModal" onclick="javascript:load_marks(<?php echo $row->id; ?>)"><button class="btn btn-primary">View</button></a>
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


      <div class="modal fade" id="myModal" role="dialog">
         <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Comment Action</h4>
               </div>
               <div class="modal-body">
                  <?php echo form_open_multipart('admin/Usercomment/commentApproved'); ?>
                  <div class="form-group">
                     <label>Status</label>
                     <select name="status" id="status" class="form-control">
                        <option value="1">Approved</option>
                        <option value="0">Disproved</option>

                     </select>
                     <input type="hidden" name="id" value="<?php echo $dd; ?>">
                  </div>

                  <button type="submit" class="btn btn-primary">Submit</button>
                  </form>

               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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