
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.ninjateam.org/html/my-admin/light/page-404.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 Jan 2018 03:48:56 GMT -->
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Home</title>
	<link rel="stylesheet" href="<?=base_url()?>assets/styles/style.min.css">

	<!-- Waves Effect -->
	<link rel="stylesheet" href="<?=base_url()?>assets/plugin/waves/waves.min.css">

</head>

<body>

<div id="page-404">
	<div class="content">
		<div class="title-on-desktop">
			<svg style="width: 600px; height: 200px" alignment-baseline="middle">
				<defs>
					<clipPath id="clip2">
						<path d="M 0 0 L 600 0 L 600 80 L 0 80 L 0 0 L 0 125 L 600 125 L 600 200 L 0 200 Z" />
					</clipPath>
				</defs>
				<text x="300" y="190" style="width: 600px; height: 200px" text-anchor="middle" font-family="Lato" font-weight="700" font-size="250" fill="#505458" clip-path="url(#clip2)">4<tspan fill="#35b8e0">0</tspan>4</text>
			</svg>
			<div class="title">Halaman Tidak Ditemukan</div>
		</div>
		<h1 class="title-on-mobile">Error 404: Halaman Tidak Ditemukan</h1>
		<p>Sepertinya Anda Mencoba Untuk Memasuki Wilayah Terbatas. Jan Takut Bosk..Aman Itu...Klik Saja <b>"Kembali"</b>...Ndak Da Masalah...HAHAHAHAHAH</p>
		<?php  
			if ($this->session->userdata('pembeli') != '' and $this->session->userdata('pembeli') != 'null') {
				$url = base_url('user');
			}elseif ($this->session->userdata('admin') != '' and $this->session->userdata('admin') != 'null') {
				$url = base_url('admin');
			}else{
				$url = base_url();
			}
		?>
		<a href="<?=$url?>" class="btn btn-info">Kembali BOSKU</a>
		
	</div>
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

	<script src="<?=base_url()?>assets/scripts/main.min.js"></script>
</body>

<!-- Mirrored from demo.ninjateam.org/html/my-admin/light/page-404.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 Jan 2018 03:48:56 GMT -->
</html>