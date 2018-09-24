
<div class="col-md-12 apply-bg">
<span class="close">&times;</span>
<div style="clear: both;"></div>
<div style="clear: both;"></div>

<div class="col-md-11 floatleft product_name">
<h4 style="align:justify"><?php echo $product_name; ?></h4>
</div>
<div class="col-md-4 floatleft">


<?php
if(isset($image_path) && !empty($image_path)){
?>
<img src="<?php echo base_url().$assets_img_path.$image_path; ?>">
<?php
}
?>


<table class="quick-view-download">
<tr>
<td>
  <span class="floatleft category_span" style="text-align: left;">Category:</span>
</td>
<td>
<h4 class="col-md-12">
  <a title="<?php echo $category_name; ?>" href="<?php echo $category_url; ?>">
    <strong><?php echo $category_name; ?></strong>
  </a>
</h4>
</td>
</tr>
<?php
$download_file_path = base_url().$assets_img_path.$file_path;
if(file_exists($download_file_path) == false && !empty($file_path)){ ?>
<tr><td>
<span class="floatleft category_span" style="text-align: left;">File:</span>
</td>
<td>
<h5 class="col-md-4">
  <a title="<?php echo $product_name; ?>" href="<?php echo $download_file_path; ?>">
    <strong>Download</strong>
  </a>
</h5>
</td>
</tr>
<?php
}?>

<tr>
  <td colspan="2" style=""><a href="<?php echo $product_url; ?>">View Detail</a></td>
</tr>
</table>

</div>
<div class="col-md-8 floatright quick_view_details">
  <p><?php echo $quick_view_details; ?></p>
</div>
<script type="text/javascript">
$(".close").click(function(e) {
    modal.css("display", "none");
    modal_content.removeClass('animated');
    modal_content.removeClass('fadeInUp');
    $("html").attr("style","");

});

</script>
</div>