<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">


         <title><?php echo $meta_title; ?></title>

         <meta name="og_title" property="og:title" content="<?php echo $meta_title; ?>"/>

         <meta name="Keywords" content="<?php echo $meta_keywords; ?>"/>

         <meta name="Description" content="The Metal PowderCompany Limited (MEPCO), commenced it's operation in 1961, is one of the leading manufacturers of Non - Ferrous Metal Powders and pastes globally."/>

        <!--Fontawesom-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/site/css/font-awesome.min.css">

        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />

         <?php
        if($this->uri->segment(1) == "gallery")
        {
            ?>
            <!--Gallery-->
            <link rel="stylesheet" href="<?php echo base_url(); ?>assets/site/css/isotope/style.css"">
            <?php
        }
       else if($this->uri->segment(1) == 'contact-us' || $this->uri->segment(1) == 'mepco-speciality-products' || $this->uri->segment(1) == 'awards-certifications'
        || $this->uri->segment(1) == 'share-holders'){ ?>
        <link href="<?php echo base_url(); ?>assets/site/css/app.css" rel="stylesheet" type="text/css">
        <?php } ?>

        <!--Animated CSS-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/site/css/animate.min.css">

        <!-- Bootstrap -->
        <link href="<?php echo base_url(); ?>assets/site/css/bootstrap.min.css" rel="stylesheet">

        <?php
        if($this->uri->segment(1) == ''){ ?>


        <!--Bootstrap Carousel-->
        <link type="text/css" rel="stylesheet" href="css/carousel.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/site/css/isotope/style.css">

        <?php }
        ?>

        <!--Main Stylesheet-->
        <link href="<?php echo base_url(); ?>assets/site/css/style.css" rel="stylesheet">
        <!--Responsive Framework-->
        <link href="<?php echo base_url(); ?>assets/site/css/responsive.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>assets/site/css/bs_leftnavi.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body data-spy="scroll" data-target="#header">

        <!--Start Hedaer Section-->
        <section id="header">
            <div class="header-area">

                <!--End of top header-->
                <div class="header_menu text-center"  data-offset-top="50" id="nav">
                    <div class="container">
                        <nav class="navbar navbar-default zero_mp ">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand custom_navbar-brand" href="#" id="Logo"><img src="<?php echo base_url(); ?>assets/site/img/logo.png" alt=""></a>
                            </div>
                            <!--End of navbar-header-->

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse zero_mp" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav navbar-right main_menu">
                                    <li <?php echo $active_class = ($active_menu == "home")?'class="active"':''; ?>>
                                        <a href="<?php echo base_url(); ?>">
                                            Home
                                        </a>
                                    </li>
                                    <li <?php echo $active_class = ($active_menu == "about-us")?'class="active"':''; ?>>
                                        <a href="<?php echo site_url('about-us'); ?>">about us</a>
                                    </li>
                                    <li <?php echo $active_class = ($active_menu == "products")?'class="active"':''; ?>>
                                        <a href="<?php echo site_url('all-products'); ?>">Products</a>
                                    </li>
                                    <li <?php echo $active_class = ($active_menu == "applications")?'class="active"':''; ?>>
                                        <a href="<?php echo site_url('all-applications'); ?>">Applications</a>
                                    </li>
                                    <li <?php echo $active_class = ($active_menu == "gallery")?'class="active"':''; ?>>
                                        <a href="<?php echo site_url('gallery'); ?>">Gallery</a>
                                    </li>
                                    <li <?php echo $active_class = ($active_menu == "global-presence")?'class="active"':''; ?>>
                                        <a href="<?php echo site_url('global-presence'); ?>">Global Presence</a>
                                    </li>
                                    <li <?php echo $active_class = ($active_menu == "feedback")?'class="active"':''; ?>>
                                        <a href="<?php echo site_url('feedback'); ?>">Feedback</a>
                                    </li>
                                    <li <?php echo $active_class = ($active_menu == "contact-us")?'class="active"':''; ?>>
                                        <a href="<?php echo site_url('contact-us'); ?>">contact us</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.navbar-collapse -->
                        </nav>
                        <!--End of nav-->
                    </div>
                    <!--End of container-->
                </div>
                <!--End of header menu-->






                <div class="top_header">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 col-md-5 col-sm-5 col-xs-9">
                                <div class="address">
                                    <i class="fa fa-search floatright"></i>
                                    <!-- <input type="text" placeholder="Search for Products, Applications"> -->
                                    <form action='' method='post'>
                                    <input placeholder="Search for Products, Applications" id="searchPlaceText" type='text' name='country' class='auto' value="<?php echo $search_title = isset($search_title)?$search_title:''; ?>">
                                </form>
                                </div>
                            </div>

                            <div class="col-md-8 latest-news" style="display: none;">
                                    <div class="breakingNews" id="bn4">
                                    <div class="bn-title"><h2>News :</h2>
                                    </div>
                                    <ul style="left: 115px; text-align: left;">

                                    <?php
                                    foreach ($news_widget as $key => $value) {
                                    ?>
                                        <li>
                                            <a href="<?php echo $value['slug_url']; ?>">
                                                <span><?php echo $value['news_title'] ;?></span>
                                                    - <?php echo $value['news_description'] ;?>
                                            </a>
                                        </li>
                                    <?php
                                    }
                                    ?>

                                    </ul>
                                    <!-- <div class="bn-navi">
                                    <span></span>
                                    <span></span>
                                    </div> -->
                                    </div>
                            </div>

                            <div class="col-md-2 floatright social-widget">
                                <div class="social_icon text-right">
                                    <a href="#"><i class="fa fa-facebook-square"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                    <a href="#"><i class="fa fa-youtube-play"></i></a>


                                    <?php
                                    if(isset($_SESSION['compare-pro']) && count($_SESSION['compare-pro'])){
                                        $compare_procount = count($_SESSION['compare-pro']);
                                        $displayNone = "display:inline-block";
                                    }
                                    else
                                    {
                                        $compare_procount = 0;
                                        $displayNone = "display:none";
                                    }
                                    ?>
                                     <a style="<?php echo $displayNone; ?>" class="compare-product-tag" href="<?php echo site_url('compare-products'); ?>" alt="Compare Products" title="Compare Products"><i class="fa fa-tags" aria-hidden="true">
                                        <sup id="fa-tag-total-count"><?php echo $compare_procount; ?></sup>
                                    </i></a>


                                </div>
                            </div>
                            <!--End of col-md-4-->
                        </div>
                        <!--End of row-->
                    </div>
                    <!--End of container-->
                </div>
            </div>
            <!--end of header area-->
        </section>
        <!--End of Hedaer Section-->