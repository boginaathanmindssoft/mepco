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

