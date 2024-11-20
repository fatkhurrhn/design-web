		<div class="row small-spacing">
			<div class="col-lg-4 col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">Form Detail Desain</h4>
					<!-- /.box-title -->
					<?php foreach ($data->result() as $key => $value);
						$ket = json_decode($value->keterangan);
						$kategori = $this->madmin->tampil_data_where('tb_kategori',array('no' => $value->kategori));
						foreach ($kategori->result() as $key1 => $value1);
						$kategori = $value1->nama;
					?>
					<div class="card-content">
						<form method="post" id="myform" name="myform">
							<div class="form-group">
								<center><img src="<?=base_url($ket->img)?>"></center>
							</div>

							

							<!-- <div class="form-group">
								<label for="exampleInputEmail1">Upload Foto</label>
								<input type="file" id="imagesource" onchange="previewImage();" class="form-control" name="foto_upload">
							</div> -->
							<div class="form-group">
								<label for="exampleInputPassword1">Kategori</label>
								<input type="text"  class="form-control" value="<?=$kategori?>" disabled="">
							</div>

							<?php if ($value->kategori == 1): 
								$undangan = $ket->undangan;
								if ($undangan == 1) {
									$undangan = 'Undangan Aqiqah';
								}elseif ($undangan == 2) {
									$undangan = 'Undangan Nikah';
								}
							?>
							<div class="form-group" id="jenis_undangan">
								<label for="exampleInputFile">Jenis Undangan</label>
								<input type="text"  class="form-control" value="<?=$undangan?>" disabled="">
							</div>
							<?php endif ?>
							

							<div class="form-group">
								<label for="exampleInputEmail1">Harga</label>
								<input type="text"  class="form-control" value="<?=number_format($ket->harga)?>" disabled="">
							</div>
							<center><a href="<?=base_url()?>admin/detail/<?=$this->uri->segment(3)?>/edit"><button type="button" class="btn btn-warning btn-sm waves-effect waves-light">Edit Infromasi</button></a><br><br>
								<input type="hidden" name="id" value="<?=$this->uri->segment(3)?>">
								<input type="submit" name="hapus" style="display: none" id="hapus_button">
							<button type="button" class="btn btn-danger btn-sm waves-effect waves-light" onclick="hapus_nya()">Hapus Desain</button></center>
						</form>
					</div>
					<!-- /.card-content -->
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-lg-6 col-xs-12 -->

			<div class="col-lg-4 col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">List Pembelian</h4>
					<div class="card-content" style="overflow-x: auto">
						<table id="tabel-data" class="table table-striped table-bordered display" style="width:100%">
							<thead>
								<tr>
									<th>Tanggal</th>
									<th>Pembeli</th>
									<th>Status</th>				
								</tr>
							</thead>
							<?php  
								$cek_pembelian = $this->madmin->tampil_data_where('tb_pembelian',array('id_produk' => $this->uri->segment(3)));

								// print_r(count($cek_pembelian->result()));
							?>
							<tbody>
							<?php if (count($cek_pembelian->result())>0): ?>
							<?php foreach ($cek_pembelian->result() as $key => $value): 
								$cek_pembeli = $this->madmin->tampil_data_where('tb_pembeli',array('id' => $value->id_pembeli));
								foreach ($cek_pembeli->result() as $key1 => $value1) ;
								$cek_status = $this->madmin->tampil_data_where('tb_transaksi',array('no' => $value->id_transaksi));
								foreach ($cek_status->result() as $key2 => $value2) ;
								?>
								<tr>
									<td><?=$value->waktu_pembelian?></td>
									<td><?=$value1->nama?></td>
									<td><?=$value2->ket_admin?></td>
								</tr>
							<?php endforeach ?>
							<?php endif ?>
							</tbody>
						</table>
					</div>				
				</div>
			</div>


			<div class="col-lg-4 col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">Komentar</h4>
					<?php  
						$cek_komentar = $this->madmin->tampil_data_where('tb_komen',array('no' => $this->uri->segment(3)));

						// 
						// 
						// print_r(count($cek_komentar->result()));
					?>
					<div class="card-content">
					<?php if (count($cek_komentar->result())>0){ 
						foreach ($cek_komentar->result() as $key3 => $value3) ;
						$komen = json_decode($value3->komen);
						foreach ($komen as $key4 => $value4) { 
							$cek_pembeli = $this->madmin->tampil_data_where('tb_pembeli',array('id' => $value->id_pembeli));
							foreach ($cek_pembeli->result() as $key5 => $value5) ;
							?>
						<div class="form-group">
							<label for="exampleInputEmail1"><?=$value5->nama?></label>
							<p>"<?=$value4->komen?>"</p>
						</div>
						<hr>
							<?php
						}
					?>
						

					<?php }else{ ?>
						<div class="form-group">
							<label for="exampleInputEmail1">Belum Ada Komentar</label>
						</div>
						<?php
					} ?>
						
					</div>
					<div class="card-content" style="text-align: center;"> 
						<button type="button" class="btn btn-primary btn-circle btn-xs waves-effect waves-light">1</button>
						<!-- <button type="button" class="btn btn-primary btn-circle btn-xs waves-effect waves-light">2</button>
						<button type="button" class="btn btn-primary btn-circle btn-xs waves-effect waves-light">3</button>
						<button type="button" class="btn btn-primary btn-circle btn-xs waves-effect waves-light">4</button> -->
						
					</div>
		           



					

					
				</div>
			</div>

			
		</div>