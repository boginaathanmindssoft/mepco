

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/site/css/baguetteBox.min.css">

        <!--Start of heading section-->
        <div class="heading-section">
        <div class="container">
        <h3>Gallery</h3>
         <ol class="breadcrumb breadcrumb-right-arrow">
          <li class="breadcrumb-item"><a href="<?php echo site_url('/'); ?>">Home</a></li>
          <li class="breadcrumb-item active">Gallery</li>
        </ol>
        </div>
    </div>
        <!--End of heading section-->

          <div class="page-heading">
        <h2>MEPCO's Gallery</h2>
        </div>

                <section id="portfolio" class="text-center">
            <div class="container">
            <!--End of col-md-2-->
            <div class="colum">
              <?php
                    if(count($gallery_list) > 0){

                      ?>

                <div class="col-lg-2 p-0">
                    <ul id="portfolio_menu" class="menu portfolio_custom_menu">

                        <li>
                        <button data-filter="*" class="my_btn btn_active">Show All <em><?php echo $show_all_count; ?></em></button>
                        </li>
                    <?php

                    foreach($gallery_list as $key => $value){
                          $gallery_id = isset($value->gallery_id)?$value->gallery_id:'';
                          $gallery_category = isset($value->gallery_category)?$value->gallery_category:'';
                           $img_count = isset($value->imgcount)?$value->imgcount:0;

                           if($img_count >= 1){

                        ?>
                         <li>
                            <button data-filter=".gallery_<?php echo $gallery_id; ?>" class="my_btn">
                                <?php echo $gallery_category; ?>
                                <em><?php echo $img_count; ?></em>
                            </button>
                         </li>
                        <?php
                            }
                        }

                      ?>
                            </ul>
                            <!--End of portfolio_menu-->

                </div>
                <?php
                $is_no_record = false;
                }
                      else
                        {
                          $is_no_record = true;
                        }
                        ?>

                <div class="col-lg-10">
                <div class="container p-0">
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="notes tz-gallery wow fadeIn">

                            <?php //print_r($gallery_image_list);

                            if($is_no_record == false){

                            foreach($gallery_image_list as $key => $value){

                                $gallery_category = isset($value->gallery_category)?$value->gallery_category:'';

                                $gallery_type = isset($value->gallery_type)?$value->gallery_type:'';
                                $video_url = isset($value->video_url)?$value->video_url:'';
                                $img_url = isset($value->img_url)?$value->img_url:'';
                                $gallery_id = isset($value->gallery_id)?$value->gallery_id:'';
                                $DIR_PATH = dirname(dirname(dirname(__DIR__)));
                                $check_gallery_image = $DIR_PATH."/assets/uploads/gallery/".$img_url;
                                $img_url = (file_exists($check_gallery_image) == true)?$img_url:'no-img.jpg';
                                $gallery_image = base_url()."assets/uploads/gallery/".$img_url;

                                if(!empty($gallery_image) && $gallery_type == 1){
                                ?>
                                <a class="lightbox" href="<?php echo $gallery_image; ?>">
                                <div class="note infra gallery_<?php echo $gallery_id; ?>">
                                    <div class="img_overlay">
                                        <p><?php echo $gallery_category; ?></p>
                                    </div>
                                    <img src="<?php echo $gallery_image; ?>" alt="">
                                </div>
                              </a>
                                <?php
                                }


                                if(!empty($video_url) && $gallery_type == 2){
                                    $gallery_image = base_url()."assets/site/img/YouTube.png";
                                ?>
                                <a target="_blank" href="<?php echo $video_url; ?>">
                                <div class="note infra gallery_<?php echo $gallery_id; ?>">
                                    <div class="img_overlay">
                                        <p><?php echo $gallery_category; ?></p>
                                    </div>
                                    <img src="<?php echo $gallery_image; ?>" alt="">
                                </div>
                              </a>
                                <?php
                                }


                            }
                          }
                          else
                          {
                            echo "<span class='text-center'>No Record Found.</span>";
                          }
                            ?>
                            </div>
                            <!--End of notes-->
                        </div>
                        <!--End of col-lg-12-->
                    </div>
                    <!--End of row-->
                </div>
                <!--End of container-->
            </div>
            </div>

            <!--End of colum-->
            </div>

        </section>
        <!--end of portfolio-->



