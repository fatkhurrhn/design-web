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
									<center><img src="<?=base_url($value3->foto_desain_selesai)?>"></center>
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
					<?php elseif ($value1->kategori != 3): ?>
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
				<!-- /.box-content -->

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
							<?php endif ?>

							<?php if ($value1->kategori == 1 and $ket_produk->undangan == 2): ?>
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
							<?php endif ?>

							<?php if ($value1->kategori == 1 and $ket_produk->undangan == 1): ?>
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
							<?php endif ?>

							<?php if ($value1->kategori == 2): ?>
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

				<?php if ($value->id_transaksi > 7): ?>
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
			</div>


			<?php  
				$ket_pengembalian = json_decode($value3->foto_pengembalian);

				// print_r($ket_pengembalian);
			?>


			<div class="col-lg-6 col-xs-12">
				<div class="box-content card">
					<h4 class="box-title">Form Pengembalian</h4>
					<div class="card-content">
						<div>
							<div class="form-group" style="text-align: center">
								<?php $i = 1; foreach ($ket_pengembalian->foto as $key5 => $value5): 
									if ($i == 1) {
				                    	$style = "";
				                  	}else{
					                    $style = 'style="display: none"';
				                  	}
								?>
								<a <?=$style?> class="example-image-link" href="<?=base_url($value5->img)?>" data-lightbox="example-set" ><img class="example-image" src="<?=base_url($value5->img)?>"  alt=""/></a>
								<?php $i ++; endforeach ?>
							</div>

							<div class="form-group">
								<label for="inputEmail3">Jumlah Rusak</label>
								<input type="email" class="form-control" id="inputEmail3" value="<?=$ket_pengembalian->jumlah_rusak?>" disabled="">
							</div>

							<div class="form-group">
								<label for="inputEmail3">Keterangan Pengembalian</label>
								<textarea class="form-control" id="inp-type-5" disabled="" style="resize: none;"><?=$ket_pengembalian->keterangan?></textarea>
							</div>

							<div class="form-group">
								<center>
									<?php if ($value->id_transaksi == 8): ?>
									<a href="<?=base_url()?>admin/daftar_pengembalian/konfirmasi_pengembalian/<?=$this->uri->segment(3)?>"><button type="button" class="btn btn-info waves-effect waves-light">Konfirmasi Pengembalian</button></a><br><br>
									<button type="button" class="btn btn-danger waves-effect waves-light">Batalkan Pengembalian</button>	
									<?php endif ?>
									<?php if ($value->id_transaksi == 9): ?>
									<a href="<?=base_url()?>admin/daftar_pengembalian/cetakan_selesai/<?=$this->uri->segment(3)?>"><button type="button" class="btn btn-info waves-effect waves-light">Cetakan Selesai</button></a>		
									<?php endif ?>
									
								</center>
							</div>
						</div>
					</div>
				</div>

				<div class="box-content card white">
					<h4 class="box-title">Informasi Penting</h4>
					<div class="card-content">
						<?php if ($value->id_transaksi == 8): ?>
						<p class="text-muted limit-width margin-bottom-20" style="text-align: justify;">Klik Tombol <i><b>"Konfirmasi Pengesahan"</b></i> Untuk Pengesahan Pengembalian Jika Berpuas Hati Dengan Bukti Yang Diberikan Pembeli. Jika Tidak, Bisa Klik Tombol <i><b>"Batalkan Pengesahan"</b></i> Dan Berikan Penjelasan Kepada Pembeli Kenapa Pengembalian Dibatalkan</p>
						<?php endif ?>
						<?php if ($value->id_transaksi == 9): ?>
						<p class="text-muted limit-width margin-bottom-20" style="text-align: justify;">Klik Tombol <b>"Cetakan Selesai</b> Jika Selesai Mencetak Pesanan Pengembalian Dan Menginformasikan Pembeli Tentang Pesanan Pengembalian Dapat Diambil Kembali</p>	
						<?php endif ?>
						<?php if ($value->id_transaksi == 10): ?>
						<p class="text-muted limit-width margin-bottom-20" style="text-align: justify;">Pesanan Gantian Dapat Diambil, Status Pembelian Akan Berubah Jika Pembeli Telah Menerima Pesanan Gantian</p>	
						<?php endif ?>
						<?php if ($value->id_transaksi == 11): ?>
						<p class="text-muted limit-width margin-bottom-20" style="text-align: justify;">Pesanan Gantian Telah Diterima Oleh Pembeli</p>	
						<?php endif ?>
						<center><a href="<?=base_url()?>admin/daftar_pengembalian/"><button type="button" class="btn btn-info waves-effect waves-light">Kembali Ke Halaman <i>Daftar Pengembalian</i></button></a>	</center>
					</div>
				</div>
				<!-- /.box-content -->
			</div>
			
		</div>