<style type="text/css">
.validation{
    display: block !important;
    clear: both;
    text-align: center;
}
.success{
      border: 1px solid;
      /*margin: 10px 0px;*/
      padding: 15px 10px 15px 50px;
      background-repeat: no-repeat;
      background-position: 10px center;
      color: #4F8A10;
      background-color: #DFF2BF;
      background-image: url('http://<?php echo base_url(); ?>/assets/site/img/Q9BGTuy.png');

      border-radius: 5px;
max-width: 700px;
width: 100%;
margin: 1% auto;
overflow: hidden;

    }
</style>

<div class="heading-section">
<div class="container">
<h3>Feedback</h3>
<ol class="breadcrumb breadcrumb-right-arrow">
<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
<li class="breadcrumb-item active">Feedback</li>
</ol>
</div>
</div>
<div class="page-heading">
<h2>feedback form</h2>
</div>

    <?php
    if($this->uri->segment(2) == "success"){
    ?>
    <div class="success">Your feedback was submitted successfully!.</div>
    <?php
    }
    ?>
<div class="feedback-form">

<form action="<?php echo site_url('feedback'); ?>" method="POST">
    <h1>We appreciate your feedback for improvement and perfection.</h1>
    <div class="contentform">
        <div class="leftcontact">
            <div class="form-group">
                <p>Name <span>*</span></p>
                <span class="icon-case"><i class="fa fa-user"></i></span>
                <input name="feedback_user_name" id="feedback_user_name" data-rule="required" type="text" value="<?php echo $feedback_user_name; ?>" maxlength='150'>
                <div class="validation"></div>
            </div>

            <div class="form-group">
                <p>E-mail <span>*</span></p>
                <span class="icon-case"><i class="fa fa-envelope-o"></i></span>
                <input name="email" id="email" data-rule="email" type="text" value="<?php echo $email; ?>" maxlength='150'>
                <div class="validation"><?php echo $error_1; ?></div>
            </div>

            <div class="form-group">
                <p>Company <span>*</span></p>
                <span class="icon-case"><i class="fa fa-home"></i></span>
                <input name="company" id="company" data-rule="required" type="text" value="<?php echo $company; ?>" maxlength='150'>
                <div class="validation"></div>
            </div>

            <div class="form-group">
                <p>What is good about us<span>*</span></p>
                <span class="icon-case"><i class="fa fa-location-arrow"></i></span>
                <textarea  maxlength='200' name="good_about_us" rows="14" data-rule="required"><?php echo $good_about_us; ?></textarea>
                <div class="validation"></div>
            </div>
        </div>
        <div class="rightcontact">
            <div class="form-group">
                <p>Phone number <span>*</span></p>
                <span class="icon-case"><i class="fa fa-phone"></i></span>
                <input name="phone" id="phone" data-rule="maxlen:10" type="text" value="<?php echo $phone; ?>" maxlength=10>
                <div class="validation"><?php echo $error_2; ?></div>
            </div>


            <div class="form-group">
                <p>What we have to improve<span>*</span></p>
                <span class="icon-case"><i class="fa fa-location-arrow"></i></span>
                <textarea maxlength='200' name="improve_msg" rows="14" data-rule="required"><?php echo $improve_msg; ?></textarea>
                <div class="validation"></div>
            </div>


            <div class="form-group">
                <p>Suggestions <span>*</span></p>
                <span class="icon-case"><i class="fa fa-comments-o"></i></span>
                <textarea maxlength='200' name="suggestions" rows="14" data-rule="required"><?php echo $suggestions; ?></textarea>
                <div class="validation"></div>
            </div>
        </div>
        <div style="clear: both;"></div>
        <div style="clear: both;"></div>
        <div style="clear: both;"></div>

        <span style="color:red;"><?php echo $error; ?></span>

    </div>

    <button value="true" type="submit" name="send-feedbacks" class="feedback-button">Send</button>
</form>


</div>