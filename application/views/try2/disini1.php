
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.ninjateam.org/html/my-admin/light/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 Jan 2018 03:47:34 GMT -->
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Desain Grafis - Halaman Daftar Pembelian</title>

	<!-- Main Styles -->
	<link rel="stylesheet" href="http://localhost:8080/penjualan/assets/styles/style.min.css">
	
	<!-- Material Design Icon -->
	<link rel="stylesheet" href="http://localhost:8080/penjualan/assets/fonts/material-design/css/materialdesignicons.css">

	<!-- mCustomScrollbar -->
	<link rel="stylesheet" href="http://localhost:8080/penjualan/assets/plugin/datatables/media/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="http://localhost:8080/penjualan/assets/plugin/datatables/extensions/Responsive/css/responsive.bootstrap.min.css">
	<!-- Sweet Alert -->
	<link rel="stylesheet" href="http://localhost:8080/penjualan/assets/plugin/sweet-alert/sweetalert.css">
	
	<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"> -->

	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel="stylesheet"> -->



	


</head>
<body>
<div class="main-menu">
	<header class="header">
		<a href="index-2.html" class="logo"><img src="http://localhost:8080/penjualan/logo.png" width="50" height="50">Desain Grafis</a>
		<!-- <button type="button" class="button-close fa fa-times js__menu_close"></button> -->
		<div class="user">
			<a href="#" class="avatar"><img src="http://localhost:8080/penjualan/logo.png" alt="" width="50" height="50"></a>
			<h4><a href="profile.html">Admin</a></h4>
			<!-- <h5 class="position">Administrator</h5> -->
			<!-- /.name -->
			
			<!-- /.control-wrap -->
		</div>
		<!-- /.user -->
	</header>
	<!-- /.header -->
	<div class="content">

		<div class="navigation">
			<h5 class="title">Menu</h5>
			<!-- /.title -->
			<ul class="menu js__accordion">


				<li >
					<a class="waves-effect" href="http://localhost:8080/penjualan/admin"><i class="menu-icon mdi mdi-view-dashboard"></i><span>Halaman Utama</span></a>
				</li>


				<!-- <li>
					<a class="waves-effect" href="index-2.html"><i class="menu-icon mdi mdi-desktop-mac"></i><span>ADMIN</span></a>					
				</li> -->

				<li >
					<a class="waves-effect" href="http://localhost:8080/penjualan/admin/daftar_tunggu"><i class="menu-icon fa fa-check-square-o"></i><span>Daftar Tunggu Pembeli</a>
					
				</li>

				<li >
					<a class="waves-effect" href="http://localhost:8080/penjualan/admin/proses_pembuatan"><i class="menu-icon fa fa-child"></i><span>Proses Pembuatan Pesanan</a>
					
				</li>

				<li >
					<a class="waves-effect" href="http://localhost:8080/penjualan/admin/daftar_pengembalian"><i class="menu-icon fa fa-book"></i><span>Daftar Pengembalian</a>
					
				</li>

				<li class="current">
					<a class="waves-effect" href="http://localhost:8080/penjualan/admin/daftar_pembelian"><i class="menu-icon mdi mdi-book-open"></i><span>Daftar Pembelian</a>
					
				</li>


				<li>
					<a class="waves-effect" href="http://localhost:8080/penjualan/admin/logout"><i class="menu-icon mdi mdi-logout"></i><span>Logout</span></a>
				</li>

				<li>
					&nbsp<br>&nbsp
				</li>


				
				


			</ul>
			<!-- /.menu js__accordion -->
			
			<!-- /.menu js__accordion -->
		</div>
		<!-- /.navigation -->
	</div>
	<!-- /.content -->
</div><!-- /.main-menu -->

