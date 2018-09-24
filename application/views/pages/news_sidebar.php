<!-- Start of Vertical Navigation-->
<div class="gw-sidebar col-md-3 p-0">
  <div id="gw-sidebar" class="gw-sidebar">
    <div class="nano-content">
    <h4>PRODUCT CATEGORIES</h4>
      <ul class="gw-nav gw-nav-list">

      <?php
      if(count($news_widget) > 0){
        //print_r($category_list);
      foreach($news_widget as $key => $value){

        $news_title = isset($value['news_title'])?$value['news_title']:'';
        $slug_url = isset($value['slug_url'])?$value['slug_url']:'';
        $news_description = isset($value['news_description'])?$value['news_description']:'';
        $news_short_title = isset($value['news_short_title'])?$value['news_short_title']:'';
        if(strlen($news_title) >= 40){
            $news_title = $news_short_title."..";
        }
        ?>
        <li class="init-arrow-down">
            <a href="<?php echo $slug_url; ?>" title="<?php echo $news_title; ?>">
                <span class="gw-menu-text">
                    <?php echo $news_title; ?>
                </span>
                <b class="gw-arrow"></b>
            </a>
        </li>

        <?php
      }
  }
      ?>

      </ul>
    </div>
  </div>
</div>