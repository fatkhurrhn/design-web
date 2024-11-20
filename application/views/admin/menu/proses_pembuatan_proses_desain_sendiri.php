		<div class="row small-spacing">
			<div class="col-lg-6 col-xs-12">
				<div class="box-content card">
					<?php  
						foreach ($data_pembelian->result() as $key => $value) ;
						foreach ($data_pembeli->result() as $key2 => $value2) ;
						foreach ($bukti_pembayaran->result() as $key3 => $value3) ;
						$ket_pembelian = json_decode($value->ket);
						if ($value->kategori == 1) {
							if ($ket_pembelian->undangan == 1) {
								$kategori = "Undangan Aqiqah";
							}elseif ($ket_pembelian->undangan == 2) {
								$kategori = "Undangan Nikah";
							}
							if ($ket_pembelian->jenis_kertas == '4000') {
				                $jenis_kertas = "Art Paper | Rp. 4,000 / 1 pcs";
			              	}elseif ($ket_pembelian->jenis_kertas == '3000') {
				                $jenis_kertas = "Jasmine | Rp. 3,000 / 1 pcs";
			              	}elseif ($ket_pembelian->jenis_kertas == '1000') {
			                	$jenis_kertas = "Cartoon | Rp. 1,000 / 1 pcs";
			              	}
						}elseif ($value->kategori == 2) {
							$kategori = "Kartu Nama";
							if ($ket_pembelian->jenis_kertas == '25000') {
				                $jenis_kertas = "PVC | Rp. 25,000 / 1 pcs";
			              	}elseif ($ket_pembelian->jenis_kertas == '1000') {
				                $jenis_kertas = "Photopaper | Rp. 1,000 / 1 pcs";
			              	}elseif ($ket_pembelian->jenis_kertas == '500') {
				                $jenis_kertas = "Cartoon | Rp. 500 / 1 pcs";
			              	}
						}elseif ($value->kategori == 3) {
							$jenis_kertas = "Vinyl | 1m * 1m = Rp. 25,000";
							$kategori = "Spanduk";
						}

						if ($value->kategori != 3) {
							$jumlah_harga = $ket_pembelian->jenis_kertas  * $ket_pembelian->jumlah_kertas + substr($value2->no_telpon, -3);
						}elseif ($value->kategori == 3) {
							$jumlah_harga = ($ket_pembelian->lebar * 12500) + ($ket_pembelian->panjang * 12500)  * $ket_pembelian->jumlah_kertas + substr($value2->no_telpon, -3);
						}

					?>
					<h4 class="box-title">Detail Pembelian</h4>
					<?php if ($value->kategori == 3): ?>
						<div class="card-content">
							<div class="form-horizontal">
								

								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Kategori</label>
									<div class="col-sm-9">
										<input type="text" class="form-control"  value="<?=$kategori?>" disabled="">
									</div>
								</div>
								
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Waktu Pembelian</label>
									<div class="col-sm-9">
										<input type="email" class="form-control" disabled="" value="<?=$value->waktu_pembelian?>">
									</div>
								</div>

								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Jenis Kertas</label>
									<div class="col-sm-9">
										<input type="email" class="form-control" disabled="" value="<?=$jenis_kertas?>">
									</div>
								</div>

								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Ukuran </label>
									<div class="col-sm-9">
										<input type="email" class="form-control" disabled="" value="<?=$ket_pembelian->panjang?> m x <?=$ket_pembelian->lebar?> m">
									</div>
								</div>
								
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Jumlah</label>
									<div class="col-sm-9">
										<input type="email" class="form-control" disabled="" value="<?=$ket_pembelian->jumlah_kertas?>">
									</div>
								</div>

								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Total Pembayaran</label>
									<div class="col-sm-9">
										<input type="email" class="form-control" disabled="" value="Rp <?=number_format($jumlah_harga)?> ">
									</div>
								</div>
								
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Alamat Pengiriman</label>
									<div class="col-sm-9">
										<textarea class="form-control" disabled><?=$ket_pembelian->alamat?></textarea>
									</div>
								</div>
							</div>
						</div>	
					<?php endif ?>
					<?php if ($value->kategori != 3): ?>
						<div class="card-content">
							<div class="form-horizontal">
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Kategori</label>
									<div class="col-sm-9">
										<input type="text" class="form-control"  value="<?=$kategori?>" disabled="">
									</div>
								</div>
								
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Waktu Pembelian</label>
									<div class="col-sm-9">
										<input type="email" class="form-control" disabled="" value="<?=$value->waktu_pembelian?>">
									</div>
								</div>

								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Jenis Kertas</label>
									<div class="col-sm-9">
										<input type="email" class="form-control" disabled="" value="<?=$jenis_kertas?>">
									</div>
								</div>

								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Ukuran </label>
									<div class="col-sm-9">
										<input type="email" class="form-control" disabled="" value="15,3cm x 20,3cm">
									</div>
								</div>
								
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Jumlah</label>
									<div class="col-sm-9">
										<input type="email" class="form-control" disabled="" value="<?=$ket_pembelian->jumlah_kertas?>">
									</div>
								</div>
								
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Alamat Pengiriman</label>
									<div class="col-sm-9">
										<textarea class="form-control" disabled><?=$ket_pembelian->alamat?></textarea>
									</div>
								</div>
							</div>
						</div>	
					<?php endif ?>
				</div>
				<!-- /.box-content -->

				<?php if ($value->id_transaksi == 7): ?>
				<div class="box-content card">
					<h4 class="box-title">Komentar</h4>
					<?php  
						$cek_komentar = $this->madmin->tampil_data_where('tb_komen_desain_sendiri',array('no' => $this->uri->segment(3)));

						// print_r($value2->id)
					?>
					<div class="card-content">
						<div class="form-group">
						<?php if (count($cek_komentar->result())>0){
							foreach ($cek_komentar->result() as $key11 => $value11) ;
							$komen = json_decode($value11->komen);
							$ada = 0;
						 	foreach ($komen as $key12 => $value12) {
						 		if ($value12->id_pembeli == $value2->id) { 
						 			$komentarnya = $value12->komen;
						 			$ada = 1;
						 			// print_r($komentarnya);
						 			break;
						 		}
						 	}

						 	if ($ada == 0) {?>
						 		<center><b><h4>Pembeli Belum Memberikan Komentar</h4></b></center>
						 		<?php
						 	}else{ ?>
						 		<center><b><i><h4>"<?=$komentarnya?>"</h4></b></i></center>
						 		<?php
						 	}
						} else{?>
							<center><b><h4>Pembeli Belum Memberikan Komentar</h4></b></center>
							<?php
						}
						?>
							
						</div>
					</div>
				</div>	
				<?php endif ?>
			</div>

			<div class="col-lg-6 col-xs-12">
				<div class="box-content card">
					<h4 class="box-title">Detail Desain</h4>
					<div class="card-content">
						<div class="form-horizontal">
							<?php  
								$dir = 'images/pembelian/foto_upload_user/'.$this->uri->segment(3).'/'; 
                if( is_dir($dir) === true ){ ?>
                	<div class="form-group">
										<center> 
											<?php  
	                      $files1 = glob($dir.'*');
	                      foreach($files1 as $file){ // iterate files
	                        if(is_file($file)) ?>
	                        <a style="display: inline;" class="example-image-link" href="<?=base_url().$file?>" data-lightbox="example-set" ><img style="display: inline;" class="example-image" src="<?=base_url().$file?>" width="100px" height="100px" alt=""/></a>
	                        <?php
	                      }
	                    ?>
										</center>
									</div>
                	<?php
                }
							?>
							
							
						</div>
					</div>
				</div>
				<!-- /.box-content -->
				<?php if ($value->id_transaksi == 3): ?>
				<div class="box-content card">
					<h4 class="box-title">Upload Desain Selesai</h4>
					<div class="card-content">
						<form method="post" enctype="multipart/form-data" id="ini_formnya">
		                    <div class="form-group">
		                      	<center><img id="image-preview" alt="image preview"/></center>
		                    </div>
		                    <input type="hidden" name="hahaha" value="hehehe" id="hahaha">
		                    <div class="form-group">
	                      		<label for="exampleInputEmail1">Upload Foto</label>
		                      	<input type="file"  name="foto_upload" id="imagesource" onchange="previewImage();" class="form-control">
		                    </div>
	                  	</form>
						<div class="form-group" style="text-align: center">
							<button type="button" class="btn btn-info waves-effect waves-light" onclick="upload()">Upload Foto Desain</button>
						</div>
					</div>
				</div>	
				<?php endif ?>

				<?php if ($value->id_transaksi == 4): ?>
				<div class="box-content card">
					<h4 class="box-title">Menunggu Pengesahan Dari Pembeli</h4>
					<div class="card-content">
						<div class="form-group">
	                      	<center><img src="<?=base_url($value3->foto_desain_selesai)?>" /></center>
	                    </div>
						<p class="text-muted limit-width margin-bottom-20" style="text-align: justify;">Menunggu Pengesahan Penerimaan Desain Dari Pembeli. Akan Ada Notifikasi Jika Pembeli Menerima Atau Ingin Menambah Desain . <br>Mohon Bersabar. </p>
						<div class="form-group" style="text-align: center">
							<a href="<?=base_url()?>admin/proses_pembuatan"><button type="button" class="btn btn-success waves-effect waves-light">Kembali Ke Halaman <i>" Proses Pembuatan Pesanan"</i></button></a>
						</div>
					</div>
				</div>	
				<?php endif ?>

				<?php if ($value->id_transaksi == 5): ?>
				<div class="box-content card">
					<h4 class="box-title">Desain Diterima</h4>
					<div class="card-content">
						<div class="form-group">
	                      	<center><img src="<?=base_url($value3->foto_desain_selesai)?>" /></center>
	                    </div>
						<p class="text-muted limit-width margin-bottom-20" style="text-align: justify;">Desain Diterima Oleh Pembeli. Silakan Cetak Desain <i><b><?=$kategori?></b></i> Yang Dibeli Oleh Pembeli. Kemudian Menekan Tombol <i><b>"Cetakan Selesai / Silahkan Ambil Pesanan Anda"</b></i> Untuk Pembeli Mengambil Pesanan Anda </p>
						<div class="form-group" style="text-align: center">
							<a href="<?=base_url()?>admin/proses_pembuatan/cetakan_selesai/<?=$this->uri->segment(3)?>"><button type="button" class="btn btn-primary waves-effect waves-light">Cetakan Selesai <i>"Pembeli Akan Mengambil Pesanannya"</i></button></a><br><br>
							<a href="<?=base_url()?>admin/proses_pembuatan"><button type="button" class="btn btn-success waves-effect waves-light">Kembali Ke Halaman <i>" Proses Pembuatan Pesanan"</i></button></a>
						</div>
					</div>
				</div>	
				<?php endif ?>

				<?php if ($value->id_transaksi == 6): ?>
				<div class="box-content card">
					<h4 class="box-title">Pesanan Desain Sedang Dihantar</h4>
					<div class="card-content">
						<div class="form-group">
	                      	<center><img src="<?=base_url($value3->foto_desain_selesai)?>" /></center>
	                    </div>
						<p class="text-muted limit-width margin-bottom-20" style="text-align: justify;">Silahkan Ambil Pesanan Anda Ditoko kami, Pembeli Akan Menekan Tombol <i><b>"Pesanan Diterima" Jika Telah Menerima Pesanan. Mohon Bersabar</b></i></p>
						<div class="form-group" style="text-align: center">
							<a href="<?=base_url()?>admin/proses_pembuatan"><button type="button" class="btn btn-success waves-effect waves-light">Kembali Ke Halaman <i>" Proses Pembuatan Pesanan"</i></button></a>
						</div>
					</div>
				</div>	
				<?php endif ?>

				<?php if ($value->id_transaksi == 7): 
					$date=DateTime::createFromFormat('Y-m-d H:i:s', $value->waktu_penerimaan );
					$tanggal_penerimaan=$date->format('d-m-Y');

					if ($date->format('H') > 12) {
						$jam = number_format($date->format('H')) -12;
						$jam_penerimaan = $date->format($jam.':i').' PM';
					}else{
				 		$jam_penerimaan = $date->format('H:i').' AM';
					}
				?>
				<div class="box-content card">
					<h4 class="box-title">Pesanan Telah Diterima</h4>
					<div class="card-content">
						<div class="form-group">
	                      	<center><img src="<?=base_url($value3->foto_desain_selesai)?>" /></center>
	                    </div>
						<p class="text-muted limit-width margin-bottom-20" style="text-align: justify;">Pesanan Desain Telah Diterima Oleh Pembeli Pada Tanggal <b><?=$tanggal_penerimaan?></b> Jam <b><?=$jam_penerimaan?> .</b> </p>
						<div class="form-group" style="text-align: center">
							<a href="<?=base_url()?>admin/proses_pembuatan"><button type="button" class="btn btn-success waves-effect waves-light">Kembali Ke Halaman <i>" Proses Pembuatan Pesanan"</i></button></a>
						</div>
					</div>
				</div>	
				<?php endif ?>
				
			</div>	
				
			
		</div>