   <aside class="main-sidebar hidden-print ">
       <section class="sidebar" id="sidebar-scroll">
           <!-- Sidebar Menu-->
           <ul class="sidebar-menu">
               <li class="nav-level">--- Navigation</li>
               <li class="active treeview">
                   <a class="waves-effect waves-dark" href="<?php echo base_url('admin/AdminDashboard'); ?>">
                       <i class="icon-speedometer"></i><span> Dashboard</span>
                   </a>
               </li>

               <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-briefcase"></i><span> Category</span><i class="icon-arrow-down"></i></a>
                   <ul class="treeview-menu">
                       <li><a class="waves-effect waves-dark" href="<?php echo base_url('admin/Category/add'); ?>"><i class="icon-arrow-right"></i> Add</a></li>
                       <li><a class="waves-effect waves-dark" href="<?php echo base_url('admin/Category/view'); ?>"><i class="icon-arrow-right"></i> Manage Category</a></li>

                   </ul>
               </li>


               <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-book-open"></i><span> Sub-Category</span><i class="icon-arrow-down"></i></a>
                   <ul class="treeview-menu">
                       <li><a class="waves-effect waves-dark" href="<?php echo base_url('admin/Category/subcategory'); ?>"><i class="icon-arrow-right"></i> Add </a></li>

                       <li><a class="waves-effect waves-dark" href="<?php echo base_url('admin/Category/managesubcategory'); ?>"><i class="icon-arrow-right"></i> Manage Sub Category</a></li>
                   </ul>
               </li>

               <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-user"></i><span> Authorities</span><i class="icon-arrow-down"></i></a>
                   <ul class="treeview-menu">
                       <li><a class="waves-effect waves-dark" href="<?php echo base_url('admin/RegisterUser'); ?>"><i class="icon-arrow-right"></i> Add</a></li>
                       <li><a class="waves-effect waves-dark" href="<?php echo base_url('admin/ManageUser/manage_user'); ?>"><i class="icon-arrow-right"></i> Manage Authority</a></li>

                   </ul>
               </li>

               <li class="nav-level">--- Menu Level</li>

               <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icofont icofont-company"></i><span> User's Comment</span><i class="icon-arrow-down"></i></a>
                   <ul class="treeview-menu">
                       <li>
                           <a class="waves-effect waves-dark" href="<?php echo base_url('admin/Usercomment'); ?>">
                               <i class="icon-arrow-right"></i>
                               Manage User Comment
                           </a>
                       </li>

                   </ul>
               </li>
           </ul>
       </section>
   </aside>