
        <!--Start of heading section-->
        <div class="heading-section">
            <div class="container">
                <h3>Products</h3>
                     <ol class="breadcrumb breadcrumb-right-arrow">
                          <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                          <li class="breadcrumb-item active">Compare Products</li>
                    </ol>
            </div>
        </div>
        <!--End of heading section-->

        <div class="page-heading">
        <h2>MEPCO Products</h2>
        </div>


       <div class="container compare-product-section">

        <?php
        if(isset($compare_product_list) && count($compare_product_list) > 0){
            ?>
        <div class="row">
            <a href="javascript:void(0);" class="clearProducts">Clear All</a>
        </div>
        <div class="row">


        <?php

        foreach($compare_product_list as $key => $value){

            $title = isset($value->trans_title)?$value->trans_title:"";
            $category_name = isset($value->category_name)?$value->category_name:"";

            $details = isset($value->details)?$value->details:"";
        ?>


        <div class="column column_1" style="background-color:#f0eff4;">
        <h3><?php echo $title; ?></h3>
        <p><?php echo $category_name; ?></p>


        <div class="compare-product-description">
            <p><?php echo $details; ?></p>
        </div>
        </div>
        <!-- <div class="column column_2" style="background-color:#f0eff4;">
         <h3>Column 1</h3>
        <p>Some text..</p>
        </div>
        <div class="column column_3" style="background-color:#f0eff4;">
        <h3>Column 1</h3>
        <p>Some text..</p>
        </div> -->
        <?php
            }

        ?>
        </div>
        <?php
        }
        else
        {
            ?>
            <p>No Products.</p>
            <?php

        }
    ?>


       </div>

        <!-- End of Vertical Navigation-->






        <div style="clear: both;"></div>




<style>
* {
    box-sizing: border-box;
}

/* Create three equal columns that floats next to each other */
.column {
    float: left;
    width: 33.33%;
    padding: 10px;
    height: 300px; /* Should be removed. Only for demonstration */
    border-right: 1px solid #854a4c;
    overflow: scroll;
    min-height: 500px;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}
</style>