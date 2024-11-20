		<div class="row small-spacing">
			<div class="col-xs-12">
				<?php //print_r(count($data_pembelian->result())) ?>
				<div class="box-content card" id="printJS-form">
					<h4 class="box-title">Form Laporan Penjualan Bulan <?=$this->uri->segment(4)?>, Tahun <?=$this->uri->segment(5)?></h4>
					<div class="card-content" style="overflow-x: auto">
						<table id="tabel-data" class="table table-striped table-bordered display" style="width:100%">
							<thead>
								<tr>
									<th>No</th>
									<th>Tanggal Pembelian</th>
									<th>Nama Pembeli</th>
									<th>Kode Produk</th>
									<th>Jumlah Pembelian</th>
									<!-- <th>Status</th> -->
									<th>Harga</th>
								</tr>
							</thead>
							<tbody>
								<?php $undangan = 0; $kartu_nama = 0 ; $spanduk = 0 ; $undangan_jual = 0; $kartu_nama_jual = 0; $spanduk_jual = 0; 
									foreach ($data_pembelian->result() as $key => $value): 
									$no = $key +1;
									$ket_pembelian = json_decode($value->ket);
									$cek_produk = $this->madmin->tampil_data_where('tb_produk',array('no' => $value->id_produk));
									

									if ($value->desain == 0) {
										foreach ($cek_produk->result() as $key1 => $value1) ;
										$ket_produk = json_decode($value1->keterangan);
										if ($value1->kategori == 1) {
											if ($ket_produk->undangan == 1) {
												$kategori = "UA".$value1->no;
											}elseif ($ket_produk->undangan == 2) {
												$kategori = "UN".$value1->no;
											}
											$undangan = $undangan + 1;
										}elseif ($value1->kategori == 2) {
											$kategori = "KN".$value1->no;
											$kartu_nama = $kartu_nama + 1;
										}elseif ($value1->kategori == 3) {
											$kategori = "SP".$value1->no;
											$spanduk = $spanduk + 1;
										}
									}elseif ($value->desain == 1) {
										if ($value->kategori == 1) {
											if ($ket_pembelian->undangan == 1) {
												$kategori = "UA / Desain sendiri";
											}elseif ($ket_pembelian->undangan == 2) {
												$kategori = "UN / Desain Sendiri";
											}
										}elseif ($value->kategori == 2) {
											$kategori = "KN / Desain Sendiri";
										}elseif ($value->kategori == 3) {
											$kategori = "SP / Desain Sendiri";
										}
									}

									

									$cek_pembeli = $this->madmin->tampil_data_where('tb_pembeli',array('id' =>$value->id_pembeli));
									foreach ($cek_pembeli->result() as $key2 => $value2) ;

									if ($value->desain == 0) {
										if ($value1->kategori != 3) {
											$jumlah_harga = ($ket_pembelian->jenis_kertas * $ket_pembelian->jumlah_kertas )+ $ket_produk->harga  + substr($value2->no_telpon, -3);
											if ($value1->kategori == 1) {
												$undangan_jual = $undangan_jual + $jumlah_harga;
											}elseif ($value1->kategori == 2) {
												$kartu_nama_jual = $kartu_nama_jual + $jumlah_harga;
											}
										}elseif ($value1->kategori == 3) {
											$jumlah_harga = ($ket_pembelian->lebar * $ket_pembelian->panjang * 25000 * $ket_pembelian->jumlah_kertas)  + $ket_produk->harga  + substr($value2->no_telpon, -3);
											$spanduk_jual = $spanduk_jual + $jumlah_harga;
										}
									}elseif ($value->desain == 1) {
										if ($value->kategori != 3) {
											$jumlah_harga = $ket_pembelian->jenis_kertas * $ket_pembelian->jumlah_kertas + substr($value2->no_telpon, -3);
										}elseif ($value->kategori == 3) {
											$jumlah_harga = (($ket_pembelian->lebar * 12500) + ($ket_pembelian->panjang * 12500)) * $ket_pembelian->jumlah_kertas + substr($value2->no_telpon, -3);
										}
									}
									
									

									$cek_transaksi = $this->madmin->tampil_data_where('tb_transaksi',array('no' => $value->id_transaksi));
									foreach ($cek_transaksi->result() as $key3 => $value3) ;
									$status_transaksi = $value3->ket_admin;
								?>
								<tr>
									<td><?=$no?></td>
									<td><?=$value->waktu_pembelian?></td>
									<?php  

									?>
									<td><?=$value2->nama?></td>
									<td><?=$kategori?></td>
									<td><?=$ket_pembelian->jumlah_kertas?></td>
									<!-- <td>
										
										<?=$status_transaksi?>
									</td> -->
									<td>Rp <?=number_format($jumlah_harga)?></td>
								</tr>	
								<?php endforeach ;$total = $undangan_jual + $kartu_nama_jual + $spanduk_jual;?>
								
							</tbody>
						</table>
						<br><br>

						<div class="form-horizontal">
							<div class="form-group ">
								<div class="col-sm-2"></div>
								<label for="inputEmail3" class="col-sm-3 control-label" style="text-align: right; ">Jumlah Penjualan Undangan :</label>
								<div class="col-sm-4">
									<input type="email" class="form-control" value="<?=$undangan?> / Rp. <?=number_format($undangan_jual)?>" disabled="">
								</div>
								<div class="col-sm-3"></div>
							</div>
						</div>

						<div class="form-horizontal">
							<div class="form-group ">
								<div class="col-sm-2"></div>
								<label for="inputEmail3" class="col-sm-3 control-label" style="text-align: right">Jumlah Penjualan Kartu Nama :</label>
								<div class="col-sm-4">
									<input type="email" class="form-control" value="<?=$kartu_nama?> / Rp. <?=number_format($kartu_nama_jual)?>" disabled="">
								</div>
								<div class="col-sm-3"></div>
							</div>
						</div>

						<div class="form-horizontal">
							<div class="form-group ">
								<div class="col-sm-2"></div>
								<label for="inputEmail3" class="col-sm-3 control-label" style="text-align: right">Jumlah Penjualan Spanduk :</label>
								<div class="col-sm-4">
									<input type="email" class="form-control" value="<?=$spanduk?> / Rp. <?=number_format($spanduk_jual)?>" disabled="">
								</div>
								<div class="col-sm-3"></div>
							</div>
						</div>

						<div class="form-horizontal">
							<div class="form-group ">
								<div class="col-sm-2"></div>
								<label for="inputEmail3" class="col-sm-3 control-label" style="text-align: right">Total Penjualan :</label>
								<div class="col-sm-4">
									<input type="email" class="form-control" value="Rp . <?=number_format($total)?>" disabled="">
								</div>
								<div class="col-sm-3"></div>
							</div>
						</div>

						<div class="form-group" style="text-align: center">
							<button type="button" class="btn btn-success  btn-xs waves-effect waves-light" title="Cetak Laporan Bulan <?=$this->uri->segment(4)?>, Tahun <?=$this->uri->segment(5)?>" onclick="PrintElem()">Cetak Laporan Bulan <?=$this->uri->segment(4)?>, Tahun <?=$this->uri->segment(5)?></button>
						</div>
						
					</div>
				</div>
				<!-- /.box-content -->
			</div>

			
		</div>