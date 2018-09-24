
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
                <h3>Applications</h3>
                     <ol class="breadcrumb breadcrumb-right-arrow">
                          <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                          <li class="breadcrumb-item active">Applications</li>
                    </ol>
            </div>
        </div>
        <!--End of heading section-->

        <div class="page-heading">
        <h2>MEPCO Applications</h2>
        </div>

        <div class="container">
        <div class="row">


    <?php
    if(count($results) > 0)
    {


        foreach($results as $key => $value){
            $category_name = (isset($value->category_name) && !empty($value->category_name))?$value->category_name:'';
            $short_category_name = $category_name;
            if(strlen($short_category_name) >= 23){
                $short_category_name = substr($category_name, 0, 23);
                $short_category_name .= "..";
            }

            $slug_name = (isset($value->category_name) && !empty($value->category_name))?$value->category_name:'un-name';
            $slug_name = $slug_name.'-'.$value->category_id;
            $slug_name = strtolower($slug_name);
            $slug_name = preg_replace("/\W+/", "-", $slug_name);
            $slug_name = preg_replace('/[^A-Za-z0-9\-]/', '', $slug_name);
            $slug_name = trim($slug_name, "-");
            $application_url = site_url('applications')."/".$slug_name;
        ?>

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 wow fadeIn">
            <div class="product-items">
                <a href="<?php echo $application_url; ?>">
            <div class="product-list-image">

                <?php
                if(!empty($value->category_image)){
                    $img_jpg = $value->category_image;
                }
                else{
                    $img_jpg = 'no-image.jpg';
                }
                $img = base_url().$img_dir_path.$img_jpg;

                if(file_exists($img) == false){
                    ?>
                     <img src="<?php echo $img; ?>" class="img-responsive">
                    <?php
                    }
                ?>


                <span>
                    <h3 title="<?php echo $category_name; ?>">
                        <?php echo $short_category_name; ?>
                    </h3>
                </span>
            </div>
            </a>
                <p align="justify">
                    <?php $category_description = isset($value->category_description)?$value->category_description:'';

                        if(strlen($category_description) > 250)
                        {
                            $category_description = substr($category_description, 0, 250);
                            echo $category_description.'..';

                        }
                        else
                        {
                            echo $category_description;
                        }
                        ?>
                </p>
            </div>
        </div>

    <?php
        }
    }
    else
    {
    ?>
     <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12 text-center">
        <p>No Records Found.</p>
    </div>
    <?php
    }
    ?>
        </div>
        </div>

        <div style="clear: both;"></div>
        <div class="pagination-num-links">
            <?php echo $links; ?>
        </div>



