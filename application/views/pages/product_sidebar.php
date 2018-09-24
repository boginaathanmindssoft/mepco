<!-- Start of Vertical Navigation-->
<div class="gw-sidebar col-md-3 p-0">
  <div id="gw-sidebar" class="gw-sidebar">
    <div class="nano-content">
    <h4>PRODUCT CATEGORIES</h4>
      <ul class="gw-nav gw-nav-list">

      <?php
      $product_list = isset($product_category_list[0])?$product_category_list[0]:'';
      $category_list = isset($product_category_list[1])?$product_category_list[1]:'';
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

        $dependent_products_list = isset($product_list[$key])?$product_list[$key]:'';
        $category_url = (count($dependent_products_list) > 0)?'javascript:void(0);':$category_url;
        ?>
        <li class="init-arrow-down">
            <a href="<?php echo $category_url; ?>" title="<?php echo $category_name; ?>">
                <span class="gw-menu-text">
                    <?php echo $short_category_name; ?>
                </span>
                <b class="gw-arrow"></b>
            </a>

        <?php
        if(isset($dependent_products_list) && count($dependent_products_list) > 0){
          ?>

          <ul class="gw-submenu">

          <?php

          foreach($dependent_products_list as $product_key => $product_value){
            $product_title = isset($product_value['product_title'])?$product_value['product_title']:'';
            $product_short_title = isset($product_value['product_short_title'])?$product_value['product_short_title']:'';

            $product_id = isset($product_value['product_id'])?$product_value['product_id']:'';
            $product_url = isset($product_value['product_url'])?$product_value['product_url']:'';
          ?>

            <li>
                <a href="<?php echo $product_url; ?>" title="<?php echo $product_title; ?>">
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