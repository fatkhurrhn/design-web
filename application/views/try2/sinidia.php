<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		<?=$css?>
	</style>
</head>
<body>
	<div style="background-image: url(<?=base_url()?>images/produk/<?=$idnya?>.jpg); height: 950px; width: 850px;background-size: 100% 100%;">
		<div id="nama1">
			<h3><?=$ket->nama_pertama?></h3>
		</div>

		<div id="nama2">
			<h3><?=$ket->nama_kedua?></h3>
		</div>

		<div id="ortu1">
			<h4><?=$ket->nama_ortu_pertama?></h4>
		</div>

		<div id="ortu2">
			<h4><?=$ket->nama_ortu_kedua?></h4>
		</div>

		<div id="akad">
			<?=$ket->akad?>
		</div>

		<div id="resepsi">
			<?=$ket->resepsi?>
		</div>

		<div id="tanggal">
			<?=$ket->tanggal?>
		</div>

	</div>
</body>
</html>