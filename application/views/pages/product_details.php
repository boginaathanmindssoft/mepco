<style type="text/css">
li.curlink a {
    font-weight: 600!important;
    color: #000 !important;
}
.pagination-num-links {
text-align: center;
}
a.product-compare {
    float: right;
    padding: 2px 4px 0px 5px;
}
</style>

        <!--Start of heading section-->
        <div class="heading-section">
            <div class="container">
                <h3>Products</h3>
                     <ol class="breadcrumb breadcrumb-right-arrow">
                          <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                          <li class="breadcrumb-item"><a href="<?php echo site_url('products'); ?>">Products</a></li>
                          <li class="breadcrumb-item"><a href="<?php echo $category_url ?>"><?php echo $category_name; ?></a></li>

                           <li class="breadcrumb-item active"><?php echo $product_name; ?></li>

                    </ol>
            </div>
        </div>
        <!--End of heading section-->

        <div class="page-heading">
        <h2>MEPCO Products</h2>
        </div>


       <div class="container wow fadeIn">
        <!-- Start of Vertical Navigation-->
<?php $this->load->view("pages/product_sidebar.php"); ?>

<div class="col-lg-8 col-md-7 col-xs-12 floatright p-0">
    <div class="product-detail">
    <h4><?php echo $product_name; ?></h4>

    <div style="clear: both;"></div>
    <?php
$visible = FALSE;
if($product_id > 0){
  if(isset($_SESSION['compare-pro']) && count($_SESSION['compare-pro']) < 3){
    $visible = TRUE;
  }
  else if(!isset($_SESSION['compare-pro'])){
    $visible = TRUE;
  }

  if(isset($_SESSION['compare-pro']) && array_key_exists($product_id, $_SESSION['compare-pro']) == true){
    $visible = FALSE;
    $enable_compared_icon = TRUE;
  }

  if($visible == TRUE){
  ?>
  <div class="floatleft">
    <a href="javascript:void(0);" class="product-compare" data-compare-id="<?php echo $product_id; ?>">  
      Compare
    </a>
    <!-- <input type="checkbox" id="product-compare-checkbox"> -->
  </div>
<?php
  }

  if(isset($enable_compared_icon) && $enable_compared_icon == TRUE){
    ?>
    <!-- <input type="checkbox" id="product-compare-checkbox">Compared -->
    <?php
  }
}
?>
<div style="clear: both;"></div>
<div style="clear: both;"></div>





    <?php

                if(!empty($image_path)){
                    $img_jpg = $image_path;
                }
                else{
                    $img_jpg = 'no-image.jpg';
                }
                $img = base_url().$img_dir_path.$img_jpg;
                if(file_exists($img) == false){
                    ?>
                     <img src="<?php echo $img; ?>">
                    <?php
                  }
                  ?>



    <p align="justify">
      <?php echo html_entity_decode($product_description); ?>
    </p>

    </div>
<div class="product-list">
<!-- <ul class="floatleft">
  <li>Lorem Ipsum</li>
  <li>Lorem Ipsum</li>
  <li>Lorem Ipsum</li>
  <li>Lorem Ipsum</li>
</ul> -->

<?php
$download_file_path = base_url().$img_dir_path.$file_path;
if(file_exists($download_file_path) == false && !empty($file_path)){
  ?>

<div class="floatright">
  <a href="<?php echo $download_file_path; ?>" target="_blank">
    <img src="<?php echo base_url().$assets_img_path.'pdf-icon.jpg'; ?>">
  </a>
</div>

<?php
}
?>


</div>

</div>


</div>












<div id="myModal" class="myModal modal" style="display: none;">
  <!-- Modal content -->
  <div class="modal-content"></div>
</div>

<style>
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
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    min-height: 50%;
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