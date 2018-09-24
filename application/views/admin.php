<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
    <!-- css -->
    <link href="<?php echo base_url(); ?>common/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>common/css/menu.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>common/css/core_bid.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>common/css/components_bid.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>common/css/icons.css" rel="stylesheet" type="text/css" />
    
    <link href="<?php echo base_url(); ?>common/css/responsive.css" rel="stylesheet" type="text/css" />
    
    <link href="<?php echo base_url(); ?>common/css/style.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>common/css/custombox.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>common/css/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
    
    <link href="<?php echo base_url(); ?>common/css/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" /> 
</head>
<body>
    <div id="wrapper">
        <div class="toplogobar">
            <div class="toplogobar-logo" style="float: left;"> <span>
            	<img src="" title="Logo Here" alt="Logo Here" height="80" style="background-color: #fff; padding: 5px; border-radius: 35px;"></span>
            </div>

            <div style="float: left; margin-left: 30%;">
            	<span class="logo-title" style=" vertical-align: -webkit-baseline-middle;">Admin Portal</span>
            </div>
            <div style="float: right; margin-right: 20px; font-size: 14px; font-weight: bold; margin-bottom: 0px;">
            	Welcome Admin !
            </div>
        </div>
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
                            <li>
                                <a href="bidder_widgets.html">DASHBOARD</a>
                            </li>
                            <li>
                                <a href='<?php echo site_url('admin/employees_management')?>'>PRODUCT & APPLICATIONS</a>
                            </li>
                            <li>
                                <a href='<?php echo site_url('admin/customers_management')?>'>CATEGORY</a>
                            </li>
                            <li>
                                <a href='<?php echo site_url('admin/orders_management')?>'>GALLERY</a>
                            </li>
                            <li>
                                <a href='<?php echo site_url('admin/offices_management')?>'>NEWS</a>
                            </li>
                            <li>
                                <a href='<?php echo site_url('admin/employees_management')?>'>FAQ</a>
                            </li>
                            <li class="dropdown user-box">
                                <a href="javascript:void(0);" class="dropdown-toggle waves-effect waves-light profile " data-toggle="dropdown" aria-expanded="true">
                                	MY ACCOUNT
                                	<span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0);">Logged in as:<br><span>Rabik</span></a></li>
                                    <li><a href="profile_bidder_user.html"><i class="ti-settings m-r-5"></i> Profile</a></li>
                                    <li><a href="bidder_settings.html"><i class="ti-settings m-r-5"></i> Settings</a></li>
                                    <li><a href="index.html"><i class="ti-power-off m-r-5"></i> Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

      
        <div class="content-page">
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div id="animationSandbox">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-9">
                                <div class="portlet">
                                    <div class="portlet-heading bg-info">
                                        <h3 class="portlet-title">
                                        List Page
                                        </h3>
                                        <div class="portlet-widgets">
                                            <a href="#" onclick="location.href='#'"></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>                                   
                                    <?php echo $output; ?>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>

<style type="text/css">
.ptogtitle {
    display: none;
}
.tDiv3 {
    display: none;
}
.edit-icon, .delete-icon{
	background:none !important;
	font-size: 18px;
}

</style>
</body>
</html>
