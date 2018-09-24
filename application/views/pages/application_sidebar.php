<div class="gw-sidebar col-md-3 p-0">
  <div id="gw-sidebar" class="gw-sidebar">
    <div class="nano-content">
    <h4>APPLICATION CATEGORIES</h4>
      <ul class="gw-nav gw-nav-list">

      <?php
      $product_list = isset($application_category_list[0])?$application_category_list[0]:'';
      $category_list = isset($application_category_list[1])?$application_category_list[1]:'';
      if(count($category_list) > 0){
        //print_r($category_list);
      foreach($category_list as $key => $value){
        $category_name = isset($value['category_name'])?$value['category_name']:'';
        $short_category_name = isset($value['category_name'])?$value['category_name']:'';
         if(strlen($short_category_name) >= 40){
                $short_category_name = substr($category_name, 0, 40);
                $short_category_name .= "..";
          }
        $category_url = isset($value['category_url'])?$value['category_url']:'';
        $category_id = isset($value['category_id'])?$value['category_id']:'';

        $dependent_application_list = isset($product_list[$key])?$product_list[$key]:'';
        $category_url = (count($dependent_application_list) > 0)?'javascript:void(0);':$category_url;
        ?>
        <li class="init-arrow-down">
            <a href="<?php echo $category_url; ?>" title="<?php echo $category_name; ?>">
                <span class="gw-menu-text">
                    <?php echo $short_category_name; ?>
                </span>
                <b class="gw-arrow"></b>
            </a>

        <?php
        if(isset($dependent_application_list) && count($dependent_application_list) > 0){
          ?>

          <ul class="gw-submenu">

          <?php

          foreach($dependent_application_list as $product_key => $product_value){
            $product_title = isset($product_value['product_title'])?$product_value['product_title']:'';
            $product_short_title = isset($product_value['product_short_title'])?$product_value['product_short_title']:'';

            $product_id = isset($product_value['product_id'])?$product_value['product_id']:'';
            $application_url = isset($product_value['application_url'])?$product_value['application_url']:'';
          ?>

            <li>
                <a href="<?php echo $application_url; ?>" title="<?php echo $product_title; ?>">
                <?php echo $product_short_title; ?>
                </a>
            </li>
          <?php
            }

          ?>


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