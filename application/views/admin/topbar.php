<div class="topbar">
    <!-- LOGO -->
    <div class="topbar-left">
        <div class="text-center">
            <a href="admin-dashboard.html" class="logo"> </a>
        </div>
    </div>
    <div class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"><i class="zmdi zmdi-menu"></i></a>
                <div class="pull-left">
                    <span class="clearfix"></span>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right pull-right">
                   <!--  <li>
                        <a href="<?php echo site_url('admin/dashboard')?>">DASHBOARD</a>
                    </li> -->
                     <li>
                        <a href='<?php echo site_url('admin/products')?>'>PRODUCTS</a>
                    </li>
                    <li>
                        <a href='<?php echo site_url('admin/applications')?>'>APPLICATIONS</a>
                    </li>
                    <li>
                        <a href='<?php echo site_url('admin/category/product')?>'>CATEGORY</a>
                    </li>
                    <li>
                        <a href='<?php echo site_url('admin/gallery')?>'>GALLERY</a>
                    </li>
                    <li>
                        <a href='<?php echo site_url('admin/news')?>'>NEWS</a>
                    </li>
                    <li>
                        <a href='<?php echo site_url('admin/faq')?>'>FAQ</a>
                    </li>
                    <li>
                        <a href='<?php echo site_url('admin/career')?>'>CAREER</a>
                    </li>

                    <li class="dropdown user-box closebox">
                        <a href="javascript:void(0);" class="dropdown-toggle waves-effect waves-light profile " data-toggle="dropdown" aria-expanded="true">
                        	MY ACCOUNT
                        	<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="javascript:void(0);">Logged in as:<br>
                                    <span><?php echo $logged_user_name; ?></span>
                                </a>
                            </li>
                            <li><a href="<?php echo site_url('admin/profile/edit/'.$logged_user_id)?>"><i class="ti-settings m-r-5"></i> Profile</a></li>
                            <!-- <li><a href="bidder_settings.html"><i class="ti-settings m-r-5"></i> Settings</a></li> -->
                            <li><a href="<?php echo site_url('admin/logout')?>"><i class="ti-power-off m-r-5"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

