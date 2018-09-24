
        <!--Start of heading section-->
        <div class="heading-section">
        <div class="container">
        <h3>Careers</h3>
         <ol class="breadcrumb breadcrumb-right-arrow">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Careers</li>
        </ol>
        </div>
    </div>
        <!--End of heading section-->

        <div class="page-heading">
    </div>

    <div class="container">

<?php
if($this->uri->segment(2) == "success"){
?>
<style type="text/css">
.success{
      border: 1px solid;
      /*margin: 10px 0px;*/
      padding: 15px 10px 15px 50px;
      background-repeat: no-repeat;
      background-position: 10px center;
      color: #4F8A10;
      background-color: #DFF2BF;
      background-image: url('http://<?php echo base_url(); ?>/assets/site/img/Q9BGTuy.png');
      border-radius: 5px;
      max-width: 700px;
      width: 100%;
      margin: 1% auto;
      overflow: hidden;
    }
</style>
</style>
<div class="success">Your have submitted the details successfully!. <strong><a href="<?php echo site_url('careers'); ?>">Go back</a></strong></div>
<?php
}
?>
    </div>

