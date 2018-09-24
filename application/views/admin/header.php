<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mepco Admin</title>
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
    <style type="text/css">
        input[type=text] {
            height: 29px !important;
        }
        .header-logo{
            border-radius: 9px;
        }
        textarea {
           min-height: 200px !important;
        }
        .navbar-default{
            background-color: #814e4b;
        }
        .footer {
            color: #9a9da0;
            background: #323332;
        }
        .text-center.copy-right-text {
            font-size: 11px;
        }
        .dropdown-menu > li > a:focus, .dropdown-menu > li > a:hover{
            background-color: #814e4b!important;
        }
        .flexigrid div.add-button.tDiv2{
            float: right;
        }
        .flexigrid div.mDiv{
            background: none !important;
            background-color: #814e4b !important;
        }
        .page-subject-title{
            color: #fff!important;
            padding: 10px !important;
        }
        .ftitle-left{
            color: #fff!important;
        }
        .btn.btn-success.dropdown-toggle.waves-effect.waves-light{
            background-color: #a1923e!important;
            background: none;
            border: none !important;
        }
        .text-left.field-sorting, .text-left.field-sorting.desc {
            background-color: #814e4b !important;
            color: #fff;
        }
        .list_actions {
            background-color: #814e4b !important;
            color: #fff;
            text-align: left !important;
        }
        .flexigrid div.tDiv{
            background: none !important;
            background-color: #fff!important;
        }
        input[type=button] {
            background-color: #a1923e !important;
            color: #fff;
            border: #a1923e;
        }
        div#file_download_url_input_box{
        }
        .qq-upload-button{
            background:none !important;
            background-color: #a1923e !important;
            color: #fff!important;
            padding: 6px 9px!important;
        }
        .delete-icon, .edit-icon, .status-icon{
            background: none !important;
        }
        .delete-icon, .edit-icon, .status-icon{
            font-size: 18px;
        }
        .tools{
            display: inline-flex;
        }
        a.priority-up-down {
            padding: 0px 8px 0px 2px;
        }
        #priority_field_box{
            display: none;
        }
        .link-button.tDiv2 {
            margin: 3px 0px 0px 15px;
        }
        .text-left.unset-field-sorting{
            background-color: #814e4b !important;
            color: #fff;
        }
        div#field_category_id_chosen {
        max-width: 300px;
        }
        .link-button a{
            text-decoration: none !important;
            color: #814e4a !important;
        }
        .link-button a.active{
            text-decoration: underline !important;
            color: #814e4a !important;
            font-weight: 600;
        }
    </style>
    <script type="text/javascript" src="<?php echo base_url(); ?>common/js/jquery.min.js"></script>
    <script type="text/javascript">
        var SITE_URL = "<?php echo base_url(); ?>";
        var active_page = '';
    </script>
</head>
<body>
    <div id="wrapper">
        <div class="toplogobar">
            <div class="toplogobar-logo" style="float: left;"> <span>
            	<img src="<?php echo base_url(); ?>common/img/mepco-logo.jpg" title="Logo Here" alt="Logo Here" height="80" class="header-logo"></span>
            </div>

            <div style="float: left; margin-left: 30%;">
            	<span class="logo-title" style=" vertical-align: -webkit-baseline-middle;">Admin Portal</span>
            </div>
            <div style="float: right; margin-right: 20px; font-size: 14px; font-weight: bold; margin-bottom: 0px;">
            	Welcome Admin !
            </div>
        </div>

        <div class="content-page">