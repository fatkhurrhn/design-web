
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.ninjateam.org/html/my-admin/light/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 Jan 2018 03:48:56 GMT -->
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title><?=$header?></title>
	<link rel="stylesheet" href="<?=base_url()?>assets/styles/style.min.css">

	<!-- Waves Effect -->
	<link rel="stylesheet" href="<?=base_url()?>assets/plugin/waves/waves.min.css">

</head>

<body>

<div id="single-wrapper">
	<form method="post" class="frm-single">
		<div class="inside">
			<div class="title"><strong>E-Perpustakaan</strong></div>
			<!-- /.title -->
			<div class="frm-title">Login</div>
			<!-- /.frm-title -->
			<div class="frm-input"><input type="text" placeholder="Username" class="frm-inp" name="username" required=""><i class="fa fa-user frm-ico"></i></div>
			<!-- /.frm-input -->
			<div class="frm-input"><input type="password" placeholder="Password" class="frm-inp" name="password" required=""><i class="fa fa-lock frm-ico"></i></div>
			
			<input type="submit" class="frm-submit" name="login" value="Login">
			
			<!-- /.row -->
			<a href="<?=base_url()?>home/pendaftaran" class="a-link"><i class="fa fa-archive"></i>Silakan Mendaftar.</a>
			<div class="frm-footer">E-Perpustakaan Desa Rajang.</div>
			<!-- /.footer -->
		</div>
		<!-- .inside -->
	</form>
	<!-- /.frm-single -->
</div><!--/#single-wrapper -->

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="assets/script/html5shiv.min.js"></script>
		<script src="assets/script/respond.min.js"></script>
	<![endif]-->
	<!-- 
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="<?=base_url()?>assets/scripts/jquery.min.js"></script>
	<script src="<?=base_url()?>assets/scripts/modernizr.min.js"></script>
	<script src="<?=base_url()?>assets/plugin/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?=base_url()?>assets/plugin/nprogress/nprogress.js"></script>
	<script src="<?=base_url()?>assets/plugin/waves/waves.min.js"></script>
	<script src="<?=base_url()?>assets/plugin/toastr/toastr.min.js"></script>
  	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/plugin/toastr/toastr.css">

  	<?php if ($this->session->flashdata('warning')): ?>
	<script type="text/javascript">
	    toastr.options = {
	      "closeButton": true,
	      "debug": false,
	      "progressBar": true,
	      "positionClass": "toast-top-right",
	      "showDuration": "300",
	      "hideDuration": "1000",
	      "timeOut": "5000",
	      "extendedTimeOut": "1000",
	      "showEasing": "swing",
	      "hideEasing": "linear",
	      "showMethod": "fadeIn",
	      "hideMethod": "fadeOut"
	    };

	    
	    toastr.warning("<?php echo  $this->session->flashdata('warning')?>");
	    
	    
  	</script> 
<?php endif ?>
	<script src="<?=base_url()?>assets/scripts/main.min.js"></script>
</body>

<!-- Mirrored from demo.ninjateam.org/html/my-admin/light/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 Jan 2018 03:48:56 GMT -->
</html>