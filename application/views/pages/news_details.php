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
                <h3>News</h3>
                     <ol class="breadcrumb breadcrumb-right-arrow">
                          <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                          <li class="breadcrumb-item active">News</li>
                    </ol>
            </div>
        </div>
        <!--End of heading section-->

        <div class="page-heading">
        <h2>News</h2>
        </div>


       <div class="container">
        <!-- Start of Vertical Navigation-->
<?php $this->load->view("pages/news_sidebar.php"); ?>

<div class="col-lg-8 col-md-7 col-xs-12 floatright p-0">
    <div class="product-detail">
    <h4><?php echo $product_name = (isset($product_name) && !empty($product_name))?$product_name:''; ?></h4>




    <p align="justify">
      <?php echo $product_description = (isset($product_description) && !empty($product_description))?$product_description:''; ?>
      <?php /*echo $product_description;*/

      if(empty($product_name) && empty($product_description)){
          echo "News Was Expired.";
      }
      ?>
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
/*$download_file_path = base_url().$img_dir_path.$file_path;
if(file_exists($download_file_path) == false && !empty($file_path)){
  ?>

<div class="floatright">
  <a href="<?php echo $download_file_path; ?>" target="_blank">
    <img src="<?php echo base_url().$assets_img_path.'pdf-icon.jpg'; ?>">
  </a>
</div>

<?php
}*/
?>

</div>

</div>


</div>
