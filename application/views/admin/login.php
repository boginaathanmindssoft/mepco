<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Mepco</title>
    <link href='<?php echo base_url(); ?>common/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
    <link href='<?php echo base_url(); ?>common/css/core.css' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url(); ?>common/css/pages.css" rel="stylesheet" type="text/css" />
<!--     <link href="<?php echo base_url(); ?>common/css/components.css" rel="stylesheet" type="text/css" />   -->
    <link href="<?php echo base_url(); ?>common/app/css/login.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>common/css/toastr/toastr.min.css" rel="stylesheet" type="text/css">
    <!-- <script src="common/js/toastr/toastr.min.js"></script> -->
    <style type="text/css">
        .container.login-page, html, body {
            background-color: #fdfdfd;
        }
        .login-title-text{
            color: #814e4b;
        }

    </style>
    <script type="text/javascript">
    var SITE_URL = "<?php echo base_url(); ?>";
    var active_page = '';
    </script>

</head>
<body>
       <div id="toast-container" class="toast-top-center" aria-live="polite" role="alert"
       style="display: none;">
            <div class="toast">
                <div class="toast-message"></div>
            </div>
        </div>




     <div class='container login-page'>
        <div class=''>
            <div class="site-logo text-center m-t-30 m-b-20" >
                <img src="<?php echo base_url(); ?>common/img/mepco-logo.jpg">
            </div>
            <div style="clear:both;"></div>
            <div class="wrapper-page">
                <div class="m-t-30 card-box">
                    <div class="text-center">
                        <h4 class="text-uppercase font-bold m-b-0 login-title-text">Login</h4>
                    </div>
                    <div class="panel-body">
                        <div class="form-horizontal m-t-10">
                            <div class="form-group has-feedback">
                                <div class="col-xs-12">
                                    <input class="form-control" type="text" id="username" placeholder="Username" value="mepco">
                                    <i class="glyphicon glyphicon-user glyphicon-2x form-control-feedback l-h-34"></i>
                                </div>
                            </div>
                            <div class="form-group has-feedback">
                                <div class="col-xs-12">
                                    <input class="form-control" type="password" id="password" placeholder="Password" value="123456">
                                    <i class="glyphicon glyphicon-lock glyphicon-2x form-control-feedback l-h-34"></i>
                                </div>
                            </div>
                            <div class="form-group text-center m-t-20 m-b-0">
                                <div class="col-xs-12">
                                    <button class="btn btn-primary btn-bordred btn-block waves-effect waves-light text-uppercase" id="login-admin" type="button">
                                        <span class="button-text">Login</span>
                                        <img style="display: none;" class="button-loader" src="<?php echo base_url(); ?>common/img/loader.gif">

                                    </button>


                                </div>
                            </div>
                            <div class="form-group text-center m-t-20 m-b-0">
                                <div class="col-sm-12">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script type="text/javascript" src="<?php echo base_url(); ?>common/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>common/app/js/api-js-base.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>common/app/js/login.js"></script>

