
        <!--Start of heading section-->
        <div class="heading-section">
        <div class="container">
        <h3>Careers</h3>
         <ol class="breadcrumb breadcrumb-right-arrow">
          <li class="breadcrumb-item"><a href="<?php echo site_url('/'); ?>">Home</a></li>
          <li class="breadcrumb-item active">Careers</li>
        </ol>
        </div>
    </div>
        <!--End of heading section-->

        <div class="page-heading">
    <h2>life at MEPCO</h2>
    </div>

    <div class="container">





    <div class="row">

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <img src="<?php echo base_url(); ?>assets/site/img/career.jpg">
    </div>
        <div class="col-lg-6  col-md-6 col-sm-6 col-xs-12">
        <p>Mepco offers a very wide range of opportunities to anyone who is ready to work in a Challenging and Stimulating environment.
        At MEPCO everday it will be a good learning.
        At MEPCO we know that succes takes the work of talented and dedicated people like you, who are commited to making an impact every day.</p>
        <br>
        <p>The Work environment at Mepco is developed in the notion of growth beyond imagination.
        Some of the ciritical elements that define our work culture are global exposure, cross domain experiance, and work-life balance.
        Each of these elements goes much deeper than what it seemingly conveys.</p>
                <br>
        <p>Working at Mepco gives employees the chance to create an exciting and wide-ranging career.</p>
    </div>
    </div>
    </div>




        <div class="page-heading">
    <h2>Careers at MEPCO</h2>
    </div>
      <div class="container">
    <div class="row">


        <table class="table table-striped table-hover careertable">
  <thead>
    <tr>
      <th class="width-50">Job Title
        </th>
          <th class="width-50">Qualification</th>
          <th class="width-50">Experience</th>
          <th class="width-100">Job Description</th>
          <th class="width-50">Email Id</th>
          <th class="width-50"></th>
    </tr>
  </thead>

<?php
if(count($careers_list) > 0){


 foreach ($careers_list as $key => $value) {
  $q = (object) $value;

  $job_id = isset($q->job_id)?$q->job_id:"";
  $job_title = isset($q->job_title)?$q->job_title:"";
  $job_qualification = isset($q->job_qualification)?$q->job_qualification:"";
  $job_experience = isset($q->job_experience)?$q->job_experience:"";
  $job_description = isset($q->job_description)?$q->job_description:"";
  $job_title_slug = isset($q->job_title_slug)?$q->job_title_slug:"";
  $job_mailID = isset($job_mail_id)?$job_mail_id:"";

  ?>
    <tr>
        <td><?php echo $job_title; ?></td>
        <td><?php echo $job_qualification; ?></td>
        <td><?php echo $job_experience; ?></td>
        <td><?php echo $job_description; ?></td>
        <td><?php echo $job_mailID; ?></td>
        <td><a href="<?php
        $job_url = 'careers/'.$job_id.'/'.$job_title_slug;
        echo $job_url; ?>" class="btn btn-success">Apply Now</a></td>
    </tr>
<?php } 
}
else
{
  ?>
  <tr>
        <td colspan="2"></td>
        <td colspan="4">No Jobs found.</td>
    </tr>
  <?php
}
?>
    <!-- <tr>
    <td>Project Manager
      </td>
        <td>MBA</td>
        <td>5 Years</td>
        <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
         <td>abcd@gmail.com</td>
          <td><button type="button" class="btn btn-success">Apply Now</button></td>
  </tr> -->



    <!--  <tr>
    <td>Project Manager
      </td>
        <td>MBA</td>
        <td>5 Years</td>
        <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
         <td>abcd@gmail.com</td>
          <td><button type="button" class="btn btn-success">Apply Now</button></td>
  </tr> -->


    <!-- <tr>
    <td colspan="5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
      </td>

          <td><button type="button" class="btn btn-success">Apply Now</button></td>
  </tr> -->

</table>
</div>
</div>
