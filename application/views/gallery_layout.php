<?php $this->load->view("admin/header.php"); ?>

<?php
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>

<?php $this->load->view("admin/topbar.php", $logged_user_name); ?>



    <div class="content">
        <div class="container">
            <div class="row">
            	<div class="col-sm-2 m-t-30"></div>
                <div class="col-sm-8 m-t-30 dashboard-home">
                    <?php echo $output; ?>
                </div>
                <div class="col-sm-2 m-t-30"></div>
            </div>
            <div class="row">
                <!-- end col -->
            </div>
        </div>
        <!-- content -->
    </div>


    <?php $this->load->view("admin/footer.php"); ?>

    <?php foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>

<style type="text/css">
#data_image_preview li, #image_preview li {
    display: inline-block;
    width: 13%;
    margin: 3px 30px 14px 18px;
}

ul#image_preview, ul#data_image_preview {
    width: 100%;
    padding-top: 3%;
}
.clonedivv {
    width: 150px;
    text-align: center;
    float: left;
    margin: 0;
    padding: 0;
    border: 6px solid #ddd;
}
img.cloneImg {
    width: 100%;
    position: inherit;
}
div.flexigrid a {
    color: #814e4a !important;
    font-weight: 600;
}
</style>
