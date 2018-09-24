
<style type="text/css">
li.curlink a {
    font-weight: 600!important;
    color: #000 !important;
}
.pagination-num-links {
text-align: center;
}
</style>


        <!--Start of heading section-->
        <div class="heading-section">
            <div class="container">
                <h3>Products</h3>
                     <ol class="breadcrumb breadcrumb-right-arrow">
                          <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                          <li class="breadcrumb-item"><a href="<?php echo site_url('all-applications'); ?>">Applications</a></li>

                           <li class="breadcrumb-item active"><?php echo $category_name; ?></li>
                    </ol>
            </div>
        </div>
        <!--End of heading section-->

        <div class="page-heading">
        <h2>MEPCO Applications</h2>
        </div>


       <div class="container">
        <!-- Start of Vertical Navigation-->
<?php $this->load->view("pages/application_sidebar.php"); ?>

<div class="col-lg-8 col-md-7 col-xs-12 floatright p-0">
<?php
if(count($results) > 0){

 foreach($results as $key => $value){

    $value = (Object) $value;
            $trans_title = (isset($value->trans_title) && !empty($value->trans_title))?$value->trans_title:'';
            ?>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 wow fadeIn">
            <div class="inner-img">
                <!-- <img class="subproductimage" src="img/aluminium-1.jpg"> -->
                <?php

                if(!empty($value->image_path)){
                    $img_jpg = $value->image_path;
                }
                else{
                    $img_jpg = 'no-image.jpg';
                }
                $img = base_url().$img_dir_path.$img_jpg;
                if(file_exists($img) == false){
                    ?>
                    <a href="<?php echo $value->application_url; ?>">
                     <img src="<?php echo $img; ?>">
                    </a>
                    <?php
                    }
                ?>
                <a href="<?php echo $value->application_url; ?>">
                <h4 class="col-lg-10 col-md-10 col-sm-10 col-xs-10 p-0">
                    <?php echo  $trans_title; ?>
                </h4>
                </a>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 quickview-icon floatright">
                    <!-- <img src="<?php echo base_url(); ?>assets/site/img/view-icon.jpg"> -->
                    <a href="javascript:void(0);" class="myBtn" data-product-id="<?php echo base64_encode($value->tran_id); ?>">
                        <img src="<?php echo base_url(); ?>assets/site/img/view-icon.jpg">
                    </a>
                </div>
            </div>

        </div>


<?php }
?>
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 2%; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    /*padding: 20px;*/
    border: 1px solid #888;
    width: 80%;
}

/* The Close Button */
.close {
    color: #000;
    float: right;
    font-size: 35px;
    font-weight: bold;
    margin-right: 3%;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
.apply-bg{
background-color: #fff;
padding: 30px 15px 0px 15px;
min-height: 600px;
width: 100%;
}
.col-md-8.floatright.quick_view_details {
    margin-top: 4%;
}
.quick-view-download {
    margin-top: 5%;
}
.col-md-11.floatleft.product_name {
    white-space: pre-wrap;
}
</style>
<!-- The Modal -->
<div id="myModal" class="myModal modal">

  <!-- Modal content -->
  <div class="modal-content">

  </div>

</div>

<?php
}
else
    {
        ?>
         <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
            <p>No Records Found.</p>
        </div>
        <?php
    }
    ?>
</div>


</div>

        <!-- End of Vertical Navigation-->






        <div style="clear: both;"></div>
        <div class="pagination-num-links">
            <?php echo $links; ?>
        </div>



