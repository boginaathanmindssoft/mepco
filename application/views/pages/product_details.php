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











<div class="center">
<table class="product-grades-table" border="0" cellpadding="0" cellspacing="0" width="100%">
  <tbody>
  <tr>
    <td>
      <form id="compareProducts" name="compareProducts">
        <table id="productListing" class="table table-striped product-view full-responsive smartphone" cellpadding="5" cellspacing="1" width="100%">
          <tbody>
          <tr>
            <th class="product-grades-table_pname" align="left" height="24">
              Product Name
            </th>
            <th class="product-grades-table_tds" align="left" height="24">
              Technical Data Sheet
            </th>
            <th class="product-grades-table_shades" align="left" height="24">
              Colour shades
            </th>
            <th class="product-grades-table_markets" align="left" height="24">
              Compare Up To 3 Products
            </th>
          </tr>

          <?php
          foreach($product_grade as $value){   
            ?>
            <tr>
              <td data-label="product name">
                <a data-toggle="modal" id="openLayer<?php echo $value->grade_id; ?>" href="#pDetail<?php echo $value->grade_id; ?>" hidefocus="true" style="outline: none;">
                  <?php echo $value->grade_name; ?>
                    
                  </a>
              </td>
              <td data-label="technical data sheet">

                <?php if(isset($value->file_url)){
                  ?>
                  <a href="<?php echo $value->file_url; ?>" target="_new" class="fileicon" hidefocus="true" style="outline: none;">PDF</a>
                  <?php
                }
                ?>
              </td>
              <td data-label="Colour shades">
                Silver
              </td>
              <td class="static-field" data-label="compare up to 3 products">
                <input type="checkbox" name="ckb" value="4024">
              </td>
            </tr>
          <?php
          }
          ?>
          
          
          
          
                   
          
          <tr>
            <td colspan="3" data-label="
              product name
            ">&nbsp;</td>
            <td data-label="
              technical data sheet
            ">
              <button onclick="compare(this);" type="button" class="btn btn-primary" data-dismiss="modal" data-rootlevel="1" hidefocus="true" style="outline: none;">
                Compare
              </button>
            </td>
          </tr>
          </tbody>
        </table>
      </form>
    </td>
  </tr>
  </tbody>
</table>


<div class="modal fade" id="compareLayer" tabindex="-1" role="dialog" aria-labelledby="productComparison" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-footer" style="height: 20px;padding-top:0">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="modal-body"><div style="float:left;">
    <img src="/assets/default/images/logo/eckart_mt1514886074d.png" pagespeed_no_defer="">
</div>
<div style="float:right;">
    <img src="typo3conf/ext/drive_eckartproductsviewer/assets/icons/endorsement_rgb.gif" pagespeed_no_defer=""><br>

</div>

<div style="clear:both"></div>

<div style="clear: both;height: 50px;"></div></div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>

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