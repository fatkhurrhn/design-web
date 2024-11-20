<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		<?=$css?>
   

	</style>
</head>
<body>
	<div style="background-image: url(<?=base_url()?>images/produk/<?=$idnya?>.jpg); height: 450px; width: 650px;background-size: 100% 100%;">
		<div id="nama">
			<h3><?=$ket->nama?></h3>
		</div>

		<div id="telpon">
			<h3><?=$ket->no_telpon?></h3>
		</div>

		<div id="kerja">
			<h3><?=$ket->pekerjaan?></h3>
		</div>

		<div id="alamat">
			<h3><?=$ket->alamat_data?></h3>
		</div>

		<div id="medsos">
			<h3><?=$ket->media_sosial?></h3>
		</div>
	</div>
</body>
</html>