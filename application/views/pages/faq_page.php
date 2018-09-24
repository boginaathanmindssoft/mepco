<?php
$static_path = base_url()."assets/site/";
?>
<style type="text/css">
.gw-sidebar {
    width: 100%;
    border-width: 0 1px 0 0;
    bottom: 0;
    top: 0;
    left: 0;
}
.gw-nav-list > li > a {
    display: block;
    height: auto;
    line-height: 20px !important;
    padding: 15px 10px 15px 0px;
    color: #585858;
    text-shadow: none !important;
    font-size: 14px;
    font-weight: bolder;
}
a{
    outline:none !important;
}

.gw-nav-list > li .gw-submenu > li > a{
    padding: 7px 20px 9px 43px !important;
}

</style>

        <!--Start of heading section-->
        <div class="heading-section">
        <div class="container">
        <h3>FAQ</h3>
         <ol class="breadcrumb breadcrumb-right-arrow">
          <li class="breadcrumb-item"><a href="<?php echo site_url('/'); ?>">Home</a></li>
          <li class="breadcrumb-item active">FAQ</li>
        </ol>
        </div>
    </div>
        <!--End of heading section-->

        <div class="page-heading"></div>


    <div class="container">
        <div class="row">
<!-- Start of Vertical Navigation-->
<div class="col-md-2 p-0"></div>
<div class="col-md-8 p-0">
  <div class="gw-sidebar">
    <div class="nano-content">
    <h4>Frequently Ask Questions</h4>
      <ul class="gw-nav gw-nav-list">

      <?php
      if(count($faq_list) > 0){
        //print_r($category_list);
      foreach($faq_list as $key => $value){
        $faq_question = isset($value['faq_question'])?$value['faq_question']:'';
        $faq_answer = isset($value['faq_answer'])?$value['faq_answer']:'';
        ?>
        <li class="init-arrow-down">
            <a href="javascript:void(0);" title="<?php echo $faq_question; ?>">
                <span class="gw-menu-text-span">
                    <p align="justify"><?php echo $faq_question; ?></p>
                </span>
                <b class="gw-arrow"></b>
            </a>

        <?php
        if(isset($faq_answer)){
          ?>

          <ul class="gw-submenu">
            <li>
                <a href="javascript:void(0);" title="<?php echo $faq_answer; ?>">
                <p align="justify"><?php echo $faq_answer; ?></p>
                </a>
            </li>
          </ul>
          <?php
      }
      ?>

        </li>

        <?php
      }
  }
      ?>

      </ul>
    </div>
  </div>
</div>




        </div>
    </div>


        <!--end of portfolio-->



