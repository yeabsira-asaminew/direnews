<aside class="main-sidebar hidden-print ">
    <section class="sidebar" id="sidebar-scroll">
        <!-- Sidebar Menu-->
        <ul class="sidebar-menu">
            <li class="nav-level">--- Navigation</li>
            <li class="active treeview">
                <a class="waves-effect waves-dark" href="<?php echo base_url('journalist/JournalistDashboard'); ?>">
                    <i class="icon-speedometer"></i><span> Dashboard</span>
                </a>
            </li>


            <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-docs"></i><span> News</span><i class="icon-arrow-down"></i></a>
                <ul class="treeview-menu">
                    <li class="treeview"><a href="<?php echo base_url('journalist/News/add'); ?>"><i class="icon-arrow-right"></i><span> Add News</span><i class="icon-arrow-down"></i></a></li>

                    <li><a class="waves-effect waves-dark" href="<?php echo base_url('journalist/News/managenews'); ?>" target="_blank"><i class="icon-arrow-right"></i> Manage News</a></li>

                    <!--  <li><a class="waves-effect waves-dark" href="<?php echo base_url('journalist/News/getmarks'); ?>" target="_blank"><i class="icon-arrow-right"></i> View News</a></li> -->
                </ul>
            </li>
        </ul>
    </section>
</aside>