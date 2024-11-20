<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.ninjateam.org/html/my-admin/light/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 Jan 2018 03:47:34 GMT -->
<?php $this->load->view("admin/head"); ?>

<body>
<?php  $this->load->view('admin/main_menu'); ?>
<!-- /.main-menu -->

<?php $this->load->view("admin/fixed_navbar") ; ?>
<!-- /.fixed-navbar -->


<!-- /#notification-popup -->


<!-- /#message-popup -->
<div id="wrapper">
	<div class="main-content">
		<?php $this->load->view($main); ?>
		<!-- /.row -->

	
		<?php $this->load->view("admin/footer"); ?>
	</div>
	<!-- /.main-content -->
</div><!--/#wrapper -->
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="assets/script/html5shiv.min.js"></script>
		<script src="assets/script/respond.min.js"></script>
	<![endif]-->
	<!-- 
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<?php $this->load->view("admin/script"); ?>
</body>

<!-- Mirrored from demo.ninjateam.org/html/my-admin/light/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 Jan 2018 03:48:09 GMT -->
</html>