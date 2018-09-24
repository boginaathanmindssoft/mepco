<?php
$static_path = base_url()."assets/site/";
?>
<section id="slider">
            <div id="carousel-example-generic" class="carousel slide carousel-fade" data-ride="carousel" data-interval="3000">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox" style="background: #7e4d49;">
                    <div class="item active" >

                        <div class="col-md-6 col-md-push-1 col-sm-4">
                            <div class="sliderimage"><img src="<?php echo $static_path; ?>img/gallery-1.png" alt="Mepco"></div>
                            <!-- <div class="sliderimage"><img src="<?php echo $static_path; ?>img/gallery-10.png" alt="Mepco"></div> -->
                        </div>

                          <div class="col-md-4 col-md-push-1 col-sm-4">
                           <!--  <img src="img/img1.jpg" alt="..."> -->
                            <div class="carousel-caption">
                                <div class="slidertext">

                                    <h1>eConduct</h1>
                                    <h1>Conductive Coatings</h1>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End of item With Active-->
                   <div class="item" >

                        <div class="col-md-6 col-md-push-1 col-sm-4">
                            <div class="sliderimage"><img src="<?php echo $static_path; ?>img/gallery-1.png" alt="Mepco"></div>
                        </div>

                          <div class="col-md-4 col-md-push-1 col-sm-4">
                           <!--  <img src="img/img1.jpg" alt="..."> -->
                            <div class="carousel-caption">
                                <div class="slidertext">

                                   <h1>eConduct</h1>
                                    <h1>Conductive Coatings</h1>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End of Item-->
                     <div class="item" >

                        <div class="col-md-6 col-md-push-1 col-sm-4">
                            <div class="sliderimage"><img src="<?php echo $static_path; ?>img/gallery-1.png" alt="Mepco"></div>
                        </div>

                          <div class="col-md-4 col-md-push-1 col-sm-4">
                           <!--  <img src="img/img1.jpg" alt="..."> -->
                            <div class="carousel-caption">
                                <div class="slidertext">

                                    <h1>eConduct</h1>
                                    <h1>Conductive Coatings</h1>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End of item-->
                </div>
                <!--End of Carousel Inner-->
            </div>
        </section>
        <!--end of slider section-->



        <!--Start of welcome section-->
        <section id="welcome">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="wel_header wow fadeInUp" data-wow-duration="1s"  data-wow-dealy="3s">
                            <h2>Welcome to MEPCO</h2>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                        </div>
                    </div>
                </div>
                <!--End of row-->

        </section>
        <!--end of welcome section-->





        <!--Start of counter-->
        <section id="blog">
            <div class="counter_img_overlay">
                <div class="container">
                    <div class="row">

                    <div class="col-md-4">

                        <div class="blog_news wow fadeIn" data-wow-duration="3s" data-wow-dealy="3s">
                                <h3>Products</h3>
                            <div class="single_blog_item">
                                <div class="blog_img">
                                    <img src="<?php echo $static_path; ?>img/blog-product.png" alt="">
                                </div>
                                <div class="blog_content">
                                    <h3>Lorem ipsum dolor sit amet, consectetur adipscing </h3>


                                    <p class="blog_news_content">Lorem ipsum dolor sit amet, consectetur adipscing elit. Lorem ipsum dolor sit amet, conse ctetur adipiscing elit. consectetur Lorem ipsum dolor sitamet, conse ctetur adipiscing elit. </p>
                                    <a href="<?php echo site_url('all-products'); ?>" class="blog_link">read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End of col-md-4-->
                       <div class="col-md-4">

                        <div class="blog_news wow fadeIn" data-wow-duration="5s" data-wow-dealy="5s">
                                <h3>Applications</h3>
                            <div class="single_blog_item">
                                <div class="blog_img">
                                    <img src="<?php echo $static_path; ?>img/blog-application.png" alt="">
                                </div>
                                <div class="blog_content">
                                    <h3>Lorem ipsum dolor sit amet, consectetur adipscing </h3>


                                    <p class="blog_news_content">Lorem ipsum dolor sit amet, consectetur adipscing elit. Lorem ipsum dolor sit amet, conse ctetur adipiscing elit. consectetur Lorem ipsum dolor sitamet, conse ctetur adipiscing elit. </p>
                                    <a href="<?php echo site_url('all-applications'); ?>" class="blog_link">read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End of col-md-4-->
                       <div class="col-md-4">

                        <div class="blog_news wow fadeIn" data-wow-duration="7s" data-wow-dealy="7s">
                                <h3>Speciality Products</h3>
                            <div class="single_blog_item">
                                <div class="blog_img">
                                    <img src="<?php echo $static_path; ?>img/Speciality-Products.png" alt="">
                                </div>
                                <div class="blog_content">
                                    <h3>Lorem ipsum dolor sit amet, consectetur adipscing </h3>


                                    <p class="blog_news_content">Lorem ipsum dolor sit amet, consectetur adipscing elit. Lorem ipsum dolor sit amet, conse ctetur adipiscing elit. consectetur Lorem ipsum dolor sitamet, conse ctetur adipiscing elit. </p>
                                    <a href="" class="blog_link">read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End of col-md-4-->


                        <!--End of col-md-12-->
                    </div>
                    <!--End of row-->
                </div>
                <!--End of container-->
            </div>
        </section>
        <!--end of counter-->


        <section id="aboutmepco">
        <div class="container">
        <div class="row">


        <div class="col-lg-6  col-md-6 col-sm-6 col-xs-12 wow fadeIn" data-wow-duration="2s" data-wow-dealy="3.5s">
            <h3>About  MEPCO</h3><br>
        <p>The Metal PowderCompany Limited (MEPCO), commenced it's operation in 1961, is one of the leading manufacturers of Non - Ferrous Metal Powders and pastes globally.  Wide range of products for different applications and continously developing new products meeting any global standards.   Four manufacturing plants in India with a workforce exceeding 1000 people.</p>
     <br/>
