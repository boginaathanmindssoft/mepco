
        <!--Start of heading section-->
        <div class="heading-section">
        <div class="container">
        <h3>Careers</h3>
         <ol class="breadcrumb breadcrumb-right-arrow">
          <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
          <li class="breadcrumb-item active">Careers</li>
        </ol>
        </div>
    </div>
        <!--End of heading section-->

    <div class="page-heading">
      <h2>Careers at MEPCO</h2>
    </div>


      <div class="feedback-form">
    <form method="post" action="<?php echo $form_submission_url; ?>" enctype="multipart/form-data">

     <?php $job_title = isset($careers_form->job_title)?$careers_form->job_title:'';?>
    <input type="hidden" name="job_position" value="<?php echo $job_title; ?>">
    <h1> Apply for

    <?php echo $job_title; ?> </h1>

    <div class="contentform">
            <div class="leftcontact">

            <div class="form-group">
            <p>Name <span>*</span></p>
            <span class="icon-case"><i class="fa fa-user"></i></span>
        <input type="text" name="career_name" id="career_name" data-rule="required" value="<?php echo $career_name; ?>" />
                <div class="validation"></div>
      </div>

      <div class="form-group">
      <p>E-mail <span>*</span></p>
      <span class="icon-case"><i class="fa fa-envelope-o"></i></span>
                <input type="text" name="email" id="" data-rule="email" value="<?php echo $email; ?>"/>
                <div class="validation"></div>
      </div>

      <div class="form-group">
      <p>Resume Upload <span>*</span></p>
      <span class="icon-case"><i class="fa fa-file-text"></i></span>
        <input type="file" name="resume_file" id="" style="padding-top:10px;"/>
                <div class="validation"></div>
      </div>


  </div>
  <div class="rightcontact">
  <div class="form-group">
      <p>Phone number <span>*</span></p>
      <span class="icon-case"><i class="fa fa-phone"></i></span>
        <input type="text" name="phone" id="phone" data-rule="maxlen:10" value="<?php echo $phone; ?>" maxlength=10/>
                <div class="validation"></div>
      </div>


      <div class="form-group">
      <p>Description<span>*</span></p>
      <span class="icon-case"><i class="fa fa-list-alt"></i></span>
          <textarea name="message" rows="14" data-rule="required" ><?php echo $message; ?></textarea>
                <div class="validation"></div>
      </div>

        <span style="color:red;"><?php echo $error = isset($error)?$error:''; ?></span>

  </div>
  </div>


<button type="submit" class="feedback-button">Send</button>

</form>
</div>

