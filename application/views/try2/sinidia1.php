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
		<div id="namaanak">
			<h2><?=$ket->nama_anak?></h2>
		</div>

		<div id="tanggal">
			<h3 style="text-decoration: underline;"> Tanggal : <?=$ket->tanggal?></h3>
		</div>

		<div id="waktu">
			<h3 style="text-decoration: underline;">Jam : <?=$ket->waktu?></h3>
		</div>

		<div id="tempat">
			<h3 style="text-decoration: underline;">Tempat : <?=$ket->tempat?></h3>
		</div>

		<div id="ortu">
			<h3 ><?=$ket->nama_ortu?></h3>
		</div>

		<div id="keluarga">
			<h3 ><?=$ket->nama_keluarga_mengundang?></h3>
		</div>
	</div>
</body>
</html>