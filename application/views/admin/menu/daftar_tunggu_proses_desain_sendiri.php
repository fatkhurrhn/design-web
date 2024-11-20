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
									<label for="inputEmail3" class="col-sm-3 control-label">Alamat Pengiriman</label>
									<div class="col-sm-9">
										<textarea class="form-control" disabled><?=$ket_pembelian->alamat?></textarea>
									</div>
								</div>
							</div>
						</div>	
					<?php elseif ($value->kategori != 3): ?>
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
										<input type="email" class="form-control" disabled="" value="5,3cm x 8,8cm">
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
			</div>

			<?php if (count($bukti_pembayaran->result())>0): ?>
			<div class="col-lg-6 col-xs-12">
				<div class="box-content card">
					<h4 class="box-title">Bukti Pembayaran</h4>
					<div class="card-content">
						<div class="form-horizontal">
							<div class="form-group">
								<center><img src="<?=base_url($value3->foto_transaksi)?>"></center>
							</div>

							<?php if ($value->kategori != 3): ?>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-3 control-label">Harga</label>
								<div class="col-sm-9">
									<input type="email" class="form-control" id="inputEmail3" value="Rp. <?=number_format($ket_pembelian->jenis_kertas  * $ket_pembelian->jumlah_kertas)?>" disabled="">
								</div>
							</div>	
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-3 control-label">Kode Unik</label>
								<div class="col-sm-9">
									<input type="email" class="form-control" id="inputEmail3" value="Rp. <?=substr($value2->no_telpon, -3)?>" disabled="">
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-3 control-label">Total Harga</label>
								<div class="col-sm-9">
									<input type="email" class="form-control" id="inputEmail3" value="Rp. <?=number_format($ket_pembelian->jenis_kertas  * $ket_pembelian->jumlah_kertas + substr($value2->no_telpon, -3))?>" disabled="">
								</div>
							</div>
							<?php endif ?>
							<?php if ($value->kategori == 3): ?>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-3 control-label">Harga</label>
								<div class="col-sm-9">
									<input type="email" class="form-control" id="inputEmail3" value="Rp. <?=number_format(($ket_pembelian->lebar * 12500)  + ($ket_pembelian->panjang * 12500))?>" disabled="">
								</div>
							</div>	
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-3 control-label">Kode Unik</label>
								<div class="col-sm-9">
									<input type="email" class="form-control" id="inputEmail3" value="Rp. <?=substr($value2->no_telpon, -3)?>" disabled="">
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-3 control-label">Total Harga</label>
								<div class="col-sm-9">
									<input type="email" class="form-control" id="inputEmail3" value="Rp. <?=number_format(($ket_pembelian->lebar * 12500)  + ($ket_pembelian->panjang * 12500) + substr($value2->no_telpon, -3))?>" disabled="">
								</div>
							</div>
							<?php endif ?>
							

							<div class="form-group">
								<center>
									<a href="<?=base_url('admin/daftar_tunggu/konfirmasi/'.$this->uri->segment(3))?>"><button type="button" class="btn btn-info waves-effect waves-light">Konfirmasi Pesanan</button></a>&nbsp
									<button type="button" class="btn btn-warning waves-effect waves-light">Batalkan Pesanan</button>
								</center>
							</div>
						</div>
					</div>
				</div>
				<!-- /.box-content -->
			</div>	
			<?php endif ?>
			<?php if (count($bukti_pembayaran->result()) == 0): ?>
			<div class="col-lg-6 col-xs-12">
				<div class="box-content card">
					<h4 class="box-title">Pembeli Belum Mengirim Bukti Pembayaran</h4>
					<div class="form-horizontal card-content">
						<?php if ($value->kategori != 3): ?>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-3 control-label">Harga</label>
							<div class="col-sm-9">
								<input type="email" class="form-control" id="inputEmail3" value="Rp. <?=number_format($ket_pembelian->jenis_kertas * $ket_pembelian->jumlah_kertas)?>" disabled="">
							</div>
						</div>	
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-3 control-label">Kode Unik</label>
							<div class="col-sm-9">
								<input type="email" class="form-control" id="inputEmail3" value="Rp. <?=substr($value2->no_telpon, -3)?>" disabled="">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-3 control-label">Total Harga</label>
							<div class="col-sm-9">
								<input type="email" class="form-control" id="inputEmail3" value="Rp. <?=number_format($ket_pembelian->jenis_kertas * $ket_pembelian->jumlah_kertas + substr($value2->no_telpon, -3))?>" disabled="">
							</div>
						</div>
						<?php endif ?>
						<?php if ($value->kategori == 3): ?>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-3 control-label">Harga</label>
							<div class="col-sm-9">
								<input type="email" class="form-control" id="inputEmail3" value="Rp. <?=number_format(($ket_pembelian->lebar * 12500)  + ($ket_pembelian->panjang * 12500))?>" disabled="">
							</div>
						</div>	
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-3 control-label">Kode Unik</label>
							<div class="col-sm-9">
								<input type="email" class="form-control" id="inputEmail3" value="Rp. <?=substr($value2->no_telpon, -3)?>" disabled="">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-3 control-label">Total Harga</label>
							<div class="col-sm-9">
								<input type="email" class="form-control" id="inputEmail3" value="Rp. <?=number_format(($ket_pembelian->lebar * 12500)  + ($ket_pembelian->panjang * 12500) + substr($value2->no_telpon, -3))?>" disabled="">
							</div>
						</div>
						<?php endif ?>
						<div class="form-group">
							<center>
								<a href="<?=base_url("admin/daftar_tunggu")?>"><button type="submit" class="btn btn-info waves-effect waves-light">Kembali Ke Halaman Daftar Tunggu</button></a>
							</center>
						</div>
					</div>
				</div>
			</div>
			<?php endif ?>
		</div>