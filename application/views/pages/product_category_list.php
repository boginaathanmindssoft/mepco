
<style type="text/css">
li.curlink a {
    font-weight: 600!important;
    color: #000 !important;
}
.pagination-num-links {
text-align: center;
}
.desc-min-height {
    min-height: 100px;
}

</style>


        <!--Start of heading section-->
        <div class="heading-section">
            <div class="container">
                <h3>Products</h3>
                     <ol class="breadcrumb breadcrumb-right-arrow">
                          <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                          <li class="breadcrumb-item active">Products</li>
                    </ol>
            </div>
        </div>
        <!--End of heading section-->

        <div class="page-heading">
        <h2>MEPCO Products</h2>
        </div>

        <div class="container">
        <div class="row">


    <?php
    if(!empty($results) && count($results) > 0)
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
            $product_url = site_url('products')."/".$slug_name;
        ?>

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 wow fadeIn">
            <div class="product-items">
                <a href="<?php echo $product_url; ?>">
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
                <p class="desc-min-height" align="justify">
                    <?php $category_description = isset($value->category_description)?$value->category_description:'';
                        echo $category_description = substr($category_description, 0, 250);
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

          <!--   <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="product-items">
        <div class="product-list-image">
        <img src="<?php echo base_url(); ?>assets/site/img/bismuth.jpg" class="img-responsive">
        <span><h3>Bismuth</h3></span>
        </div>
        <p>Lorem Ipsum is simply dummy text of the printing and
typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
when an unknown printer took a galley of type and scrambled it to make a type specimen book.
It has survived not only five centuries,
but also the leap into electronic typesetting, remaining essentially unchanged.</p>
        </div>
        </div>



            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="product-items">
        <div class="product-list-image">
        <img src="<?php echo base_url(); ?>assets/site/img/Calcium Silicide.jpg" class="img-responsive">
        <span><h3>Calcium Silicide</h3></span>
        </div>
        <p>Lorem Ipsum is simply dummy text of the printing and
typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
when an unknown printer took a galley of type and scrambled it to make a type specimen book.
It has survived not only five centuries,
but also the leap into electronic typesetting, remaining essentially unchanged.</p>
        </div>
        </div>
        <div class="clearfix"></div>


            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="product-items">
        <div class="product-list-image">
        <img src="<?php echo base_url(); ?>assets/site/img/Cobalt.jpg" class="img-responsive">
        <span><h3>Cobalt</h3></span>
        </div>
        <p>Lorem Ipsum is simply dummy text of the printing and
typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
when an unknown printer took a galley of type and scrambled it to make a type specimen book.
It has survived not only five centuries,
but also the leap into electronic typesetting, remaining essentially unchanged.</p>
        </div>
        </div>




        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="product-items">
        <div class="product-list-image">
        <img src="<?php echo base_url(); ?>assets/site/img/Copper.jpg" class="img-responsive">
        <span><h3>Copper</h3></span>
        </div>
        <p>Lorem Ipsum is simply dummy text of the printing and
typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
when an unknown printer took a galley of type and scrambled it to make a type specimen book.
It has survived not only five centuries,
but also the leap into electronic typesetting, remaining essentially unchanged.</p>
        </div>
        </div>




        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="product-items">
        <div class="product-list-image">
        <img src="<?php echo base_url(); ?>assets/site/img/Gold-Bronze.jpg" class="img-responsive">
        <span><h3>Gold Bronze</h3></span>
        </div>
        <p>Lorem Ipsum is simply dummy text of the printing and
typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
when an unknown printer took a galley of type and scrambled it to make a type specimen book.
It has survived not only five centuries,
but also the leap into electronic typesetting, remaining essentially unchanged.</p>
        </div>
        </div>

        <div class="clearfix"></div>


        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="product-items">
        <div class="product-list-image">
        <img src="<?php echo base_url(); ?>assets/site/img/Magnesium.jpg" class="img-responsive">
        <span><h3>Magnesium</h3></span>
        </div>
        <p>Lorem Ipsum is simply dummy text of the printing and
typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
when an unknown printer took a galley of type and scrambled it to make a type specimen book.
It has survived not only five centuries,
but also the leap into electronic typesetting, remaining essentially unchanged.</p>
        </div>
        </div>



        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="product-items">
        <div class="product-list-image">
        <img src="<?php echo base_url(); ?>assets/site/img/Phosphorus.jpg" class="img-responsive">
        <span><h3>Phosphorus</h3></span>
        </div>
        <p>Lorem Ipsum is simply dummy text of the printing and
typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
when an unknown printer took a galley of type and scrambled it to make a type specimen book.
It has survived not only five centuries,
but also the leap into electronic typesetting, remaining essentially unchanged.</p>
        </div>
        </div>



        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="product-items">
        <div class="product-list-image">
        <img src="<?php echo base_url(); ?>assets/site/img/Silicon.jpg" class="img-responsive">
        <span><h3>Silicon</h3></span>
        </div>
        <p>Lorem Ipsum is simply dummy text of the printing and
typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
when an unknown printer took a galley of type and scrambled it to make a type specimen book.
It has survived not only five centuries,
but also the leap into electronic typesetting, remaining essentially unchanged.</p>
        </div>
        </div>
         -->


        </div>
        </div>

        <div style="clear: both;"></div>
        <div class="pagination-num-links">
            <?php echo $links; ?>
        </div>