<p>The combined capacity exceeds 50000 MT/ Year. Sales depots in India, at New Delhi, Mumbai, Kolkata, Gwalior, Chennai, Madurai and Sivakasi and distribution networks across the country.</p>
     <br/>
<p>ISO 9001 certified company and a global player. All its products are exported to more than 40 countries.
Won several National Awards for export merit and import substitution and process development for Aluminium powder, Gold Bronze powder, Red Phosphorus powder and Magnesium powder.</p>
     <br/>
<p>On the threshold of introducing speciality products for plastics, powder coatings and automotive
coating along with Silica encapsulated and resin coated Pigments.</p>


        </div>


        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 wow fadeIn" data-wow-duration="2s" data-wow-dealy="3.5s">
        <img src="<?php echo $static_path; ?>img/gallery/mm1.jpg" class="topic-image">
        </div>
        </div>
        </div>
        </section>





        <!--start of event-->
        <section id="event">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 wow fadeInLeft" data-wow-duration="2s" data-wow-dealy="5s">
                        <div class="event_news">
                            <div class="event_single_item fix">
                                <div class="event_news_img floatleft">
                                    <img src="<?php echo $static_path; ?>img/group.png" class="group" alt="Mepco Group">
                                </div>
                                <div class="event_news_text">
                                   <h4>Mepco Group</h4>
                                    <p style="padding-top: 30px;">MPMP   &nbsp;&nbsp; | &nbsp;&nbsp;     MSP   &nbsp;&nbsp;   |      &nbsp;&nbsp;MDL    &nbsp;&nbsp; | &nbsp;&nbsp;    NALCO      &nbsp;&nbsp; | &nbsp;&nbsp;     ALCO</p>
                                </div>
                            </div>
                        </div>
                        <div class="event_news">
                            <div class="event_single_item fix">
                                <div class="event_news_img floatleft">
                                   <img src="<?php echo $static_path; ?>img/visionmission.png" class="visionmission" alt="Research & Innovation">
                                </div>
                                <div class="event_news_text">
                                    <h4 style="margin-top: 1px;">Vision</h4>
                                    <p style="font-size: 12px; padding-top: 1px;">Leading customer oriented organization, with a turnover of 3000 Crores by 2020, through TQM, Environment and Employee satisfaction.</p>
                            <h4 style="margin-top: 3px;">Mission</h4>
                                    <p style="font-size: 12px; padding-top: 1px;">We are an innovation driven company providing opportunities for the growth to the entire spectrum of the metal powder application & diversification</p>
                                </div>
                            </div>
                        </div>


                    </div>


                     <div class="col-md-6 wow fadeInRight" data-wow-duration="2s" data-wow-dealy="5s">
                        <div class="event_news">
                            <div class="event_single_item fix">
                                <div class="event_news_img floatleft">
                                     <img src="<?php echo $static_path; ?>img/research.png" class="group" alt="Research & Innovation">
                                </div>
                                <div class="event_news_text">
                                    <a href="#"><h4>Research & Innovation</h4></a>
                                    <p style="font-size: 12px;">MEPCO is having a technology driven R&D centre, recognized by DSIR, focused on innovation of new processes with speed and efficiency. <br/> Our R & D is functioning with spirit of experimentation and collaborative approach to develop world class products and also devoted to improve eco system.</p>
                                </div>
                            </div>
                        </div>
                        <div class="event_news">
                            <div class="event_single_item fix">
                                <div class="event_news_img floatleft">
                                    <img src="<?php echo $static_path; ?>img/commitment.png" class="group" alt="Sustainability & Commitment">
                                </div>
                                <div class="event_news_text">
                                    <a href="#"><h4>Sustainability & Commitment</h4></a>
                                    <p>Commitment to Quality and Customer Care.</p>
                                </div>
                            </div>
                        </div>


                    </div>
                    <!--End of col-md-4-->
                </div>
                <!--End of row-->
            </div>
            <!--End of container-->
        </section>
        <!--end of event-->