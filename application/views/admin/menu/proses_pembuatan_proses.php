		<div class="row small-spacing">
			<div class="col-lg-6 col-xs-12">
				<div class="box-content card">
					<?php  
						foreach ($data_pembelian->result() as $key => $value) ;
						foreach ($data_produk->result() as $key1 => $value1);
						foreach ($data_pembeli->result() as $key2 => $value2) ;
						foreach ($bukti_pembayaran->result() as $key3 => $value3) ;
						$ket_pembelian = json_decode($value->ket);
						$ket_produk = json_decode($value1->keterangan);
						if ($value1->kategori == 1) {
							if ($ket_produk->undangan == 1) {
								$kategori = "Undangan Aqiqah";
							}elseif ($ket_produk->undangan == 2) {
								$kategori = "Undangan Nikah";
							}
							if ($ket_pembelian->jenis_kertas == '4000') {
				                $jenis_kertas = "Art Paper | Rp. 4,000 / 1 pcs";
			              	}elseif ($ket_pembelian->jenis_kertas == '3000') {
				                $jenis_kertas = "Jasmine | Rp. 3,000 / 1 pcs";
			              	}elseif ($ket_pembelian->jenis_kertas == '1000') {
			                	$jenis_kertas = "Cartoon | Rp. 1,000 / 1 pcs";
			              	}
						}elseif ($value1->kategori == 2) {
							$kategori = "Kartu Nama";
							if ($ket_pembelian->jenis_kertas == '25000') {
				                $jenis_kertas = "PVC | Rp. 25,000 / 1 pcs";
			              	}elseif ($ket_pembelian->jenis_kertas == '1000') {
				                $jenis_kertas = "Photopaper | Rp. 1,000 / 1 pcs";
			              	}elseif ($ket_pembelian->jenis_kertas == '500') {
				                $jenis_kertas = "Cartoon | Rp. 500 / 1 pcs";
			              	}
						}elseif ($value1->kategori == 3) {
							$jenis_kertas = "Vinyl | 1m * 1m = Rp. 25,000";
							$kategori = "Spanduk";
						}

						if ($value1->kategori != 3) {
							$jumlah_harga = ($ket_pembelian->jenis_kertas + $ket_produk->harga) * $ket_pembelian->jumlah_kertas + substr($value2->no_telpon, -3);
						}elseif ($value1->kategori == 3) {
							$jumlah_harga = (($ket_pembelian->lebar * 12500) + ($ket_pembelian->panjang * 12500) + $ket_produk->harga) * $ket_pembelian->jumlah_kertas + substr($value2->no_telpon, -3);
						}

					?>
					<h4 class="box-title">Detail Pembelian</h4>
					<?php if ($value1->kategori == 3): ?>
						<div class="card-content">
							<div class="form-horizontal">
								<div class="form-group">
									<center><img src="<?=base_url($ket_produk->img)?>"></center>
								</div>

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
					<?php if ($value1->kategori != 3): ?>
						<div class="card-content">
							<div class="form-horizontal">
								<div class="form-group">
									<center><img src="<?=base_url($ket_produk->img)?>"></center>
								</div>

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
										<?php  
											if ($value1->kategori == 1) { ?>
												<input class="form-control" disabled="" value="15.3 cm X 20.3 cm">
												<?php
											}elseif ($value1->kategori == 2) { ?>
												<input class="form-control" disabled="" value="5.3 cm X 8.8 cm">
												<?php
											}
										?>
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

				<?php if ($value->id_transaksi == 7): ?>
				<div class="box-content card">
					<h4 class="box-title">Komentar</h4>
					<?php  
						$cek_komentar = $this->madmin->tampil_data_where('tb_komen',array('no' => $value->id_produk));

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
				<!-- /.box-content -->
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
							<?php if ($value1->kategori == 3): ?>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Nama</label>
									<div class="col-sm-9">
										<input type="email" class="form-control" disabled="" value="<?=$ket_pembelian->nama?>">
									</div>
								</div>	
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Tema</label>
									<div class="col-sm-9">
										<input type="email" class="form-control" disabled="" value="<?=$ket_pembelian->tema?>">
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Tanggal</label>
									<div class="col-sm-9">
										<input type="email" class="form-control"  disabled="" value="<?php if($ket_pembelian->tanggal != ''){ echo $ket_pembelian->tanggal;}else{ echo "-";} ?>">
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Waktu</label>
									<div class="col-sm-9">
										<input type="email" class="form-control"  disabled="" value="<?php if($ket_pembelian->waktu != ''){ echo $ket_pembelian->waktu;}else{ echo "-";} ?>">
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Alamat</label>
									<div class="col-sm-9">
										<textarea class="form-control" id="inp-type-5" placeholder="Write your meassage" disabled style="resize: none;"><?php if($ket_pembelian->alamat_data != ''){ echo $ket_pembelian->alamat_data;}else{ echo "-";} ?></textarea>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">No Telepon</label>
									<div class="col-sm-9">
										<input type="email" class="form-control"  disabled="" value="<?php if($ket_pembelian->no_telpon != ''){ echo $ket_pembelian->no_telpon;}else{ echo "-";} ?>">
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Email / Media Sosial</label>
									<div class="col-sm-9">
										<input type="email" class="form-control"  disabled="" value="<?php if($ket_pembelian->media_sosial != ''){ echo $ket_pembelian->media_sosial;}else{ echo "-";} ?>">
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Penambahan Keterangan</label>
									<div class="col-sm-9">
										<textarea class="form-control" id="inp-type-5" placeholder="Write your meassage" disabled style="resize: none;"><?php if($ket_pembelian->penambahan_ket != ''){ echo $ket_pembelian->penambahan_ket;}else{ echo "-";} ?></textarea>
									</div>
								</div>

							<?php elseif ($value1->kategori == 1 and $ket_produk->undangan == 2): ?>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Nama Pertama</label>
									<div class="col-sm-9">
										<input type="email" class="form-control" disabled="" value="<?=$ket_pembelian->nama_pertama?>">
									</div>
								</div>	
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Keterangan</label>
									<div class="col-sm-9">
										<input type="email" class="form-control" disabled="" value="<?php if($ket_pembelian->ket_nama_pertama != ''){ echo $ket_pembelian->ket_nama_pertama;}else{ echo "-";} ?>">
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Nama Kedua</label>
									<div class="col-sm-9">
										<input type="email" class="form-control" disabled="" value="<?=$ket_pembelian->nama_kedua?>">
									</div>
								</div>	
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Keterangan</label>
									<div class="col-sm-9">
										<input type="email" class="form-control" disabled="" value="<?php if($ket_pembelian->ket_nama_kedua != ''){ echo $ket_pembelian->ket_nama_kedua;}else{ echo "-";} ?>">
									</div>
								</div>

								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Tanggal</label>
									<?php  
										$date=DateTime::createFromFormat('Y-m-d', $ket_pembelian->tanggal);
	              						$tanggal=$date->format('d-m-Y');

									?>
									<div class="col-sm-9">
										<input type="email" class="form-control" disabled="" value="<?=$tanggal?>">
									</div>
								</div>

								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Akad</label>
									<div class="col-sm-9">
										<input type="email" class="form-control" disabled="" value="<?=$ket_pembelian->akad?>">
									</div>
								</div>	

								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Resepsi</label>
									<div class="col-sm-9">
										<input type="email" class="form-control" disabled="" value="<?=$ket_pembelian->resepsi?>">
									</div>
								</div>	

								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Nama Orang Tua Pertama</label>
									<div class="col-sm-9">
										<input type="email" class="form-control" disabled="" value="<?=$ket_pembelian->nama_ortu_pertama?>">
									</div>
								</div>	
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Keterangan</label>
									<div class="col-sm-9">
										<input type="email" class="form-control" disabled="" value="<?php if($ket_pembelian->ket_ortu_pertama != ''){ echo $ket_pembelian->ket_ortu_pertama;}else{ echo "-";} ?>">
									</div>
								</div>

								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Nama Orang Tua Kedua</label>
									<div class="col-sm-9">
										<input type="email" class="form-control" disabled="" value="<?=$ket_pembelian->nama_ortu_kedua?>">
									</div>
								</div>	
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Keterangan</label>
									<div class="col-sm-9">
										<input type="email" class="form-control" disabled="" value="<?php if($ket_pembelian->ket_ortu_kedua != ''){ echo $ket_pembelian->ket_ortu_kedua;}else{ echo "-";} ?>">
									</div>
								</div>

								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Nama Keluarga Mengundang</label>
									<div class="col-sm-9">
										<input type="email" class="form-control" disabled="" value="<?php if($ket_pembelian->nama_keluarga_mengundang != ''){ echo $ket_pembelian->nama_keluarga_mengundang;}else{ echo "-";} ?>">
									</div>
								</div>	
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Keterangan</label>
									<div class="col-sm-9">
										<input type="email" class="form-control" disabled="" value="<?php if($ket_pembelian->ket_keluarga_mengundang != ''){ echo $ket_pembelian->ket_keluarga_mengundang;}else{ echo "-";} ?>">
									</div>
								</div>

								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Penambahan Keterangan</label>
									<div class="col-sm-9">
										<textarea class="form-control" id="inp-type-5" placeholder="Write your meassage" disabled style="resize: none;"><?php if($ket_pembelian->penambahan_ket != ''){ echo $ket_pembelian->penambahan_ket;}else{ echo "-";} ?></textarea>
									</div>
								</div>

							<?php elseif ($value1->kategori == 1 and $ket_produk->undangan == 1): ?>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Nama Anak</label>
									<div class="col-sm-9">
										<input type="email" class="form-control" disabled="" value="<?=$ket_pembelian->nama_anak?>">
									</div>
								</div>	
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Keterangan</label>
									<div class="col-sm-9">
										<input type="email" class="form-control" disabled="" value="<?=$ket_pembelian->ket_anak?>">
									</div>
								</div>

								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Tanggal</label>
									<?php  
										$date=DateTime::createFromFormat('Y-m-d', $ket_pembelian->tanggal);
	              						$tanggal=$date->format('d-m-Y');

									?>
									<div class="col-sm-9">
										<input type="email" class="form-control" disabled="" value="<?=$tanggal?>">
									</div>
								</div>

								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Waktu</label>
									<div class="col-sm-9">
										<input type="email" class="form-control" disabled="" value="<?=$ket_pembelian->waktu?>">
									</div>
								</div>	

								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Nama Orang Tua</label>
									<div class="col-sm-9">
										<input type="email" class="form-control" disabled="" value="<?=$ket_pembelian->nama_ortu?>">
									</div>
								</div>	
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Keterangan</label>
									<div class="col-sm-9">
										<input type="email" class="form-control" disabled="" value="<?php if($ket_pembelian->ket_ortu != ''){ echo $ket_pembelian->ket_ortu;}else{ echo "-";} ?>">
									</div>
								</div>

								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Nama Keluarga Mengundang</label>
									<div class="col-sm-9">
										<input type="email" class="form-control" disabled="" value="<?php if($ket_pembelian->nama_keluarga_mengundang != ''){ echo $ket_pembelian->nama_keluarga_mengundang;}else{ echo "-";} ?>">
									</div>
								</div>	
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Keterangan</label>
									<div class="col-sm-9">
										<input type="email" class="form-control" disabled="" value="<?php if($ket_pembelian->ket_keluarga_mengundang != ''){ echo $ket_pembelian->ket_keluarga_mengundang;}else{ echo "-";} ?>">
									</div>
								</div>

								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Penambahan Keterangan</label>
									<div class="col-sm-9">
										<textarea class="form-control" id="inp-type-5" placeholder="Write your meassage" disabled style="resize: none;"><?php if($ket_pembelian->penambahan_ket != ''){ echo $ket_pembelian->penambahan_ket;}else{ echo "-";} ?></textarea>
									</div>
								</div>

							<?php elseif ($value1->kategori == 2): ?>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Nama</label>
									<div class="col-sm-9">
										<input type="email" class="form-control" disabled="" value="<?=$ket_pembelian->nama?>">
									</div>
								</div>	

								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">No Telepon</label>
									<div class="col-sm-9">
										<input type="email" class="form-control" disabled="" value="<?php if($ket_pembelian->no_telpon != ''){ echo $ket_pembelian->no_telpon;}else{ echo "-";} ?>">
									</div>
								</div>

								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Alamat</label>
									<div class="col-sm-9">
										<input type="email" class="form-control" disabled="" value="<?php if($ket_pembelian->alamat != ''){ echo $ket_pembelian->alamat;}else{ echo "-";} ?>">
									</div>
								</div>

								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Media Sosial</label>
									<div class="col-sm-9">
										<input type="email" class="form-control" disabled="" value="<?php if($ket_pembelian->media_sosial != ''){ echo $ket_pembelian->media_sosial;}else{ echo "-";} ?>">
									</div>
								</div>

								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Penambahan Keterangan</label>
									<div class="col-sm-9">
										<textarea class="form-control" id="inp-type-5" placeholder="Write your meassage" disabled style="resize: none;"><?php if($ket_pembelian->penambahan_ket != ''){ echo $ket_pembelian->penambahan_ket;}else{ echo "-";} ?></textarea>
									</div>
								</div>
							<?php endif ?>
							
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
						<p class="text-muted limit-width margin-bottom-20" style="text-align: justify;">Desain Diterima Oleh Pembeli. Silakan Cetak Desain <i><b><?=$kategori?></b></i> Yang Dibeli Oleh Pembeli. Kemudian Menekan Tombol <i><b>"Cetakan Selesai"</b></i> Untuk Pembeli Mengambil Pesanannya </p>
						<div class="form-group" style="text-align: center">
							<a href="<?=base_url()?>admin/proses_pembuatan/cetakan_selesai/<?=$this->uri->segment(3)?>"><button type="button" class="btn btn-primary waves-effect waves-light">Cetakan Selesai</button></a><br><br>
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
						<p class="text-muted limit-width margin-bottom-20" style="text-align: justify;">Pembeli Dalam Perjalanan Untuk Mengambil Pesanannya, Pembeli Akan Menekan Tombol <i><b>"Pesanan Diterima" Jika Telah Menerima Pesanan. Mohon Bersabar</b></i></p>
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
							<?php if ($this->uri->segment(2) == 'proses_pembuatan'): ?>
								<a href="<?=base_url()?>admin/proses_pembuatan"><button type="button" class="btn btn-success waves-effect waves-light">Kembali Ke Halaman <i>" Proses Pembuatan Pesanan"</i></button></a>
							<?php elseif ($this->uri->segment(2) == 'daftar_pembelian'): ?>
								<a href="<?=base_url()?>admin/daftar_pembelian"><button type="button" class="btn btn-success waves-effect waves-light">Kembali Ke Halaman <i>" Daftar Pesanan Selesai"</i></button></a>
							<?php endif ?>
						</div>
					</div>
				</div>	
				<?php endif ?>
				
			</div>	
				
			
		</div>