<div class="fixed-navbar">
	<div class="pull-left">
		<button type="button" class="menu-mobile-button glyphicon glyphicon-menu-hamburger js__menu_mobile"></button>
		<h1 class="page-title">Halaman Daftar Pembelian</h1>
		<!-- /.page-title -->
	</div>
	<!-- /.pull-left -->
	<div class="pull-right">
		
		<!-- /.ico-item -->
		<!-- <a href="#" class="ico-item mdi mdi-logout js__logout"></a> -->
	</div>
	<!-- /.pull-right -->
</div><!-- /.fixed-navbar -->


<!-- /#notification-popup -->


<!-- /#message-popup -->
<div id="wrapper">
	<div class="main-content">
				<div class="row small-spacing">
			<div class="col-xs-12">
				<div class="box-content card">
					<h4 class="box-title">Form Proses Pembuatan</h4>
					<div class="card-content" style="overflow-x: auto">
						<table id="example" class="table table-striped table-bordered display" style="width:100%">
							<thead>
					            <tr>
					                <th>First name</th>
					                <th>Last name</th>
					                <th>Position</th>
					                <th>Office</th>
					                <th>Office</th>
					                <th>Office</th>
					            </tr>
					        </thead>
					        <!-- <tbody></tbody> -->
							 
						</table>
					</div>
				</div>
				<!-- /.box-content -->
			</div>

			
		</div>		<!-- /.row -->

	
				<footer class="footer">
			<ul class="list-inline">
				<li>2020 © <i>Desain</i>-<b>Grafis</b>.</li>
				<li><a href="#">Privacy</a></li>
				<li><a href="#">Terms</a></li>
				<li><a href="#">Help</a></li>
			</ul>
		</footer>	</div>
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
		<script src="http://localhost:8080/penjualan/assets/scripts/jquery.min.js"></script>
	<script src="http://localhost:8080/penjualan/assets/scripts/modernizr.min.js"></script>
	<script src="http://localhost:8080/penjualan/assets/plugin/bootstrap/js/bootstrap.min.js"></script>
	<script src="http://localhost:8080/penjualan/assets/plugin/nprogress/nprogress.js"></script>
	<script src="http://localhost:8080/penjualan/assets/plugin/sweet-alert/sweetalert.min.js"></script>
	<script src="http://localhost:8080/penjualan/assets/plugin/waves/waves.min.js"></script>

	<script src="http://localhost:8080/penjualan/assets/plugin/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="http://localhost:8080/penjualan/assets/plugin/datatables/media/js/dataTables.bootstrap.min.js"></script>
	<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
 -->
	 <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script> -->

  	<script src="http://localhost:8080/penjualan/assets/plugin/toastr/toastr.min.js"></script>
  	<link rel="stylesheet" type="text/css" href="http://localhost:8080/penjualan/assets/plugin/toastr/toastr.css">
  	








	

	<script type="text/javascript">

            var save_method; //for save method string
            var table;

            $(document).ready(function() {
                //datatables
                table = $('#example').DataTable({ 
                    "processing": true, //Feature control the processing indicator.
                    "serverSide": true, //Feature control DataTables' server-side processing mode.
                    // "order": [], //Initial no order.
                    // Load data for the table's content from an Ajax source
                    "ajax": {
                        "url": '<?php echo site_url('try2/json1'); ?>',
                        "type": "POST"
                    },
                    //Set column definition initialisation properties.
                    "columns": [
                        {"data": 0},
                        {"data": 1},
                        {"data": 2},
                        {"data": 3},
                        {"data": 4},
                        {"data": 5}
                    ],

                });

            });
        </script>

        <!-- <script type="text/javascript">
		$(document).ready(function() {
		    $('#example').DataTable( {
		        "processing": true,
		        "serverSide": true,
		        "ajax": "<?php echo site_url('try2/json1'); ?>"
		    } );
		} );
	</script> -->
	
	

	

	<script src="http://localhost:8080/penjualan/assets/scripts/main.min.js"></script></body>

<!-- Mirrored from demo.ninjateam.org/html/my-admin/light/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 Jan 2018 03:48:09 GMT -->
</html>