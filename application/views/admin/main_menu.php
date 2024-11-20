<div class="main-menu">
	<header class="header">
		<a href="index-2.html" class="logo"><img src="<?=base_url()?>logo.png" width="50" height="50">Desain Grafis</a>
		<!-- <button type="button" class="button-close fa fa-times js__menu_close"></button> -->
		<div class="user">
			<a href="#" class="avatar"><img src="<?=base_url()?>logo.png" alt="" width="50" height="50"></a>
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


				<li <?php if ($this->uri->segment(2) == '' or $this->uri->segment(2) == 'detail') { echo 'class="current"'; } ?>>
					<a class="waves-effect" href="<?=base_url()?>admin"><i class="menu-icon mdi mdi-view-dashboard"></i><span>Halaman Utama</span></a>
				</li>


				<!-- <li>
					<a class="waves-effect" href="index-2.html"><i class="menu-icon mdi mdi-desktop-mac"></i><span>ADMIN</span></a>					
				</li> -->

				<li <?php if ($this->uri->segment(2) == 'daftar_tunggu') { echo 'class="current"'; } ?>>
					<a class="waves-effect" href="<?=base_url()?>admin/daftar_tunggu"><i class="menu-icon fa fa-check-square-o"></i><span>Daftar Tunggu Pembeli</a>
					
				</li>

				<li <?php if ($this->uri->segment(2) == 'proses_pembuatan') { echo 'class="current"'; } ?>>
					<a class="waves-effect" href="<?=base_url()?>admin/proses_pembuatan"><i class="menu-icon fa fa-child"></i><span>Proses Pembuatan Pesanan</a>
					
				</li>

				<li <?php if ($this->uri->segment(2) == 'daftar_pengembalian') { echo 'class="current"'; } ?>>
					<a class="waves-effect" href="<?=base_url()?>admin/daftar_pengembalian"><i class="menu-icon fa fa-book"></i><span>Daftar Pengembalian</a>
					
				</li>

				<li <?php if ($this->uri->segment(2) == 'daftar_pembelian') { echo 'class="current"'; } ?>>
					<a class="waves-effect" href="<?=base_url()?>admin/daftar_pembelian"><i class="menu-icon mdi mdi-book-open"></i><span>Daftar Pesanan Selesai</a>
					
				</li>

				<li <?php if ($this->uri->segment(2) == 'laporan') { echo 'class="current"'; } ?>>
					<a class="waves-effect" href="<?=base_url()?>admin/laporan"><i class="menu-icon mdi mdi-file-document"></i><span>Laporan Penjualan</a>
					
				</li>

				<li <?php if ($this->uri->segment(2) == 'daftar_pembeli') { echo 'class="current"'; } ?>>
					<a class="waves-effect" href="<?=base_url()?>admin/daftar_pembeli"><i class="menu-icon mdi mdi-format-list-numbers"></i><span>Daftar Pembeli</a>
					
				</li>

				<li <?php if ($this->uri->segment(2) == 'rekening') { echo 'class="current"'; } ?>>
					<a class="waves-effect" href="<?=base_url()?>admin/rekening"><i class="menu-icon mdi mdi-home-variant"></i><span>Rekening Bank</a>
					
				</li>


				<li>
					<a class="waves-effect" href="<?=base_url()?>admin/logout"><i class="menu-icon mdi mdi-logout"></i><span>Logout</span></a>
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
</div>