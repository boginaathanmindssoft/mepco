
 <footer class="footer">
        <div class="text-center copy-right-text">   COPY RIGHT &copy; 2018 Mepco, ALL RIGHTS RESERVED.</div>
</footer>

</div>
</div>
</body>
</html>
<!-- <script type="text/javascript" src="<?php echo base_url(); ?>common/js/jquery.min.js"></script> -->
<script type="text/javascript" src="<?php echo base_url(); ?>common/app/js/api-js-base.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$('input[name="active"]').click(function() {
if ($(this).val() == '1'){

	alert('You have selected active');
	//do show/hide of items here
}
else{
	alert('You have selected inactive');
	//do show/hide of items here
}
});

$(".dropdown.user-box").click(function() {
    if($(this).hasClass("open") == false){
        $(this).addClass("open");
    }
    else{
        $(this).removeClass("open");
    }
});


});
</script>
<style type="text/css">
a{
    outline:none !important;
}
</style>