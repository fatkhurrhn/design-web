<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Desain Grafis - <?=$header?></title>

	<link rel="icon" href="<?=base_url()?>icon.jpg">
	<!-- Main Styles -->
	<link rel="stylesheet" href="<?=base_url()?>assets/styles/style.min.css">
	
	<!-- Material Design Icon -->
	<link rel="stylesheet" href="<?=base_url()?>assets/fonts/material-design/css/materialdesignicons.css">

	<!-- mCustomScrollbar -->
	<link rel="stylesheet" href="<?=base_url()?>assets/plugin/datatables/media/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/plugin/datatables/extensions/Responsive/css/responsive.bootstrap.min.css">
	<!-- Sweet Alert -->
	<!-- <link rel="stylesheet" href="<?=base_url()?>assets/plugin/sweet-alert/sweetalert.css"> -->
	<link rel="stylesheet" href="<?=base_url()?>print_js/print.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>sweet-alert/sweetalert.css">   


<?php if ($this->uri->segment(2) == '' or $this->uri->segment(2) == null): ?>
	<style>
       	#image-preview{
		    display:none;
		    /*width : 250px;
		    height : 200px;*/
		}
    </style>

    <style>
		/*body {font-family: Arial;}*/

		/* Style the tab */
		.tab {
			overflow: hidden;
			border: 1px solid #ccc;
			background-color: #f1f1f1;
		}

		/* Style the buttons inside the tab */
		.tab button {
			background-color: inherit;
			float: left;	
			border: none;
			outline: none;
			cursor: pointer;
			padding: 14px 16px;
			transition: 0.3s;
			font-size: 17px;
		}

		/* Change background color of buttons on hover */
		.tab button:hover {
			background-color: #ddd;
		}

		/* Create an active/current tablink class */
		.tab button.active {
			background-color: #ccc;
		}

		/* Style the tab content */
		.tabcontent {
			display: none;
			padding: 6px 12px;
			-webkit-animation: fadeEffect 1s;
			animation: fadeEffect 1s;
			/*border: 1px solid #ccc;*/
		}

		/* Fade in tabs */
		@-webkit-keyframes fadeEffect {
			from {opacity: 0;}
			to {opacity: 1;}
		}

		@keyframes fadeEffect {
			from {opacity: 0;}
			to {opacity: 1;}
		}
	</style>
<?php endif ?>

<?php if ($this->uri->segment(2) == 'daftar_tunggu'): ?>
	<?php if (is_numeric($this->uri->segment(3))): ?>
		<link rel="stylesheet" href="<?=base_url()?>/dist/css/lightbox.min.css">
	<?php endif ?>
<?php endif ?>

<?php if ($this->uri->segment(2) == 'proses_pembuatan' ): ?>
	<style>
       	#image-preview{
		    display:none;
		    /*width : 250px;
		    height : 200px;*/
		}
    </style>

    <?php if (is_numeric($this->uri->segment(3))): ?>
		<link rel="stylesheet" href="<?=base_url()?>/dist/css/lightbox.min.css">
	<?php endif ?>
<?php endif ?>

<?php if ($this->uri->segment(2) == 'daftar_pengembalian'): ?>
	<?php if (is_numeric($this->uri->segment(3))): ?>
	<link rel="stylesheet" href="<?=base_url()?>/dist/css/lightbox.min.css">	
	<?php endif ?>
<?php endif ?>
	
	<style type="text/css">
		.swal-modal .swal-text{
			text-align: center
		}
	</style>

</head>